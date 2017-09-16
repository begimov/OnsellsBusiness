<?php

namespace App\Classes\Images;

use Image;
use App\Models\Promotions\Promotion;
use App\Models\Image as PromotionImage;
use Illuminate\Support\Facades\Storage;

class ImageProcessor {

    private $imageSizes;
    private $storagePath;

    public function __construct()
    {
        $this->imageSizes = config('images.sizes');
        $this->storagePath = config('filesystems.disks.public.root');
    }

    public function resizeAndSaveImages($pathToOriginal, Promotion $promotion, $saveToPath)
    {
        foreach ($this->imageSizes as $type => $params) {
            $fileName = "{$params[1]}x{$params[2]}.{$params[0]}";
            $path = $this->storagePath . '/' . $saveToPath . '/' . $fileName;
            $relativePath = Storage::url($saveToPath . '/' . $fileName);

            Image::make($this->storagePath . '/' . $pathToOriginal)
                ->encode($params[0])->fit($params[1], $params[2], function ($c) {
                })
                ->save($path, 90);

            if(!$promotion->images()->where('type', $type)->first()) {
                $img = new PromotionImage;
                $img->path = $relativePath;
                $img->type = $type;
                $img->promotion()->associate($promotion);
                $img->save();
            }
        }
    }
}
