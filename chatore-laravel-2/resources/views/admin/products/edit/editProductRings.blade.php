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





          <!--end row-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Horizontal Form</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-info">
							<div class="card-body">
								<div class="border p-4 rounded">


									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-info"></i>
										</div>
										<h5 class="mb-0 text-info">Ring</h5>
									</div>
									<hr/>


                                    <form class="row g-3" action="{{url('/product/edit/rings/update/'.$product->id)}}" method="POST" enctype="multipart/form-data">
      				  @csrf

                                    <table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th scope="col"  class="col-5"> </th>
								<th scope="col"> </th>
							</tr>
						</thead>

						
			
									<tbody>

                                    <tr>
                                            <td><Label>Product image 1</Label></td>
											<td><input type="text" class="form-control" name ="product_image_1"  value="{{$product->product_image_1}}"></td>
											
										</tr>
                                    
                                        <tr>
                                            <td><Label>Product image 2</Label></td>
											<td><input type="text" class="form-control" name ="product_image_2"  value="{{$product->product_image_2}}"></td>
											
										</tr>

                                        <tr>
                                            <td><Label>Product image 3</Label></td>
											<td><input type="text" class="form-control" name ="product_image_3"  value="{{$product->product_image_4}}"></td>
											
										</tr>

                                        <tr>
                                            <td><Label>Product image 4</Label></td>
											<td><input type="text" class="form-control" name ="product_image_4"  value="{{$product->product_image_4}}"></td>
											
										</tr>


										<tr>
                                            <td><Label>Product name</Label></td>
											<td><input type="text" class="form-control" name="product_name"  value="{{$product->product_name}}"></td>
											
										</tr>
                                        <tr>
                                            <td><Label>Category</Label></td>
											<td><div class="form-group">
                                                    <select  class="form-control"  name="product_category" value ="{{$product->product_category}}">
                                                    <option value="{{$product->product_category}}">{{$product->product_category}}</option>    
                                                    <option value="Rings">Ring</option>
                                                    <option value="Earrings">Earrings</option>
                                                    <option value="Necklaces">Necklace</option>
                                                    <option value="Bracelets"> Bracelet</option>
                                                    <option value="Tiaras"> Tiara</option>
                                                    <option value="Sets">Set</option>
                                                    <option value="Bookmarks">Bookmark</option>
                                                    </select>
                                                </div></td>
											
										</tr>
                                        <tr>
                                            <td><Label>Collection</Label></td>
											<td> <select class="form-control" name="product_collection" value ="{{$product->product_collection}}">
                                            <option value = "{{$product->product_collection}}">{{$product->product_collection}}</option>
                                                <option value = " ">None</option>
                                                <option value = "Tarot">Tarot</option>
                                                <option value = "Folklore">Folklore</option>
                                                <option value = "Mystic"> Mystic</option>
                                                </select></td>
											
										</tr>
                                        <tr>
                                            <td><Label>Product variation</Label></td>
											<td><input type="text" class="form-control" name ="product_variation"  value="{{$product->product_variation}}"></td>
										
										</tr>
                                        <tr>
                                            <td><Label>Cost</Label></td>	
											<td><input type="text" class="form-control" name ="product_cost"  value="{{$product->product_cost}}"></td>
										</tr>
                                        <tr>
                                            <td><Label>Price</Label></td>	
											<td><input type="text" class="form-control" name ="product_price"  value="{{$product->product_price}}"></td>
										</tr>
                                        <tr>
                                            <td><Label>Sale</Label></td>	
											<td><input type="text" class="form-control" name ="product_sale"  value="{{$product->product_sale}}"></td>
										</tr>
                                        <tr>
                                            <td><Label>Description</Label></td>	
											<td> <input name="product_description" class="form-control" value="{{$product->product_description}}" rows="3"></input></td>
										</tr>
                                       

                                        <tr>
                                            <td><Label>Band</Label></td>	
											<td>
                                                <select  class="form-control"  name="ring_filter_band"  value="{{$ring->ring_filter_band}}">
                                                <option value="{{$ring->ring_filter_band}}">{{$ring->ring_filter_band}}</option>    
                                                <option value="">Choose an option</option>    
                                                <option value="Simple band">Simple band</option>
                                                <option value="Bead setting">Bead setting</option>
                                                <option value="Channel setting">Channel setting</option>
                                                <option value="Rension setting">Rension setting</option>
                                                <option value="Bar setting">Bar setting</option>
                                                <option value="Another setting">Another setting</option>
											    </select>
                                            </td>
										</tr>
                                        <tr>
                                            <td><Label>Style</Label></td>	
											<td>
                                                <select  class="form-control"   name="ring_filter_style" value="{{$product->ring_filter_style}}">
                                                <option value="{{$product->ring_filter_style}}">{{$product->ring_filter_style}}</option>    
                                                <option value="">Choose an option</option>    
                                                <option value="Three stone">Three stone</option>
                                                <option value="Signet">Signet</option>
                                                <option value="Cocktail">Cocktail</option>
                                                <option value="Birthstone">Birthstone</option>
                                                <option value="Cluster">Cluster</option>
                                                <option value="Halo">Halo</option>
                                                <option value="Claddingh">Claddingh</option>
                                                <option value="Contemporary">Contemporary</option>
                                                </select>
                                            </td>
										</tr>
                                        <tr>
                                            <td><Label>Special ocasion</Label></td>	
											<td><select  class="form-control"  name="ring_filter_special" value="{{$product->ring_filter_special}}">
                                                <option value="{{$product->ring_filter_special}}">{{$product->ring_filter_special}}</option>    
                                                <option value="None">None</option>
                                                <option value="Engagement rings">Engagement rings</option>
                                                <option value="Wedding bands">Wedding bands</option>
                                                <option value="Promise rings">Promise rings</option>
                                                <option value="Gifts">Gifts</option>
                                                </select>
                                            </td>
										</tr>
                                        <tr>
                                            <td><Label>Gift</Label></td>	
                                                <td><select  class="form-control"   name="ring_filter_gift" value="{{$product->ring_filter_gift}}">
                                                <option value="{{$product->ring_filter_gift}}">{{$product->ring_filter_gift}}</option>    
                                                <option value="For her">For her</option>
                                                <option value="Bff">Bff</option>
                                                <option value="Mom-child">Mom-child</option>
                                                <option value="Dad-child">Dad-child</option>
                                                <option value="Couple">Couple</option>
                                                <option value="Pearl">Pearl</option>
                                                <option value="Pet">Pet</option>
                                                </select>
                                            </td>
										</tr>
                                        <tr>
                                            <td><Label>Type gift</Label></td>	
											<td><select  class="form-control"   name="ring_filter_gift" value="{{$product->ring_filter_gift}}">
											<option value="{{$product->ring_filter_gift}}">{{$product->ring_filter_gift}}</option>    
											<option value="None">None</option>
											<option value="Bff">Bff</option>
											<option value="Mom-child">Mom-child</option>
											<option value="Dad-child">Dad-child</option>
											<option value="Couple">Couple</option>
											<option value="Pearl">Pearl</option>
											<option value="Pet">Pet</option>
											
											</select>
                                        </td>
										</tr>
                                       
			
				</tbody>
								</table>


									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-info"></i>
										</div>
										<h5 class="mb-0 text-info">Main Stone</h5>
									</div>
									<hr/>

                                    <table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th scope="col"  class="col-5"> </th>
								<th scope="col"> </th>
							</tr>
						</thead>

						
			
									<tbody>

                                    <tr>
                                            <td><Label>Stone</Label></td>
											<td> <select name = "main_stone_type" value ="{{$main->main_stone_type}}" class="form-control" >
                                                    <option value="{{$main->main_stone_type}}">{{$main->main_stone_type}}</option>
                                                    <option value="Diamond">Diamond</option>
                                                    <option value="Swarovski">Swarovski</option>
                                                    <option value="Garnet">Garnet</option>
                                                    <option value="Amethyst">Amethyst</option>
                                                    <option value="Jasper">Jasper</option>
                                                    <option value="Sapphire">Sapphire</option>
                                                    <option value="Agate">Agate</option>
                                                    <option value="Ruby">Ruby</option>   
                                                    <option value="Topaz">Topaz</option>
                                                    <option value="Peridot">Peridot</option>
                                                </select>
                                            </td>
											
										</tr>
                                    
                                        <tr>
                                            <td><Label>Color</Label></td>
											<td>
                                                 <select name = "main_stone_color" class="form-control" value ="{{$main->main_stone_color}}">
                                                    <option value="{{$main->main_stone_color}}">{{$main->main_stone_color}}</option>
                                                    <option value="D">D - absoluty colorless</option>
                                                    <option value="E">E - colorless</option>
                                                    <option value="F">F - colorless</option>
                                                    <option value="G">G - almost colorless</option>
                                                    <option value="J">J - almost colorless</option>
                                                    <option value="K">K - easily color</option>   
                                                    <option value="M">M - easily color</option>
                                                    <option value="N">N - color</option>
                                                    <option value="R">R - color</option>
                                                    <option value="S">S - almost yellow</option>
                                                    <option value="Z">Z - almost yellow</option>
                                                    <option value="red">red</option>
                                                    <option value="orange">orange</option>
                                                    <option value="pink">pink</option>
                                                    <option value="blue">blue</option>
                                                    <option value="white">white</option>
                                                    <option value="black">black</option>   
                                                    <option value="green">green</option>
                                                    <option value="gray">gray</option>  
                                                </select>
                                            </td>
											
										</tr>

                                        <tr>
                                            <td><Label>Stone carat</Label></td>
											<td><input type="text" class="form-control" name ="main_stone_carat"  value="{{$main->main_stone_carat}}"/></td>
											
										</tr>

                                        <tr>
                                            <td><Label>Mm</Label></td>
											<td><input type="text" class="form-control" name ="main_stone_mm"  value="{{$main->main_stone_mm}}"/></td>
											
										</tr>


										<tr>
                                            <td><Label>Gr</Label></td>
											<td><input type="text" class="form-control" name ="main_stone_gr"  value="{{$main->main_stone_gr}}"/></td>
											
										</tr>
                                        <tr>
                                            <td><Label>Clarity</Label></td>
											<td> <select name = "main_stone_clarity"  class="form-control" >
                                                    <option value="{{$main->main_stone_clarit}}">{{$main->main_stone_clarit}}</option>
                                                    <option value="IF">IF</option>
                                                    <option value="FI">FI</option>
                                                    <option value="VVS1">VVS1</option>
                                                    <option value="VVS2">VVS2</option>
                                                    <option value="VS1">VS1</option>
                                                    <option value="VS2">VS2</option>   
                                                    <option value="SI1">SI1</option>
                                                    <option value="SI2">SI2</option>
                                                    <option value="I1">I1</option>
                                                    <option value="I2">I2</option>
                                                    <option value="I3">I3</option>  
                                                </select>
                                            </td>
											
										</tr>
                                        <tr>
                                            <td><Label>Cut</Label></td>
											<td>
                                                <select name = "main_stone_cut" class="form-control" value="{{$main->main_stone_cut}}" >
                                                <option value="{{$main->main_stone_cut}}">{{$main->main_stone_cut}}</option>
                                                    <option value="excelent">Excelent</option>
                                                    <option value="very good">Very good</option>
                                                    <option value="fair">Fair</option>       
                                                </select>
                                            </td>
											
										</tr>
                                        <tr>
                                            <td><Label>Shape</Label></td>
											<td> 
                                            <select name = "main_stone_shape" class="form-control" value="{{$main->main_stone_shape}}">
                                                    <option value="{{$main->main_stone_shape}}">{{$main->main_stone_shape}}</option>
                                                    <option value="Princess">Princess</option>
                                                    <option value="Marquise">Marquise</option>
                                                    <option value="Round">round</option>
                                                    <option value="Cushion">cushion</option>
                                                    <option value="Pearl">pearl</option>
                                                    <option value="Nevette">nevette</option>   
                                                    <option value="Square">square</option>
                                                    <option value="Brilian">brilian</option>
                                                    <option value="Scrison">scrison</option>
                                                    <option value="Emerald">emerald</option>
                                                    <option value="Radiant">Radiant</option>
                                                    <option value="Oval">Oval</option>
                                                    <option value="Asscher">Asscher</option>
                                                </select>
                                            </td>
											
										</tr>
                                        
			
				</tbody>
								</table>


                                    <div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-info"></i>
										</div>
										<h5 class="mb-0 text-info">Second Stone</h5>
									</div>
									<hr/>

                                    <table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th scope="col"  class="col-5"> </th>
								<th scope="col"> </th>
							</tr>
						</thead>

						
			
									<tbody>

                                    <tr>
                                            <td><Label>Stone</Label></td>
											<td> <select name = "second_stone_type" class="form-control" >
                                                    <option value="{{$second->second_stone_type ?? ''}}  ">{{$second->second_stone_type ?? 'None'}}</option>
                                                    <option value="Diamond">Diamond</option>
                                                    <option value="Swarovski">Swarovski</option>
                                                    <option value="Garnet">Garnet</option>
                                                    <option value="Amethyst">Amethyst</option>
                                                    <option value="Jasper">Jasper</option>
                                                    <option value="Sapphire">Sapphire</option>
                                                    <option value="Agate">Agate</option>
                                                    <option value="Ruby">Ruby</option>   
                                                    <option value="Topaz">Topaz</option>
                                                    <option value="Peridot">Peridot</option>
                                                </select>
                                            </td>
											
										</tr>
                                    
                                        <tr>
                                            <td><Label>Color</Label></td>
											<td>
                                                 <select name = "second_stone_color" class="form-control" >
                                                    <option value="{{$second->second_stone_color ?? ''}}">{{$second->second_stone_color ?? 'None'}}</option>
                                                    <option value="D">D - absoluty colorless</option>
                                                    <option value="E">E - colorless</option>
                                                    <option value="F">F - colorless</option>
                                                    <option value="G">G - almost colorless</option>
                                                    <option value="J">J - almost colorless</option>
                                                    <option value="K">K - easily color</option>   
                                                    <option value="M">M - easily color</option>
                                                    <option value="N">N - color</option>
                                                    <option value="R">R - color</option>
                                                    <option value="S">S - almost yellow</option>
                                                    <option value="Z">Z - almost yellow</option>
                                                    <option value="red">red</option>
                                                    <option value="orange">orange</option>
                                                    <option value="pink">pink</option>
                                                    <option value="blue">blue</option>
                                                    <option value="white">white</option>
                                                    <option value="black">black</option>   
                                                    <option value="green">green</option>
                                                    <option value="gray">gray</option>  
                                                </select>
                                            </td>
											
										</tr>

                                        <tr>
                                            <td><Label>Stone carat</Label></td>
											<td><input type="text" class="form-control" name ="second_stone_carat"  value="{{$second->second_stone_carat ?? ''}}  "/></td>
											
										</tr>

                                        <tr>
                                            <td><Label>Mm</Label></td>
											<td><input type="text" class="form-control" name ="second_stone_mm"  value="{{$second->second_stone_mm ?? ''}}"/></td>
											
										</tr>


										<tr>
                                            <td><Label>Gr</Label></td>
											<td><input type="text" class="form-control" name ="second_stone_gr"  value="{{$second->second_stone_gr ?? ''}}"/></td>
											
										</tr>
                                        <tr>
                                            <td><Label>Clarity</Label></td>
											<td> <select name = "second_stone_clarity"  class="form-control">
                                                    <option value="{{$second->second_stone_clarity ?? ''}} ">{{$second->second_stone_clarity ?? 'None'}}</option>
                                                    <option value="IF">IF</option>
                                                    <option value="FI">FI</option>
                                                    <option value="VVS1">VVS1</option>
                                                    <option value="VVS2">VVS2</option>
                                                    <option value="VS1">VS1</option>
                                                    <option value="VS2">VS2</option>   
                                                    <option value="SI1">SI1</option>
                                                    <option value="SI2">SI2</option>
                                                    <option value="I1">I1</option>
                                                    <option value="I2">I2</option>
                                                    <option value="I3">I3</option>  
                                                </select>
                                            </td>
											
										</tr>
                                        <tr>
                                            <td><Label>Cut</Label></td>
											<td>
                                                <select name = "second_stone_cut" class="form-control"  >
                                                <option value="{{$second->second_stone_cut ?? ''}}">{{$second->second_stone_cut ?? 'None'}}</option>
                                                    <option value="excelent">Excelent</option>
                                                    <option value="very good">Very good</option>
                                                    <option value="fair">Fair</option>       
                                                </select>
                                            </td>
											
										</tr>
                                        <tr>
                                            <td><Label>Shape</Label></td>
											<td> 
                                            <select name = "second_stone_shape" class="form-control" >
                                                    <option value="{{$second->second_stone_shape ?? ''}}">{{$second->second_stone_shape ?? 'None'}}</option>
                                                    <option value="Princess">Princess</option>
                                                    <option value="Marquise">Marquise</option>
                                                    <option value="Round">round</option>
                                                    <option value="Cushion">cushion</option>
                                                    <option value="Pearl">pearl</option>
                                                    <option value="Nevette">nevette</option>   
                                                    <option value="Square">square</option>
                                                    <option value="Brilian">brilian</option>
                                                    <option value="Scrison">scrison</option>
                                                    <option value="Emerald">emerald</option>
                                                    <option value="Radiant">Radiant</option>
                                                    <option value="Oval">Oval</option>
                                                    <option value="Asscher">Asscher</option>
                                                </select>
                                            </td>
											
										</tr>
                                        
			
				</tbody>
								</table>

                                    <div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-info"></i>
										</div>
										<h5 class="mb-0 text-info">Metal</h5>
									</div>
                                    <hr/>
                                    <table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th scope="col-5" class="col-5"> </th>
								<th scope="col"> </th>
							</tr>
						</thead>

						
			
									<tbody>

                                    <tr>
                                            <td><Label>Type</Label></td>
											<td>
                                            <select name ="metal_type" class="form-control">
                                                <option value="{{$metal->metal_type ?? ' '}}">{{$metal->metal_type ?? 'None'}}</option>
                                                <option value="Gold-24">Gold 24k</option>
                                                <option value="Gold-18">Gold 18k</option>
                                                <option value="Gold-14">Gold 14k</option>
                                                <option value="Silver-925">Argint 925</option>
                                                <option value="Platinum">Platinum</option>
                                                <option value="Steel">Stainless steel</option>
                                            </select>
                                                </select>
                                            </td>
											
										</tr>
                                    

                                        <tr>
                                            <td ><Label>Plating</Label></td>
											<td >
                                            <select name="metal_plating"  class="form-control">
                                                <option value="{{$metal->metal_plating ?? ''}}">{{$metal->metal_plating ?? 'None'}}</option>
                                                <option value="Gold-24">Gold 24k</option>
                                                <option value="Gold-18">Gold 18k</option>
                                                <option value="Gold-14">Gold 14k</option>
                                                <option value="Silver-925">Argint 925</option>
                                                <option value="Platinum">Platinum</option>
                                            </select>
                                            </td>
											
										</tr>



										<tr>
                                            <td><Label>Gr</Label></td>
											<td><input type="text" class="form-control" name ="metal_gr"  value="{{$second->metal_gr ?? ''}}"/></td>
											
										</tr>
                                        
			
				</tbody>
								</table>


									<button type="submit" class="btn btn-primary px-5">Edit</button>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
                                                </div>
               
                                
		</div>

@endsection

