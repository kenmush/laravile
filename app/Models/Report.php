<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes,Uuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invites';
    //-------------------------------------------------------------------------

    public $incrementing = false;
}
