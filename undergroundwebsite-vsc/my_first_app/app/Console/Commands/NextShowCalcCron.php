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
     * This function finds the show that will be next On Air.
     */
    public function handle()
    {
        //Step 0 : Log the activity
        \Log::info("Next Show Update is Running ... !");

        // Step 1 : Fetch current day and time
        $current_day = date('l');
        $current_time = date('H:i:s');

        // Optional Step : Query to find the current show - now on air from the program table
        // $current_show = Program::where('program_weekday', $current_day)
        //     ->where('show_start_time', '<=', $current_time)
        //     ->orderBy('show_start_time', 'desc')
        //     ->first();

        // Step 2 : Calculate 2 hours from the current time
        // this is the nature of the shows - every show has a standard of 2 hours length
        $two_hours_later = date('H:i:s', strtotime('+2 hours'));

        // Step 3 : Query to find the next show within the next 2 hours from the program table
        $next_show = Program::where('program_weekday', $current_day)
        ->where('show_start_time', '>', $current_time)
        ->where('show_start_time', '<=', $two_hours_later)
        ->orderBy('show_start_time')
        ->first();

        // Step 4 : Update the next_show table
        if ($next_show) {
            // echo "\n\nThere is a show within the next 2 hours...\n\n";
            $next_show_old = NextShow::find(1);
            $next_show_old->update([
                'show_id' => $next_show->show_id
            ]);
        }else{
            // echo "\n\nThere is no show within the next 2 hours...\n\n";
            $next_show_old = NextShow::find(1);
            $next_show_old->update([
                'show_id' => 1, // default playlist with id 1
            ]);
        }
        
        // Step 5 : Display a message
        $this->info('nextshowcalc:cron Command Run Successfully !');
    }
}
