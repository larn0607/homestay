<?php 
    $r = new Rooms();
    if(isset($_POST['check_room_btn']))
    {
        $lst = $r->db_get_list_rooms_stt();
        var_dump($lst);
    }

?>

<section class="light">
    <div class="inner-width">
        <h1 class="section-title">Phòng</h1>
        <div class="feature-rooms">
            <div class="feature-room" id="result">
                <?php foreach($lst as $row){
                ?>
                        <div class="room">
                            <div class="img-container">
                                <img src="./Uploads/<?php echo $row['image'] ?>" alt="">
                                <div class="price-top">
                                    <h5><?php echo number_format($row['price']) ?></h5>
                                    <p>/đêm</p>
                                </div>
                                <a href="<?php echo $r->h->get_url('homestay/?m=rooms&a=room_detail&id=' . $row['room_id']) ?>" class="room-link room-btn">Chi tiết</a>
                                <p class="room-info"><?php echo $row['room_name'] ?></p>
                            </div>
                        </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>