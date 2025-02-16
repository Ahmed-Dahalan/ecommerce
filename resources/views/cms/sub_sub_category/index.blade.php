@extends('cms.parant')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub Sub Category List <span class="badge badge-pill badge-danger"> {{ count($subsubcategories) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Categoty</th>
                                        <th>Sub Categoty</th>
                                        <th>Sub Sub Category(En)</th>
                                        <th>Sub Sub Category(Ar)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subsubcategories as $subsubcategory)
                                    <tr>
                                        <td>{{$subsubcategory->category->category_name_en}}</td>
                                        <td>{{$subsubcategory->subCategory->subcategory_name_en}}</td>
                                        <td>{{$subsubcategory->subsubcategory_name_en}}</td>
                                        <td>{{$subsubcategory->subsubcategory_name_ar}}</td>
                                        <td style="width: 150px">

                                            <a href="{{route('subSubCategories.edit',$subsubcategory->id)}}"
                                                class="btn btn-info mr-2"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger"
                                                onclick="confirmDelete('{{$subsubcategory->id}}',this)"><i
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
                        <h3 class="box-title">Add sub Sub Ctegory </h3>
                        <form action="{{route('subSubCategories.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5> Category <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <select class="form-control categories" style="width: 100%;"
                                                        id="category_id" name="category_id">
                                                        @foreach ($categories as $category){
                                                        <option value="{{$category->id}}">
                                                            {{$category->category_name_en}}</option>
                                                        }

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <span class="text-danger">@error('category_id')
                                                {{$message}}
                                                @enderror</span>

                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5> sub Category <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <select class="form-control categories" style="width: 100%;" id="subcategory_id" name="subcategory_id">
                                                        <option value="" disabled selected>Select Sub Category</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <span class="text-danger">@error('subcategory_id')
                                                {{$message}}
                                                @enderror</span>
                                        
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>sub Sub Category Name Engish <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="subsubcategory_name_en" class="form-control">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <span class="text-danger">@error('subsubcategory_name_en')
                                                {{$message}}
                                                @enderror</span>

                                        </div>
                                        <div class="col-12">

                                            <div class="form-group">
                                                <h5>sub Sub Category Name Arabic<span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="subsubcategory_name_ar" class="form-control">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <span class="text-danger">@error('subsubcategory_name_ar')
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
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/cms/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
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
            axios.delete('/cms/subSubCategories/'+id, {
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