@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
	<div class ="page-content">
	<div class="col-xl-7 mx-auto">
	@if ($errors->any())
    <div class="alert alert-danger " style="margin-top: 35px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
						<h6 class="mb-0 text-uppercase">Basic Form</h6>
						<p>You will be able to add more inventory later!</p>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Extra info</h5>
								</div>
								<hr>
								
								<form class="row g-3" action="{{route('add.earings')}}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name ="product_id"  value="{{$productID->id}} " >
										</div>

					<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name ="product_name"  value="{{$productID->product_name}} " readonly>
										</div>
									
                                        <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Size</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name ="product_name"  value=" " >
										</div>
                                        <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Piece</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name ="product_name"  value="" >
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

