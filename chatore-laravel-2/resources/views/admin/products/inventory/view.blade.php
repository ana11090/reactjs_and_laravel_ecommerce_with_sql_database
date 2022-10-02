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

	
	{{-- pricing --}}

	<div class="card radius-10">
        
					<div class="card-body">
                        
                    


                            @if ($errors->any())
                                <div class="alert alert-danger " style="margin-top: 35px;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                             @endif

						<div class="d-flex align-items-center">
							<div>
								<h5 class="mb-0">All products</h5>
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<hr/>
						<div class="table-responsive">
							<table class="table align-middle mb-0">
								<thead class="table-light">
									<tr>
                                                <!-- <th>Id</th> -->
												<th>Product name</th>
												<th>Size</th>
												<th>Pieces</th>
												<th>Add inventory</th>

									</tr>
								</thead>
								<tbody>
												@foreach($products as $product)
  
													<tr>
                                                         
													<!-- <th scope="row">{{$product->id}} -->

                                                    <!-- <input type="text" class="form-control" name ="product_id"  value="{{$product->id}} " hidden> -->

                                                    </th>
													<td style='width: 10%;'>{{ $product->product_name }}</td>
                                                @if (isset($product->size ))
                                                    <td>{{ $product->size }}</td>	
                                                    @else
                                                    <td></td>
                                                @endif
													
													<td>{{ $product->pieces}} </td>
								
													
                                                    <td><a  href="{{ url('view/product/inventory/'.$product->product_name) }}"  class="btn btn-info">Add</a></td>
													</form>

													
													</tr>
													
												@endforeach

												</tbody>
							</table>
						</div>

                        <div class="d-flex justify-content-center">
  						
									</div>
					</div>
		</div>



		
			</div>
		</div>


			
	
		


@endsection

