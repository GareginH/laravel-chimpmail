<?php

namespace App\Console\Commands;

use App\Subscriber;
use Illuminate\Console\Command;
use NZTim\Mailchimp\Mailchimp;

class AddSubs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscribers:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add all subs from our db to Mailchimp audience';

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
     * @throws \NZTim\Mailchimp\Exception\MailchimpException
     */
    public function handle()
    {
        $apiKey = env('MC_KEY');
        $mc = new Mailchimp($apiKey);
        $listId = env('MC_LIST_ID');
        $this->info("Adding subscribers to mailchimp, please wait...");
        foreach (Subscriber::all() as $subscriber){
            if(!$mc->check($listId, $subscriber->email)){
                $mc->subscribe($listId, $subscriber->email,['FNAME'=>$subscriber->name,'LNAME'=>$subscriber->lastname], false); // Add subscriber to mailchimp list
                //$subscriber->update(['subscribed'=>true]); // Update subscribers status right away
            }
        }
        $this->info("Done");
        return 1;
    }
}
