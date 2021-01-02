<?php
    class Booking extends Database
    {
        var $h = null;
        function __construct()
        {
            parent::__construct();
            $this->h = new Helper();
        }
        function db_insert_booking($data){
            $sql = "insert into booking(room_id,user_id,check_in,check_out) values(:room_id,:user_id,:check_in,:check_out)";
            $params=[
                "room_id" => $data['room_id'],
                "user_id" => $data['user_id'],
                "check_in" => $data['check_in'],
                "check_out" => $data['check_out'],
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_get_list_booking()
        {
            $sql = "select * from booking";
            return $this->db_get_list($sql);
        }

        function db_get_list_booking_paging(&$paging_html)
        {
            $link = "http://localhost/homestay/admin/?m=booking&a=list&page={page}";
            $sql = "select * from booking";
            $total_records = $this->db_num_rows($sql);
            $current_page = $this->h->input_get('page');
            $limit = 8;
            $paging = $this->h->paging($link, $total_records, $current_page, $limit);
            $paging_html =  $paging['html'];
            $sql = "select * from booking limit {$paging['start']},{$paging['limit']}";
            return $this->db_get_list($sql);
        }

        function db_get_list_booking_by_id($id)
        {
            $sql = "select * from booking where booking_id=:booking_id";
            $params = ['booking_id' => $id];
            return $this->db_get_row($sql, $params);
        }
        function db_get_list_booking_by_user_id($id)
        {
            $sql = "select * from booking where user_id=:user_id";
            $params = ['user_id' => $id];
            return $this->db_get_list_condition($sql, $params);
        }
        function db_update_booking($data)
        {
            $sql = "update booking set room_id=:room_id,check_in=:check_in,check_out=:check_out,full_name=:full_name,email=:email,phone=:phone where booking_id=:booking_id";
            $params = [
                "booking_id" => $data['booking_id'],
                "room_id" => $data['room_id'],
                "check_in" => $data['check_in'],
                "check_out" => $data['check_out'],
                "full_name" => $data['full_name'],
                "email" => $data['email'],
                "phone" => $data['phone']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }

        function db_delete_booking($data)
        {
            $sql = "delete from booking where booking_id=:booking_id";
            $params = [
                "booking_id" => $data['booking_id']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_update_booking_status($data)
        {
            $sql = 'update booking set booking_status=:booking_status where booking_id=:booking_id';
            $params = [
                'booking_id' => $data['booking_id'],
                'booking_status' => $data['booking_status']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_update_check_status($data)
        {
            $sql = 'update booking set check_stt=:check_stt where booking_id=:booking_id';
            $params = [
                'booking_id' => $data['booking_id'],
                'check_stt' => $data['check_stt']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_get_check_out(){
            $sql = 'select check_out from booking where check_out > now()';
            return $this->db_get_list($sql);
        }
        function get_cr(){
            $sql = 'select CURRENT_DATE()';
            return $this->db_get_list($sql);
        }
        function db_update_available($data)
        {
            $sql = 'update v_all set available=available - 1 where room_id=:room_id';
            $params = [
                'room_id' => $data['room_id']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }

        function db_update_available_p($data)
        {
            $sql = 'update v_all set available=available + 1 where room_id=:room_id';
            $params = [
                'room_id' => $data['room_id']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_test($id)
        {
            $sql = 'select room_id from booking where room_id=:room_id and check_in <= CURRENT_DATE() and check_out >  CURRENT_DATE()';
            $params = ['room_id' => $id];
            return $this->db_get_list_condition($sql, $params);
        }
        function db_check()
        {
            $sql = 'SELECT * FROM booking where room_id in(select room_id from booking where room_id=7) and check_in <= CURRENT_DATE() and check_out > CURRENT_DATE()';
            return $this->db_get_list($sql);
        }
    }
