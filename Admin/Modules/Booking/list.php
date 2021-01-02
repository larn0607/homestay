<?php include_once('Layouts/header.php') ?>
<?php include_once('Layouts/navbar.php')?>
<?php include_once('Layouts/topbar.php')?>
<?php include('add.php')?>
<?php include('delete.php')?>
<?php
    $r = new Rooms();
    $b = new Booking();
    $user = new Users();
    $paging_html = "";
    $result;
    $lst = $b->db_get_list_booking_paging($paging_html);
?>
<!-- add room -->
<div class="modal fade" id="addBookingRoom" tabindex="-1" aria-labelledby="addRoomLabel" aria-hidden="true">
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
                            <label>Họ và tên</label>
                            <input type="text" name="full_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tên phòng</label>
                            <select name="room_id" class="form-control-sm border-dark">
                                <option class="selected">Chọn phòng</option>
                                <?php 
                                    $lst_r = $r->db_get_list_rooms();
                                    foreach ($lst_r as $row_r){
                                ?>
                                <option value="<?php echo $row_r['room_id']?>">
                                        <?php echo $row_r['room_name']?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ngày nhận phòng</label>
                            <input type="date" name="check_in" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Ngày trả phòng</label>
                            <input type="date" name="check_out" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input class="btn btn-dark" type="submit" name="add_booking" value="Lưu">
                    <!-- <button type="button" class="btn btn-secondary" name="add_rooms">Thêm</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end add booking -->
<!-- delete booking -->
<div class="modal fade" id="deleteBooking" tabindex="-1" aria-labelledby="deleteRoomLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoomLabel">Xoá dữ liệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" id="dlt_booking" name="booking_id">
                    <h4>Bạn có chắc chắn xoá phòng đã được đặt này không?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <input class="btn btn-dark" type="submit" name="delete_booking" value="Lưu">
                    <!-- <button type="button" class="btn btn-secondary" name="add_rooms">Thêm</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end delete booking -->
<h5 class="text-center text-dark message"><?php echo $success ?></h5>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card border-secondary">
                <div class="card-header text-dark bg-light">
                    <h4><b>Danh sách đặt phòng</b></h4>
                </div>
                <div class="card-body">
                    <div>
                        <!-- <a href="" class="btn btn-dark btn-ml" data-toggle="modal" data-target="#addBookingRoom">Thêm mới</a> -->
                        <!-- btn btn-dark btn-ml  -->
                    </div>
                    <table class="table table-bordered mt-3">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Tên tài khoản</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Tên phòng</th>
                                <th>Ngày vào phòng</th>
                                <th>Ngày trả phòng</th>
                                <th>Tình trạng phòng</th>
                                <!-- <th>Tình trạng đặt phòng</th> -->
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($lst as $row)
                                {
                                    $get_co = $b->db_get_check_out();
                                    $get_cr = $b->get_cr();
                                    $row_room = $r->db_get_list_rooms_by_id($row['room_id']);
                                    $row_user = $user->db_get_list_users_by_id($row['user_id']);
                            ?>
                            <tr class="text-center">
                                <td class="booking_id"><?php echo $row['booking_id'] ?></td>
                                <td><?php echo $row_user['user_id'] ?></td>
                                <td><?php echo $row_user['username'] ?></td>
                                <td><?php echo $row_user['full_name'] ?></td>
                                <td><?php echo $row_user['email'] ?></td>
                                <td><?php echo $row_user['phone'] ?></td>
                                <td><?php echo $row_room['room_name'] ?></td>
                                <td><?php echo $row['check_in'] ?></td>
                                <td><?php echo $row['check_out'] ?></td>
                                <td>
                                    <?php
                                        if($row['booking_status'] == 2){
                                    ?>
                                    <a href="<?php echo $b->h->get_url('homestay/admin/?m=booking&a=update_booking_status&id=' . $row['booking_id'] .'&stt=1'); ?>">
                                        <span class="badge badge-success">
                                            Đã được đặt
                                        </span>
                                    </a>
                                    <?php
                                        }
                                        elseif($row['booking_status'] == 1){
                                    ?>
                                    <a href="<?php echo $b->h->get_url('homestay/admin/?m=booking&a=update_booking_status&id=' . $row['booking_id'] .'&stt=0'); ?>">
                                        <span class="badge badge-warning">
                                            Đã trả phòng
                                        </span>
                                    </a>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <a href="<?php echo $b->h->get_url('homestay/admin/?m=booking&a=update_booking_status&id=' . $row['booking_id'] .'&stt=2'); ?>">
                                        <span class="badge badge-danger">
                                            Đã huỷ
                                        </span>
                                    </a>
                                    <?php }?>
                                </td>
                                <!-- <td>
                                    <?php
                                        //if($row['check_stt'] == 0){
                                    ?>
                                    <a href="<?php //echo $b->h->get_url('homestay/admin/?m=booking&a=update_check_status&book_id=' . $row['booking_id'] .'&check_stt=1'); ?>">
                                        <span class="badge badge-danger">
                                            Chưa nhận phòng
                                        </span>
                                    </a>
                                    <?php
                                        //}
                                        //else{
                                    ?>
                                    <a href="<?php //echo $b->h->get_url('homestay/admin/?m=booking&a=update_check_status&book_id=' . $row['booking_id'] .'&check_stt=0'); ?>">
                                        <span class="badge badge-success">
                                            Đã nhận phòng
                                        </span>
                                    </a>
                                    <?php //}?>
                                </td> -->
                                <th>
                                    <a href="<?php //echo $b->h->get_url('homestay/admin/?m=booking&a=edit&id=' . $row['booking_id']); ?>" class="btn btn-outline-dark border-0" ><span class="fas fa-edit fs-25"></span></a>
                                    <a href="" class="btn btn-outline-dark border-0 delete_booking" data-toggle="modal" data-target="#deleteBooking"><i class="fas fa-trash"></i></a>
                                </th>
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