@extends('layouts.app')
@section('styles')
    <style>
        .fas{
            color: #4183D7;
        }
    </style>
@endsection
@section('content')
<div class="container">
   <div class="row">
       <h1>Recent Jobs</h1>
       <table class="table">
           <thead>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
           </thead>
           <tbody>
               @if (isset($jobs))
                    @foreach ($jobs as $value)
               <tr>
                   <td>
                       <img src="{{ asset('avatar/man.jpg') }}" alt="image" width="80">
                   </td>
                   <td>
                       position: {{ $value->position }} <br>
                       <i class="fas fa-clock"></i>
                       <span>{{ $value->job_type }}</span>
                   </td>
                   <td>
                        <i class="fas fa-map-marker-alt"></i>Address : {{ $value->address }}
                   </td>
                   <td>
                        <i class="fas fa-clock"></i>Date:{{ $value->created_at->diffForHumans() }}
                   </td>
                   <td>
                    <a href="{{ route('job.show',[$value->id,$value->slug]) }}">
                            <button class="btn btn-success">Apply</button>
                    </a>
                   </td>
               </tr>
               @endforeach
               @endif
           </tbody>
       </table>
       <div class="text-center">
            {{ $jobs->links() }}
       </div>

   </div>
</div>
@endsection

