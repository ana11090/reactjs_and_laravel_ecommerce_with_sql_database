

<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div class = "logo_div">
					<img src="{{ asset('image/Chatore_logo.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

	<li>
		<a href="{{ url('/dashboard') }}">
			<div class="parent-icon"><i class='bx bx-home-circle'></i>
			</div>
			<div class="menu-title">Dashboard</div>
		</a>
	</li>

				 
				 
				<li class="menu-label">Manage Site </li>
				 
				

		


				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-repeat"></i>
						</div>
						<div class="menu-title">Products</div>
					</a>
					<ul>

						<li> <a href="{{ route('add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>
						<li> <a href="{{ route('view.product') }}"><i class="bx bx-right-arrow-alt"></i>View Products</a>
						</li>
						<li> <a href="{{ route('state.product') }}"><i class="bx bx-right-arrow-alt"></i>State Products</a>
						</li>
						<li> <a href="{{ route('view.inventory') }}"><i class="bx bx-right-arrow-alt"></i>Inventory</a>
						</li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Sales</div>
					</a>
					<ul>
						<li> <a href="{{ route('price.products') }}"><i class="bx bx-right-arrow-alt"></i>Per product</a>
						</li>
					</li>
					</ul>
					<ul>
						<li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Per group of products</a>
							<ul>
								<li> <a  href="{{ route('price.products.product') }}"><i class="bx bx-right-arrow-alt"></i>Product</a>
								</li>
								<li> <a  href="{{ route('price.products.metal') }}"><i class="bx bx-right-arrow-alt"></i>Metal</a>
								</li>
								<li> <a  href="{{ route('price.products.mainStone') }}"><i class="bx bx-right-arrow-alt"></i>Main stone</a>
								</li>
							</ul>
					</ul>
					<ul>
						<li> <a href="{{ route('discount') }}"><i class="bx bx-right-arrow-alt"></i>Discounts</a>
						</li>
					</li>
					</ul>
				</li>			


	<li>
		<a href="{{ route('see.contact') }}">
			<div class="parent-icon"><i class="bx bx-donate-blood"></i>
			</div>
			<div class="menu-title">Contact Message</div>
		</a>
	</li>


<li>
		<a href="{{ route('see.reviews') }}">
			<div class="parent-icon"><i class="bx bx-donate-blood"></i>
			</div>
			<div class="menu-title">Product Review</div>
		</a>
	</li>








				<li class="menu-label">Customer Order</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
						</div>
						<div class="menu-title">Manage Order</div>
					</a>

					<ul>
						<li> <a  href="{{ route('orders.pending') }}" ><i class="bx bx-right-arrow-alt"></i>Pending Order </a>
						</li>
						<li> <a href="{{ route('orders.processing') }}"><i  class="bx bx-right-arrow-alt"></i>Processing Order</a>
						</li>
						<li> <a href="{{ route('orders.completed') }}" ><i class="bx bx-right-arrow-alt"></i>Complete Order</a>
						</li>
					 
						 
					</ul>
				</li>
				 
				 
				 <!-- //target="_blank" -->
				<li>
					<a href="{{ route('send.email') }}" >
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Send Email</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>

		