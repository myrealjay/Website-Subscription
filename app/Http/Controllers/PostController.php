<?php

namespace App\Http\Controllers;

use App\Actions\CreatePostAction;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     *
     * @param CreatePostRequest $request
     * @return JsonResponse
     */
    public function store(CreatePostRequest $request) : JsonResponse{
        return (new CreatePostAction($request))->execute();
    }
}
