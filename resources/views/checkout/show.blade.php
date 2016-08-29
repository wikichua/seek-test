@extends('template')

@section('body')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
    	<h3 class="text-danger"><i class="glyphicon glyphicon-shopping-cart"></i> Cart</h3>
		<hr />
	</div>

    <div class="row well well-sm">
	    <div class="text-danger">
	    	Note: This is demo app. This process is to simulate the checkout completed. The items in the cart has been clear.	
	    </div>

    	<table class="table table-responsive table-hover">
			<tr>
				<td class="col-sm-2">Customer:</td>
				<td>{{ $Customer->name }}</td>
			</tr>
			<tr>
				<td class="col-sm-2">
					@if ($Customer->code == 'Default')
						ID added:
					@else
						SKUs Scanned:
					@endif
				</td>
				<td>
				{{ implode(',', $items) }}
				</td>
			</tr>
			<tr>
				<td class="col-sm-2">Total expected:</td>
				<td>${{ $total }}</td>
			</tr>
		</table>
    </div>
</div>
@stop

@section('scripts')
<script>
$(function(){
});
</script>
@stop