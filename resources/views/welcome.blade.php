@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
       <table class="table">
           <thead>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
           </thead>
           <tbody>
               <tr>
                   <td>
                       <img src="{{ asset('avatar/man.jpg') }}" alt="image" width="80">
                   </td>
                   <td>
                       position: web developer
                   </td>
                   <td>
                       Address : melbourne
                   </td>
                   <td>
                       Date:2019-03-21
                   </td>
                   <td>
                       <button class="btn btn-success">Apply</button>
                   </td>
               </tr>
           </tbody>
       </table>
   </div>
</div>
@endsection
