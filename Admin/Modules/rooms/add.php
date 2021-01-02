<?php
$r = new Rooms();
$image = "";
$success = "";
$r->h->upload_file('image', $image);
if(isset($_POST['add_rooms']))
{
    $data = [
        'room_name' => $r->h->input_post('room_name'),
        'qlt_room' => $r->h->input_post('qlt_room'),
        'qlt_bed' => $r->h->input_post('qlt_bed'),
        'bed_type' => $r->h->input_post('bed_type'),
        'description' => $r->h->input_post('description'),
        'facility' => $r->h->input_post('facility'),
        'price' => $r->h->input_post('price'),
        'image' => $image
    ];
    if($r->db_insert_rooms($data))
    {
       $success = "Thêm thành công";
    }
    else
    {
        $success = "Something wrong!";
    }
}
?>