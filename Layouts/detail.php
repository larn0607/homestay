<!-- detail -->
<?php 
    $r = new Rooms();
    $facilities = explode(',',$row['facility']);
?>
<title></title>
<section class="light">
        <div class="detail">
            <div class="detail-slides">
                <div class="slides-show">
                    <img src="./Uploads/<?php echo $row['image'] ?>" alt="" class="slide">
                    <!-- <img src="./Public/Images/banner1.jpg" alt="" class="slide">
                    <img src="./Public/Images/83166717.jpg" alt="" class="slide">
                    <img src="./Public/Images/banner.jpg" alt="" class="slide"> -->
                </div>
                <!-- <div class="control">
                    <button id="prev"><i class="fas fa-chevron-left"></i></button>
                    <button id="next"><i class="fas fa-chevron-right"></i></button>
                </div> -->
            </div>
            <div class="detail-contents">
                <div class="dt detail-title"><?php echo $row['room_name'] ?></div>
                <div class="dt detail-price"><?php echo number_format($row['price']) ?> VND/đêm</div>
                <div class="dt detail-line"></div>
                <div class="dt detail-description"><?php echo $row['description'] ?></div>
                <div class="dt detail-line"></div>
                <div class="dt detail-extras">
                    <!-- <?php //foreach($fac as $row_fac){ ?>
                    <div class="detail-extra">
                        <i class="far fa-check-square"></i>
                        <span><?php //echo $row_fac?></span>
                    </div>
                    <?php //}?> -->
                    <?php for($i = 0; $i < count($facilities); $i++){?>
                    <div class="detail-extra">
                        <i class="far fa-check-square"></i>
                        <span><?php echo $facilities[$i]?></span>
                    </div>
                    <?php }?>
                </div>
                <div class="dt detail-line"></div>
                <form action="" class="check-form">
                    <?php if(count(is_countable($ts)?$ts:[]) >= intval($row['qlt_room'])){?>
                        <a href="<?php echo $r->h->get_url('homestay/?m=booking&a=booking_infomation&room_id=' . $row['room_id'])?>" class="btn-disabled">Hết phòng</a>
                    <?php }else{?>
                        <a href="<?php echo $r->h->get_url('homestay/?m=booking&a=booking_infomation&room_id=' . $row['room_id'])?>" class="check-btn">Đặt phòng ngay</a>
                    <?php }?>
                </form>
            </div>
        </div>
    </section>