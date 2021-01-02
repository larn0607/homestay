<?php 
    $r = new Rooms();
    $b = new Booking();
    if(isset($_SESSION['user_token']))
    {
        $ut = $_SESSION['user_token'];
        $id = $ut['user_id'];
        $lst = $b->db_get_list_booking_by_user_id($id);
        
    }
?>

<div class="u_booking">
    <h2>Thông tin đặt phòng</h2>
    <table>
        <?php 
            if(is_array($lst) || is_object($lst))
            {
        ?>
        <tr>
            <th>Tên phòng</th>
            <th>Ngày vào</th>
            <th>Ngày ra</th>
        </tr>
        <?php
                foreach ($lst as $row)
                {
                    $row_room = $r->db_get_list_rooms_by_id($row['room_id']);
            ?>
            <tr>
                <td><?php echo $row_room['room_name'] ?></td>
                <td><?php echo $row['check_in'] ?></td>
                <td><?php echo $row['check_out'] ?></td>
            </tr>
            <?php }}else{
            ?>
    </table>
    <?php  
        echo '<span style="font-size: 20px;margin-top: 50px; font-weight: 600;">Không có đơn đặt phòng nào</span>';
    }?>
</div>