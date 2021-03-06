<?php
$user = new Users();
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $row = $user->db_get_list_users_by_id($id);
    $data = [
        'user_id' => $id,
        'username' => $user->h->input_post('username'),
        'password' => $user->h->input_post('password'),
        'full_name' => $user->h->input_post('full_name'),
        'email' => $user->h->input_post('email'),
        'phone' => $user->h->input_post('phone'),
    ];
    if($user->h->is_submit('edit_users') && $user->db_update_users($data)){
        $user->h->redirect($user->h->get_url('homestay/admin/?m=users&a=list'));
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
                                <input type="password" name="password"  class="form-control border-dark" required>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Họ và tên</label>
                                <input type="text" name="full_name" value="<?php echo $row['full_name']; ?>" class="form-control border-dark" required>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control border-dark" required>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control border-dark" required>
                            </div>
                            <!-- <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Loại tài khoản</label>
                                <select name="usertype" class="form-control-sm border-dark">
                                    <option class="selected" value="<?php echo $row['usertype']; ?>"><?php echo ($row['usertype'] == 1) ? 'Quản trị' : 'Nhân viên' ?></option>
                                    <option value="1">Quản trị</option>
                                    <option value="0">Nhân viên</option>  
                                </select>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-footer bg-light border-dark">
                        <input type="hidden" name="request_name" value="edit_users">
                        <input class="btn btn-dark" type="submit" value="Lưu">
                        <a class="btn btn-dark" href="<?php echo $user->h->get_url('homestay/admin/?m=users&a=list'); ?>">Trở Về</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once('Layouts/footer.php') ?>
    <?php include_once('Layouts/script.php') ?>
</div>