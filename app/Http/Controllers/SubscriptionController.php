<?php

namespace App\Http\Controllers;

use App\Actions\SusbcriptionAction;
use App\Http\Requests\SubscribeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     *
     * @param SubscribeRequest $request
     * @return JsonResponse
     */
    public function store(SubscribeRequest $request) : JsonResponse
    {
        return (new SusbcriptionAction($request))->execute();
    }
}
