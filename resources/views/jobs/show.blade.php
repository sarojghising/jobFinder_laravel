@extends('layouts.app')
@section('content')
<div class="container">
     <div class="row">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">
                        {{ $job->title }}
                 </div>
                 <div class="card-body">
                     <p>
                         <h1>Descriptoin</h1>
                         {{ $job->description }}</p>
                         <h1>Duties</h1>
                    <p>{{ $job->roles }}</p>
                 </div>
             </div>
         </div>
         <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Short Info
                    </div>
                    <div class="card-body">
                            <p>
                                Company:
                                 <a href="{{ route('company.show',[$job->company->id,$job->company->slug]) }}">{{ $job->company->cname }} </a>
                             </p>
                            <p>Address: {{ $job->address }}</p>
                            <p>Employment Type: {{ $job->type }} </p>
                            <p>Position: {{ $job->position }} </p>
                            <p>Date: {{  $job->created_at->diffForHumans() }}</p>
                             @if (Auth::check() && Auth::user()->user_type == 'seeker')
                             <a href="" class="btn btn-outline-success btn-block">Apply</a>
                             @endif
                    </div>
                </div>
         </div>
     </div>
</div>
@endsection

