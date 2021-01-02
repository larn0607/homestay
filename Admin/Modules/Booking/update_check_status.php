<?php 
    $b = new Booking();
    if(isset($_GET['book_id']))
    {
        $id = $_GET['book_id'];
        $check_stt = $_GET['check_stt'];
        $data = [
            'booking_id' => $id,
            'check_stt' => $check_stt
        ];
        if($b->db_update_check_status($data))
        {
            $b->h->redirect($b->h->get_url('homestay/admin/?m=booking&a=list'));
        }
    }
?>