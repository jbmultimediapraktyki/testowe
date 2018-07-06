<?php

namespace App\Http\Controllers;

use App\Repositories\TasksRepository;
use App\Tasks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TasksRequest;

class MyController extends Controller
{

    public function __construct(TasksRepository $tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->where('archived_at', '=', null)->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TasksRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TasksRequest $request)
    {
        Auth::user()->tasks()->create($request->all());
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Tasks $task
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $task)
    {
        if (Auth::id() === $task->users_id) {
            return view('tasks.show', compact('task'));
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tasks $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $task)
    {
        if (Auth::id() === $task->users_id) {
            return view('tasks.edit', compact('task'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TasksRequest $request
     * @param  Tasks $task
     * @return \Illuminate\Http\Response
     */
    public function update(TasksRequest $request, Tasks $task)
    {
        if (Auth::id() == $task->users_id) {
            if ($request->get('action') === 'archived') {
                $this->archivedTask($task);
            } else {
                $this->updateTask($request, $task);
            }
            return redirect()->route('tasks.index');
        }
        return abort(404);
    }

    public function showArchived()
    {
        $tasks = Auth::user()->tasks()->where('archived_at', '!=', null)->get();
        return view('tasks.showArchived', compact('tasks'));
    }

    public function destroy(Request $request, Tasks $task)
    {
        if (Auth::id() === $task->users_id) {
            $task->delete();
            if ($request->get('action') === 'archived') {
                return redirect()->route('tasks.showArchived');
            }

            return redirect()->route('tasks.index');
        }
        return abort(404);
    }

    private function archivedTask(Tasks $task)
    {
        $task->update([
            'archived_at' => Carbon::now(),
        ]);
    }

    private function updateTask(TasksRequest $request, Tasks $task)
    {
        $task->update($request->all());
    }

}