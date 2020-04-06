<?php
namespace App\Repositories;

use App\Models\Report;
use App\User;
/**
 * Class UserRepository
 * @package App\Repositories
*/
class UserRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    public function model()
    {
        return Report::class;
    }
}
