<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
class Job extends Model
{
    protected $fillable = ['user_id','company_id','title','slug','description','category_id','position','address','type','status','last_date'];
    public function getAllJobs()
    {
        return $this->orderBy('id','desc')->paginate(4);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
