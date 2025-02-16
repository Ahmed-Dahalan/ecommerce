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
                        <h3 class="box-title">Product List <span class="badge badge-pill badge-danger"> {{ count($products) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image </th>
                                        <th>Product En</th>
                                        <th>Product Price </th>
                                        <th>Quantity </th>
                                        <th>Discount </th>
                                        <th>Status </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $item)
                                    <tr>
                                        <td> <img src="{{ asset($item->product_thambnail) }}"
                                                style="width: 60px; height: 50px;"> </td>
                                        <td>{{ $item->product_name_en }}</td>
                                        <td>{{ $item->selling_price }} $</td>
                                        <td>{{ $item->product_qty }} Pic</td>
                                        
                                        <td>
                                            @if($item->discount_price == NULL)
                                            <span class="badge badge-pill badge-danger">No Discount</span>
                                        
                                            @else
                                            @php
                                            $amount = $item->selling_price - $item->discount_price;
                                            $discount = ($amount/$item->selling_price) * 100;
                                            @endphp
                                            <span class="badge badge-pill badge-danger">{{ round($discount) }} %</span>
                                        
                                            @endif
                                        
                                        
                                        
                                        </td>
                                        
                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge badge-pill badge-success"> Active </span>
                                            @else
                                            <span class="badge badge-pill badge-danger"> InActive </span>
                                            @endif
                                        
                                        </td>
                                        
                                        
                                        <td width="30%">
                                            <a href="{{ route('products.edit',$item->id) }}" class="btn btn-primary" title="Product Details Data"><i
                                                    class="fa fa-eye"></i> </a>
                                        
                                            <a href="{{ route('products.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i>
                                            </a>
                                        
                                            <a  class="btn btn-danger" title="Delete Data" onclick="confirmDelete('{{$item->id}}',this)">
                                                <i class="fa fa-trash"></i></a>
                                        
                                            @if($item->status == 1)
                                            <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger" title="Inactive Now"><i
                                                    class="fa fa-arrow-down"></i> </a>
                                            @else
                                            <a href="{{ route('product.active',$item->id) }}" class="btn btn-success" title="Active Now"><i
                                                    class="fa fa-arrow-up"></i> </a>
                                            @endif
                                        
                                        
                                        
                                        
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
            axios.delete('/cms/products/'+id, {
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