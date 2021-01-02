<?php 
    $user_ad = new UsersAdmin();
    $user_ad->r->set_logout_admin();
    $user_ad->h->redirect($user_ad->h->get_url('homestay/admin/?m=common&a=login'));
?>