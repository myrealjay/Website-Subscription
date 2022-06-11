<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        dump('Subscribing Users to websites ...');

        Website::get()->each(function($website) {
            $users = User::inRandomOrder()->limit(10)->get();
            foreach($users as $user){
                Subscription::firstOrCreate([
                    'user_id' => $user->id,
                    'website_id' => $website->id
                ]);
            }
        });

        dump('Done!');
    }
}
