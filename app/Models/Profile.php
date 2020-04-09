<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function getRules($act = 'create')
    {
        if($act == 'create'){
            return [
                'address' => 'required|string',
                'experience' => 'required|string',
                'bio' => 'required|string'
            ];
        }elseif ( $act == 'cover_letter') {
            return [
                  'cover_letter' => 'required|image|mimes:jpeg,png,jpg|max:3000000'
            ];
        }elseif($act == 'resume'){
            return [
                'resume' => 'required|image|mimes:jpeg,png,jpg|max:3000000'
            ];
        }elseif($act == 'avatar'){
            return [
                'avatar' => 'required|image|mimes:jpeg,png,jpg|max:3000000'
            ];
        }else{
            return null;
        }

    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getAllUsers($id)
    {
        return $this->where('user_id',$id)->update([
            'address' => request()->input('address'),
            'experience' => request()->input('experience'),
            'bio' => request()->input('bio')
        ]);
    }

    public function cover($image,$id)
    {
        return $this->where('user_id',$id)->update(['cover_letter'  => $image]);
    }
    public function resume($image,$id)
    {
        return $this->where('user_id',$id)->update(['resume'  => $image]);
    }
    public function profile($image,$id)
    {
        return $this->where('user_id',$id)->update(['avatar'  => $image]);
    }

}
