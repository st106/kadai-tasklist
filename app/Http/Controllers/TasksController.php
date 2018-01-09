<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();   // ここでDBからデータを取ってくる
        
        return view('tasks.index', ['tasks' => $tasks,]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;  

        return view('tasks.create', ['task' => $task,]);
    }
    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  
    {
        
        $this->validate($request, [
            'content' => 'required|max:255',
            
            'status' => 'required|max:10',
        ]);
        
        $task = new Task;    // これからDBに保存するために新しいモデルを作る
        
        $task->content = $request->content;  
        $task->status = $request ->status;
        $task->save();   

        return redirect('/');  
    }
        
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    // ここの $id は urlの番号
    {
        $task = Task::find($id);  // id番目のタスクを取って渡す
        // $task はテーブルのカラム情報を全部持ってる id/content/ etc....
        // $task->id / $tadk->content とかで取得できる

        return view('tasks.show', ['task' => $task,]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $task = Task::find($id);  // $id 番のタスクを取って渡す

        return view('tasks.edit', ['task' => $task,]);
        
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
    
        $this->validate($request, [
            'content' => 'required|max:255',
            
            'status' => 'required|max:10',
        ]);
        
        $task = Task::find($id);  // id番目のタスクをDBから取って渡す
        
        $task->content = $request->content;
         $task->status = $request ->status;
        $task->save();
         return redirect('/'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);  // id 番目のタスクをDBから取って来て渡す
        $task->delete();  

        return redirect('/');
    }
}
