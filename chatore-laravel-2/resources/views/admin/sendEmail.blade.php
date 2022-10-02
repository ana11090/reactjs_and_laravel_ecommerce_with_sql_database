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

   

    <!--Table-->
	<div class="col-xl-9  mx-auto">
                <h6 class=" mb-0 text-uppercase">Send Email</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
							<form class="row g-3"action="{{url('/send/email/request')}}" method="POST" enctype="multipart/form-data">
      				  @csrf
	<div class="col-12">
										<label for="inputAddress" class="form-label">Text</label>
										<textarea class="form-control" id="inputAddress" name="email"  rows="6"></textarea>
									</div>
		
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Send</button>
									</div>
								</form>
							</div>
						</div></div>
    </div>
</div>
@endsection

