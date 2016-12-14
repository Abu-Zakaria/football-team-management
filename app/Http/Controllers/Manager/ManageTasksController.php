<?php

namespace App\Http\Controllers\Manager;

use App\TaskActivity;
use App\TaskComment;
use App\TaskTrash;
use Auth;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today =  date('l', time());

        $currentData = date('Y-m-d h:i:s', time());

        $tasks = Task::orderBy('created_at', 'desc')->where('time', '>', $currentData)->get();

        $activities = TaskActivity::orderBy('created_at', 'desc')->paginate(9);

        $trashes = TaskTrash::all();
        $trash_count = 0;
        foreach ($trashes as $trash)
        {
            $trash_count++;
        }

        return view('manager.tasks', compact('today', 'tasks' , 'activities', 'trash_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.add.task');
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
            'name'   => 'required|min:3|max:255',
            'description' => 'required|max:255',
            'time'  => 'required',
        ]);

        $time = $request->time;

        $time = explode('T', $time);
        $time = implode(' ', $time);

        $task = new Task;
        $task->name         = $request->name;
        $task->manager_id   = Auth::user()->id;
        $task->description  = $request->description;
        $task->time         = $time;

        $task->save();

        $activity = new TaskActivity;

        $activity->task_id    = $task->id;
        $activity->activity   = "You added a task, named '$task->name'.";

        $activity->save();

        return redirect('/manage/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $comments = $task->comments;

        return view('manager.view.task', compact('task', 'comments'));
    }

    public function storeComment(Task $task, Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = new TaskComment;

        $comment->comment = $request->comment;
        $comment->task_id = $task->id;

        $comment->save();

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if ( $task )
        {
            $c_trash = clone $task;

            $task->delete();

            $trash = new TaskTrash;

            $trash->name        = $c_trash->name;
            $trash->manager_id  = $c_trash->manager_id;
            $trash->task_id     = $c_trash->id;
            $trash->description = $c_trash->description;
            $trash->time        = $c_trash->time;

            $trash->save();

            $activity = new TaskActivity;

            $activity->activity = "You Threw a task to the trash.";
            $activity->task_id  = $c_trash->id;

            $activity->save();
        }

        return back();
    }
}
