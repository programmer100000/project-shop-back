$(document).ready(function(){
    $('#offer-type').change(function(){
        let that = $(this).children("option:selected").val()
        if(that == 0){
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