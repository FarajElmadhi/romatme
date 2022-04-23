@extends('front.index')
@section('content')




    <div class="features text-center pt-5 pb-5 ">
      <div class="container">
        <div class="main-title mt-5 mb-5 position-relative">
          <h2>Search Result</h2>
        </div>
<div class='  d-flex justify-content-center '>
        <table class="table">
<thead>
  <th>Type</th>
  <th>Model</th>
  <th>count</th>
  <th></th>
</thead>
  <tbody>
    @foreach($arr as $row)
<tr>
<td>{{$brand}}/{{$row['type']}}</td>
<td>{{$model}} / {{$model_name->model_name}}</td>
<td>{{$row['count']}}</td>
      <td >  <a href=" {{ route(  'show', ['brand' => $brand, 'type' => $row['type'], 'model'=> $model]  )  }}"> Show  </a> </td>
</tr>
    @endforeach
  
  </tbody>
</table>
</div>
      </div>
    </div>
@endsection
