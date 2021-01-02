<?php 
    $r = new Rooms();
    $lst = $r->db_get_list_rooms();
?>

<!-- dac trung  -->
<section class="light" id="features">
        <div class="inner-width">
            <h1 class="section-title">Phòng đặc trưng</h1>
            <div class="feature-rooms">
                <div class="feature-room">
                    <?php foreach($lst as $row){ ?>
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
                    <!-- <div class="room">
                        <div class="img-container">
                            <img src="./Public/Images/banner1.jpg" alt="">
                            <div class="price-top">
                                <h5>299.000</h5>
                                <p>/đêm</p>
                            </div>
                            <a href="" class="room-link room-btn">Chi tiết</a>
                            <p class="room-info">Phòng chú Sáu</p>
                        </div>
                    </div>
                    <div class="room">
                        <div class="img-container">
                            <img src="./Public/Images/banner1.jpg" alt="">
                            <div class="price-top">
                                <h5>299.000</h5>
                                <p>/đêm</p>
                            </div>
                            <a href="detail.html" class="room-link room-btn">Chi tiết</a>
                            <p class="room-info">Phòng chú Sáu</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>