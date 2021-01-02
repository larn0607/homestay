<title>Đăng ký tài khoản</title>
<?php
$error = array();
$user = new Users();
if(isset($_POST['btnRegister']))
{
  $data = [
    'username' => $user->h->input_post('username'),
    'password' => $user->h->input_post('password'),
    'cpassword' => $user->h->input_post('cpassword'),
    'full_name' => $user->h->input_post('full_name'),
    'email' => $user->h->input_post('email'),
    'phone' => $user->h->input_post('phone')
 ];
 $password = $user->h->input_post('password');
 $cpassword = $user->h->input_post('cpassword');
 if($password === $cpassword)
 {
     if($user->h->is_submit('register') && $user->db_insert_users($data))
     {
         $user->h->redirect($user->h->get_url('homestay/?m=common&a=register_success'));
     }
     else{
        echo '<script type="text/javascript">alert("Đăng ký thất bại, vui lòng thực hiện lại")</script>';
     }
 }
 else{
    echo '<script type="text/javascript">alert("Mật khẩu và xác nhận mật khẩu không trùng khớp, vui lòng thực hiện lại")</script>';
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
    <form action="" method="post" id="register">
        <div class="ip_field">
            <input type="text" name="username" autofocus required>
            <span></span>
            <label>Tên tài khoản</label>
        </div>
        <div class="ip_field">  
            <input type="password" name="password" required>
            <span></span>
            <label>Mật khẩu</label>
        </div>
        <div class="ip_field">  
            <input type="password" name="cpassword" required>
            <span></span>
            <label>Nhập lại mật khẩu</label>
        </div>
        <div class="ip_field">  
            <input type="text" name="full_name" required>
            <span></span>
            <label>Họ và tên</label>
        </div>
        <div class="ip_field">  
            <input type="email" name="email" required>
            <span></span>
            <label>Email</label>
        </div>
        <div class="ip_field">  
            <input type="text" name="phone" required>
            <span></span>
            <label>Số điện thoại</label>
        </div>
        <input type="hidden" name="request_name" value="register">      
        <input type="submit" name="btnRegister" value="Đăng ký">
    </form>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#register').validate({
        rules:{
            username:{
                required:true,
                minlength: 8
            },
            password:{
                required:true,
                minlength:6
            },  
            full_name:{
                required:true
            },
            email:{
                required:true,
                email:true
            },
            phone:{
                required:true,
                minlength:10,
                maxlength:15
            }
        },
        message:{
            username:{
                required:"&nbsp;<span style='color: red'>Bạn chưa nhập tên người dùng!</span>",
                minlength:"&nbsp;<span style='color: red'>Tên đăng nhập tối thiểu 8 ký tự!</span>"
            },
            password:{
                required:"&nbsp;<span style='color: red'>Bạn chưa nhập mật khẩu!</span>",
                minlength:"&nbsp;<span style='color: red'>Mật khẩu tối thiểu 6 ký tự!</span>"
            },
            full_name:{
                required:"&nbsp;<span style='color: red'>Bạn chưa nhập họ và tên!</span>"
            },
            email:{
                required: "&nbsp;<span style='color: red'>Bạn chưa nhập email!</span>",
                email: "&nbsp;<span style='color: red'>Không đúng định dạng email</span>"
            },
            phone:{
                required: "&nbsp;<span style='color: red'>Bạn chưa nhập số điện thoại!</span>",
                minlength: "&nbsp;<span style='color: red'>Số điện thoại ít nhất 10 số!</span>",
                maxlength: "&nbsp;<span style='color: red'>Số điện thoại nhiều nhất 15 số!</span>"
            }
        }
    });
    });
</script>