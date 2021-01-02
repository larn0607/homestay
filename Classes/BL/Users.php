<?php
    class Users extends Database
    {
        var $h = null;
        var $r = null;
        function __construct()
        {
            parent::__construct();
            $this->h = new Helper();
            $this->r = new Role();
        }
        function db_insert_users($data){
            $sql = "insert into users(username,password,full_name,email,phone) values(:username,:password,:full_name,:email,:phone)";
            $params=[
                "username" => $data['username'],
                "password" => ($data['password']),
                "full_name" => $data['full_name'],
                "email" => $data['email'],
                "phone" => $data['phone']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_get_list_users()
        {
            $sql = "select * from users";
            return $this->db_get_list($sql);
        }
        function db_get_row_users()
        {
            $sql = "select * from users";
            return $this->db_num_rows($sql);
        }
        function db_get_list_users_paging(&$paging_html)
        {
            $link = "http://localhost/homestay/admin/?m=users&a=list&page={page}";
            $sql = "select * from users";
            $total_records = $this->db_num_rows($sql);
            $current_page = $this->h->input_get('page');
            $limit = 5;
            $paging = $this->h->paging($link, $total_records, $current_page, $limit);
            $paging_html =  $paging['html'];
            $sql = "select * from users limit {$paging['start']},{$paging['limit']}";
            return $this->db_get_list($sql);
        }

        function db_get_list_users_by_id($id)
        {
            $sql = "select * from users where user_id=:user_id";
            $params = ['user_id' => $id];
            return $this->db_get_row($sql, $params);
        }

        function db_update_users($data)
        {
            $sql = "update users set username=:username,password=:password,full_name=:full_name,email=:email,phone=:phone where user_id=:user_id";
            $params = [
                "user_id" => $data['user_id'],
                "username" => $data['username'],
                "password" => $data['password'],
                "full_name" => $data['full_name'],
                "email" => $data['email'],
                "phone" => $data['phone']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_update_info_users($data)
        {
            $sql = "update users set full_name=:full_name,email=:email,phone=:phone where user_id=:user_id";
            $params = [
                "user_id" => $data['user_id'],
                "full_name" => $data['full_name'],
                "email" => $data['email'],
                "phone" => $data['phone']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_update_password($data)
        {
            $sql = "update users set password=:password where user_id=:user_id";
            $params = [
                "user_id" => $data['user_id'],
                "password" => $data['password']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_delete_users($data)
        {
            $sql = "delete from users where user_id=:user_id";
            $params = [
                "user_id" => $data['user_id']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_user_login($data)
        {
            $sql = "select * from users where username=:username and password=:password";
            $params = [
                'username' =>$data['username'],
                'password' =>$data['password'],
            ];
            if($this->db_execute($sql,$params))
                return true;
            else
                return false;
        }
        function db_get_user_by_username($username)
        {
            $sql = "select * from users where username=:username";
            $params = ['username' => $username];
            return $this->db_get_row($sql, $params);
        }
    }
