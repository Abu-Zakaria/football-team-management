<?php

namespace App\Http\Controllers\Manager;

use App\Task;
use App\TaskActivity;
use App\TaskComment;
use App\TaskTrash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageTrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashes = TaskTrash::all();

        return view('manager.task_trash', compact('trashes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function restore(TaskTrash $taskTrash)
    {
        if ( $taskTrash->getRemainTime('time') > 0 )
        {
            $n_task = clone $taskTrash;

            $taskTrash->delete();

            $task = new Task;

            $task->name        = $n_task->name;
            $task->description = $n_task->description;
            $task->manager_id  = $n_task->manager_id;
            $task->time        = $n_task->time;

            $task->save();

            $activity = new TaskActivity;

            $activity->activity = "You Restored a task, named '$task->name'.";
            $activity->task_id  = $task->id;

            $activity->save();
        }

        return redirect('/manage/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(TaskTrash $trash)
    {
        if ( $trash )
        {
            $trash->delete();

            $activity = new TaskActivity;

            $activity->activity    = "You Deleted a task, named '$trash->name', forever!";
            $activity->task_id     = $trash->id;

            $activity->save();

            $comments = TaskComment::where('task_id', $trash->task_id)->get();

            foreach ($comments as $comment)
            {
                $comment->delete();
            }
        }

        return back();
    }
}
