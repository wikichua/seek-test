(function() {
    $(':not([title=""])').tooltip();

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click','.delete',function(event) {
        event.preventDefault();
        var $self = $(this);
        alertify.confirm('Are you sure to delete this record?').set('onok', function(closeEvent){
            if($self.attr('href') != '#')
            {
                $.ajax({
                    url: $self.data('href'),
                    type: 'DELETE',
                    success: function(result){
                        $self.closest('tr').remove();
                        location.reload();
                    }
                });

            }
        } );
    });

    alertify.defaults.glossary.title = 'SEEK Test';
}());