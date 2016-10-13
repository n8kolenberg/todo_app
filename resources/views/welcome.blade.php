@extends('layouts/layout')

    @section('sidebar')
        @include('layouts/sidebar')
        @parent
    @stop

        @section('content')
        <!--Add Task Form-->
        <div class=" col-sm-7 col-md-8" id="addTaskForm">
            <form action="/todos" method="POST" class="form-horizontal" id="addTodo">
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
                        <th>Edit</th>
                    </tr>
                    @foreach ($todos as $todo)
                        <tr>
                            <th>{{$todo->name}}</th>
                            <th>{{$todo->description}}</th>
                            <th>{{$todo->due_date}}</th>
                            <th>
                                <a href="/todo-edit/{{$todo->id}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <a href="/todo-delete/{{$todo->id}}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>

                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @stop
