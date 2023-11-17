<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\Ripository\MySql\GenerateQrCodeRepository;

class InsertDataBase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $image;
    /**
     * Create a new job instance.
     */
    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        GenerateQrCodeRepository::__generate($this->image);
    }
}
