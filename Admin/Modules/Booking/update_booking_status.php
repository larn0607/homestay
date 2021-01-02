<?php 
    $b = new Booking();
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $stt = $_GET['stt'];
        $data = [
            'booking_id' => $id,
            'booking_status' => $stt
        ];
        if($b->db_update_booking_status($data))
        {
            $b->h->redirect($b->h->get_url('homestay/admin/?m=booking&a=list'));
        }
    }
?>