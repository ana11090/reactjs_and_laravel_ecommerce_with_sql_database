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
	<div class="col-xl  mx-auto">
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
											<th scope="col">Date</th>
											<th scope="col">Product name</th>
                                            <th scope="col">Image</th>
											<th scope="col">Size</th>
											<th scope="col">Pieces</th>
                                            <th scope="col">Sale</th>
											<th scope="col">Discount code</th>
											<th scope="col">Final price</th>
                                            <th scope="col">Discount procent</th>
											<th scope="col">Discount sum</th>
										</tr>
									</thead>
									<tbody>  {{$i = 1}}
										@foreach ( $orders as $order )
											<tr>
                                              
												<th scope="row" style='width: 3%;'>{{$i}}</th>
                                                <td style='width: 3%;'>{{$order->user_id}}</td>
												<td>{{$order->order_id}}</td>
												<td>{{$order->created_at}}</td>
												<td>{{$order->product_name}}</td>
                                                <td><img src="{{asset($order->product_image_1)}}" style="height:40px; width:70px;" ></td>
                                                <td>{{$order->product_size}}</td>
                                                <td>{{$order->product_pieces}}</td>
                                                <td>{{$order->product_sale}}%</td>
                                                <td>{{$order->discount_code}}</td>
                                                <td>{{$order->product_final_price}}</td>
                                                <td>{{$order->discount_procent}}</td>
                                                <td>{{$order->discount_sum}}</td>
												
												
											</tr>
                                            {{$i=$i+1}}
										@endforeach

										
									</tbody>
								</table>
                                <a  href="{{ url('orders/processing/confirmation/processing/'.$one->order_id) }}"  class="btn btn-info">Completed order</a>

							</div>
						</div></div>
    </div>
</div>
@endsection

