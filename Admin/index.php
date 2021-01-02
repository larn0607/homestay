<base href="http://localhost/homestay/admin/">
<script src="../Public/Js/jquery-3.4.1.min.js"></script>
<script src="../Public/Js/popper.min.js"></script>

<link rel="stylesheet" href="../Public/Css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
<link rel="stylesheet" href="../Public/Css/util.css">
<!-- all.css gọi thư viện font-awesome -->
<link rel="stylesheet" href="../Public/Fontawesome/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<link rel="stylesheet" href="../Public/Css/jquery-ui.min.css">
<link rel="stylesheet" href="../Public/Css/icons.css">
<link rel="stylesheet" href="../Public/Css/menu.css">
<link rel="stylesheet" href="../Public/Css/animate.css">

<script src="../Public/Js/bootstrap-4.3.1.js"></script>
<script src="../Public/Js/jquery.validate.js"></script>
<script src="../Public/Js/jquery-ui.min.js"></script>
<script src="../Public/Js/jquery.validate.js"></script>
<script src="../Public/Js/jquery.validate.js"></script>
<script src="../Public/Js/script.js"></script>

<!-- Summernote -->
<link rel="stylesheet" href="../Public/summernote/summernote-bs4.min.css">
<script src="../Public/summernote/summernote-bs4.min.js"></script>
<!-- End -->

<!-- Ckeditor -->

<script src="../Public/Ckeditor/ckeditor.js"></script>

<!-- js of dataTable  -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<!-- end js of dataTable  -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
$module = isset($_GET['m']) ? $_GET['m'] : '';
$action = isset($_GET['a']) ? $_GET['a'] : '';

if (empty($module) || empty($action)) {
  $module = 'Common';
  $action = 'admin';
}

$path = 'Modules/' . $module . '/' . $action . '.php';

if (file_exists($path)) {
  include_once('../Classes/DA/database.php');
  include_once('../Classes/DA/session.php');
  include_once('../Classes/DA/role.php');
  include_once('../Classes/DA/helper.php');
  include_once('../Classes/BL/rooms.php');
  include_once('../Classes/BL/booking.php');
  include_once('../Classes/BL/usersadmin.php');
  include_once('../Classes/BL/users.php');
  include_once($path);
} else {
  header('Location:404.php');
}
?>