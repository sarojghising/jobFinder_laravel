@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         <div class="col-md-4">
             <form action={{ route('user.photo') }} method="post" enctype="multipart/form-data">
                @csrf
            @if (isset($profile))
                 <img src="{{ asset('uploads/avatar/'.$profile->avatar) }}" alt="profile" class="img-fluid img-thumbnail">
            @endif
             <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror">
              @error('avatar')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
              <button type="submit" class="btn btn-success btn-sm mt-2 ml-4">Update</button>
            </form>
         </div>
         <div class="col-md-4">
             <form action="{{ route('user.create') }}" method="POST">
                @csrf
             <div  class="card">
                 @include('notification.notification')
                 <div class="card-header">
                     Update Your Profile
                 </div>
                 <div class="card-body">
                     <div class="form-group">
                         <label for="address">Address</label>
                         <input type="text" name="address" id="address"  class="form-control @error('address') is-invalid @enderror">
                         @error('address')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                        </div>
                     <div class="form-group">
                            <label for="experience">Experience</label>
                            <textarea name="experience" id="experience" class="form-control @error('experience') is-invalid @enderror"  cols="30" rows="5"></textarea>
                            @error('experience')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror"  cols="30" rows="5"></textarea>
                        @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                     <div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                     </div>
                 </div>
             </div>
            </form>
         </div>
         <div class="col-md-4">
             <div class="card">
                 <div class="card-header">
                     Your information
                 </div>
                 <div class="card-body">
                     @isset($user)
                         @foreach ($user as $value)
                             <p>Name: {{ $value->user->name }}</p>
                             <p>Email: {{ $value->user->email }}</p>
                             <p>Address: {{ $value->address }}</p>
                             <p>Gender: {{ ucfirst($value->gender) }}</p>
                             <p>Experience: {{ $value->experience }}</p>
                             <p>Bio: {{ $value->bio }}</p>
                             @php
                                 $data = date('F d Y',strtotime($value->user->created_at))
                             @endphp
                             <p
                             >Mememer On: @php
                                 echo $data
                             @endphp
                             </p>
                             @if (!empty($value->cover_letter))
                                <p><a href="{{ Storage::url($value->cover_letter) }}">Cover Letter</a></p>
                                @else
                                 <p>Please upload cover letter</p>
                             @endif
                             @if (!empty($value->resume))
                             <p><a href="{{ Storage::url($value->resume) }}">Resume</a></p>
                             @else
                              <p>Please upload Resume</p>
                          @endif
                         @endforeach
                     @endisset

                 </div>
             </div>
             <div class="card">
                 <form action="{{ route('user.cover') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                            Update coverletter
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control @error('cover_letter') is-invalid @enderror" name="cover_letter">
                            @error('cover_letter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="submit" class="btn btn-success mt-2 ml-3 float-right">Update</button>
                        </div>
                </form>

                    <form action="{{ route('user.resume') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            Update resume
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control @error('resume') is-invalid @enderror" name="resume">
                            @error('resume')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="submit" class="btn btn-success mt-2 ml-3 float-right">Update</button>
                        </div>
                    </form>
                </div>
         </div>
    </div>
</div>
@endsection
