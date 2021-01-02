<?php 
    $r = new Rooms();
    $lst = $r->db_get_list_rooms_stt();
    $lst_qlt_bed = $r->db_get_list_qlt_bed();
    $lst_bed_type = $r->db_get_list_bed_type();
?>
<section class="light">
    <div class="inner-width">
        <h1 class="section-title">Phòng</h1>
        <div class="filter">
            <div class="qlt-bed search">
                <span>Loại phòng:</span>
                <div>
                    <?php foreach($lst_bed_type as $row_bed_type){ ?>
                        <label><input type="checkbox" class="room_check bed_type" value="<?php echo $row_bed_type['bed_type'] ?>"><span><?php echo $row_bed_type['bed_type'] ?></span></label>
                    <?php }?>
                </div>
            </div>
            <div class="qlt-bed">
                <span>Số giuờng:</span>
                <div>
                    <?php foreach($lst_qlt_bed as $row_qlt_bed){ ?>
                    <label><input type="checkbox" class="room_check qlt_bed" value="<?php echo $row_qlt_bed['qlt_bed'] ?>"><span><?php echo $row_qlt_bed['qlt_bed'] ?></span></label>
                    <?php }?>
                </div>
            </div>
        </div>
            <div class="feature-rooms">
                <div class="feature-room" id="result">
                    <?php foreach($lst as $row){ ?>
                        <div class="room">
                            <div class="img-container">
                                <img src="./Uploads/<?php echo $row['image'] ?>" alt="">
                                <div class="price-top">
                                    <h5><?php echo number_format($row['price']) ?></h5>
                                    <p>/đêm</p>
                                </div>
                                <a href="<?php echo $r->h->get_url('homestay/?m=rooms&a=room_detail&room_id=' . $row['room_id']) ?>" class="room-link room-btn">Chi tiết</a>
                                <p class="room-info"><?php echo $row['room_name'] ?></p>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>

    </div>
</section>
<script type="text/javascript"> 
    $(document).ready(function()
    {
        $('.room_check').click(function(){
            var action = 'data';
            var minimum_price = $('#minimum_price').val();
            var maximum_price = $('#maximum_price').val();
            var qlt_bed = get_filter('qlt_bed');
            var bed_type = get_filter('bed_type');
            $.ajax({
               url:'http://localhost/homestay/?m=rooms&a=action',
               method:'POST',
               data:{action:action,minimum_price:minimum_price,maximum_price:maximum_price,qlt_bed:qlt_bed,bed_type:bed_type},
               success:function(result){
                $('#result').html(result);     
               }
            });
        });
        function get_filter(class_name){
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }
        $('#price_range').slider({
            range: true,
            min: 0,
            max: 1000000,
            values:[0, 1000000],
            step:10000,
            stop:function(event, ui){
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#minimum_price').val(ui.values[0]);
                $('#maximum_price').val(ui.values[1]);
            }
        });
    });
</script>