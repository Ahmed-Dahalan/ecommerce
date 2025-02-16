@extends('frontend.parant')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidbar')
            <div class="col-md-6">
               <div class="card">
                <h3 class="text-center"><span class="text-danger">Hi....</span><strong>
                   {{auth()->user()->name}}Welcome To Shope 
                </strong></h3>
               </div>
            </div>

        </div>
    </div>

</div>
    
@endsection