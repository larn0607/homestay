<?php
$user_ad = new UsersAdmin();
$success = "";
if(isset($_POST['delete_ad']))
{
    $id = $_POST['ad_id'];
    $data = [
        'ad_id' => $id
    ];
    if($user_ad->db_delete_users($data))
    {
       $success = "Xoá thành công";
    }
    else
    {
        $success = "Something wrong!";
    }
}
?>

