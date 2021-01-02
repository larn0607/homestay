<?php 
    $r = new Rooms();
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $stt = $_GET['stt'];
        $data = [
            'room_id' => $id,
            'status' => $stt
        ];
        if($r->db_update_status($data))
        {
            $r->h->redirect($r->h->get_url('homestay/admin/?m=rooms&a=list'));
        }
    }
?>