<?php

namespace App\Console\Commands;

use App\Subscriber;
use Illuminate\Console\Command;
use NZTim\Mailchimp\Mailchimp;

class RefreshSubs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subs:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check mailchimp audience and update our db';

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
        $apiKey = env('MC_KEY');
        $mc = new Mailchimp($apiKey);
        $listId = env('MC_LIST_ID');
        $this->info("Checking mailchimp and refreshing our subscriber DB, please wait...");
        foreach (Subscriber::all() as $subscriber){
            if($mc->check($listId, $subscriber->email)){ //If email is subscribed to our mailchimp, we set subscriber status to true
                $subscriber->update(['subscribed'=>true]);//set subscriber status true
            }
            else{ //If email is not subscribed to our mailchimp, we set subscriber status to false
                $subscriber->update(['subscribed'=>false]); //set subscriber status false
            }
        }
        $this->info("Done");
        return 1;
    }
}
