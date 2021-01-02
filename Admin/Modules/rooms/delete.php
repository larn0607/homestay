<?php
$r = new Rooms();
$success = "";
if(isset($_POST['delete_rooms']))
{
    $id = $_POST['room_id'];
    $data = [
        'room_id' => $id
    ];
    if($r->db_delete_rooms($data))
    {
       $success = "Xoá thành công";
    }
    else
    {
        $success = "Something wrong!";
    }
}
?>

