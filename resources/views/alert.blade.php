<script>
$(document).ready(function(){
	
@if (session()->has('success'))
	alertify.success("<i class='fa fa-2x fa-thumbs-up pull-left'></i> {{ session()->get('success') }}");
@endif

@if (session()->has('error'))
	alertify.error("<i class='fa fa-2x fa-exclamation-circle pull-left'></i> {{ session()->get('error') }}");
@endif

@if (session()->has('warning'))
	alertify.warning("<i class='fa fa-2x fa-exclamation-triangle pull-left'></i> {{ session()->get('warning') }}");
@endif

@if (session()->has('message'))
	alertify.notify("<i class='fa fa-2x fa-info-circle pull-left'></i> {{ session()->get('message') }}");
@endif

@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        alertify.error("<i class='fa fa-2x fa-exclamation-circle pull-left'></i> {{ $error }}");
    @endforeach
@endif

});
</script>