@extends('front.index')
@section('content')




    <div class="features text-center pt-5 pb-5 ">
      <div class="container">
        <div class="main-title mt-5 mb-5 position-relative">
          <h1 class='h1-title'>Download {{$type}} {{$brand}} {{ $roms->model_name }} {{$model}}  </h1>
        </div>



<div class="d-flex justify-content-evenly">
   <div > Brand:  {{ $brand }}</div>
   <div > Type :  {{ $type }}</div>
</div>
<div class="d-flex justify-content-evenly">
   <div > Model:  {{ $model }}</div>
   <div > Model Name :  {{ $roms->model_name }}</div>
</div>
<div class="d-flex justify-content-evenly">
  @if(isset($version)) <div > Version:  {{ $roms->version}} </div> @endif
    @if ($roms->baseband != Null)
    <div >
       Baseband:  {{ $roms->baseband }}</div>
   @endif 

       @if ($roms->imei != Null)
       <div >
       Imei:  {{ $roms->imei }}</div>
         <div >
       date:  {{ $roms->created_at }}</div>
   @endif 
</div>

<div class="d-flex justify-content-center">
   <a target='_blank' href='{{$roms->url1}}'>Download</a>
</div>

      </div>
    </div>
@endsection
