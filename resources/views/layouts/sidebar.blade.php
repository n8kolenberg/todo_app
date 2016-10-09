<div class="row full-height" style="margin-top: 50px">
    <!--Sidebar to show lists-->
    <div class="col-sm-3 col-md-2 sidebar full-height">
        <h2><a href="/">All Lists</h2> </a>
        <ul class="nav nav-sidebar">
            @foreach($taskList as $taskList)
                <h4> <a href="/show-list/{{$taskList->id}}"> {{$taskList->name}} </a> </h4>
            @endforeach
        </ul>
        <form action="/taskList" method="post" class="form-horizontal" id="addList">
            {{csrf_field()}}
            <div class="form-group">
                <div class="col-md-12"><input class="form-control" type="text" name="taskListName" placeholder="Add new List"></div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-block btn-info">Add</button>
                </div>
            </div>
        </form>
    </div>