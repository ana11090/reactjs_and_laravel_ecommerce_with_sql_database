@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
	<div class ="page-content">
	@if(session('success'))
          <div class="alert alert-primary d-flex align-items-center" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
    {{session('success')}}
  </div>
</div>
            @endif

	<div class = "row row-cols-1 row-cols-md-2 row-cols-xl-4">
		{{-- incomplete products --}}
		<div class="col">
			<div class="card radius-10 overflow-hidden" >
				<div class="card-body ">
					<p>Incomplete products</p>
						<h3>{{count($incompleteProducts)}}</h3>
							<p class="mb-0">{{count($incompleteProducts)/count($allproductsProducts)*100}}%
								 <span class="float-end">out of {{count($allproductsProducts)}} products</span></p>
				</div>
				<div class="progress-wrapper">
					<div class="progress" style="height: 7px;">
						<div class="progress-bar" role="progressbar" style="width: {{(count($incompleteProducts)/count($allproductsProducts)*100)}}%;" ></div>
					</div>
				</div>
			</div>
			</div>
				

		{{-- realese soon products --}}
		<div class="col">
			<div class="card radius-10 overflow-hidden" >
				<div class="card-body">
					<p>Realese soon</p>
						<h3>{{count($realease)}}</h3>
							<p class="mb-0">
								@if(!$realease->isEmpty())
									{{count($realeaseProducts)/count($allproductsProducts)*100}}%
								@else
								
									@endif
								 <span class="float-end">out of {{count($allproductsProducts)}} products</span></p>
				</div>
				<div class="progress-wrapper">
					<div class="progress" style="height: 7px;">
						<div class="progress-bar" role="progressbar" style="width: {{(count($realeaseProducts)/count($allproductsProducts)*100)}}%; background-color: red;"></div>
					</div>
				</div>
			</div>
			</div>

		{{-- active product --}}
		<div class="col">
			<div class="card radius-10 overflow-hidden" >
				<div class="card-body">
					<p>Active products</p>
						<h3>{{count($activeProducts)}}</h3>
							<p class="mb-0">{{count($activeProducts)/count($allproductsProducts)*100}}% <span class="float-end">out of {{count($allproductsProducts)}} products</span></p>
				</div>
				<div class="progress-wrapper">
					<div class="progress" style="height: 7px;">
						<div class="progress-bar" role="progressbar" style="width: {{(count($activeProducts)/count($allproductsProducts)*100)}}%; background-color: red;"></div>
					</div>
				</div>
			</div>
			</div>

		{{-- inactive --}}
		<div class="col">
			<div class="card radius-10 overflow-hidden" >
				<div class="card-body">
					<p>Inactive products</p>
						<h3>{{count($inactiveProducts)}}</h3>
							<p class="mb-0">{{count($inactiveProducts)/count($allproductsProducts)*100}}% <span class="float-end">out of {{count($allproductsProducts)}} products</span></p>
				</div>
				<div class="progress-wrapper">
					<div class="progress" style="height: 7px;">
						<div class="progress-bar" role="progressbar" style="width: {{(count($inactiveProducts)/count($allproductsProducts)*100)}}%; background-color: red;"></div>
					</div>
				</div>
			</div>
			</div>
	</div>

	{{-- incomplete products table + calendar --}}
	<div class="card radius-10">
					<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-1">Incomplete products</h5>
										<div>

										<p class="mb-0 font-13 text-secondary">Before the products can ba
									publish you still need to add some more details! We will need more info about the product and the realese date!</p></i> </div>
									</div>
									<div class="font-22 ms-auto"></i>
									</div>
								</div>
								<div class="table-responsive mt-4">
									<table class="table align-middle mb-0 table-hover" id="Transaction-History">
										<thead class="table-light">
											<tr>
												<th>Id</th>
												<th>Product name</th>
												<th>Image</th>
												<th>Category</th>
												<th>Original price</th>
												<th>Price with sale</th>
												<th>State</th>
												<th>Delete</th>
												<th>Add info</th>
											</tr>
										</thead>

										<tbody>
												@foreach($incomplete as $incompleteProduct)
													<tr> 
													<th scope="row">{{$incompleteProduct->id}}</th>
													<td style='width: 10%;'>{{ $incompleteProduct->product_name }}</td>
													<td> <img src="{{asset($incompleteProduct->product_image_1)}}" style="height:40px; width:70px;" ></td>  
													<td>{{ $incompleteProduct->product_category }}</td>	
													<td>{{ $incompleteProduct->product_price}}</td>
													<td>{{ $incompleteProduct->product_price}}</td>
													<td>{{ $incompleteProduct->product_price -   $incompleteProduct->product_sale/100* $incompleteProduct->product_price}}</td>
													<td><a href="{{ url('product/delete/'.$incompleteProduct->id) }}" class="btn btn-info">Delete</a></td>
													<td><a href="{{ url('product/addinfo/'.$incompleteProduct->id) }}" class="btn btn-info">Add info</a></td>

													
													</tr>
													
												@endforeach

												</tbody>
									</table>
									
								</div>
							</div>
								<div class="d-flex justify-content-center">
  						  {{ $incomplete->links() }}
									</div>
						</div>
					
					
		{{--soon to be realese--}}
		<div class="card radius-10">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h5 class="mb-0">Soon to be realese products</h5>
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<hr/>
						<div class="table-responsive">
							<table class="table align-middle mb-0">
								<thead class="table-light">
									<tr>
										<th>Id</th>
										<th>Product</th>
										<th>Image</th>
										<th>Category</th>
										<th>Colection</th>
										<th>Original price</th>
										<th>Price</th>
										<th>Stock</th>
										<th>State</th>
										<th>Data realese</th>
										<th>Activate now</th>
				

									</tr>
								</thead>
								<tbody>
												@foreach($realease as $incompleteProduct)
													<tr> 
													<th scope="row">{{$incompleteProduct->id}}</th>
													<td style='width: 10%;'>{{ $incompleteProduct->product_name }}</td>
													<td> <img src="{{asset($incompleteProduct->product_image_1)}}" style="height:40px; width:70px;" ></td>  
													<td>{{ $incompleteProduct->product_category }}</td>								
													<td>{{ $incompleteProduct-> product_collection }}</td>
													<td>{{ $incompleteProduct->product_price}}</td>
													<td>{{ $incompleteProduct->product_price -   $incompleteProduct->product_sale/100* $incompleteProduct->product_price}}</td>
													<td>{{ $incompleteProduct->product_state}}</td>
													<td>{{ $incompleteProduct->product_inventory}}</td>
													<td>{{ $incompleteProduct->product_price}}</td>
													<td><a href="{{ url('/product/active/'.$incompleteProduct->id) }}" class="btn btn-info">Active</a></td>
													

													
													</tr>
													
												@endforeach

												</tbody>
							</table>
						</div>
					</div>{{ $realease->links() }}
		</div>
		
	{{-- active products table --}}

	<div class="card radius-10">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h5 class="mb-0">Active products</h5>
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<hr/>
						<div class="table-responsive">
							<table class="table align-middle mb-0">
								<thead class="table-light">
									<tr>
										<th>Id</th>
										<th>Product</th>
										<th>Image</th>
										<th>Category</th>
										<th>Colection</th>
										<th>Original price</th>
										<th>Price</th>
										<th>Stock</th>
										<th>State</th>
										<th>Data realese</th>
										<th>Inactive now</th>
										

									</tr>
								</thead>
								<tbody>
												@foreach($active as $incompleteProduct)
													<tr> 
													<th scope="row">{{$incompleteProduct->id}}</th>
													<td style='width: 10%;'>{{ $incompleteProduct->product_name }}</td>
													<td> <img src="{{asset($incompleteProduct->product_image_1)}}" style="height:40px; width:70px;" ></td>  
													<td>{{ $incompleteProduct->product_category }}</td>								
													<td>{{ $incompleteProduct-> product_collection }}</td>
													<td>{{ $incompleteProduct->product_price}}</td>
													<td>{{ $incompleteProduct->product_price -   $incompleteProduct->product_sale/100* $incompleteProduct->product_price}}</td>
													<td>{{ $incompleteProduct->product_state}}</td>
													<td>{{ $incompleteProduct->product_inventory}}</td>
													<td>{{ $incompleteProduct->product_price}}</td>
													<td><a href="{{ url('/product/inactive/'.$incompleteProduct->id) }}" class="btn btn-info">Inactive</a></td>
													

													
													</tr>
													
												@endforeach

												</tbody>
							</table>
						</div>
					</div>{{ $active->links() }}
		</div>

	

	{{--inactive products--}}
	<div class="card radius-10">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h5 class="mb-0">Inactive products</h5>
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<hr/>
						<div class="table-responsive">
							<table class="table align-middle mb-0">
								<thead class="table-light">
									<tr>
										<th>Id</th>
										<th>Product</th>
										<th>Image</th>
										<th>Category</th>
										<th>Colection</th>
										<th>Original price</th>
										<th>Price</th>
										<th>Stock</th>
										<th>State</th>
										<th>Data realese</th>
										<th>Activate</th>
										<th>Delete</th>
										<th>Details</th>

									</tr>
								</thead>
								<tbody>
												@foreach($inactive as $incompleteProduct)
													<tr> 
													<th scope="row">{{$incompleteProduct->id}}</th>
													<td style='width: 10%;'>{{ $incompleteProduct->product_name }}</td>
													<td> <img src="{{asset($incompleteProduct->product_image_1)}}" style="height:40px; width:70px;" ></td>  
													<td>{{ $incompleteProduct->product_category }}</td>								
													<td>{{ $incompleteProduct-> product_collection }}</td>
													<td>{{ $incompleteProduct->product_price}}</td>
													<td>{{ $incompleteProduct->product_price -   $incompleteProduct->product_sale/100* $incompleteProduct->product_price}}</td>
													<td>{{ $incompleteProduct->product_state}}</td>
													<td>{{ $incompleteProduct->product_inventory}}</td>
													<td>{{ $incompleteProduct->product_price}}</td>
													<td><a href="{{ url('/product/active/'.$incompleteProduct->id) }}" class="btn btn-info">Activate</a></td>
													<td><a href="{{ url('/product/delete/'.$incompleteProduct->id) }}" class="btn btn-info">Delete</a></td>
													<td><a href="{{ url('/product/edit/'.$incompleteProduct->id) }}" class="btn btn-info">Details</a></td>

													
													</tr>
													
												@endforeach

												</tbody>
							</table>
						</div>
					</div>{{ $inactive->links() }}
		</div>
			</div>
		</div>


			
	
		


@endsection

