<?php

namespace App\Http\Controllers;
use App\Repositories\TasksRepository;
use App\Tasks;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TasksRequest;

class MyController extends Controller
{

    public function __construct( TasksRepository $tasks )
    {
        $this->tasks = $tasks;
        $this->middleware('auth');
        // to spowoduje, że każda akcja kontrolera będzie chroniona przed dostępem osób niezalogowanych do aplikacji
    }

    public function index()
    {
        $tasks = Tasks::where('users_id',Auth::id())->get(); //auth()->user()-> id

        return view('tasks.index', compact('tasks'));

    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TasksRequest $request)
    {
        $request['users_id']= Auth::id();
        Tasks::create($request->all());
        return redirect()->route('tasks.index');
    }
}
