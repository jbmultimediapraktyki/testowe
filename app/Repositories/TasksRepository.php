<?php
/**
 * Created by PhpStorm.
 * User: kasia
 * Date: 2018-06-14
 * Time: 13:57
 */

namespace App\Repositories;
use App\User;
use App\Tasks;

class TasksRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {

        return Tasks::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();

    }
}