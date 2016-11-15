@extends('layouts/layout')

@section('content')
    <div class="col-sm-7 col-md-6">
        <form action="/todos/{{$todoToEdit->id}}" method="POST">
            {{method_field('PATCH')}}
            {{csrf_field()}}

            <div class="form-group">
                <div class="col-md-7 col-lg-8">
                    <input type="text" class="form-control" name="to-do-name" placeholder="{{$todoToEdit->name}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-7 col-lg-8">
                    <textarea class="form-control" name="to-do-desc" placeholder="{{$todoToEdit->description}}"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5 col-lg-6">
                    <button type="submit" class="form-control btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
@stop