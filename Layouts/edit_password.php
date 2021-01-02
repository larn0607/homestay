<?php 
    $user = new Users();
    if(isset($_GET['user_id']))
    {
        $id = $_GET['user_id'];
        $row = $user->db_get_list_users_by_id($id);
        $data = [
            'user_id' => $id,
            'vpassword' => $user->h->input_post('vpassword'),
            'password' => $user->h->input_post('password'),
            'cpassword' => $user->h->input_post('cpassword')
        ];
        $vpassword = $user->h->input_post('vpassword');
        $npassword = $user->h->input_post('password');
        $cpassword = $user->h->input_post('cpassword');
        if($vpassword && $npassword && $cpassword)
        {
            if($vpassword == $row['password'])
            {
                if($npassword === $cpassword)
                {
                    if($user->h->is_submit('edit_password') && $user->db_update_password($data)){
                        $user->h->redirect($user->h->get_url('homestay/?m=infomation&a=user_infomation'));
                    }
                    else{
                        echo '<script type="text/javascript">alert("Cập nhật mật khẩu thất bại, vui lòng thực hiện lại")</script>';
                     }
                }
                else
                {
                    echo '<script type="text/javascript">alert("Mật khẩu và xác nhận mật khẩu không trùng khớp, vui lòng thực hiện lại")</script>';
                }
            }
            else
            {
                echo '<script type="text/javascript">alert("Mật khẩu cũ không đúng, vui lòng thực hiện lại")</script>';
            }
        }
    }
?>

<section class="light">
    <div class="inner-width">
        <form class="form-infomation" method="post">
            <h2>Cập nhật mật khẩu</h2>
            <div>
                <label for="">Mật khẩu cũ: </label>
                <input type="password" name="vpassword" required>
            </div>
            <div>
                <label for="">Mật khẩu mới:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label for="">Xác nhận mật khẩu:</label>
                <input type="password" name="cpassword" required>
            </div>
            <input type="hidden" name="request_name" value="edit_password">
            <input type="submit" value="Hoàn tất">
        </form>
    </div>
</section>
