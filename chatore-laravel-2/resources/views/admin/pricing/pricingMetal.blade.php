@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
	<div class ="page-content">

	<div class="col-xl-7 mx-auto">
		<h6 class="mb-0 text-uppercase"> Sales</h6><hr/>
		{{-- the colorful line --}}
						
							
		
			{{--Metal title --}}
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body p-5">
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
						<h5 class="mb-0 text-primary">Metal</h5>
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

							@foreach($metal_type as $category)
					<form class="row g-3" action="{{route('edit.pricing.group.metal')}}" method="POST" enctype="multipart/form-data">
      				  @csrf
			
									<tbody>
										<tr>
										<input type="text" class="form-control" name ="table"  value="metal_type" hidden >
											<th scope="row"><input type="text" class="form-control" name ="info"  value="{{$category->metal_type}} " readonly ></th>
											@php ($i = 0)
											<td>@foreach ($sales as $sale)
												@if($sale->criterion === $category->metal_type)
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
					
								
			{{--Metal_plating  title --}}
			<div style = "margin-top:30px;">
				<div>
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
				<h5 class="mb-0 text-primary">Plating</h5>
			</div><hr>
			<table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th scope="col">Metal plating</th>
								<th scope="col">Current sale %</th>
								<th scope="col">New %</th>
								<th scope="col">Edit</th>
							</tr>
						</thead>

							@foreach($metal_plating as $category)
					<form class="row g-3" action="{{route('edit.pricing.group.metal')}}" method="POST" enctype="multipart/form-data">
      				  @csrf
			
									<tbody>
										<tr>
										<input type="text" class="form-control" name ="table"  value="metal_plating" hidden >
											@if($category->metal_plating!= NULL)
											<th scope="row"><input type="text" class="form-control" name ="info"  value="{{$category->metal_plating}} " readonly ></th>
											
												@php ($i = 0)
												<td>@foreach ($sales as $sale)
													@if($sale->criterion === $category->metal_plating)
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
					
				

			{{--metal_gr title --}}
			<div style = "margin-top:30px;">
				<div>
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
						<h5 class="mb-0 text-primary">metal gr</h5>
					</div><hr>
										
					<table class="table table-borderless mb-0">
						<thead>
							<tr>

								<th scope="col">Min metal gr</th>
								<th scope="col">Max metal gr</th>
								<th scope="col">Current Sale</th>
								<th scope="col">New min gr</th>
								<th scope="col">New max gr</th>
								<th scope="col">New sale</th>
								<th scope="col">Edit</th>
							</tr>
						</thead>

							@foreach($sales as $sale)
					<form class="row g-3" action="{{route('edit.pricing.group.metal.gr')}}" method="POST" enctype="multipart/form-data">
      				  @csrf
			
									<tbody>
										<tr>
											<input type="text" class="form-control" name ="table"  value="metal_gr" hidden >
											<input type="text" class="form-control" name ="table_name"  value="metals" hidden >
											
										@if(($sale->max_gr!= 0.00)&&($sale->criterion == "metal_gr"))
											<th scope="row"><input type="text" class="form-control" name ="old_min_gr"  value="{{$sale->min_gr}} " readonly ></th>
											<th scope="row"><input type="text" class="form-control" name ="old_max_gr"  value="{{$sale->max_gr}} " readonly ></th>
											<th scope="row"><input type="text" class="form-control" name ="old_current_sale"  value="{{$sale->current_sale}} " readonly ></th>
										

											<td><input type="text" class="form-control" name ="new_min_gr"  value=""></td>
											<td><input type="text" class="form-control" name ="new_max_gr"  value=""></td>
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


			
	
		


@endsection

