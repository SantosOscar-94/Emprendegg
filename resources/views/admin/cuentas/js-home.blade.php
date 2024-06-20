<script>
    

    // Save info business
    $('body').on('click', '.btn-save-info', function()
    {
        event.preventDefault();
        let form = $('#form-info').serialize();
        $.ajax({
            url         : "{{ route('admin.save_cuentas') }}",
            method      : 'POST',
            data        : form,
            beforeSend  : function(){
                $('.btn-save-info').prop('disabled', true);
                $('.text-save-info').addClass('d-none');
                $('.text-saving-info').removeClass('d-none');
            },
            success     : function(r){
                if(!r.status)
                {
                    $('.btn-save-info').prop('disabled', false);
                    $('.text-save-info').removeClass('d-none');
                    $('.text-saving-info').addClass('d-none');
                    toast_msg(r.msg, r.type);
                    return;
                }

                $('.btn-save-info').prop('disabled', false);
                $('.text-save-info').removeClass('d-none');
                $('.text-saving-info').addClass('d-none');
                toast_msg(r.msg, r.type);
            },
            dataType    : 'json'
        });
    });


  
</script>