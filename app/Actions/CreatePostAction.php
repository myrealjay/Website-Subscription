<?php
namespace App\Actions;

use App\Contracts\ActionInterface;
use App\Events\PostCreated;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;

class CreatePostAction implements ActionInterface{
    protected string $title;
    protected string $description;
    protected int $websiteId;

    /**
     *
     * @param CreatePostRequest $request
     */
    public function __construct(CreatePostRequest $request)
    {
        $this->title = $request->title;
        $this->description = $request->description;
        $this->websiteId = $request->website_id;
    }

    public function execute(){
        $post = Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'website_id' => $this->websiteId
        ]);

        event(new PostCreated($post));

        return response()->json(['status' => 'success', 'message' => 'Post created successfully']);
    }
}