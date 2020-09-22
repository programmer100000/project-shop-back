$(document).ready(function(){
    $('#offer-type').change(function(){
        let that = $(this).children("option:selected").val()
        if(that == 1){
            $('#offer-price').addClass('d-none');
        }else{
            $('#offer-price').removeClass('d-none');
        }
    });
});
function changeradiono(){
    if($("#noradio").prop("checked", true)){
        $('#yesradio').prop('checked' , false);
        $('#special-value').val('0');
        $('#special').addClass('d-none');  
    }else{
        $('#yesradio').prop('checked' , true);
        $('#special').addClass('d-none');
        $('#special-value').val('1');
    }
}
function changeradioyes(){
    if($("#yesradio").prop("checked", true)){
        $('#noradio').prop('checked' , false);
        $('#special').removeClass('d-none');  
        $('#special-value').val('1');
    }else{
        $('#noradio').prop('checked' , true);
        $('#special').addClass('d-none');
        $('#special-value').val('0');
    }
}
$(document).on('click' , '.edit-product' , function(){
        let that = $(this);
        let data_id = that.attr('data-id');
        let url = that.attr('data-url');
        $.ajax({
            type:'POST',
            url : url,
            data:{
                '_token' : csrf_token,
                id : data_id
            },
            success:function(data){
                let res = JSON.parse(data);
                console.log(res.product_id);
                $('#edit-form-modal #id').val(res.product_id);
                $('#edit-form-modal #image').attr('src' , res.main_image);
                $('#edit-form-modal #title').val(res.title);
                $('#edit-form-modal #desc').val(res.description);
                $('#edit-form-modal #balance').val(res.balance);
                CKEDITOR.instances['editor1'].setData(res.Review)
                if(res.special_from != null){
                    $('#yesradio').prop('checked' , true);
                    $('#noradio').prop('checked' , false);
                    $('#special-value').val('1');  
                    $('#special').removeClass('d-none');
                    $('#stime').val(res.special_from);
                    $('#ftime').val(res.special_to);
                }else{
                    $('#yesradio').prop('checked' , false);
                    $('#noradio').prop('checked' , true);
                    $('#special').addClass('d-none');
                    $('#special-value').val('0');

                }

            }
        });
});
$(document).on('click' , '.disable-product' ,function(){
    let that = $(this);
    let data_id = that.attr('data-id');
    $('#disable-product').attr('data-id' , data_id);
});
$(document).on('click' , '#disable-product' , function(){
    let that = $(this);
    let data_id = that.attr('data-id');
    let data_url = that.attr('data-url');
    $.ajax({
        type:'POST',
        url : data_url,
        data:{
            '_token':csrf_token,
            id : data_id
        },
        success:function(data){
            location.reload();
        }
    })
});