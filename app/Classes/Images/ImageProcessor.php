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

    public function resizeAndSaveImages($file, Promotion $promotion)
    {
        $saveDir = "promoimages/userId_{$promotion->user_id}/promoId_{$promotion->id}";
        $pathToOriginal = $file->store($saveDir, 'public');

        foreach ($this->imageSizes as $type => $params) {
            $fileName = "{$params[1]}x{$params[2]}.{$params[0]}";
            $path = $this->storagePath . '/' . $saveDir . '/' . $fileName;
            $relativePath = Storage::url($saveDir . '/' . $fileName);

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
