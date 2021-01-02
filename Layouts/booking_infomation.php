<?php 
    $b = new Booking();
    $r = new Rooms();
    $user = new Users();
    if(empty($_SESSION['user_token']))
    {
      $user->h->redirect($user->h->get_url('homestay/?m=common&a=login'));
    }
    if(isset($_GET['room_id']))
    {
        $utoken = $_SESSION['user_token'];
        $uid = $utoken['user_id'];
        $id = $_GET['room_id'];
        $data = [
            'room_id' => $id,
            'user_id' => $uid,
            'check_in' => $b->h->input_post('check_in'),
            'check_out' => $b->h->input_post('check_out'),
        ];
        if($b->h->is_submit('bookinginfo_add') && $b->db_insert_booking($data)){
            $b->h->redirect($b->h->get_url('homestay/?m=common&a=success'));
        }
        $row = $user->db_get_list_users_by_id($uid);
    }
?>
<div class="inner-width">
    <form class="form-infomation" method="post">
        <h2>thông tin cá nhân</h2>
        <!-- <div>
            <label for="">Họ và tên</label>
            <input type="text" name="full_name" required>
        </div>
        <div>
            <label for="">Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="">Số điện thoại</label>
            <input type="text" name="phone" required>
        </div> -->
        <span style="font-size: 20px; margin-bottom: 20px;">Họ và tên: <?php echo $row['full_name'] ?><br>Email: <?php echo $row['email'] ?><br>Số điện thoại <?php echo $row['phone'] ?></span>
        <div>
            <label for="">Ngày nhận phòng:</label>
            <input type="text" name="check_in" class="cin" required>
        </div>
        <div>
            <label for="">Ngày trả phòng:</label>
            <input type="text" name="check_out" class="cout" required>
        </div>
        <input type="hidden" name="request_name" value="bookinginfo_add">
        <input type="submit" value="Hoàn tất">
    </form>
</div>