<?php

namespace App\Http\Controllers;

use App\Todo;
use App\TaskList;
use Illuminate\Http\Request;

use App\Http\Requests;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       /* Grabs all the todos and taskLists to display
            them in the welcome view */
            $todos = Todo::All()->reverse();
            $taskLists = TaskList::All();
            return view('welcome', [
                'todos' => $todos,
                'taskLists' => $taskLists
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*This is how we store our task into the DB*/
        $todo = new Todo([
            'name' => $request['to-do'],
            'description' => $request['to-do-desc'],
            'task_list_id' => 1, //By default, all notes will be stored in Inbox, which has id of 1
            'due_date' => new \DateTime('now')
        ]);
        $todo->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todoToEdit = Todo::find($id);
        $taskLists = TaskList::All();
       return view('layouts/editTodo', [
            'todoToEdit' => $todoToEdit,
           'taskLists' => $taskLists
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todoToUpdate = Todo::find($id);
        $todoToUpdate->name = $request['to-do-name'];
        $todoToUpdate->description = $request['to-do-desc'];
        $todoToUpdate->save();

        $request->session()->flash('status', 'Task Updated');
        return view('welcome', [
            'todos'=>Todo::all(),
            'taskLists' => TaskList::with('todos')->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Todo::destroy($id);
        $request->session()->flash('status', 'Task Deleted');
        return back();
    }


    //Allows user to add todos to a specific TodoList
    public function todoPerList(Request $request, $id) {
        $currentTaskList = TaskList::find($id);

        $todo = new Todo();
        $todo->name = $request['to-do'];
        $todo->description = $request['to-do-desc'];
        $todo->task_list_id = $id;
        $todo->due_date = new \DateTime();

        $currentTaskList->todos()->save($todo);
        return back();
    }


}
