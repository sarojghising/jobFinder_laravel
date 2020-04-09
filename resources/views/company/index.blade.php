@extends('layouts.app')
@section('content')
<div class="container">
     <div class="col-md-12">
            <div class="company-profile">
                    <img src="{{ asset('cover/banner.png') }}" alt="images" style="width:100%;">
                    <div class="company-desc">
                            <img src="{{ asset('avatar/man.jpg') }}" alt="images" width="100">
                            <p>{{ $company->description }}</p>
                        <h1>{{ $company->cname }}</h1>
                        <p>Slogan-{{ $company->slogan }}&nbsp;Address-{{ $company->address }}&nbsp; Phone-{{ $company->phone }}&nbsp; Website- {{ $company->website }}</p>
                    </div>
            </div>
     </div>


                <table class="table">
                    <thead>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>

                             @foreach ($company->job as $value)
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
                    </tbody>
                </table>

</div>
@endsection

