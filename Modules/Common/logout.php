<?php 
    $user = new Users();
    $user->r->set_logout();
    $user->h->redirect($user->h->get_url('homestay'));
?>