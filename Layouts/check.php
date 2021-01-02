<!-- check -->
<?php 
    $r = new Rooms();
    $output = '';
    if(isset($_REQUEST['submit']))
    {
        extract($_REQUEST);
        $lst = $r->db_get_list_rooms_stt();
        $data =[
            'check_in' => $r->h->input_post('check_in'),
            'check_out' => $r->h->input_post('check_out')
        ];
        $result = $r->check_available($data);
        var_dump($result);
    }
?>
<section class="light">
        <div class="inner-width">
            <h1 class="section-title">Tìm phòng</h1>
            <form action="" class="check-form" method="post">
                <div class="checkin">
                    <label for="check_in">Check in:</label>
                    <input type="text" class="cin" name="check_in">
                </div>
                <div class="checkout">
                    <label for="check_out">Check out:</label>
                    <input type="text" class="cout" name="check_out">
                </div>
                <!-- <input type="hidden" name="request_name" value="check_room">
                <input type="submit" value="Kiểm tra" class="check-btn" name="check_room_btn"> -->
                <button type="submit" class="check-btn" name="submit">Kiểm tra</button>
            </form>
        </div>
        <div>
            <div class="inner-width">
                <div class="feature-rooms">
                    <div class="feature-room">
            <?php
                if(isset($_REQUEST['submit']))
                {
                    if($result)
                    {
                        foreach($lst as $row){                 
                            $output .= '
                                            <div class="room">
                                                <div class="img-container">
                                                    <img src="./Uploads/'.$row['image'].'" alt="">
                                                    <div class="price-top">
                                                        <h5>'.number_format($row['price']).'</h5>
                                                        <p>/đêm</p>
                                                    </div>
                                                    <a href="'.$r->h->get_url('homestay/?m=rooms&a=room_detail&id=' . $row['room_id']).'" class="room-link room-btn">Chi tiết</a>
                                                    <p class="room-info">'.$row['room_name'].'</p>
                                                </div>
                                            </div>';
                        }           
                    }
                    echo $output;
                }
            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
