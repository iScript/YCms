<?php
namespace App\Repositories;

use App\Models\User;

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


    /**
     * 所有用户列表
     * @param array $data
     * @param int $count
     * @return mixed
     */
    public function index($data = [],$count = 10){

        $users = $this->user->where(function ($query) use ($data) {
            if (!empty($data["keyword"])) {
                $query->where('username', 'like', '%'.$data["keyword"].'%')
                    ->orWhere('nickname', 'like', '%'.$data["keyword"].'%')
                    ->orWhere('real_name', 'like', '%'.$data["keyword"].'%')
                    ->orWhere('email', 'like', '%'.$data["keyword"].'%')
                    ->orWhere('mobile', 'like', '%'.$data["keyword"].'%')
                ;
            }
        })->orderBy("id","DESC")->paginate($count);

        //$users->paging = $users->appends($data)->links();

        return $users;
    }


    public function getById($id)
    {
        return $this->user->find($id);
    }

}






