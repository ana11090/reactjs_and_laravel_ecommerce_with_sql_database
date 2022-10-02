@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
	<div class ="page-content">

	<div class="col-xl-7 mx-auto">
		<h6 class="mb-0 text-uppercase"> Sales</h6><hr/>
		{{-- the colorful line --}}
						
							
		
			{{--Category title --}}
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body p-5">
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
						<h5 class="mb-0 text-primary">Category</h5>
					</div><hr>

			
					<table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th scope="col">Cateogry</th>
								<th scope="col">Current sale %</th>
								<th scope="col">New %</th>
								<th scope="col">Edit</th>
							</tr>
						</thead>

							@foreach($categories as $category)
					<form class="row g-3" action="{{route('edit.pricing.group')}}" method="POST" enctype="multipart/form-data">
      				  @csrf
			
									<tbody>
										<tr>
										<input type="text" class="form-control" name ="table"  value="product_category" hidden >
											<th scope="row"><input type="text" class="form-control" name ="info"  value="{{$category->product_category}} " readonly ></th>
											@php ($i = 0)
											<td>@foreach ($sales as $sale)
												@if($sale->criterion === $category->product_category)
													<input type="text" class="form-control" value="{{$sale->current_sale}}" readonly>
													@php ($i = 1)
												@endif
												@endforeach
											@if($i == 0)
												<input type="text" class="form-control" value="0.00" readonly>
											@endif</td>
											
											<td><input type="text" class="form-control" name ="sale"  value=""></td>
											<td><button type="submit" class="btn btn-primary px-5">Edit</button></td>
										</tr>
										
									
						</form>
				@endforeach
				</tbody>
								</table>
					
								
			{{--Collection - title --}}
			<div style = "margin-top:30px;">
				<div>
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
				<h5 class="mb-0 text-primary">Collections</h5>
			</div><hr>
			<table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th scope="col">Collection</th>
								<th scope="col">Current sale %</th>
								<th scope="col">New %</th>
								<th scope="col">Edit</th>
							</tr>
						</thead>

							@foreach($product_collection as $category)
					<form class="row g-3" action="{{route('edit.pricing.group')}}" method="POST" enctype="multipart/form-data">
      				  @csrf
			
									<tbody>
										<tr>
										<input type="text" class="form-control" name ="table"  value="product_collection" hidden >
											@if($category->product_collection!= NULL)
											<th scope="row"><input type="text" class="form-control" name ="info"  value="{{$category->product_collection}} " readonly ></th>
											
												@php ($i = 0)
												<td>@foreach ($sales as $sale)
													@if($sale->criterion === $category->product_collection)
														<input type="text" class="form-control" value="{{$sale->current_sale}}" readonly>
														@php ($i = 1)
													@endif
													@endforeach
												@if($i == 0)
													<input type="text" class="form-control" value="0.00" readonly>
												@endif</td>
												
												<td><input type="text" class="form-control" name ="sale"  value=""></td>
												<td><button type="submit" class="btn btn-primary px-5">Edit</button></td>
											@endif
										</tr>
										
									
						</form>
				@endforeach
				</tbody>
								</table>
					
				

			{{--Inventory - title --}}
			<div style = "margin-top:30px;">
				<div>
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
						<h5 class="mb-0 text-primary">Inventory</h5>
					</div><hr>
										
					<table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th scope="col">Cateogry</th>
								<th scope="col">Current sale %</th>
								<th scope="col">New %</th>
								<th scope="col">Edit</th>
							</tr>
						</thead>

							@foreach($product_inventory as $category)
					<form class="row g-3" action="{{route('edit.pricing.group')}}" method="POST" enctype="multipart/form-data">
      				  @csrf
			
									<tbody>
										<tr>
										@if($category->product_inventory!= NULL)
											<input type="text" class="form-control" name ="table"  value="product_inventory" hidden >
											<th scope="row"><input type="text" class="form-control" name ="info"  value="{{$category->product_inventory}} " readonly ></th>
											@php ($i = 0)
											<td>@foreach ($sales as $sale)
												@if($sale->criterion == $category->product_inventory)
													<input type="text" class="form-control" value="{{$sale->current_sale}}" readonly>
													@php ($i = 1)
												@endif
												@endforeach
											@if($i == 0)
												<input type="text" class="form-control" value="0.00" readonly>
											@endif</td>
											
											<td><input type="text" class="form-control" name ="sale"  value=""></td>
											<td><button type="submit" class="btn btn-primary px-5">Edit</button></td>
										@endif
										</tr>
										
									
						</form>
				@endforeach
				</tbody>
								</table>
					


		
			</div>
		</div>
		</div>

		</div>	
	
		</div>
		</div>
		</div>		</div>		</div>
@endsection

