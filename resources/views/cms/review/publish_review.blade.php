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
                        <h3 class="box-title">Publish All Reviews </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Summary </th>
                                        <th>Comment </th>
                                        <th>User </th>
                                        <th>Product </th>
                                        <th>Status </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($review as $item)
                                    <tr>
                                        <td> {{ $item->summary }} </td>
                                        <td> {{ $item->comment }} </td>
                                        <td> {{ $item->user->name }} </td>

                                        <td> {{ $item->product->product_name_en }} </td>
                                        <td>
                                            @if($item->status == 0)
                                            <span class="badge badge-pill badge-primary">Pending </span>
                                            @elseif($item->status == 1)
                                            <span class="badge badge-pill badge-success">Publish </span>
                                            @endif

                                        </td>

                                        <td width="25%">
                                            <a href="#" onclick="confirmDelete('{{$item->id}}',this)" class="btn btn-danger">Delete </a>
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
            axios.delete('/cms/delete/'+id, {
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