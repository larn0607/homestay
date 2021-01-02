$(document).ready(function (){
    $('.delete_rooms').click(function(e){
        e.preventDefault();
        var r_id = $(this).closest('tr').find('.room_id').text();
        $('#dlt_rooms').val(r_id);
    });
    
    $('.delete_booking').click(function(e){
        e.preventDefault();
        var b_id = $(this).closest('tr').find('.booking_id').text();
        $('#dlt_booking').val(b_id);
    });

    $('.delete_ad').click(function(e){
        e.preventDefault();
        var a_id = $(this).closest('tr').find('.ad_id').text();
        $('#dlt_ad').val(a_id);
    });
    $('.delete_user').click(function(e){
        e.preventDefault();
        var u_id = $(this).closest('tr').find('.user_id').text();
        $('#dlt_user').val(u_id);
    });
});