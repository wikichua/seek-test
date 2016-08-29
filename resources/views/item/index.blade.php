@extends('template')

@section('body')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
    	<h3 class="text-danger"><i class="glyphicon glyphicon-blackboard"></i> Ads Item</h3>
		<hr />
	</div>
    <div class="row well well-sm">
    	<table class="table table-striped table-responsive table-hover">
			<tr>
				<th class="col-sm-1 shift_column"></th>
				<th>{!! sortTableHeaderSnippet('Name','name') !!}</th>
				<th>{!! sortTableHeaderSnippet('Code','code') !!}</th>
				<th>{!! sortTableHeaderSnippet('Price','price') !!}</th>
				<th class="col-sm-1">{!! action_add_button(route('item.create')) !!}</th>
			</tr>
			{!! Form::open(array('url' => Request::url(), 'method' => 'get')) !!}
			<tr>
				<th class="shift_column"></th>
				<th>{!! searchTableHeaderSnippet('name') !!}</th>
				<th>{!! searchTableHeaderSnippet('code') !!}</th>
				<th>{!! searchTableHeaderSnippet('price') !!}</th>
				<th>{!! search_reset_buttons() !!}</th>
			</tr>
			{!! Form::close() !!}
			@foreach ($Items as $Item)
			<tr>
				<td class="shift_column">
					{!! shifting_buttons($Item,route('item.shift',array($Item->id,$Item->p_id)),route('item.shift',array($Item->id,$Item->n_id))) !!}
				</td>
				<td>{{ $Item->name }}</td>
				<td>{{ $Item->code }}</td>
				<td>{{ $Item->price }}</td>
				<td class="text-center">
					<div class="btn-group btn-group-xs">
						<a class="btn btn-warning" href="{{ route('item.edit',array($Item->id)) }}" data-toggle='tooltip' title='Edit'><i class="glyphicon glyphicon-pencil"></i></a>
						<a class="btn btn-danger delete" data-href="{{ route('item.destroy',array($Item->id)) }}" data-toggle='tooltip' title='Delete'><i class="glyphicon glyphicon-trash"></i></a>
					</div>
				</td>
			</tr>
			@endforeach
			</table>
			<div class="text-center">
			{!! str_replace('/?', '?', $Items->appends(request()->all())->render()) !!}
			</div>	
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
	@if(isSearchOrSortExecuted() || count($Items) <= 1)
		$('.shift_column').remove();
	@endif
});
</script>
@stop