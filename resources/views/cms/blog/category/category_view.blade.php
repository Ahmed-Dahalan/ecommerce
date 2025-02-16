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
                        <h3 class="box-title">Blog Category List <span class="badge badge-pill badge-danger"> {{
                                count($blogcategory) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Blog Category En</th>
                                        <th>Blog Category Hin </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogcategory as $item)
                                    <tr>

                                        <td>{{ $item->blog_category_name_en }}</td>
                                        <td>{{ $item->blog_category_name_ar }}</td>
                                        <td>
                                            <a href="{{ route('blog_categories.edit',$item->id) }}" class="btn btn-info"
                                                title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                            <a href="#" onclick="confirmDelete('{{$item->id}}',this)" class="btn btn-danger"
                                                title="Delete Data">
                                                <i class="fa fa-trash"></i></a>
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


            </div>
            <!-- /.col -->


            <!--   ------------ Add Blog Category Page -------- -->


            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Blog Category </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


                            <form method="post" action="{{ route('blog_categories.store') }}">
                                @csrf


                                <div class="form-group">
                                    <h5>Blog Category English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_en" class="form-control">
                                        @error('blog_category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>Blog Category Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_ar" class="form-control">
                                        @error('blog_category_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                                </div>
                            </form>





                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>




        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

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
            axios.delete('/cms/blog_categories/'+id, {
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