@extends('template')

@section('body')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
    	<h3 class="text-danger"><i class="glyphicon glyphicon-scale"></i> Pricing Rule</h3>
		<hr />
	</div>
    <div class="row well well-sm">
    	<table class="table table-striped table-responsive table-hover">
			<tr>
				<th class="col-sm-1 shift_column"></th>
				<th>{!! sortTableHeaderSnippet('Customer Code','customer_code') !!}</th>
				<th>{!! sortTableHeaderSnippet('Item Code','item_code') !!}</th>
				<th>{!! sortTableHeaderSnippet('Name','name') !!}</th>
				<th>{!! sortTableHeaderSnippet('Operator','operator') !!}</th>
				<th>{!! sortTableHeaderSnippet('Quantity','quantity') !!}</th>
				<th>{!! sortTableHeaderSnippet('Special Price','special_price') !!}</th>
				<th class="col-sm-1">{!! action_add_button(route('pricing_rule.create')) !!}</th>
			</tr>
			{!! Form::open(array('url' => Request::url(), 'method' => 'get')) !!}
			<tr>
				<th class="shift_column"></th>
				<th>{!! searchTableHeaderSnippet('customer_code') !!}</th>
				<th>{!! searchTableHeaderSnippet('item_code') !!}</th>
				<th>{!! searchTableHeaderSnippet('name') !!}</th>
				<th>{!! searchTableHeaderSnippet('operator') !!}</th>
				<th>{!! searchTableHeaderSnippet('quantity') !!}</th>
				<th>{!! searchTableHeaderSnippet('special_price') !!}</th>
				<th>{!! search_reset_buttons() !!}</th>
			</tr>
			{!! Form::close() !!}
			@foreach ($PricingRules as $PricingRule)
			<tr>
				<td class="shift_column">
					{!! shifting_buttons($PricingRule,route('pricing_rule.shift',array($PricingRule->id,$PricingRule->p_id)),route('pricing_rule.shift',array($PricingRule->id,$PricingRule->n_id))) !!}
				</td>
				<td>{{ $PricingRule->customer_code }}</td>
				<td>{{ $PricingRule->item_code }}</td>
				<td>{{ str_limit($PricingRule->name,50) }}</td>
				<td class="text-center">{{ $PricingRule->operator }}</td>
				<td class="text-center">{{ $PricingRule->quantity }}</td>
				<td class="text-center">{{ $PricingRule->special_price }}</td>
				<td class="text-center">
					<div class="btn-group btn-group-xs">
						<a class="btn btn-warning" href="{{ route('pricing_rule.edit',array($PricingRule->id)) }}" data-toggle='tooltip' title='Edit'><i class="glyphicon glyphicon-pencil"></i></a>
						<a class="btn btn-danger delete" data-href="{{ route('pricing_rule.destroy',array($PricingRule->id)) }}" data-toggle='tooltip' title='Delete'><i class="glyphicon glyphicon-trash"></i></a>
					</div>
				</td>
			</tr>
			@endforeach
			</table>
			<div class="text-center">
			{!! str_replace('/?', '?', $PricingRules->appends(request()->all())->render()) !!}
			</div>	
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
	@if(isSearchOrSortExecuted() || count($PricingRules) <= 1)
		$('.shift_column').remove();
	@endif
});
</script>
@stop