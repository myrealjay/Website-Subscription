<?php

namespace App\Jobs;

use App\Mail\PostMail;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendPostEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscription;
    public $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Subscription $subscription, $post)
    {
        $this->post = $post;
        $this->subscription = $subscription;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            Mail::to($this->subscription->user->email)->send(new PostMail($this->subscription->user, $this->post));
        }catch(\Exception $exception){
            logger($exception);
        }
    }
}
