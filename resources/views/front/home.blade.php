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
      <td >{{ $rom['brand']}} / {{ $rom['category']}} </td>
      <td >{{ $rom['model']}} / {{ $rom['model_name']}} </td>
      <td >{{ $rom['region']}} </td>
      <td >{{ $rom['baseband']}} </td>
      <td >{{ $rom['version']}} </td>
      {{-- <td >  <a href=" {{ route('download', ['brand' => $rom['brand'], 'type' => $rom['category'],'model'=>$rom['model'], 'csc'=> $rom['region'], 'baseband'=> $rom['baseband']]) }}  "> Download </a> </td> --}}
        @if($rom['brand'] == 'Apple') 
      <td >  <a href=" {{ route('apple', ['brand' => $rom['brand'], 'type' => $rom['category'],'model'=>$rom['model'], 'baseband'=> $rom['baseband'],'vers'=> $rom['version']] )}}  "> Download </a> </td>

@else
      <td >  <a href=" {{ route('download', ['brand' => $rom['brand'], 'type' => $rom['category'],'model'=>$rom['model'], 'csc'=> $rom['region'], 'baseband'=> $rom['baseband']] )}}  "> Download </a> </td>
@endif

    </tr>
    @endforeach
  
  </tbody>
</table>
</div>
      </div>
    </div>
@endsection
