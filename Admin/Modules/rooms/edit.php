<?php
$r = new Rooms();
$image = "";
$r->h->upload_file('image', $image);
if(isset($_GET['room_id']))
{
    $id = $_GET['room_id'];
    $row = $r->db_get_list_rooms_by_id($id);
    $data = [
        'room_id' => $id,
        'room_name' => $r->h->input_post('room_name'),
        'qlt_room' => $r->h->input_post('qlt_room'),
        'qlt_bed' => $r->h->input_post('qlt_bed'),
        'bed_type' => $r->h->input_post('bed_type'),
        'description' => $r->h->input_post('description'),
        'facility' => $r->h->input_post('facility'),
        'price' => $r->h->input_post('price'),
        'image' => $image
    ];
    if($r->h->is_submit('edit_rooms') && $r->db_update_rooms($data)){
        $r->h->redirect($r->h->get_url('homestay/admin/?m=rooms&a=list'));
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
                                <label>Tên phòng</label>
                                <input type="text" name="room_name" value="<?php echo $row['room_name']; ?>" class="form-control border-dark">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Số lượng phòng</label>
                                <select name="qlt_room">
                                    <option value="<?php echo $row['qlt_room']; ?>"><?php echo $row['qlt_room']; ?></option>
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
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Số lượng giường</label>
                                <select name="qlt_bed">
                                    <option value="<?php echo $row['qlt_bed']; ?>"><?php echo $row['qlt_bed']; ?></option>
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
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Loại giường</label>
                                <select name="bed_type">
                                    <option value="<?php echo $row['bed_type']; ?>"><?php echo $row['bed_type']; ?></option>
                                    <option value="Đơn">Đơn</option>
                                    <option value="Đôi">Đôi</option>
                                </select>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Tên phòng</label>
                                <input type="file" name="image" value="<?php echo $row['image']; ?>" class="form-control border-dark">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="5" name="description"><?php echo $row['description']; ?></textarea>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Cơ sở vật chất</label>
                                <textarea class="form-control" rows="5" name="facility"><?php echo $row['facility']; ?></textarea>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                            <label>Giá</label>
                            <input type="text" name="price" class="form-control" placeholder="Nhập giá" value="<?php echo $row['price']; ?>">
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-footer bg-light border-dark">
                        <input type="hidden" name="request_name" value="edit_rooms">
                        <input class="btn btn-dark" type="submit" value="Lưu">
                        <a class="btn btn-dark" href="<?php echo $r->h->get_url('homestay/admin/?m=rooms&a=list'); ?>">Trở Về</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once('Layouts/footer.php') ?>
    <?php include_once('Layouts/script.php') ?>
</div>