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
        {{-- rings table  --}}
                <div class="card radius-10">
                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="mb-0">Rings</h5>
                                        </div>
                                        
                                    </div>
                                            <div class="table-responsive mt-4">
                                                <table class="table align-middle mb-0 table-hover" id="Transaction-History">
                                                    <thead class="table-light">
                                                        <tr>
                                                        <th>Id</th>
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th>Colection</th>
                                                    <th>Original price</th>
                                                    <th>Price with sale</th>
                                                    <th>Delete</th>
                                                    <th>Edit</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($rings as $incompleteProduct)
                                                                <tr> 
                                                                <th scope="row">{{$incompleteProduct->id}}</th>
                                                                <td style='width: 10%;'>{{ $incompleteProduct->product_name }}</td>
                                                                <td> <img src="{{asset($incompleteProduct->product_image_1)}}" style="height:40px; width:70px;" ></td>  
                                                                <td>{{ $incompleteProduct->product_category }}</td>								
                                                                <td>{{ $incompleteProduct-> product_collection }}</td>
                                                                <td>{{ $incompleteProduct->product_price}}</td>
                                                                <td>{{ $incompleteProduct->product_price - $incompleteProduct->product_sale/100* $incompleteProduct->product_price}} </td>
                                                                <td><a href="{{ url('/product/delete/'.$incompleteProduct->id) }}" class="btn btn-info">Delete</a></td>
                                                                <td><a href="{{ url('/product/edit/rings/'.$incompleteProduct->id) }}" class="btn btn-info">Edit</a></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                            <div class="d-flex justify-content-center">
                                    {{ $rings->links() }}
                                                </div>
                </div>
       
		
        {{-- earrings table  --}}
                <div class="card radius-10">
                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="mb-0">Earrings</h5>
                                        </div>
                                    </div>
                                            <div class="table-responsive mt-4">
                                                <table class="table align-middle mb-0 table-hover" id="Transaction-History">
                                                    <thead class="table-light">
                                                        <tr>
                                                        <th>Id</th>
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th>Colection</th>
                                                    <th>Original price</th>
                                                    <th>Price with sale</th>
                                                    <th>Delete</th>
                                                    <th>Edit</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($earrings as $incompleteProduct)
                                                                <tr> 
                                                                <th scope="row">{{$incompleteProduct->id}}</th>
                                                                <td style='width: 10%;'>{{ $incompleteProduct->product_name }}</td>
                                                                <td> <img src="{{asset($incompleteProduct->product_image_1)}}" style="height:40px; width:70px;" ></td>  
                                                                <td>{{ $incompleteProduct->product_category }}</td>								
                                                                <td>{{ $incompleteProduct-> product_collection }}</td>
                                                                <td>{{ $incompleteProduct->product_price}}</td>
                                                                <td>{{ $incompleteProduct->product_price - $incompleteProduct->product_sale/100* $incompleteProduct->product_price}} </td>
                                                                <td><a href="{{ url('/product/delete/'.$incompleteProduct->id) }}" class="btn btn-info">Delete</a></td>
                                                                <td><a href="{{ url('/product/edit/rings/'.$incompleteProduct->id) }}" class="btn btn-info">Edit</a></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                            <div class="d-flex justify-content-center">
                                    {{ $earrings->links() }}
                                                </div>
                </div>
                                
		

        {{-- necklaces table  --}}
                <div class="card radius-10">
                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="mb-0">Necklaces</h5>
                                        </div>
                                    </div>
                                            <div class="table-responsive mt-4">
                                                <table class="table align-middle mb-0 table-hover" id="Transaction-History">
                                                    <thead class="table-light">
                                                        <tr>
                                                        <th>Id</th>
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th>Colection</th>
                                                    <th>Original price</th>
                                                    <th>Price with sale</th>
                                                    <th>Delete</th>
                                                    <th>Edit</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($necklaces as $incompleteProduct)
                                                                <tr> 
                                                                <th scope="row">{{$incompleteProduct->id}}</th>
                                                                <td style='width: 10%;'>{{ $incompleteProduct->product_name }}</td>
                                                                <td> <img src="{{asset($incompleteProduct->product_image_1)}}" style="height:40px; width:70px;" ></td>  
                                                                <td>{{ $incompleteProduct->product_category }}</td>								
                                                                <td>{{ $incompleteProduct-> product_collection }}</td>
                                                                <td>{{ $incompleteProduct->product_price}}</td>
                                                                <td>{{ $incompleteProduct->product_price - $incompleteProduct->product_sale/100* $incompleteProduct->product_price}} </td>
                                                                <td><a href="{{ url('/product/delete/'.$incompleteProduct->id) }}" class="btn btn-info">Delete</a></td>
                                                                <td><a href="{{ url('/product/edit/rings/'.$incompleteProduct->id) }}" class="btn btn-info">Edit</a></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                            <div class="d-flex justify-content-center">
                                    {{ $necklaces->links() }}
                                                </div>
                
                                
		</div>

        {{-- bracelets table  --}}
                <div class="card radius-10">
                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="mb-0">Bracelets</h5>
                                        </div>
                                    </div>
                                            <div class="table-responsive mt-4">
                                                <table class="table align-middle mb-0 table-hover" id="Transaction-History">
                                                    <thead class="table-light">
                                                        <tr>
                                                        <th>Id</th>
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th>Colection</th>
                                                    <th>Original price</th>
                                                    <th>Price with sale</th>
                                                    <th>Delete</th>
                                                    <th>Edit</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($bracelets as $incompleteProduct)
                                                                <tr> 
                                                                <th scope="row">{{$incompleteProduct->id}}</th>
                                                                <td style='width: 10%;'>{{ $incompleteProduct->product_name }}</td>
                                                                <td> <img src="{{asset($incompleteProduct->product_image_1)}}" style="height:40px; width:70px;" ></td>  
                                                                <td>{{ $incompleteProduct->product_category }}</td>								
                                                                <td>{{ $incompleteProduct-> product_collection }}</td>
                                                                <td>{{ $incompleteProduct->product_price}}</td>
                                                                <td>{{ $incompleteProduct->product_price - $incompleteProduct->product_sale/100* $incompleteProduct->product_price}} </td>
                                                                <td><a href="{{ url('/product/delete/'.$incompleteProduct->id) }}" class="btn btn-info">Delete</a></td>
                                                                <td><a href="{{ url('/product/edit/rings/'.$incompleteProduct->id) }}" class="btn btn-info">Edit</a></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                            <div class="d-flex justify-content-center">
                                    {{ $bracelets->links() }}
                                                </div>
                
                                
		</div>


        {{-- tiaras table  --}}
                <div class="card radius-10">
                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="mb-0">Tiaras</h5>
                                        </div>
                                    </div>
                                            <div class="table-responsive mt-4">
                                                <table class="table align-middle mb-0 table-hover" id="Transaction-History">
                                                    <thead class="table-light">
                                                        <tr>
                                                        <th>Id</th>
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th>Colection</th>
                                                    <th>Original price</th>
                                                    <th>Price with sale</th>
                                                    <th>Delete</th>
                                                    <th>Edit</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($tiaras as $incompleteProduct)
                                                                <tr> 
                                                                <th scope="row">{{$incompleteProduct->id}}</th>
                                                                <td style='width: 10%;'>{{ $incompleteProduct->product_name }}</td>
                                                                <td> <img src="{{asset($incompleteProduct->product_image_1)}}" style="height:40px; width:70px;" ></td>  
                                                                <td>{{ $incompleteProduct->product_category }}</td>								
                                                                <td>{{ $incompleteProduct-> product_collection }}</td>
                                                                <td>{{ $incompleteProduct->product_price}}</td>
                                                                <td>{{ $incompleteProduct->product_price - $incompleteProduct->product_sale/100* $incompleteProduct->product_price}} </td>
                                                                <td><a href="{{ url('/product/delete/'.$incompleteProduct->id) }}" class="btn btn-info">Delete</a></td>
                                                                <td><a href="{{ url('/product/edit/rings/'.$incompleteProduct->id) }}" class="btn btn-info">Edit</a></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                            <div class="d-flex justify-content-center">
                                    {{ $tiaras->links() }}
                                                </div>
               
                                
		</div>

@endsection

