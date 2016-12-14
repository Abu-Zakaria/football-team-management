<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Group extends Model
{
    public function notifications()
    {
        return $this->hasMany(GroupNotification::class);
    }

    /**
     * @return bool
     */
    public function checkUserIfAdded()
    {
        $member = GroupMember::where('user_id', Auth::user()->id)->where('group_id', $this->id)->first();

        if ($member)
        {
            return $member;
        }
        return false;
    }
}
