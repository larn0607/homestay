<?php 
    $user_ad = new UsersAdmin();
    $success = "";
    if(isset($_POST['add_ad']))
    {
        $data = [
            'username' =>$user_ad->h->input_post('username'),
            'password' =>$user_ad->h->input_post('password'),
            'fullname' =>$user_ad->h->input_post('fullname'),
            'email' =>$user_ad->h->input_post('email'),
            'usertype' =>$user_ad->h->input_post('usertype')
        ];
        if($user_ad->db_insert_users($data))
        {
           $success = "Thêm thành công";
        }
        else
        {
            $success = "Something wrong!";
        }
    }   
?>