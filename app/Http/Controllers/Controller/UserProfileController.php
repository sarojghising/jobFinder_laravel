<?php

namespace App\Http\Controllers\Controller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    protected $profile = null;
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }
    public function index()
    {
        $user_profile = $this->profile->with('user')->get();
        $imageProfile = $this->profile->where('user_id',Auth::user()->id)->first();
        return view('profile.index')
        ->with('profile',$imageProfile)
        ->with('user',$user_profile);
    }
    public function create(Request $request)
    {
        $rules = $this->profile->getRules('create');
        $request->validate($rules);
        $user_data = $this->profile->getAllUsers(Auth::user()->id);
        return  $user_data ?
        redirect()->back()->with('success','Profile Successfully Updated') :
         redirect()->back()->with('error','Sorry There was problem while updateing profile');
    }
    public function coverLetter(Request $request)
    {
        $rules = $this->profile->getRules('cover_letter');
        $request->validate($rules);
        if($request->has('cover_letter'))
        $cover_letter =  $request->file('cover_letter')->store('storage/images');
        $update_cover = $this->profile->cover($cover_letter,Auth::user()->id);
        return  $update_cover ?
        redirect()->back()->with('success','Cover Letter Successfully Updated') :
        redirect()->back()->with('error','Sorry There was problem while updating cover leter');
    }
    public function resume(Request $request)
    {
        $rules = $this->profile->getRules('resume');
        $request->validate($rules);
        if($request->has('resume'))
        $resume =  $request->file('resume')->store('storage/images');
        $resume = $this->profile->resume($resume,Auth::user()->id);
        return  $resume ?
        redirect()->back()->with('success','Resume Letter Successfully Updated') :
        redirect()->back()->with('error','Sorry There was problem while updating resume letter');
    }
    public function profile(Request $request)
    {
        $rules = $this->profile->getRules('avatar');
        $request->validate($rules);
        if($request->hasFile('avatar'))
        $file =  $request->file('avatar');
        $dir = 'uploads/avatar/';
        $extension = $file->getClientOriginalExtension();
        $filename = date('Ymdhis').rand(0,999).".".$extension;
        $file->move($dir,$filename);
        $avatar = $this->profile->profile($filename,Auth::user()->id);
        return  $avatar ?
        redirect()->back()->with('success','Profile Successfully Updated') :
        redirect()->back()->with('error','Sorry   There was problem while updating profile');
    }
}
