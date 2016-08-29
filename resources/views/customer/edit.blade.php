@extends('template')

@section('body')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
    	<h3 class="text-danger"><i class="glyphicon glyphicon-king"></i> Customer</h3>
		<hr />
	</div>

    <div class="row well well-sm">
        {!! Form::open(array('route' => array('customer.update',$Customer->id),'name' => 'register_form','class' => 'form-horizontal', 'method' => 'put','files'=>true)) !!}
		<div class="form-group">
			{!! Form::label('name', 'Name', array('class'=>'col-sm-3 control-label')) !!}
			<div class="col-sm-7">
				{!! Form::text('name', old('name',$Customer->name), array('class'=>"form-control",'placeholder'=>"Name")) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('code', 'Code', array('class'=>'col-sm-3 control-label')) !!}
			<div class="col-sm-7">
				{!! Form::text('code', old('code',$Customer->code), array('class'=>"form-control",'placeholder'=>"Code")) !!}
				<p class="help-block">e.g Default, Nike, Ford, Unilever, Apple, etc.</p>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-7">
				{!! Form::submit('Submit', array('class'=>"btn btn-primary")) !!}
				<a href="{{ route('customer') }}" class='btn btn-danger'>Cancel</a>
			</div>
		</div>
		{!! Form::close() !!}
    </div>
</div>
@stop

@section('scripts')
<script>
$(function(){
});
</script>
@stop