<?php

namespace App\Jobs;

use App\Models\UrlCheck;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateUrlCheckJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $urlCheckCollection = UrlCheck::all();

        foreach ($urlCheckCollection as $urlCheck) {
            UrlCheckJob::dispatch($urlCheck);
        }
    }
}
