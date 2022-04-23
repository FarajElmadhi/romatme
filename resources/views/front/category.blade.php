@extends('front.index')
@section('content')




    <div class="features text-center pt-5 pb-5 ">
      <div class="container">
        <div class="main-title mt-5 mb-5 position-relative">
          <h2>Download {{$brand}} {{$type}} </h2>
        </div>
<div class='  d-flex justify-content-center '>
        <table class="table">
<thead>
  <th>brand/Type</th>
  <th>Model</th>
  <th>Model Name</th>
  <th></th>
</thead>
  <tbody>

    @foreach($devices as $device)
    <tr>
      <td >{{ $brand}}/{{$type}}</td>
      <td >{{ $device->model}}</td>
      <td >{{ $device->model_name}}</td>
   
      <td >  <a href=" {{ route(  'show', ['brand' => $brand, 'type' => $type,'model'=> $device->model]  )  }}"> Show  </a> </td>

    </tr>
    @endforeach
  
  </tbody>
</table>
</div>
      </div>
    </div>
@endsection
