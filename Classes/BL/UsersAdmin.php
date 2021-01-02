<?php
    class UsersAdmin extends Database
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
            $sql = "insert into users_admin(username,password,fullname,email,usertype) values(:username,:password,:fullname,:email,:usertype)";
            $params=[
                "username" => $data['username'],
                "password" => ($data['password']),
                "fullname" => $data['fullname'],
                "email" => $data['email'],
                "usertype" => $data['usertype']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_get_list_users_admin()
        {
            $sql = "select * from users_admin";
            return $this->db_get_list($sql);
        }

        function db_get_list_users_paging(&$paging_html)
        {
            $link = "http://localhost/homestay/users/?m=users&a=list&page={page}";
            $sql = "select * from users_admin";
            $total_records = $this->db_num_rows($sql);
            $current_page = $this->h->input_get('page');
            $limit = 5;
            $paging = $this->h->paging($link, $total_records, $current_page, $limit);
            $paging_html =  $paging['html'];
            $sql = "select * from users_admin limit {$paging['start']},{$paging['limit']}";
            return $this->db_get_list($sql);
        }

        function db_get_list_users_by_id($id)
        {
            $sql = "select * from users_admin where ad_id=:ad_id";
            $params = ['ad_id' => $id];
            return $this->db_get_row($sql, $params);
        }

        function db_update_users($data)
        {
            $sql = "update users_admin set username=:username,password=:password,fullname=:fullname,email=:email,usertype=:usertype where ad_id=:ad_id";
            $params = [
                "ad_id" => $data['ad_id'],
                "username" => $data['username'],
                "password" => $data['password'],
                "fullname" => $data['fullname'],
                "email" => $data['email'],
                "usertype" => $data['usertype'],
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }

        function db_delete_users($data)
        {
            $sql = "delete from users_admin where ad_id=:ad_id";
            $params = [
                "ad_id" => $data['ad_id']
            ];
            if ($this->db_execute($sql, $params))
                return true;
            else
                return false;
        }
        function db_user_login($data)
        {
            $sql = "select * from users_admin where username=:username and password=:password";
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
            $sql = "select * from users_admin where username=:username";
            $params = ['username' => $username];
            return $this->db_get_row($sql, $params);
        }
    }
