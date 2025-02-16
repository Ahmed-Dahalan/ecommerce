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
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


                            <div class="col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <form action="{{route('categories.update',$category->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <h5>category Name Engish <span class="text-danger"></span>
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="category_name_en"
                                                                        class="form-control"
                                                                        value="{{$category->category_name_en}}">
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>
                                                            <span class="text-danger">@error('category_name_en')
                                                                {{$message}}
                                                                @enderror</span>

                                                        </div>
                                                        <div class="col-12">

                                                            <div class="form-group">
                                                                <h5>category Name Arabic<span class="text-danger"></span>
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="category_name_ar"
                                                                        class="form-control"
                                                                        value="{{$category->category_name_ar}}">
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>
                                                            <span class="text-danger">@error('category_name_ar')
                                                                {{$message}}
                                                                @enderror</span>

                                                        </div>
                                                        <div class="col-12">

                                                            <div class="form-group">
                                                                <h5>Category icon<span class="text-danger"></span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="category_icon" value="{{$category->category_icon}}"
                                                                        class="form-control">
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>
                                                            <span class="text-danger">@error('category_icon')
                                                                {{$message}}
                                                                @enderror</span>

                                                        </div>


                                                        <div class="text-xs-right">
                                                            <input type="submit"
                                                                class="btn btn-rounded btn-primary mb-5"
                                                                value="Edit Category">
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