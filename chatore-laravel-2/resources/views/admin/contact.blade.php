@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
	<div class ="page-content">
	
	{{--messages --}}

	<div class="card radius-10">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h5 class="mb-0">Messages</h5>
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
												<th>Date</th>
												<th>User name</th>
												<th>Email</th>
												<th>Subject</th>
												<th>Messages</th>
												<th></th>
												<th></th>

									</tr>
								</thead>
								<tbody>
												@foreach($message as $incompleteProduct)
													<tr> 
													<th scope="row">{{$incompleteProduct->id}}</th>
													<td>{{ $incompleteProduct->created_at }}</td>
                                                    <td>{{ $incompleteProduct->user_name }}</td>
													<td>{{ $incompleteProduct->email }}</td>
													<td>{{ $incompleteProduct->subject}}</td>
													<td>{{ $incompleteProduct->message}}</td>
													</tr>
													
												@endforeach

												</tbody>
							</table>	
						</div><div class="d-flex justify-content-center">
  						  {{ $message->links() }}
									</div>
					</div>
		</div>



		
			</div>
		</div>


			
	
		


@endsection

