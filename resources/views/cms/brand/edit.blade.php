@extends('cms.parant')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Brand List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Brand</h3>
                        <form action="{{route('brands.update',$brand->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Brand Name Engish <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="brand_name_en" class="form-control" value="{{$brand->brand_name_en}}">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <span class="text-danger">@error('brand_name_en')
                                                {{$message}}
                                                @enderror</span>

                                        </div>
                                        <div class="col-12">

                                            <div class="form-group">
                                                <h5>Brand Name Arabic<span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="brand_name_ar" class="form-control" value="{{$brand->brand_name_ar}}">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <span class="text-danger">@error('brand_name_ar')
                                                {{$message}}
                                                @enderror</span>

                                        </div>
                                        <div class="col-12">

                                            <div class="form-group">
                                                <h5>Brand Image<span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="file" name="brand_image" class="form-control">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <span class="text-danger">@error('brand_image')
                                                {{$message}}
                                                @enderror</span>

                                        </div>


                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                value="Add Brand">
                                        </div>
                        </form>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@endsection