<?php

namespace App\Http\Controllers\Promotions;

use Illuminate\Support\Facades\DB;
use App\Models\Promotions\Promotion;
use App\Models\Promotions\Location;
use App\Models\Promotions\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Promotions\StorePromotionRequest;
use App\Http\Requests\Promotions\UpdatePromotionsRequest;
use App\Classes\Images\ImageProcessor;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Promotion::class);
        $categories = Category::where('parent_id', null)->orderBy('weight', 'desc')->with('subcategories')->get();
        return view('promotion.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromotionRequest $request, ImageProcessor $imageProcessor)
    {
        $this->authorize('create', Promotion::class);

        $promotion = new Promotion;
        $promotion->category_id = $request->category;
        $promotion->company = $request->company;
        $promotion->promotionname = $request->promotionname;
        $promotion->promotiondesc = $request->promotiondesc;
        $promotion->phone = $request->phone;
        $promotion->website = $request->website;
        $promotion->address = $request->address;
        $promotion->user()->associate($request->user());
        $promotion->save();

        if ($request->file('image')) {
            // dispatch job for processing, saving, uploading to cloud and updating db
            // TODO: Quejob
            $imageProcessor->resizeAndSaveImages($request->file('image'), $promotion);
        }

        $location = new Location;
        $location->location = "{$request->lat},{$request->lng}";
        $location->promotion()->associate($promotion);
        $location->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotions\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        return view('promotion.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotions\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        $this->authorize('edit', $promotion);
        $categories = Category::where('parent_id', null)->orderBy('weight', 'desc')->with('subcategories')->get();
        return view('promotion.edit', compact('categories', 'promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotions\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromotionsRequest $request, Promotion $promotion, ImageProcessor $imageProcessor)
    {
        $this->authorize('edit', $promotion);

        $promotion->category_id = $request->category;
        $promotion->company = $request->company;
        $promotion->promotionname = $request->promotionname;
        $promotion->promotiondesc = $request->promotiondesc;
        $promotion->phone = $request->phone;
        $promotion->website = $request->website;

        $promotion->save();

        if ($request->file('image')) {
            // dispatch job for processing, saving, uploading to cloud and updating db
            // TODO: Quejob
            $imageProcessor->resizeAndSaveImages($request->file('image'), $promotion);
        }

        return back()->with('status', 'Promotion updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotions\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $this->authorize('destroy', $promotion);

        $promotion->images()->delete();
        $promotion->location()->delete();
        $promotion->delete();

        return back();
    }
}
