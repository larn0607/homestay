    <?php
    class Rooms extends Database
    {
        var $h = null;
        function __construct()
        {
            parent::__construct();
            $this->h = new Helper();
        }
        function db_insert_rooms($data){
            $sql = "insert into rooms(room_name,qlt_room,available,qlt_bed,bed_type,description,facility,price,image)
            values(:room_name,:qlt_room,:qlt_room,:qlt_bed,:bed_type,:description,:facility,:price,:image)";
            $params=[
                "room_name" => $data['room_name'],
                "qlt_room" => $data['qlt_room'],
                "available" => $data['qlt_room'],
                "qlt_bed" => $data['qlt_bed'],
                "bed_type" => $data['bed_type'],
                "description" => $data['description'],
                "facility" => $data['facility'],
                "price" => $data['price'],
                "image" => $data['image']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_get_list_rooms()
        {
            $sql = "select * from rooms";
            return $this->db_get_list($sql);
        }
        
        function db_get_list_rooms_stt()
        {
            $sql = "select * from rooms where status ='1'";
            return $this->db_get_list($sql);
        }
        function db_get_list_bed_type(){
            $sql = 'select distinct bed_type from rooms where status = "1" ORDER BY room_id';
            return $this->db_get_list($sql);
        }
        function db_get_list_qlt_bed(){
            $sql = 'select distinct qlt_bed from rooms where status = "1" ORDER BY room_id';
            return $this->db_get_list($sql);
        }
        function db_get_list_rooms_paging(&$paging_html)
        {
            $link = "http://localhost/homestay/admin/?m=rooms&a=list&page={page}";
            $sql = "select * from rooms";
            $total_records = $this->db_num_rows($sql);
            $current_page = $this->h->input_get('page');
            $limit = 5;
            $paging = $this->h->paging($link, $total_records, $current_page, $limit);
            $paging_html =  $paging['html'];
            $sql = "select * from rooms limit {$paging['start']},{$paging['limit']}";
            return $this->db_get_list($sql);
        }

        function db_get_list_rooms_by_id($id)
        {
            $sql = "select * from rooms where room_id=:room_id";
            $params = ['room_id' => $id];
            return $this->db_get_row($sql, $params);
        }
        function db_get_list_room_name_by_id($id)
        {
            $sql = "select room_name from rooms where room_id=:room_id";
            $params = ['room_id' => $id];
            return $this->db_get_row($sql, $params);
        }
        function db_update_rooms($data)
        {
            $sql = "update rooms set room_name=:room_name,qlt_room=:qlt_room,available=:qlt_room,qlt_bed=:qlt_bed,bed_type=:bed_type,description=:description,facility=:facility,price=:price,image=:image where room_id=:room_id";
            $params = [
                "room_id" => $data['room_id'],
                "room_name" => $data['room_name'],
                "qlt_room" => $data['qlt_room'],
                "available" => $data['qlt_room'],
                "qlt_bed" => $data['qlt_bed'],
                "bed_type" => $data['bed_type'],
                "description" => $data['description'],
                "facility" => $data['facility'],
                "price" => $data['price'],
                "image" => $data['image']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }

        function db_delete_rooms($data)
        {
            $sql = "delete from rooms where room_id=:room_id";
            $params = [
                "room_id" => $data['room_id']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_update_status($data)
        {
            $sql = 'update rooms set status=:status where room_id=:room_id';
            $params = [
                'room_id' => $data['room_id'],
                'status' => $data['status']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_filter()
        {
            $sql = "select * from rooms where status = '1'";
            if(isset($_POST['minimum_price'], $_POST['maximum_price']) && !empty($_POST['minimum_price']) && !empty($_POST['maximum_price']))
            {
                $sql .= " and price BETWEEN '".$_POST['minimum_price']."' and '".$_POST['maximum_price']."'";
            }
            if (isset($_POST['qlt_bed'])) {
                $qlt_bed = implode("','", $_POST['qlt_bed']);
                $sql .= " and qlt_bed in('" . $qlt_bed . "')";
            }
            if (isset($_POST['bed_type'])) {
                $bed_type = implode("','", $_POST['bed_type']);
                $sql .= " and bed_type in('" . $bed_type . "')";
            }
            return $this->db_get_list($sql);
        }
        function check_available($data){
            $sql2 = "";
            $sql = "SELECT DISTINCT room_name FROM v_all WHERE room_id NOT IN(SELECT DISTINCT room_id FROM v_all WHERE (check_in <=:check_in and check_out >=:check_out) or (check_in >=:check_in and check_out <=:check_out) or (check_in <=:check_in AND check_out >=:check_in))";
            $params = [
                'check_in' => $data['check_in'],
                'check_out' => $data['check_out']
            ];
            return $this->db_get_list_condition($sql, $params);
        }
        function check_room_by_room_name($room_name)
        {
            $sql="SELECT * FROM v_all WHERE room_name='$room_name'";
            return $this->db_get_list($sql);
        }
        function check_available_room($data){
            $sql = 'select available from rooms where room_id=:room_id';
            $params = [
                'room_id' => $data['room_id'],
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_test($id)
        {
            $sql = 'select room_name from v_all where room_id=:room_id and check_in = CURRENT_DATE() - 1';
            $params = ['room_id' => $id];
            return $this->db_get_row($sql, $params);
        }
    }
