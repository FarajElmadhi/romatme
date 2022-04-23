@extends('front.index')
@section('content')




    <div class="features text-center pt-5 pb-5 ">
      <div class="container">
        <div class="main-title mt-5 mb-5 position-relative">
          <h2>Latest Files</h2>
        </div>
<div class='  d-flex justify-content-center '>
        <table class="table">
<thead>
  <th>Type</th>
  <th>Model</th>
  <th>CSC</th>
  <th>Version</th>
  <th>OS</th>
  <th></th>
</thead>
  <tbody>
    @foreach($roms as $rom)
   
    <tr>
      <td >{{ $brand}} / {{ $type}} </td>
      <td >{{ $rom['model']}} / {{ $rom['model_name']}} </td>
      <td >{{ $rom['region']}} </td>
      <td >{{ $rom['baseband']}} </td>
      <td >@if($rom->version !=Null )  Android {{ $rom['version']}}  @endif</td>
     @if($brand == 'Apple') 
      <td >  <a href=" {{ route('apple', ['brand' => $brand, 'type' => $type,'model'=>$model, 'baseband'=> $rom['baseband'],'vers'=> $rom['version']] )}}  "> Download </a> </td>

@else
      <td >  <a href=" {{ route('download', ['brand' => $brand, 'type' => $type,'model'=>$model, 'csc'=> $rom->region, 'baseband'=> $rom->baseband] )}}  "> Download </a> </td>
@endif
    </tr>
    @endforeach
  
  </tbody>
</table>
</div>
      </div>
    </div>
@endsection
