<base href="http://localhost/homestay/">
<link rel="stylesheet" href="Public/Css/styleee.css">
<link rel="stylesheet" href="Public/Css/util.css">
<link rel="stylesheet" href="Public/Fontawesome/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<link rel="stylesheet" href="Public/Css/jquery-ui.min.css">
<link rel="stylesheet" href="Public/Css/animate.css">
<link rel="stylesheet" href="Public/Css/icons.css">

<script src="Public/Js/jquery-3.4.1.min.js"></script>
<script src="Public/Js/script.js"></script>
<script src="Public/Js/slide.js"></script>
<script src="Public/Js/bootstrap-4.3.1.js"></script>
<script src="Public/Js/popper.min.js"></script>
<script src="Public/Js/jquery.validate.js"></script>
<script src="Public/Js/jquery-ui.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<?php
$module = isset($_GET['m']) ? $_GET['m'] : '';
$action = isset($_GET['a']) ? $_GET['a'] : '';

if (empty($module) || empty($action)) {
   $module = 'Common';
   $action = 'home';
}

$path = 'Modules/' . $module . '/' . $action . '.php';

if (file_exists($path)) {
   include_once('Classes/DA/database.php');
   include_once('Classes/DA/session.php');
   include_once('Classes/DA/role.php');
   include_once('Classes/DA/helper.php');
   include_once('Classes/BL/rooms.php');
   include_once('Classes/BL/booking.php');
   include_once('Classes/BL/users.php');
   include_once('Classes/BL/usersadmin.php');
   include_once($path);
} else {
   header('Location:404.php');
}
?>
???
