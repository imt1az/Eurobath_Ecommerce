@extends('frontend.main_master')

@section('content')

   <div class="body-content">
       <div class="container">
           <div class="row">

               @include('frontend.common.user_sidebar');

               <div class="col-md-2">

               </div>

               <div class="col-md-6">
                   <h3 class="text-center">
                       <span class="text-danger">HI....</span><strong>{{Auth::user()->name}}</strong>
                       Welcome to Euro Bath
                   </h3>
               </div>
           </div>
       </div>

   </div>

    @endsection
