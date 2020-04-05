<?php
namespace App\Repositories;

use App\Models\Plan;
/**
 * Class UserRepository
 * @package App\Repositories
*/
class PlanRepository
{
    /**
     * @var array
     */
    // protected $fieldSearchable = [
    //     'name'
    // ];

    public function model()
    {
        return Plan::class;
    }
}