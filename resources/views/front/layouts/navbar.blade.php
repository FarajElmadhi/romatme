

<nav class="navbar navbar-expand-lg ">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{url('assets')}}/front/images/logo.png" alt="" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#main"
          aria-controls="main"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="main">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

          @foreach($brands as $brand)
          @php

$categories = App\Models\Category::where('brand_id', $brand->id)->get();

@endphp



          <li class="nav-item dropdown">
          <a class="nav-link   p-2 p-lg-3 dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{$brand->brand_name}}
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">

          @foreach($categories as $cat)
            <li><a class="dropdown-item" href="{{ route('categories', ['brand' => $brand->brand_name, 'type' => $cat->category_name]) }}">{{$cat->category_name}}</a></li>
            @endforeach

          </ul>
        </li>
        @endforeach
          </ul>
       
        </div>
      </div>
    </nav>


    <input class="form-control" autocomplete="off" id="search" placeholder="Enter model  or model name">
    {{-- <div id="selction-ajax"></div> --}}