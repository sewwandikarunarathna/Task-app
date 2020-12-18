<?php



Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', 'PagesController@indexabout');

/*Route::get('/contact', function(){
    return view('contactus');
});*/
Route::get('/contact','PagesController@indexcontact');

Route::get('/tasks', function (){
    $data=App\Task::all();
    
    return view('tasks')->with('tasks', $data);
});

Route::post('/saveTask', 'TaskController@store');

Route::get('/markascompleted/{id}', 'TaskController@UpdateTaskAsCompleted');

Route::get('/markasnotcompleted/{id}', 'TaskController@UpdateTaskAsNotCompleted');

Route::get('/deletetask/{id}', 'TaskController@deletetask');

Route::get('/updatetask/{id}', 'TaskController@updatetask');

Route::post('/updateeachtask', 'TaskController@updateeachtask');