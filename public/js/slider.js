    $('.delete-image-slider').on('click' , function(){
        let that = $(this);
        let data_id = that.attr('data-id');
        $('#delete-image-slider').attr('data-id' ,data_id);
    });
    $('#delete-image-slider').on('click' , function(){
        let that = $(this);
        let id = that.attr('data-id');
        let url = that.attr('data-url');
        let csrf = that.attr('data-csrf');
        $.ajax({
            type: 'POST',
            url: url,
            data:{
                _token : csrf,
                id : id
            },
            success:function(){
                location.reload();
            }
        });
    });
