<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PublishedVideo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:published';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Video according to publish time.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // if (app()->getLocale() == 'vi') {
        //     # code...
            
        // }
        $carbon  = Carbon::now('Asia/Ho_Chi_Minh');
        $videos = DB::table('videos')->where('is_published', false)->get();

        foreach ($videos as $video) {
            # code...
            if ($video->published_time != null) {
                if ($video->published_time < $carbon->format('d-m-Y H:i')) {
                    DB::table('videos')
                        ->where('id', $video->id)
                        ->update(['is_published' => true]);
                }
                
            }
        }
        
    }
}
