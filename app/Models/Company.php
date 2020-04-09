<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
class Company extends Model
{
    protected $guarded = [];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function job()
    {
        return $this->hasMany(Job::class, 'company_id', 'id');
    }
}
