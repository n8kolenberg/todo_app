@extends('layouts/layout')

@section('content')
    <!--Add Task Form-->
    <div class=" col-sm-7 col-md-8" id="addTaskForm">
        <form action="/show-list/{{$activeId}}/todos-per-list" method="POST" class="form-horizontal" id="addTodo">
            {{csrf_field()}}
            <div class="form-group">
                <div class="col-md-5 col-lg-6 "><input class="form-control" type="text" name="to-do" placeholder="Add a new task"></div>
            </div>
            <div class="form-group">
                <div class="col-md-5 col-lg-6">
                    <textarea class="form-control" form="addTodo" name="to-do-desc" placeholder="Add a description for the task"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-md-4 col-lg-offset-0">
                    <button type="submit" class="btn btn-block btn-primary">Add Task</button>
                </div>
            </div>
        </form>
        <!--End form tag-->
    </div>


    <!--Listing tasks-->
    <div class="col-sm-9 col-md-10 main">
        <div class="col-sm-9 col-sm-10 main text-center">
            <table class="table table-hover">

                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Due date</th>
                    <th>Update your tasks</th>
                </tr>
                @foreach ($taskLists[$activeId]->todos as $todo)
                    <tr>
                        <th>{{$todo->name}}</th>
                        <th>{{$todo->description}}</th>
                        <th>{{$todo->due_date}}</th>
                        <th>
                            <a href="/todos/{{$todo->id}}/edit">
                                <button class="btn btn-primary">Edit</button>
                            </a>
                            <a href="/todos/{{$todo->id}}/delete">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop

