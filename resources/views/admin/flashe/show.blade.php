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
				<a href="{{aurl('flashe')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('flashe/'.$flashe->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('flashe/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$flashe->id}}" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$flashe->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$flashe->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
               'method' => 'DELETE',
               'route' => ['flashe.destroy', $flashe->id]
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
				<b>{{trans('admin.id')}} :</b> {{$flashe->id}}
			</div>
			<div class="clearfix"></div>
			<hr />
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.model')}} :</b>
				{!! $flashe->model !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.model_name')}} :</b>
				{!! $flashe->model_name !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.region')}} :</b>
				{!! $flashe->region !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.security_level')}} :</b>
				{!! $flashe->security_level !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.security_date')}} :</b>
				{!! $flashe->security_date !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.build date')}} :</b>
				{!! $flashe->build date !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.status')}} :</b>
				{!! $flashe->status !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.url1')}} :</b>
				{!! $flashe->url1 !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.url2')}} :</b>
				{!! $flashe->url2 !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.url3')}} :</b>
				{!! $flashe->url3 !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.views')}} :</b>
				{!! $flashe->views !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.info')}} :</b>
				{!! $flashe->info !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.tags')}} :</b>
				{!! $flashe->tags !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.root_mode')}} :</b>
				{!! $flashe->root_mode !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.key_id')}} :</b>
				{!! $flashe->key_id !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.imei')}} :</b>
				{!! $flashe->imei !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.baseband')}} :</b>
				{!! $flashe->baseband !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.brand_id')}} :</b>
				@if(!empty($flashe->brand_id()->first()))
			{{ $flashe->brand_id()->first()->brand_name }}
			@endif
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.category_id')}} :</b>
				@if(!empty($flashe->category_id()->first()))
			{{ $flashe->category_id()->first()->category_name }}
			@endif
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.version_id')}} :</b>
				@if(!empty($flashe->version_id()->first()))
			{{ $flashe->version_id()->first()->version }}
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