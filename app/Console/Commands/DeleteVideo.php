<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeleteVideo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete video after 7 days';

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
        //
        $carbon  = Carbon::now('Asia/Ho_Chi_Minh');
        $videos = DB::table('videos')->where('is_published', true)->get();

        foreach ($videos as $video) {
            if ($carbon->diffInDays($video->published_time) >= '7') {
                DB::table('videos')->where('id', '=', $video->id)->delete();
            }
        }
    }
}
