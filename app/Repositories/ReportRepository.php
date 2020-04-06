<?php
namespace App\Repositories;

use App\Admin\UserReport;

/**
 * Class UserRepository
 * @package App\Repositories
*/
class ReportRepository
{
    /**
     * @var array
     */
    // protected $fieldSearchable = [
    //     'name'
    // ];

    public function model()
    {
        return UserReport::class;
    }
}
