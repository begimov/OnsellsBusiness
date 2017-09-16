<?php

namespace App\Jobs\Promotions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Classes\Images\ImageProcessor;

class ProcessUploadedPromotionImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $pathToOriginal;

    protected $promotion;

    protected $saveDir;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($pathToOriginal, $promotion, $saveDir)
    {
        $this->pathToOriginal = $pathToOriginal;
        $this->promotion = $promotion;
        $this->saveDir = $saveDir;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ImageProcessor $imageProcessor)
    {
        $imageProcessor->resizeAndSaveImages($this->pathToOriginal, $this->promotion, $this->saveDir);
    }
}
