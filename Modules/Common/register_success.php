<title>Trang Login hệ thống</title>
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
      min-height:250px;
      box-shadow: 0 0 10px #ccc;
  }
  .box img{
      width: 250px;
      display: block;
      margin: 10px auto;
  }
  .box .sc{
      box-sizing: border-box;
  }
  .sc p{
      text-align: center;
      padding: 15px 0;
      font-size: 20px;
      font-weight: bold;
  }
  .btn-return{
      width: 50%;
      border: 1px solid;
      background: #F15E2C;
      border-radius:20px;
      color: #f7f7f7;
      cursor: pointer;
      display: block;
      text-align: center;
      margin: 20px auto;
      font-weight: 600;
      outline: none;
      transition: .3s;
      padding: 10px;
  }
  .btn-return:hover{
      color: #f7f7f7;
      background: #000;
  }
</style>
<div class="lg_form">
  <div class="box">
    <div class="lg_logo">
        <img src="./Public/Images/logo.png" alt="">
    </div>
    <div class ="sc">
        <p>Đăng ký thành công, vui lòng đăng nhập lại</p>
        <a href="?m=common&a=login" class="btn-return">Quay lại phần đăng nhập</a>
    </div>
  </div>
</div>