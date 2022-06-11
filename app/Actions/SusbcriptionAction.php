<?php
namespace App\Actions;

use App\Contracts\ActionInterface;
use App\Http\Requests\SubscribeRequest;
use App\Models\Subscription;

class SusbcriptionAction implements ActionInterface
{
    protected int $userId;
    protected int $websiteId;

    /**
     *
     * @param SubscribeRequest $request
     */
    public function __construct(SubscribeRequest $request)
    {
        $this->userId = $request->user_id;
        $this->websiteId = $request->website_id;
    }

    public function execute()
    {
        if(Subscription::where('user_id',$this->userId)->where('website_id', $this->websiteId) ->exists()){
            return response()->json(['status' => 'failed', 'message' => 'User already subscribed'], 400);
        }

        Subscription::create([
            'user_id' => $this->userId,
            'website_id' => $this->websiteId
        ]);

        return response()->json(['status' => 'success', 'message' => 'Successfully Subscribed']);
    }
}