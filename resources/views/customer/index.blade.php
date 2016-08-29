@extends('template')

@section('body')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
    	<h3 class="text-danger"><i class="glyphicon glyphicon-king"></i> Customer</h3>
		<hr />
	</div>
    <div class="row well well-sm">
    	<table class="table table-striped table-responsive table-hover">
			<tr>
				<th class="col-sm-1 shift_column"></th>
				<th>{!! sortTableHeaderSnippet('Name','name') !!}</th>
				<th>{!! sortTableHeaderSnippet('Code','code') !!}</th>
				<th class="col-sm-1">{!! action_add_button(route('customer.create')) !!}</th>
			</tr>
			{!! Form::open(array('url' => Request::url(), 'method' => 'get')) !!}
			<tr>
				<th class="shift_column"></th>
				<th>{!! searchTableHeaderSnippet('name') !!}</th>
				<th>{!! searchTableHeaderSnippet('code') !!}</th>
				<th>{!! search_reset_buttons() !!}</th>
			</tr>
			{!! Form::close() !!}
			@foreach ($Customers as $Customer)
			<tr>
				<td class="shift_column">
					{!! shifting_buttons($Customer,route('customer.shift',array($Customer->id,$Customer->p_id)),route('customer.shift',array($Customer->id,$Customer->n_id))) !!}
				</td>
				<td>{{ $Customer->name }}</td>
				<td>{{ $Customer->code }}</td>
				<td class="text-center">
					<div class="btn-group btn-group-xs">
						<a class="btn btn-primary" href="{{ route('checkout',array($Customer->id)) }}" data-toggle='tooltip' title='Checkout'><i class="glyphicon glyphicon-shopping-cart"></i></a>
						<a class="btn btn-warning" href="{{ route('customer.edit',array($Customer->id)) }}" data-toggle='tooltip' title='Edit'><i class="glyphicon glyphicon-pencil"></i></a>
						<a class="btn btn-danger delete" data-href="{{ route('customer.destroy',array($Customer->id)) }}" data-toggle='tooltip' title='Delete'><i class="glyphicon glyphicon-trash"></i></a>
					</div>
				</td>
			</tr>
			@endforeach
			</table>
			<div class="text-center">
			{!! str_replace('/?', '?', $Customers->appends(request()->all())->render()) !!}
			</div>	
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
	@if(isSearchOrSortExecuted() || count($Customers) <= 1)
		$('.shift_column').remove();
	@endif
});
</script>
@stop