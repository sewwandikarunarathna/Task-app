<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>tasks</title>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Tasks</h1>
            <div class="row">
                <div class="col-md-12">

                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                    @endforeach

                    <form method="post" action="saveTask">
                    {{csrf_field()}} <!--avoid hacking-->
          
                    <input type="text" class="form-control" name="task" placeholder="Enter your task here"><br>
                    <input type="submit" class="btn btn-primary" value="SAVE" >
                    <input type="button" class="btn btn-warning" value="RESET" >
                    
                    </form>
                   <br>
                    <table class="table table-dark">
                        <th>ID</th>
                        <th>Task</th>
                        <th>Completed</th>
                        <th>Action</th>
                        
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->task}}</td>

                            <td>@if($task->isCompleted)
                            <button class="btn btn-success">Completed</button>
                            @else
                            <button class="btn btn-warning">Not Completed</button>
                            @endif
                            </td>
                            <td>
                            @if(!$task->isCompleted)
                                <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark as Completed</a>
                            @else
                            <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-danger">Mark as Not Completed</a> 
                            @endif 
                            <a href="/deletetask/{{$task->id}}" class="btn btn-warning">Delete</a>
                            <a href="/updatetask/{{$task->id}}" class="btn btn-success">Update</a>
                            </td>
                        </tr>  
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>