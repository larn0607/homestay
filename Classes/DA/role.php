<?php 

  class Role extends Session
  {   

      function set_logged_admin($username,$usertype) {
         $this->session_set('ad_token',['username'=>$username,
      'usertype'=>$usertype
      ]);
      }
      function set_logged($username,$usertype,$user_id) {
         $this->session_set('user_token',['username'=>$username,
      'usertype'=>$usertype,'user_id'=>$user_id
      ]);
      }
      function set_login_admin($username) {
         $this->session_set('ad_token',['username'=>$username
      ]);
      }
      function set_login($username,$user_id) {
         $this->session_set('user_token',['username'=>$username,'user_id'=>$user_id
      ]);
      }
      function set_logout_admin() {
         $this->session_delete('ad_token');
      }
      function set_logout() {
         $this->session_delete('user_token');
      }
      function session_admin_logged() {
         $user = $this->session_get('ad_token');
         return $user;
      }
      function session_user_logged() {
         $user = $this->session_get('user_token');
         return $user;
      }

      function is_admin() {
         $user = $this->session_admin_logged();
         if(!empty($user['usertype']) && intval($user['usertype']) == 1)
         {
            return true;
         }
         return false;
      }

      function is_login() {
         $user = $this->session_user_logged();
         if(!empty($user['usertype']) && intval($user['usertype']) == 1)
         {
            return true;
         }
         return false;
      }
      function get_current_username_ad(){
         $user = $this->session_admin_logged();
         return (isset($user['username'])?$user['username']:'');
      }
      function get_current_username(){
         $user = $this->session_user_logged();
         return (isset($user['username'])?$user['username']:'');
      }
      function get_current_usertype()
      {
         $user = $this->session_admin_logged();
         return (isset($user['usertype'])?intval($user['usertype']):'');
      }

      function is_supper_admin(){
         $user = $this->session_user_logged();
         if(!empty($user['usertype']) && intval($user['usertype']) == 1 && $user['username'] == 'admin')
            return true;
         else
            return false;
      }

  }
?>