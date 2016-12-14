<?php

namespace App;

use App\Traits\FutureTimeDifference;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use FutureTimeDifference;

    protected $fillable = [
        'name',
        'description',
        'time',
    ];

    public function comments()
    {
        return $this->hasMany(TaskComment::class)->latest();
    }

    public function moveToTrash()
    {
        $task = clone $this;

        $this->delete();

        $trash = new TaskTrash;

        $trash->name = $task->name;
        $trash->description = $task->description;
        $trash->manager_id  = Auth::user()->id;
        $trash->time        = $task->time;
        $trash->task_id     = $task->id;

        $trash->save();
    }
}
