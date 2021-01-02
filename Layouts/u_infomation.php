<?php 
    $user = new Users();
    if(isset($_SESSION['user_token']))
    {
        $ut = $_SESSION['user_token'];
        $id = $ut['user_id'];
        $row = $user->db_get_list_users_by_id($id);
    }
?>
<div class="u_i">
    <h2>Thông tin cá nhân</h2>
    <div class="u_f">
        <span>Họ và tên: <?php echo $row['full_name'] ?></span>
        <a href="<?php echo $user->h->get_url('homestay/?m=infomation&a=edit_infomation&user_id=' . $row['user_id']); ?>">Chỉnh sửa</a>
    </div>
    <div class="u_f">
        <span>Email: <?php echo $row['email'] ?></span>
        <a href="<?php echo $user->h->get_url('homestay/?m=infomation&a=edit_infomation&user_id=' . $row['user_id']); ?>">Chỉnh sửa</a>
    </div>
    <div class="u_f">
        <span>Số điện thoại: <?php echo $row['phone'] ?></span>
        <a href="<?php echo $user->h->get_url('homestay/?m=infomation&a=edit_infomation&user_id=' . $row['user_id']); ?>">Chỉnh sửa</a>
    </div>
    <!-- <div class="u_f">
        <span>Mật khẩu: *******</span>
        <a href="<?php //echo $user->h->get_url('homestay/?m=infomation&a=edit_password&user_id=' . $row['user_id']); ?>">Chỉnh sửa</a>
    </div> -->
</div>