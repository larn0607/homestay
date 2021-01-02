<?php 
    $user = new Users();
    $success = "";
    if(isset($_POST['add_users']))
    {
        $data = [
            'username' =>$user->h->input_post('username'),
            'password' =>$user->h->input_post('password'),
            'full_name' =>$user->h->input_post('full_name'),
            'email' =>$user->h->input_post('email'),
            'phone' =>$user->h->input_post('phone')
        ];
        if($user->db_insert_users($data))
        {
           $success = "Thêm thành công";
        }
        else
        {
            $success = "Something wrong!";
        }
    }   
?>