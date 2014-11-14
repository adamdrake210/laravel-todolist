<?php

use Acme\Services\TaskCreatorService;

class TasksController extends \BaseController {

    protected $taskCreator;

    public function __construct(TaskCreatorService $taskCreator)
    {
        $this->taskCreator = $taskCreator;
    }

    public function index()
    {
        // Fetch all tasks
        $tasks = Task::with('user')->get();
        $users = User::lists('username', 'id');

        // Return a view to display them
        return View::make('tasks.index', compact('tasks', 'users'));

    }

    public function show($id)
    {
        $task = Task::find($id);

        return View::make('tasks.show', compact('task'));
    }

    public function store()
    {
        try
        {
            $this->taskCreator->make(Input::all());
        } catch (Acme\Validators\ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        return Redirect::home();

    }

}
