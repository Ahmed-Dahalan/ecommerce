@extends('frontend.parant')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
           @include('frontend.common.user_sidbar')
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi....</span><strong>
                            {{auth()->user()->name}} Update profile
                        </strong></h3>
                </div>
                <div>
                    <form action="{{route('profile.change_password')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                    
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Old Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="old_password" class="form-control" required="">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                    
                                    </div>
                                    <div class="col-12">
                    
                                        <div class="form-group">
                                            <h5>New Password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="new_password" class="form-control" required="">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                    
                                    </div>
                                    <div class="col-12">
                    
                                        <div class="form-group">
                                            <h5>confirm Password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="new_password_confirmation" class="form-control" required="">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                    
                                    </div>
                    
                    
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="update">
                                    </div>
                                </div>
                            </div>
                    </form><br><br>

                </div>
                   
            </div>
        </div>


    </div>
</div>

</div>

@endsection





