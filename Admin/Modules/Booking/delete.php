<?php
$b = new Booking();
$success = "";
// if (!empty($_GET['id'])) {
//     $id = $_GET['id'];
//     $row = $cat->db_get_list_category_by_id($id);
//     $data = [
//         'catid' => $id
//     ];
//     if ($cat->h->is_submit('delete_cat') && $cat->db_delete_categeory($data)) {
//         $cat->h->redirect($cat->h->get_url('LATShop/admin/?page=cat-list'));
//     }
// }
if(isset($_POST['delete_booking']))
{
    $id = $_POST['booking_id'];
    $data = [
        'booking_id' => $id
    ];
    if($b->db_delete_booking($data))
    {
       $success = "Xoá thành công";
    }
    else
    {
        $success = "Something wrong!";
    }
}
?>

