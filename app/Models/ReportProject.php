<?php

namespace App\Models;
use App\Models\BuilderPage;
use Illuminate\Database\Eloquent\Model;

class ReportProject extends Model
{
	public function pages()
    {
        return $this->morphMany(BuilderPage::class, 'pageable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_coverages', 'project_id', 'user_id');
    }

    public function domain()
    {
        return $this->morphOne(CustomDomain::class, 'resource')
            ->select('id', 'host', 'resource_id', 'resource_type');
    }
}
