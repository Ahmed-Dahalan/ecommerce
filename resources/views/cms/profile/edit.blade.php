@extends('cms.parant')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Edit Profile {{$guard}}</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form action="{{route('cms.profile_store',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Email Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required="" value="{{Auth::user()->email}}">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <h5>User Name Feild<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required="" value="{{Auth::user()->name}}">
                                                <div class="help-block"></div>
                                            </div>
                                    </div>

                                </div>
                                <div class="col-6">
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
                                        src="{{!empty(Auth::user()->image)?asset('upload/admin_image/'.Auth::user()->image):asset('upload/no_image.jpg')}}"
                                        alt="User Avatar">
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="update">
                                </div>
                    </form>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>

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