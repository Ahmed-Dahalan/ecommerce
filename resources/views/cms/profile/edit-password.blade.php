@extends('cms.parant')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">{{$guard}} Change Password</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form action="{{route('cms.change_password')}}" method="post">
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

@endsection