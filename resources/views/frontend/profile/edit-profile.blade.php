@extends('frontend.parant')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidbar')
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi....</span><strong>
                            {{auth()->user()->name}} Update profile
                        </strong></h3>
                </div>
                <div>
                    <form method="post" action="{{route('profile.update',$user->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Name <span></span></label>
                            <input type="text" class="form-control unicase-form-control text-input" id="name"
                                name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email <span></span></label>
                            <input type="email" class="form-control unicase-form-control text-input" id="email"
                                name="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <h5>Profile Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="profile_image" id="image" class="form-control" required="">
                                <div class="help-block"></div>
                            </div>
                        </div>
                </div>

                <div class="col-6">

                    <img width="100" height="100" id="showImage"
                        src="{{!empty(Auth::user()->image)?asset('upload/user_image/'.Auth::user()->image):asset('upload/no_image.jpg')}}"
                        alt="User Avatar">
                </div>
                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign
                    Up</button>
                </form><br><br>
            </div>
        </div>


    </div>
</div>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection