<?php
$b = new Booking();
$success = "";
if(isset($_POST['add_booking']))
{
    $data = [
        'room_id' => $b->h->input_post('room_id'),
        'check_in' => $b->h->input_post('check_in'),
        'check_out' => $b->h->input_post('check_out'),
        'full_name' => $b->h->input_post('full_name'),
        'email' => $b->h->input_post('email'),
        'phone' => $b->h->input_post('phone')
    ];
    if($b->db_insert_booking($data))
    {
       $success = "Thêm thành công";
    }
    else
    {
        $success = "Something wrong!";
    }
}
?>