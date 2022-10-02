@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
	<div class ="page-content">

	<div class="col-xl-7 mx-auto">
		<h6 class="mb-0 text-uppercase"> Sales</h6><hr/>
		{{-- the colorful line --}}
						
							
		
			{{--main stone type title --}}
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body p-5">
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
						<h5 class="mb-0 text-primary">main stone type</h5>
					</div><hr>

			
					<table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th scope="col">main_stone_type</th>
								<th scope="col">Current sale %</th>
								<th scope="col">New %</th>
								<th scope="col">Edit</th>
							</tr>
						</thead>

							@foreach($main_stone_type as $category)
					<form class="row g-3" action="{{route('edit.pricing.group')}}" method="POST" enctype="multipart/form-data">
      				  @csrf
			
									<tbody>
										<tr>
										<input type="text" class="form-control" name ="table"  value="main_stone_type" hidden >
											<th scope="row"><input type="text" class="form-control" name ="info"  value="{{$category->main_stone_type}} " readonly ></th>
											@php ($i = 0)
											<td>@foreach ($sales as $sale)
												@if($sale->criterion === $category->main_stone_type)
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
					
								
			{{--main_stone_color title --}}
			<div style = "margin-top:30px;">
				<div>
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
				<h5 class="mb-0 text-primary">main stone color</h5>
			</div><hr>
			<table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th scope="col">main_stone_color</th>
								<th scope="col">Current sale %</th>
								<th scope="col">New %</th>
								<th scope="col">Edit</th>
							</tr>
						</thead>

							@foreach($main_stone_color as $category)
					<form class="row g-3" action="{{route('edit.pricing.group')}}" method="POST" enctype="multipart/form-data">
      				  @csrf
			
									<tbody>
										<tr>
										<input type="text" class="form-control" name ="table"  value="main_stone_color" hidden >
											@if($category->main_stone_color!= NULL)
											<th scope="row"><input type="text" class="form-control" name ="info"  value="{{$category->main_stone_color}} " readonly ></th>
											
												@php ($i = 0)
												<td>@foreach ($sales as $sale)
													@if($sale->criterion === $category->main_stone_color)
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
					
				

			{{--main stone shape title --}}
			<div style = "margin-top:30px;">
				<div>
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
						<h5 class="mb-0 text-primary">Realising date</h5>
					</div><hr>
										
					<table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th scope="col">main_stone_shape</th>
								<th scope="col">Current sale %</th>
								<th scope="col">New %</th>
								<th scope="col">Edit</th>
							</tr>
						</thead>

							@foreach($main_stone_shape as $category)
					<form class="row g-3" action="{{route('edit.pricing.group')}}" method="POST" enctype="multipart/form-data">
      				  @csrf
			
									<tbody>
										<tr>
										@if($category->main_stone_shape!= NULL)
											<input type="text" class="form-control" name ="table"  value="main_stone_shape" hidden >
											<th scope="row"><input type="text" class="form-control" name ="info"  value="{{$category->main_stone_shape}} " readonly ></th>
											@php ($i = 0)
											<td>@foreach ($sales as $sale)
												@if($sale->criterion == $category->main_stone_shape)
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
		
	{{--main_stone_gr title --}}
	<div style = "margin-top:30px;">
				<div>
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
						<h5 class="mb-0 text-primary">main_stone_gr</h5>
					</div><hr>
										
					<table class="table table-borderless mb-0">
						<thead>
							<tr>

								<th scope="col">Min stone gr</th>
								<th scope="col">Max stone gr</th>
								<th scope="col">Current Sale</th>
								<th scope="col">New stone gr</th>
								<th scope="col">New stone gr</th>
								<th scope="col">New sale</th>
								<th scope="col">Edit</th>
							</tr>
						</thead>

							@foreach($sales as $sale)
					<form class="row g-3" action="{{route('edit.pricing.group.metal.gr')}}" method="POST" enctype="multipart/form-data">
      				  @csrf
			
									<tbody>
										<tr>
											<input type="text" class="form-control" name ="table"  value="main_stone_gr" hidden >
											<input type="text" class="form-control" name ="table_name"  value="main_stones" hidden >
										@if(($sale->max_gr!= 0.00)&&($sale->criterion == "main_stone_gr"))
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
		</div>


			
	
		


@endsection

