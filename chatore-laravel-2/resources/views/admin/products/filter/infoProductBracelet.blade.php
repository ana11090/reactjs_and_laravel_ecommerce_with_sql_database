@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
	<div class ="page-content">
		
		<div class="col-xl-7 mx-auto">
		<h6 class="mb-0 text-uppercase">Basic info</h6><hr/>
		{{-- the colorful line --}}
						
							
		<form class="row g-3" action="{{route('store.info.bracelets')}}" method="POST" enctype="multipart/form-data">
        @csrf
			{{-- Extra info title --}}
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body p-5">
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
				<h5 class="mb-0 text-primary">Extra info</h5>
			</div><hr>

				{{-- id --}}
				<div class="row mb-3">
					<label class="col-sm-3 col-form-label">Id product</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name ="product_id"  value="{{$productID->id}} " readonly>
						</div>
				</div>

				{{-- Product info --}}
				<div class="row mb-3">
					<label  class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name ="product_name"  value="{{$productID->product_name}} " readonly>
						</div>
				</div>

				{{--  style --}}
				<div class="col-md-6">
										<label class="form-label">Choose the type of bracelet:</label>
											<select  class="form-control"   name="bracelet_filter_type">
											<option value="">Choose an option</option>    
											<option value="Wrist">Wrist</option>
											<option value="Upper arm">Upper arm</option>
											<option value="Ankle">Ankle</option>
											</select>
									</div>
									<div class="col-md-6">
									<label class="form-label">Choose style</label>
											<select  class="form-control"   name="bracelet_filter_style">
											<option value="">Choose an option</option>    
											<option value="Bar">Bar</option>
											<option value="Chain">Chain</option>
											<option value="Charm">Charm</option>
											<option value="Cuff">Cuff</option>
											<option value="Open Bangle">Open Bangle</option>
											<option value="Pearl">Pearl</option>
											<option value="Bangle">Bangle</option>
											<option value="Tennis">Tennis</option>
											<option value="Slider">Slider</option>
											<option value="Fashion">Fashion</option>
											<option value="Ajustable">Ajustable</option>
											</select>

									</div>

									<div class="col-md-6">
									<label class="form-label">Choose gift type</label>
											<select  class="form-control"   name="bracelet_filter_gift">
											<option value="">Choose an option</option>    
											<option value="None">None</option>
											<option value="For her">For her</option>
											<option value="For him">For him</option>
											<option value="Bff">Bff</option>
											<option value="Mom-child">Mom-child</option>
											<option value="Dad-child">Dad-child</option>
											<option value="Couple">Couple</option>
											<option value="Pearl">Pearl</option>
											<option value="Pet">Pet</option>
											
											</select>

			{{--Inventory - title --}}
			<div style = "margin-top:30px;">
				<div>
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
				<h5 class="mb-0 text-primary">Inventory</h5>
			</div><hr>
				
				<p>You will be able to add more stock later!</p>

				{{-- Size --}}
				<div class="row mb-3">
					<label for="inputEnterYourName" class="col-sm-3 col-form-label">Size</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name ="size"  value=" " >
					</div>
				</div>

				{{-- Pieces --}}
                <div class="row mb-3">
					<label for="inputEnterYourName" class="col-sm-3 col-form-label">Pieces</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name ="pieces"  value="" >
					</div>
				</div>

			{{--Inventory - title --}}
			<div style = "margin-top:30px;">
				<div>
					<div class="card-title d-flex align-items-center">
						<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
				<h5 class="mb-0 text-primary">Realising date</h5>
			</div><hr>
										
				{{-- Date --}}
				<div class="row mb-3">
					<label for="inputEnterYourName" class="col-sm-3 col-form-label">Date</label>
					<div class="col-sm-9">
						<input type="date"  name ="date_activation_product" value=""/>
					</div>
				</div>

				{{-- Time --}}                            
				<div class="row mb-3">
					<label for="inputEnterYourName" class="col-sm-3 col-form-label">Time</label>
						<div class="col-sm-9">
							<input class="result form-control" type="text" id="time" name ="time_activation_product"  value="">
						</div>	
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
									
										<button type="submit" class="btn btn-primary px-5">Send</button>
									
								</form>
							</div>
						</div>
					
					</div>
</div>
</div>


@endsection

