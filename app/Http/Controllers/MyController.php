<?php

namespace App\Http\Controllers;

use App\Repositories\TasksRepository;
use App\Tasks;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TasksRequest;

class MyController extends Controller
{

    public function __construct(TasksRepository $tasks)
    {
        $this->tasks = $tasks;
        //  $this->middleware('auth');
        // teraz siedzi w web.php
        // to spowoduje, że każda akcja kontrolera będzie chroniona przed dostępem osób niezalogowanych do aplikacji
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()-> where('archived_at','=', null)->get();
        //$tasks = Tasks::where('users_id', Auth::id())->get(); //auth()->user()-> id
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
     * @param  TasksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TasksRequest $request)
    {
        Auth::user()->tasks()->create($request->all());
        //$request['users_id'] = Auth::id();  Tasks::create($request->all());
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
        return view('tasks.show',compact('task') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tasks $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $task)
    {
        return view('tasks.edit', compact('task'));
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
        $task->update($request->all());
        return redirect()-> route('tasks.index');
    }
    /**
     * Update the archived_at in storage.
     *
     * @param  Request $request
     * @param  Tasks $task
     * @return \Illuminate\Http\Response
     */
    public function archive( Tasks $task)
    {
        $task['archived_at'] = date("Y-m-d H:i:s");
        $task->update();
        return redirect()-> route('tasks.index');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */

    public function showArchived()
    {
        $tasks = Auth::user()->tasks()-> where('archived_at','!=', null)->get();
        return view('tasks.showArchived', compact('tasks'));
    }

}