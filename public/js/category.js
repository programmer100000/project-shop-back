
$(function() {
    $.ajax({
        type:'GET',
        url : caturl,
        success:function(data){
            console.log(data);
            var tdata = JSON.parse(data);
            $('#tree').tree({
                data: tdata,
                autoOpen: true,
                dragAndDrop: true
            });
        }
    });
    $('#tree').on(
        'tree.click',
        function(event) {
            $('#editbtn').toggleClass('d-inline-block');
        }
    );

    $('#tree').on(
        'tree.move',
        function(event)
        {
            event.preventDefault();
            // do the move first, and _then_ POST back.
            event.move_info.do_move();
            let move_id = event.move_info.moved_node.id;
            let target_id =event.move_info.target_node.id;

            $.ajax({
                type:'POST',
                url : changecat,
                data:{
                    _token : csrf_token,
                    cat_id : move_id,
                    parent_id : target_id
                },
                sucess:function(data){
                    console.log(data);
                }
            });
            console.log($(this).tree('toJson'));
        }
    );
});
$('.add-attr-btn').on('click' , function(){
    console.log('ywes000');
    $('#attrs').append(`<div class="row p-4">
    <div class="col-md-10">
        <label for="attrname">نام مشخصه</label>
        <input type="text" id="attrname" class="form-control" name="attrname[]">
    </div>
    <div class="col-md-2">
        <label for="delete">عملیات</label>
        <button class="btn btn-danger delete-btn" type="button" id="delete">حذف</button>
    </div>
</div>`);
});
$(document).on('click' , '.delete-btn' , function(){
    $(this).closest('.row').remove();
});