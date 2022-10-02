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

    <!--Add discount-->
    <div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Add discount</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
									<form class="row g-3 needs-validation" action="{{route('add.discount')}}" method="POST" enctype="multipart/form-data">
        @csrf
										<div class="col-md-4">
											<label for="validationCustom01" class="form-label">Discount code</label>
											<input type="text" class="form-control" name='discount_code' value="" required>
										</div>
										<div class="col-md-4">
											<label for="validationCustom02" class="form-label">Discount procent</label>
											<input type="text" class="form-control" value="" name='discount_procent'>
										</div>
                                        <div class="col-md-4">
											<label for="validationCustom02" class="form-label">Discount sum</label>
											<input type="text" class="form-control" value="" name='discount_sum'  >
										</div>
										
										<div class="col-md-4">
											<label for="validationCustom03" class="form-label">Apply to products on sale?</label>
											<select  class="form-control"    name="discount_apply_sale">
											<option value="">Choose an option</option>    
											<option value="No">No</option>
											<option value="Yes">Yes</option>
											</select>
										</div>

										<div class="col-md-4">
											<label class="form-label">Date activation</label>
												<input type="date" class="form-control" name ="discount_start" value=""/>
										</div>

										<div class="col-md-4">
											<label class="form-label">Date dezactivation</label>
												<input type="date" class="form-control" name ="discount_end" value=""/>
										</div>

										<div class="col-md-4">
											<label for="validationCustom03" class="form-label">How many clients can use the discount?</label>
											<select  class="form-control"    name="discount_apply_for" required>
											<option value="">Choose an option</option>    
											<option value="1-client">One client</option>
											<option value="all-clients">Everybody</option>
											</select>
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
											<button class="btn btn-primary" type="submit">Submit form</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						
						
					</div>
				</div>

    <!--Table-->
	<div class="col-xl-9  mx-auto">
                <h6 class=" mb-0 text-uppercase">Discounts</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<table class="table mb-0 table-hover">
									<thead>
										<tr>
										<th scope="col">Id</th>
											<th scope="col">Discount code</th>
											<th scope="col">Procent discount</th>
											<th scope="col">Sum discount</th>
											<th scope="col">Add to sale</th>
											<th scope="col">Date start</th>
											<th scope="col">Date end</th>
											<th scope="col">Used by</th>
											<th scope="col">Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach ( $discounts as $discount )
											<tr>
												<th scope="row">{{$discount->id}}</th>
												<td>{{$discount->discount_code}}</td>
												<td>{{$discount->discount_procent}}</td>
												<td>{{$discount->discount_sum}}</td>
												<td>{{$discount->discount_apply_sale}}</td>
												<td>{{$discount->discount_start}}</td>
												<td>{{$discount->discount_end}}</td>
												<td>{{$discount->nr_uses}}</td>
												<td><a href="{{ url('discount/delete/'.$discount->id) }}" class="btn btn-info">Delete</a></td>
											</tr>
										@endforeach
										
										
									</tbody>
								</table>
							</div>
						</div></div>
    </div>
</div>
@endsection

