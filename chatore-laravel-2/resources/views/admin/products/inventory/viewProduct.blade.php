@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
	<div class ="page-content">
    @if(session('success'))
    <div class="col-xl-9 mx-auto alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
									<div class="d-flex align-items-center">
										<div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-success">{{session('success')}}</h6>
										</div>
									</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
            @endif

    <!--Add product-->
    <div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Add product</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
									<form class="row g-3 needs-validation" action="{{route('add.inventory')}}" method="POST" enctype="multipart/form-data">
        @csrf
         <input type="text" class="form-control" name ="product_name"  value="{{$name->product_name}} " >
										<div class="col-md-4">
											<label for="validationCustom01" class="form-label">Size product</label>
											<input type="text" class="form-control" name='size' value="" >
										</div>
										<div class="col-md-4">
											<label for="validationCustom02" class="form-label">Add pieces product</label>
											<input type="number" class="form-control" value="" name='pieces' required>
										</div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger " style="margin-top: 35px;">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
										<div class="col-12">
											<button class="btn btn-primary" type="submit">Add inventory</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						
						
					</div>
				</div>

    <!--Table-->
	<div class="col-xl-9  mx-auto">
                <h6 class=" mb-0 text-uppercase">Inventory product</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<table class="table mb-0 table-hover">
									<thead>
										<tr>
										<!-- <th scope="col">Id</th> -->
											<th scope="col">Product</th>
											<th scope="col">Size</th>
											<th scope="col">Pieces</th>
										</tr>
									</thead>
									<tbody>
										@foreach ( $products as $product )
											<tr>
												<!-- <th scope="row">{{$product->id}}</th> -->
												<td>{{$product->product_name}}</td>
                                                @if (isset($product->size ))
                                                    <td>{{ $product->size }}</td>	
                                                    @else
                                                    <td></td>
                                                @endif
												<td>{{$product->pieces}}</td>
											
											</tr>
										@endforeach
										
										
									</tbody>
								</table>
							</div>
						</div></div>
    </div>
</div>
@endsection

