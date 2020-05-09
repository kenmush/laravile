<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes, Uuids;


    public $incrementing = false;

    public $appends = ['urls'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    //-------------------------------------------------------------------------

    public function coverages()
    {
        return $this->hasMany('App\Models\Coverage', 'report_id');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\ReportVideo', 'report_id');
    }

    public function metrics()
    {
        return $this->hasOne('App\Models\Metrics', 'id', 'metric_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function coverage()
    {
        return $this->hasOne('App\Models\CustomReport', 'report_id', 'id');
    }

    public function getUrlsAttribute()
    {
        return $this->coverages()->count();
    }
}
