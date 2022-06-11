<?php

namespace App\Console\Commands;

use App\Jobs\SendPostEmailJob;
use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Console\Command;

class SendPostEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:post-email {post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email for a given post';

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
     * @return int
     */
    public function handle()
    {
        $post = json_decode($this->argument('post'));
        $earlierPosts = Post::where('title', $post->title)
        ->where('description', $post->description)
        ->where('id','!=', $post->id)->get()->pluck('website_id')->toArray();

        Subscription::where('website_id',$post->website_id)
        ->whereNotIn('website_id',$earlierPosts)
        ->chunkById(100, function($subscriptions) use ($post){
            foreach($subscriptions as $subscription) {
                dispatch(new SendPostEmailJob($subscription, $post));
            }
        });
    }
}
