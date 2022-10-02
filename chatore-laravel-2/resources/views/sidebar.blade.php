<link href="asset/css/sidebar.css" rel="stylesheet">


<div class="sidebar">
  <img src="{{asset('/image/Chatore_logo.png')}}"/>
  <div>
      <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
  </div>
  
  <div>
      <x-jet-nav-link href="{{ route('add.product') }}" >
                        {{ __('Products') }}
                    </x-jet-nav-link>
  </div>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>
