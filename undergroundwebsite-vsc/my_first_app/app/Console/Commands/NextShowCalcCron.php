<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Program;
use App\Models\NextShow;
use App\Models\Show;

class NextShowCalcCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nextshowcalc:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the NextShow table based on Program Table and current time';

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
     */
    public function handle()
    {
        \Log::info("Next Show Update is Running ... !");

        // Fetch current day and time
        $currentDay = date('l'); // or however you get the day
        $currentTime = date('H:i:s'); // or however you get the time

        // echo "\n";
        // echo $currentDay;
        // echo "\n";
        // echo $currentTime;
        // echo "\n";

        // Query to find the current show - now on air
        // $currentShow = Program::where('program_weekday', $currentDay)
        //     ->where('show_start_time', '<=', $currentTime)
        //     ->orderBy('show_start_time', 'desc')
        //     ->first();

        // echo $currentShow;
        // echo "\n";

        // Calculate 2 hours from the current time
        $twoHoursLater = date('H:i:s', strtotime('+2 hours'));

        // Query to find the next show within the next 2 hours
        $nextShow = Program::where('program_weekday', $currentDay)
            ->where('show_start_time', '>', $currentTime)
            ->where('show_start_time', '<=', $twoHoursLater)
            ->orderBy('show_start_time')
            ->first();

        // echo $nextShow;
        // echo "\n";

        if ($nextShow) {
            // echo "\n\nNext show within the next 2 hours...\n\n";
            $next_show_old = NextShow::find(1);
            $next_show_old->update([
                'show_id' => $nextShow->show_id
            ]);
        }else{
            // echo "\n\nNo next show within the next 2 hours...\n\n";
            $next_show_old = NextShow::find(1);
            $next_show_old->update([
                'show_id' => 1,
            ]);
        }
        
        $this->info('nextshowcalc:cron Command Run Successfully !');
    }
}
