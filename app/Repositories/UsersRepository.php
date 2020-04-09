<?php
namespace App\Repositories;

use App\User;
/**
 * Class UserRepository
 * @package App\Repositories
*/
class UsersRepository
{
    /**
     * @var array
     */
    // protected $fieldSearchable = [
    //     'name'
    // ];

    public function model()
    {
        return User::class;
    }

}
