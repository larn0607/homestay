<?php 

    $r = new Rooms();
    $output = '';
    if(isset($_POST['action']))
    {
        $lst = $r->db_filter();
        if(!$lst)
        {
            $output = '<h3>Something went wrong</h3>';
        }
        else{
            foreach($lst as $row)
            {
                $output .= '
                        <div class="room">
                            <div class="img-container">
                                <img src="./Uploads/'.$row['image'].'" alt="">
                                <div class="price-top">
                                    <h5>'.number_format($row['price']).'</h5>
                                    <p>/đêm</p>
                                </div>
                                <a href="'.$r->h->get_url('homestay/?m=rooms&a=room_detail&room_id=' . $row['room_id']).'" class="room-link room-btn">Chi tiết</a>
                                <p class="room-info">'.$row['room_name'].'</p>
                            </div>
                        </div>';
            }
        }
        echo $output;
    }

?>