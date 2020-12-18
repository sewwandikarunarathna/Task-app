<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function store (Request $request){

        //dd($request->all());
        //create new object called task
        $task = new Task; //this Task is model(Task.php)
         
        $this->validate($request, [
            'task'=>'required|max:100|min:5', //task is name of input field
        ]);


        $task->task=$request->task;
        $task-> save(); 
        $data = Task::all(); //Task is model realted to 'tasks' table in database
        //dd($data);

        return view('tasks')->with('tasks', $data); //get view of tasks page with data of data variable

       // return redirect()-> back(); //redirect to the tasks page
    }

    public function UpdateTaskAsCompleted($id){

        $updateTask= Task::find($id); //find all id in Task model
        $updateTask-> isCompleted = 1; //isCompleted column equal to 1
        $updateTask-> save();
        return redirect()->back();

    }
//if completed, change action to mark as not completed
    public function UpdateTaskAsNotCompleted($id){

        $updateTask = Task::find($id);
        $updateTask-> isCompleted = 0;
        $updateTask-> save();
        return redirect()->back();

    }
    //delete a task
    public function deletetask($id){

        $deleteTask = Task:: find($id);
        $deleteTask-> delete();
        return redirect()-> back();

    }

    public function updatetask($id){

        $updateTask = Task::find($id);
        return view('updatetask')-> with('taskdata', $updateTask);

    }

    public function updateeachtask(Request $request){

        $id = $request->id;
        $newTask = $request->uptask; // put input field(name=uptask) value to variable newTask
        $data=Task::find($id); //parana data siyalla dagnnwa data variable ekta
        $data->task = $newTask;
        $data->save();
        $datas= Task::all(); //for avoiding an error
        return view('tasks')-> with ('tasks', $datas); //tasks kyna view eka return kraddi datas kyna eka tynawda blana nisa meka danawa

    }
}
