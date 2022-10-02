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
                <h6 class=" mb-0 text-uppercase">New orders</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<table class="table mb-0 table-hover">
									<thead>
										<tr>
										<th scope="col"></th>
											<th scope="col">User id</th>
											<th scope="col">Order id</th>
											<th scope="col">Order date</th>
											<th scope="col">Total</th>
											<th scope="col"></th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>  {{$i = 1}}
										@foreach ( $completedOrders as $order )
											<tr>
                                              
												<th scope="row">{{$i}}</th>
                                                <td>{{$order->user_id}}</td>
												<td>{{$order->order_id}}</td>
												<td>{{$order->created_at}}</td>
												<td>{{$order->total}}</td>
												
												<td><a  href="{{ url('orders/completed/view/'.$order->order_id)}}"  class="btn btn-info">See order</a></td>
												
											</tr>
                                            {{$i=$i+1}}
										@endforeach
										
										
									</tbody>
								</table>
							</div>
						</div></div>
    </div>
</div>
@endsection

