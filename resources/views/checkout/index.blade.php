@extends('template')

@section('body')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
    	<h3 class="text-danger"><i class="glyphicon glyphicon-shopping-cart"></i> Cart</h3>
		<hr />
	</div>
    <div class="row well well-sm">
    	{!! Form::open(array('route' => array('checkout.store',$customer_id),'name' => 'register_form','class' => 'form-inline', 'method' => 'post','files'=>true)) !!}
		<div class="form-group">
			{!! Form::label('item_code', 'Item', array('class'=>'control-label')) !!}
			{!! Form::select('item_code', $items, old('item_code'), array('class'=>"form-control",'placeholder'=>"Select One")) !!}
		</div>
		<div class="form-group">
			{!! Form::label('quantity', 'Quantity', array('class'=>'control-label')) !!}
			{!! Form::text('quantity', old('quantity',1), array('class'=>"form-control",'placeholder'=>"e.g. 3")) !!}
		</div>
		{!! Form::submit('Add', array('class'=>"btn btn-primary")) !!}
		{!! Form::close() !!}

    	<hr />

    	<table class="table table-striped table-responsive table-hover">
			<tr>
				<th>{!! sortTableHeaderSnippet('Item','item-name') !!}</th>
				<th class="text-center">{!! sortTableHeaderSnippet('Quantity','quantity') !!}</th>
				<th class="text-center">{!! sortTableHeaderSnippet('Price','price') !!}</th>
				<th class="col-sm-1"></th>
			</tr>
			@foreach ($Checkouts as $Checkout)
			<?php $total = isset($total)? $total + $Checkout->price:$Checkout->price; ?>
			<tr>
				<td>{{ $Checkout->item->name }}</td>
				<td class="text-center">{{ $Checkout->quantity }}</td>
				<td class="text-center">{{ $Checkout->price }}</td>
				<td class="text-center">
					<div class="btn-group btn-group-xs">
						<a class="btn btn-danger delete" data-href="{{ route('checkout.destroy',array($Checkout->id,$customer_id)) }}" data-toggle='tooltip' title='Delete'><i class="glyphicon glyphicon-trash"></i></a>
					</div>
				</td>
			</tr>
			@endforeach
			<tr>
				<th></th>
				<th class="text-center">Total</th>
				<th class="text-center">${{ $total }}</th>
				<th>
					@if ($total != 0)
					<a data-href="{{ route('checkout.show',array($customer_id)) }}" class="btn btn-info" id='checkout' data-toggle='tooltip' title='Checkout'>Checkout</a>
					@endif
				</th>
			</tr>
		</table>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
	$('#checkout').click(function(){
		var $self = $(this);
		alertify.confirm('Confirm Checkout?', 'This is a demo app. This cart will be clear upon clicking ok to simulate checkout completed.', function(){ 
			window.location.href = $self.data('href');
		},
        function(){ 
        	alertify.error('Cancel');
        });
	});

});
</script>
@stop