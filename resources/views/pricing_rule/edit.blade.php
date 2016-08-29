@extends('template')

@section('body')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
    	<h3 class="text-danger"><i class="glyphicon glyphicon-scale"></i> Pricing Rule</h3>
		<hr />
	</div>

    <div class="row well well-sm">
        {!! Form::open(array('route' => array('pricing_rule.update',$PricingRule->id),'name' => 'register_form','class' => 'form-horizontal', 'method' => 'put','files'=>true)) !!}
		<div class="form-group">
			{!! Form::label('name', 'Name', array('class'=>'col-sm-3 control-label')) !!}
			<div class="col-sm-7">
				{!! Form::text('name', old('name',$PricingRule->name), array('class'=>"form-control",'placeholder'=>"e.g. 3 for 2 deal")) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('customer_code', 'Customer Code', array('class'=>'col-sm-3 control-label')) !!}
			<div class="col-sm-7">
				{!! Form::select('customer_code', $customers, old('customer_code',$PricingRule->customer_code), array('class'=>"form-control",'placeholder'=>"Select One")) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('item_code', 'Item Code', array('class'=>'col-sm-3 control-label')) !!}
			<div class="col-sm-7">
				{!! Form::select('item_code', $items, old('item_code',$PricingRule->item_code), array('class'=>"form-control",'placeholder'=>"Select One")) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('operator', 'Operator', array('class'=>'col-sm-3 control-label')) !!}
			<div class="col-sm-7">
				{!! Form::select('operator', array('=','>=') ,old('operator',$PricingRule->operator), array('class'=>"form-control",'placeholder'=>"Please Select")) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('quantity', 'Quantity', array('class'=>'col-sm-3 control-label')) !!}
			<div class="col-sm-7">
				{!! Form::text('quantity', old('quantity',$PricingRule->quantity), array('class'=>"form-control",'placeholder'=>"e.g. 3")) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('special_price', 'Special Price', array('class'=>'col-sm-3 control-label')) !!}
			<div class="col-sm-7">
				{!! Form::text('special_price', old('special_price',$PricingRule->special_price), array('class'=>"form-control",'placeholder'=>"e.g. 0.00")) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-7">
				{!! Form::submit('Submit', array('class'=>"btn btn-primary")) !!}
				<a href="{{ route('item') }}" class='btn btn-danger'>Cancel</a>
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