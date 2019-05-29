<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadRequest;
use App\Thread;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Exception;

class ThreadController extends Controller
{
    /** @var Builder */
    private $threadBuilder;

    /**
     * ThreadController constructor.
     * @param Thread $thread
     */
    public function __construct(Thread $thread)
    {
        $this->threadBuilder = $thread->query();
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $threads = $this->threadBuilder->latest()->with(['user', 'posts', 'posts.user'])->paginate(3);

        return view('threads.index', [
            'threads' => $threads,
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('threads.create');
    }

    /**
     * @param Thread $thread
     * @return View
     */
    public function edit(Thread $thread): View
    {
        return view('threads.edit', [
            'thread' => $thread,
        ]);
    }

    /**
     * @param ThreadRequest $request
     * @return RedirectResponse
     */
    public function store(ThreadRequest $request): RedirectResponse
    {
        auth()->user()->threads()->create($request->all());

        return redirect()->route('threads.index');
    }

    /**
     * @param Thread $thread
     * @param ThreadRequest $request
     * @return RedirectResponse
     */
    public function update(Thread $thread, ThreadRequest $request): RedirectResponse
    {
        $thread->fill($request->all())->save();

        return redirect()->route('threads.index');
    }

    /**
     * @param Thread $thread
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Thread $thread): RedirectResponse
    {
        $thread->delete();

        return redirect()->route('threads.index');
    }
}
