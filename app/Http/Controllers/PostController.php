<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Thread;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Exception;

class PostController extends Controller
{
    /**
     * @param Thread $thread
     * @return View
     */
    public function create(Thread $thread): View
    {
        return view('posts.create', [
            'thread' => $thread,
        ]);
    }

    /**
     * @param Thread $thread
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(Thread $thread, PostRequest $request): RedirectResponse
    {
        auth()->user()->posts()->create($request->all() + ['thread_id' => $thread->id]);

        return redirect()->route('threads.index');
    }

    /**
     * @param $post
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('threads.index');
    }
}
