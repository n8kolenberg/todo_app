@extends('layouts/layout')

@section('navbar')
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand"> Todo App </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Route::has('login'))
                        <li> <a href="{{ url('/login') }}">Login</a> </li>
                        <li> <a href="{{ url('/register') }}">Register</a> </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

@stop

@section('content')
    <div class="row full-height" style="margin-top: 50px">

        <!--Sidebar to show lists-->
        <div class="col-sm-3 col-md-2 sidebar full-height">
            <h2>Lists</h2>
            <ul class="nav nav-sidebar">
                <h4>List 1</h4>
                <h4>List 2</h4>
                <h4>List 3</h4>
                <h4>List 4</h4>
            </ul>
            <form action="#" method="post" class="form-horizontal" id="addList">
                <div class="form-group">
                    <div class="col-md-12"><input class="form-control" type="text" name="add-list" placeholder="Add new List"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-block btn-info">Add</button>
                    </div>
                </div>
            </form>
        </div>

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
            <div class="title m-b-md">
                <p>Todo app</p>
            </div>
            <div class="col-sm-9 col-sm-10 main text-center">
                <table class="table table-hover">

                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Due date</th>
                    </tr>
                    @foreach ($todos as $todo)
                        <tr>
                            <th>{{$todo->name}}</th>
                            <th>{{$todo->description}}</th>
                            <th>{{$todo->due_date}}</th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @stop