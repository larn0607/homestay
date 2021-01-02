<!-- navbar -->
<?php 
    $user = new Users();
    $u = new UsersAdmin();
?>
<nav class="navbar">
        <div class="inner-width">
            <div class="logo"><a href=""><img src="./Public/Images/logo.png" alt=""></a></div>
            <ul class="menu">
                <li><a href="">Trang chủ</a></li>
                <li><a href="?m=rooms&a=list_rooms">Phòng</a>
                </li>
                <li>
                    <?php
                        if($user->r->session_user_logged()){
                    ?>
                        <a href="?m=infomation&a=user_infomation">Xin chào <?php echo $user->r->get_current_username()?></a>
                        <a href="?m=common&a=logout">Đăng xuất</a>
                    <?php }else{?>
                        <li><a href="?m=common&a=login">Đăng nhập</a>
                        <li><a href="?m=common&a=register">Đăng ký</a>
                    <?php }?>
                </li>
            </ul>
            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </nav>