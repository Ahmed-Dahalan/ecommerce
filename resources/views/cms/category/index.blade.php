@extends('cms.parant')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Category List <span class="badge badge-pill badge-danger"> {{ count($categories) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>Category(En)</th>
                                        <th>Category(Ar)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td><span><i class="{{$category->category_icon}}"></i></span></td>
                                        <td>{{$category->category_name_en}}</td>
                                        <td>{{$category->category_name_ar}}</td>
                                        <td>

                                            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info mr-2"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger" onclick="confirmDelete('{{$category->id}}',this)"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>

            {{-- -------------Add Brand----------- --}}


            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Ctegory</h3>
                        <form action="{{route('categories.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Category Name Engish <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="category_name_en" class="form-control">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <span class="text-danger">@error('category_name_en')
                                                {{$message}}
                                                @enderror</span>

                                        </div>
                                        <div class="col-12">

                                            <div class="form-group">
                                                <h5>Category Name Arabic<span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="category_name_ar" class="form-control">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <span class="text-danger">@error('category_name_ar')
                                                {{$message}}
                                                @enderror</span>

                                        </div>
                                        <div class="col-12">

                                            <div class="form-group">
                                                <h5>Ctegory Icon<span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="category_icon" class="form-control">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <span class="text-danger">@error('category_icon')
                                                {{$message}}
                                                @enderror</span>

                                        </div>


                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                value="Add Category">
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
<script>
    function confirmDelete(id , element){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
            perFormDelete(id , element);
            }
            })
        }
        function perFormDelete(id , element){
            axios.delete('/cms/categories/'+id, {
            })
            .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            element.closest('tr').remove();
            })
            .catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message);
            });
        }
</script>
@endsection