<?php include_once('Layouts/header.php') ?>
<?php include_once('Layouts/navbar.php')?>
<?php include_once('Layouts/topbar.php')?>
<?php include 'add.php'?>
<?php include 'delete.php'?>
<?php
    $user = new Users();
    $paging_html = "";
    $lst = $user->db_get_list_users_paging($paging_html);
?>
<!-- add room -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addRoomLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoomLabel">Thêm phòng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Tên tài khoản</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input class="btn btn-dark" type="submit" name="add_users" value="Lưu">
                    <!-- <button type="button" class="btn btn-secondary" name="add_rooms">Thêm</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end add room -->
<!-- delete room -->
<div class="modal fade" id="deleteUsers" tabindex="-1" aria-labelledby="deleteRoomLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoomLabel">Xoá</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" id="dlt_user" name="user_id">
                    <h4>Bạn có chắc chắn xoá không?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <input class="btn btn-dark" type="submit" name="delete_user" value="Lưu">
                    <!-- <button type="button" class="btn btn-secondary" name="add_rooms">Thêm</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end delete room -->
<h5 class="text-center text-dark message"><?php echo $success ?></h5>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card border-secondary">
                <div class="card-header text-dark bg-light">
                    <h4><b>Danh sách tài khoản</b></h4>
                </div>
                <div class="card-body">
                    <div>
                        <a href="?=common&a=admin&page=cat-add" class="btn btn-dark btn-ml" data-toggle="modal" data-target="#addUser">Thêm mới</a>
                        <!-- btn btn-dark btn-ml  -->
                    </div>
                    <table class="table table-bordered mt-3">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Tên tài khoản</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($lst as $row)
                                {
                            ?>
                            <tr class="text-center">
                                <td class="user_id"><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['full_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['dateCreated']; ?></td>
                                <td>
                                    <a href="<?php echo $user->h->get_url('homestay/admin/?m=users&a=edit&id=' . $row['user_id']); ?>" class="btn btn-outline-dark border-0" ><span class="fas fa-edit fs-25"></span></a>
                                    <a href="" class="btn btn-outline-dark border-0 delete_user" data-toggle="modal" data-target="#deleteUsers"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            echo $paging_html;
            ?>
        </div>
    </div>
    <?php include_once('Layouts/footer.php') ?>
    <?php include_once('Layouts/script.php') ?>
</div>