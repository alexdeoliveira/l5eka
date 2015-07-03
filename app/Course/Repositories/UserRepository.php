<?php namespace App\Course\Repositories;

use \App\User as User;

/**
* Repositorio das categorias
*/
class UserRepository implements IUserRepository
{
    public function usersForSelect()
    {
        $users = User::all();

        $result[] = null;

        foreach ($users as $key => $value) {
            $result[$value->id] = $value->name;
        }

        return $result;
    }
}
