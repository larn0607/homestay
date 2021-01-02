<?php
$user_ad = new UsersAdmin();
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $row = $user_ad->db_get_list_users_by_id($id);
    $data = [
        'user_id' => $id,
        'username' => $user_ad->h->input_post('username'),
        'password' => $user_ad->h->input_post('password'),
        'fullname' => $user_ad->h->input_post('fullname'),
        'email' => $user_ad->h->input_post('email'),
        'usertype' => $user_ad->h->input_post('usertype'),
    ];
    if($user_ad->h->is_submit('edit_ad') && $user_ad->db_update_users($data)){
        $user_ad->h->redirect($user_ad->h->get_url('homestay/admin/?m=users&a=list'));
    }
}

?>
<?php include_once('Layouts/header.php') ?>
<?php include_once('Layouts/navbar.php')?>
<?php include_once('Layouts/topbar.php')?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="" method="post" id="main-form" enctype="multipart/form-data">
                <div class="card border-dark">
                    <div class="card-header bg-light text-dark">
                        <h3>Sửa chi tiết phòng</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Tên tài khoản</label>
                                <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control border-dark" readonly>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="password"  class="form-control border-dark">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Họ và tên</label>
                                <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" class="form-control border-dark">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control border-dark">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Loại tài khoản</label>
                                <select name="usertype" class="form-control-sm border-dark">
                                    <option class="selected" value="<?php echo $row['usertype']; ?>"><?php echo ($row['usertype'] == 1) ? 'Quản trị' : 'Nhân viên' ?></option>
                                    <option value="1">Quản trị</option>
                                    <option value="0">Nhân viên</option>  
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light border-dark">
                        <input type="hidden" name="request_name" value="edit_ad">
                        <input class="btn btn-dark" type="submit" value="Lưu">
                        <a class="btn btn-dark" href="<?php echo $user_ad->h->get_url('homestay/admin/?m=usersadmin&a=list'); ?>">Trở Về</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once('Layouts/footer.php') ?>
    <?php include_once('Layouts/script.php') ?>
</div>