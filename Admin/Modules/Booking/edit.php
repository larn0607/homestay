<?php
$b = new Booking();
$r = new Rooms();
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $row = $b->db_get_list_booking_by_id($id);
    $data = [
        'booking_id' => $id,
        'room_id' => $b->h->input_post('room_id'),
        'check_in' => $b->h->input_post('check_in'),
        'check_out' => $b->h->input_post('check_out'),
        'full_name' => $b->h->input_post('full_name'),
        'email' => $b->h->input_post('email'),
        'phone' => $b->h->input_post('phone')
    ];
    if($b->h->is_submit('edit_booking') && $b->db_update_booking($data)){
        $b->h->redirect($b->h->get_url('homestay/admin/?m=booking&a=list'));
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
                        <h3>Sửa chi tiết</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Họ và tên</label>
                                <input type="text" name="full_name" value="<?php echo $row['full_name']; ?>" class="form-control border-dark">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control border-dark">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control border-dark">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Tên phòng</label>
                                <select name="room_id" class="form-control-sm border-dark">
                                    <option class="selected" value="<?php echo $row['room_id']; ?>"><?php echo $row['room_name']; ?></option>
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
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Ngày đặt phòng</label>
                                <input type="date" name="check_in" value="<?php echo $row['check_in']; ?>" class="form-control border-dark">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 form-group">
                                <label>Ngày trả phòng</label>
                                <input type="date" name="check_out" value="<?php echo $row['check_out']; ?>" class="form-control border-dark">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light border-dark">
                        <input type="hidden" name="request_name" value="edit_booking">
                        <input class="btn btn-dark" type="submit" value="Lưu">
                        <a class="btn btn-dark" href="<?php echo $b->h->get_url('homestay/admin/?m=booking&a=list'); ?>">Trở Về</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once('Layouts/footer.php') ?>
    <?php include_once('Layouts/script.php') ?>
</div>