<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Plan extends Model
{
    use SoftDeletes;

    protected $appends = ['user_value','book_value','client_value','report_value'];

    protected $fillable = ['title','type','books','clients','users','reports','price'];

    public function getUserValueAttribute(){
        $user = User::find($this->users);
        return $user['email'];
    }
    public function getBookValueAttribute(){
        return ($this->books == null) ? "Unlimited":$this->books;
    }
    public function getClientValueAttribute(){
        return ($this->clients == null) ? "Unlimited":$this->clients;
    }
    public function getReportValueAttribute(){
        return ($this->report == null) ? "Unlimited" : $this->report;
    }
}
