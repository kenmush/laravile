<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;


    protected $appends = ["ImagesArray"];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tickets';
    //-------------------------------------------------------------------------

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    //-------------------------------------------------------------------------

    public function getImagesArrayAttribute()
    {
        return explode(',', $this->images);
    }
}
