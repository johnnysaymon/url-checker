<?php

namespace App\Jobs;

use App\Models\UrlCheck;
use App\Models\UrlCheckResult;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class UrlCheckJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private UrlCheck $urlCheck
    ) {}

    public function handle(): void
    {
        $response = Http::get($this->urlCheck->url);
        $urlCheckResult = UrlCheckResult::create([
            'url_check_id' => $this->urlCheck->id,
            'response_code' => $response->status(),
            'response_body' => $response->body()
        ]);
        $urlCheckResult->save();
    }
}
