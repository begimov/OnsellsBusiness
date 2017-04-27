<?php

namespace App\Http\Controllers\Promotions;

use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Promotions\Promotion;
use App\Models\Promotions\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Promotions\StorePromotionRequest;

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
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('weight', 'desc')->get();
        return view('promotion.create', [
            'categories' => $categories
          ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromotionRequest $request)
    {
        $promotion = new Promotion;

        $promotion->category_id = $request->category;
        $promotion->company = $request->company;
        $promotion->promotionname = $request->promotionname;
        $promotion->promotiondesc = $request->promotiondesc;
        $promotion->phone = $request->phone;
        $promotion->website = $request->website;
        $promotion->address = $request->address;

        $promotion->user()->associate($request->user());

        if ($request->file('image')) {
            $userId = $request->user()->id;
            $path = $request->file('image')->store("promoimages/userId_{$userId}", 'public');
            $relativePublicPath = Storage::url($path);
            Image::make(public_path() . $relativePublicPath)->encode('png')->fit(100, 100, function ($c) {
                $c->upsize();
            })->save();

            // TODO: Prepare and Save different sized images
            // TODO: Add images ids to respective Promotions table columns (small_image, medium_image, large_image ???)
            // TODO: Create migration for promotion_images table and save $relativePublicPath to path column
            // TODO: refactor images functionality to separate method
            // TODO: REFACTOR ALL CODE!!!!!!!!
        }

        $promotion->save();

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
        return view('promotion.show', [
          'promotion' => $promotion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotions\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotions\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotions\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
