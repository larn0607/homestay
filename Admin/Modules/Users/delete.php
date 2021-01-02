<?php
$user = new Users();
$success = "";
if(isset($_POST['delete_user']))
{
    $id = $_POST['user_id'];
    $data = [
        'user_id' => $id
    ];
    if($user->db_delete_users($data))
    {
       $success = "Xoá thành công";
    }
    else
    {
        $success = "Something wrong!";
    }
}
?>

