<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Upadate Tasks</title>
</head>
<body>
    <div class="container">
    <br><br>
    <form action="/updateeachtask" method="post">
        {{csrf_field()}}  <!--avoid hacking/after evey form should put-->
        <input type="text" class="form-control" name="uptask" value="{{$taskdata->task}}"><br>
        <input type="hidden" name="id" value="{{$taskdata->id}}">  <!-- should get id number of task to update-->
        <input type="submit" class="btn btn-primary" value="Update">&nbsp;&nbsp;
        <a href="/tasks"><input type="button" class="btn btn-warning" value="Cancel"></a> 

    </form>
    </div>
</body>
</html>