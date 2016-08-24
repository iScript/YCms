<?php
namespace App\Repositories;

use App\User;

class UserRepository{



    protected $user;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }





    public function getById($id)
    {
        return $this->user->find($id);
    }

}






