<?php 
    $user = new Users();
    if(isset($_SESSION['user_token']))
    {
        $ut = $_SESSION['user_token'];
        $id = $ut['user_id'];
        $row = $user->db_get_list_users_by_id($id);
    }
?>
<div class="u_navbar">
    <a href="?m=infomation&a=user_infomation">Thông tin cá nhân</a>
    <a href="<?php echo $user->h->get_url('homestay/?m=infomation&a=edit_password&user_id=' . $row['user_id']); ?>">Đổi mật khẩu</a>
    <a href="?m=infomation&a=user_booking">Thông tin đặt phòng</a>
</div>