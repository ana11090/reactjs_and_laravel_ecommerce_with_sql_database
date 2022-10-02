@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
	<div class ="page-content">
		<div class="col-xl-7 mx-auto">
		<h6 class="mb-0 text-uppercase">Basic info</h6><hr/>
		{{-- the colorful line --}}
						
							
		<form class="row g-3" action="{{route('store.info')}}" method="POST" enctype="multipart/form-data">
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

				{{-- lock + style --}}
				<div class = "row g-3">	
								<div class="col-md-6">
										<label class="form-label">Choose lock</label>
											<select  class="form-control"  name="earings_filter_lock">
											<option value="">Choose an option</option>  
											<option value="Fish">Fish back</option> 
											<option value="Hinged back">Hinged back</option>
											<option value="Latch back">Latch back</option>
											<option value="Cuff">Cuff</option>
											<option value="Another"> Another</option>
											</select>
									</div>
									<div class="col-md-6">
									<label class="form-label">Choose style</label>
											<select  class="form-control"   name="earings_filter_style">
											<option value="">Choose an option</option>    
											<option value="Stud">Stud</option>
											<option value="Hoop">Hoop</option>
											<option value="Wire Hook">Wire Hook</option>
											<option value="Teardrop">Teardrop</option>
											<option value="Dangle">Dangle</option>
											<option value="Jacket">Jacket</option>
											<option value="Cluster">Cluster</option>
											<option value="Chandelier">Chandelier</option>
											<option value="Bajoran">Bajoran</option>
											<option value="Ear Cuff">Ear Cuff</option>
											<option value="Ear Crawler">Ear Crawler</option>
											<option value="Barbell">Barbell</option>
											</select>

									</div>
				</div>

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
						<input type="date" name ="date_activation_product" value=""/>
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

