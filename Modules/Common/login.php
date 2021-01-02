<title>Login</title>
<?php
$error = array();
$user = new Users();
if(isset($_POST['btnUsersLogin']))
{
  $data = [
    'username' => $user->h->input_post('username'),
    'password' => $user->h->input_post('password'),
 ];
 $username = $user->h->input_post('username');
 $password = $user->h->input_post('password');
 if(isset($username) && isset($password))
 {
  $get_username = $user->db_get_user_by_username($username);

  if (empty($get_username))
      $error['username'] = 'Tên đăng nhập không đúng';
    else {
      if ($get_username['password'] != ($password))  // đã xóa md5 trước password
      {
        $error['password'] = 'Mật khẩu bạn nhập không đúng';
      }
    }
    if(empty($error))
    {
        $user->r->set_login($get_username['username'], $get_username['user_id']);
        $user->h->redirect($user->h->get_url('homestay'));
    }
 }
 else
 {
    $user->h->redirect($user->h->get_url('homestay'));
 }
}
?>
<style>
  .lg_form{
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-color: #f7f7f7;
  }
  .box{
      background-color: #fff;
      min-width: 500px;
      min-height:340px;
      box-shadow: 0 0 10px #ccc;
  }
  .box img{
      width: 250px;
      display: block;
      margin: 10px auto;
  }
  .box form{
      padding: 0 40px;
      box-sizing: border-box;
  }
  form .ip_field{
      position: relative;
      border-bottom: 2px solid #adadad;
      margin: 25px 0;
  }
  .ip_field input{
      width: 100%;
      padding: 0 5px;
      height: 40px;
      font-size:16px;
      border: none;
      background: none;
      outline: none;
  }
  .ip_field label{
      position: absolute;
      top: 50%;
      left: 5px;
      color: #adadad;
      transform: translateY(-50%);
      font-size: 16px;
      font-weight: 600;
      pointer-events: none;
      transition: .5s;
  }
  .ip_field span::before{
      content: '';
      position: absolute;
      top: 40px;
      left: 0;
      width: 0;
      height: 2px;
      background-color: #F15E2C;
      transition: .5s;
  }
  .ip_field input:focus ~ label,
  .ip_field input:valid ~ label{
      top: -5px;
      color: #000;
  }
  .ip_field input:focus ~ span::before{
      width: 100%;
  }

  input[type="submit"]{
      width: 100%;
      height: 40px;
      border: 1px solid;
      background: #F15E2C;
      border-radius:20px;
      color: #f7f7f7;
      cursor: pointer;
      margin: 20px 0;
      font-weight: 600;
      outline: none;
      transition: .3s;
  }
  input[type="submit"]:hover{
      color: #f7f7f7;
      background: #000;
  }
</style>
<div class="lg_form">
  <div class="box">
    <div class="lg_logo">
        <img src="./Public/Images/logo.png" alt="">
    </div>
    <form action="" method="post" >
        <div class="ip_field">
            <input type="text" name="username" autofocus required>
            <span></span>
            <label>Tên tài khoản</label>
        </div>
        <?php $user->h->show_error($error, 'username'); ?>
        <div class="ip_field">  
            <input type="password" name="password" required  >
            <span></span>
            <label>Mật khẩu</label>
        </div>
        <?php $user->h->show_error($error, 'password'); ?> 
        <div>Bạn chưa có tài khoản?<a href="?m=common&a=register">Đăng ký tại đây</a></div>   
        <input type="hidden" name="request_name" value="login">      
        <input type="submit" name="btnUsersLogin" value="Login">
    </form>
  </div>
</div>