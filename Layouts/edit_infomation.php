<?php 
    $user = new Users();
    if(isset($_GET['user_id']))
    {
        $id = $_GET['user_id'];
        $row = $user->db_get_list_users_by_id($id);
        $data = [
            'user_id' => $id,
            'full_name' => $user->h->input_post('full_name'),
            'email' => $user->h->input_post('email'),
            'phone' => $user->h->input_post('phone')
        ];
        if($user->h->is_submit('edit_infomation') && $user->db_update_info_users($data)){
            echo '<script type="text/javascript">alert("Thành công")</script>';
            $user->h->redirect($user->h->get_url('homestay/?m=infomation&a=user_infomation'));
        }
    }
?>


<div class="inner-width">
    <form class="form-infomation" method="post">
        <h2>Cập nhật thông tin cá nhân</h2>
        <div>
            <label for="">Họ và tên</label>
            <input type="text" name="full_name" value="<?php echo $row['full_name']?>" required>
        </div>
        <div>
            <label for="">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']?>" required>
        </div>
        <div>
            <label for="">Số điện thoại</label>
            <input type="text" name="phone" value="<?php echo $row['phone']?>" required>
        </div>
        <input type="hidden" name="request_name" value="edit_infomation">
        <input type="submit" value="Hoàn tất">
    </form>
</div>