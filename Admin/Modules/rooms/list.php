<?php include_once('Layouts/header.php') ?>
<?php include_once('Layouts/navbar.php')?>
<?php include_once('Layouts/topbar.php')?>
<?php include 'add.php'?>
<?php include 'delete.php'?>
<?php
$r = new Rooms();
$paging_html = "";
$lst = $r->db_get_list_rooms();
?>
<!-- add room -->
<div class="modal fade" id="addListRooms" tabindex="-1" aria-labelledby="addRoomLabel" aria-hidden="true">
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
                            <label>Tên phòng</label>
                            <input type="text" name="room_name" class="form-control" placeholder="Nhập tên phòng">
                        </div>
                        <div class="form-group">
                            <label>Số lượng phòng</label>
                            <select name="qlt_room">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Số lượng giường</label>
                            <select name="qlt_bed">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại giường</label>
                            <select name="bed_type">
                                <option value="Đơn">Đơn</option>
                                <option value="Đôi">Đôi</option>
                                <option value="Tầng">Tầng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" rows="5" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Cơ sở vật chất</label>
                            <textarea class="form-control" rows="5" name="facility"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Giá phòng</label>
                            <input type="text" name="price" class="form-control" placeholder="Nhập giá">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input class="btn btn-dark" type="submit" name="add_rooms" value="Lưu">
                    <!-- <button type="button" class="btn btn-secondary" name="add_rooms">Thêm</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end add room -->
<!-- delete room -->
<div class="modal fade" id="deleteRooms" tabindex="-1" aria-labelledby="deleteRoomLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoomLabel">Xoá dữ liệu phòng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" id="dlt_rooms" name="room_id">
                    <h4>Bạn có chắc chắn xoá phòng này không?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <input class="btn btn-dark" type="submit" name="delete_rooms" value="Lưu">
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
                    <h4><b>Danh sách phòng</b></h4>
                </div>
                <div class="card-body">
                    <div>
                        <a href="" class="btn btn-dark btn-ml" data-toggle="modal" data-target="#addListRooms">Thêm mới</a>
                        <!-- btn btn-dark btn-ml  -->
                    </div>
                    <table class="table table-bordered mt-3">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Tên phòng</th>
                                <th>Số lượng phòng</th>
                                <th>Số lượng giường</th>
                                <th>Loại giường</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($lst as $row)
                                {
                            ?>
                                <tr class="text-center">
                                    <td class="room_id"><?php echo $row['room_id'] ?></td>
                                    <td><?php echo $row['room_name'] ?></td>
                                    <td><?php echo $row['qlt_room'] ?></td>
                                    <td><?php echo $row['qlt_bed'] ?></td>
                                    <td><?php echo $row['bed_type'] ?></td>
                                    <td><img src="../Uploads/<?php echo $row['image'] ?>" alt="" height="250px" width="250px"></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td>
                                        <a href="<?php echo $row['status'] == 1 ? $r->h->get_url('homestay/admin/?m=rooms&a=update_status&id=' . $row['room_id'] .'&stt=0') : $r->h->get_url('homestay/admin/?m=rooms&a=update_status&id=' . $row['room_id'] .'&stt=1') ?>">
                                            <span class="badge badge-<?php echo $row['status'] == 1 ? 'success':'danger'?>"><?php echo $row['status'] == 1 ? 'Còn phòng':'Hết phòng'?></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo $r->h->get_url('homestay/admin/?m=rooms&a=edit&room_id=' . $row['room_id']); ?>" class="btn btn-outline-dark border-0" ><span class="fas fa-edit fs-25"></span></a>
                                        <a href="" class="btn btn-outline-dark border-0 delete_rooms" data-toggle="modal" data-target="#deleteRooms"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            // echo $paging_html;
            ?>
        </div>
    </div>
    <?php include_once('Layouts/footer.php') ?>
    <?php include_once('Layouts/script.php') ?>
</div>