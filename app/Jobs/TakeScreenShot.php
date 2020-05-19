<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Nesk\Puphpeteer\Puppeteer;

class TakeScreenShot implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url, $screen_shot_featured, $screen_shot_full_screen;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($url, $screen_shot_featured, $screen_shot_full_screen)
    {
        $this->url = $url;
        $this->screen_shot_featured =  public_path() . '/' . $screen_shot_featured;
        $this->screen_shot_full_screen = public_path() . '/' . $screen_shot_full_screen;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $puppeteer = new Puppeteer([
                'read_timeout' => 9000,
                'idle_timeout' => 9000
            ]);
            $browser = $puppeteer->launch();
            $page = $browser->newPage();
            $page->goto($this->url, [
                'timeout' => 0,
                'read_timeout' => 9000,
            ]);
            $page->screenshot(['path' => $this->screen_shot_full_screen, 'fullPage' => true, 'type' => 'jpeg']);

            $page->setViewport(['width' => 640, 'height' => 480]);
            $page->screenshot(['path' => $this->screen_shot_featured, 'type' => 'jpeg']);

            $browser->close();
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }
    }
}
