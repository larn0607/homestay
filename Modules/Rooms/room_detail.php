<?php 
  $r = new Rooms();
  $b = new Booking();
  if(isset($_GET['room_id']))
  {
    $id = $_GET['room_id'];
    $row = $r->db_get_list_rooms_by_id($id);
    if(isset($_SESSION['user_token']))
    {
      $ut = $_SESSION['user_token'];
      $uid = $ut['user_id'];
    }
    $ts = $b->db_test($id);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name=description content="">
  <meta name=viewport content="width=device-width, initial-scale=1">
  <title>
    <?php echo $row['room_name']?>
  </title>
</head>
<body>
  <?php include_once("Layouts/navbar.php"); ?>
  <?php include_once("Layouts/banner_detail.php");?>
  <?php include_once("Layouts/detail.php"); ?>
  <?php include_once("Layouts/services.php"); ?>
  <?php include_once("Layouts/footer.php"); ?>
  <?php include_once("Layouts/gotop.php"); ?>
</body>
</html>
