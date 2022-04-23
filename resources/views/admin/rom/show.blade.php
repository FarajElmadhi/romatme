@extends('admin.index')
@section('content')
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<a>{{!empty($title)?$title:''}}</a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('rom')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('rom/'.$rom->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('rom/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$rom->id}}" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$rom->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$rom->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
               'method' => 'DELETE',
               'route' => ['rom.destroy', $rom->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						 <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		@endpush
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12">
				<b>{{trans('admin.id')}} :</b> {{$rom->id}}
			</div>
			<div class="clearfix"></div>
			<hr />
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.model')}} :</b>
				{!! $rom->model !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.model_name')}} :</b>
				{!! $rom->model_name !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.region')}} :</b>
				{!! $rom->region !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.baseband')}} :</b>
				{!! $rom->baseband !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.security_level')}} :</b>
				{!! $rom->security_level !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.security_date')}} :</b>
				{!! $rom->security_date !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.build date')}} :</b>
				{!! $rom->build date !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.status')}} :</b>
				{!! $rom->status !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.url1')}} :</b>
				{!! $rom->url1 !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.url2')}} :</b>
				{!! $rom->url2 !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.url3')}} :</b>
				{!! $rom->url3 !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.views')}} :</b>
				{!! $rom->views !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.info')}} :</b>
				{!! $rom->info !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.tags')}} :</b>
				{!! $rom->tags !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.root_mode')}} :</b>
				{!! $rom->root_mode !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.key_id')}} :</b>
				{!! $rom->key_id !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.imei')}} :</b>
				{!! $rom->imei !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.brand_id')}} :</b>
				@if(!empty($rom->brand_id()->first()))
			{{ $rom->brand_id()->first()->brand_name }}
			@endif
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.category_id')}} :</b>
				@if(!empty($rom->category_id()->first()))
			{{ $rom->category_id()->first()->category_name }}
			@endif
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.version_id')}} :</b>
				@if(!empty($rom->version_id()->first()))
			{{ $rom->version_id()->first()->version }}
			@endif
			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
@endsection