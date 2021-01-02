<?php
class Helper
{
	//http://localhost:8080
	public function get_url($url = '')
	{
		return 'http://' . $_SERVER['HTTP_HOST'] . '/' . $url;
	}

	function redirect($url)
	{
		header("Location:{$url}");
		exit();
	}

	function redirect_js($url)
	{
		if ($url) {
			echo '<script>window.location.href="' . $url . '"</script>';
		}
	}

	function input_post($inputname)
	{
		return isset($_POST[$inputname]) ? trim($_POST[$inputname]) : false;
	}

	function input_get($inputname)
	{
		return isset($_GET[$inputname]) ? trim($_GET[$inputname]) : false;
	}

	function is_submit($hidden)
	{
		return (isset($_POST['request_name']) && $_POST['request_name'] == $hidden);
	}

	function show_error($error, $key)
	{
		if (!empty($error[$key]))
			echo '<span style="border:none" class="form-control text-danger">' . $error[$key] . '</span>';
	}

	function paging($link, $total_records, $current_page, $limit)
	{
		$total_page = ceil($total_records / $limit);

		// Limit current_page in 1 to total_page
		if ($current_page > $total_page) {
			$current_page = $total_page;
		} else if ($current_page < 1) {
			$current_page = 1;
		}

		$start = ($current_page - 1) * $limit;

		$html = '<ul class="pagination">';

		if ($current_page > 1 && $total_page > 1) {
			$html .= '<li class="page-item"><a class="page-link" href="' . str_replace('{page}', $current_page - 1, $link) . '">Prev</a></li>';
		}

		for ($i = 1; $i <= $total_page; $i++) {
			if ($i == $current_page) {
				$html .= '<li class="page-link bg-warning">' . $i . '</li>';
			} else {
				$html .= '<li class="page-item"><a class="page-link" href="' . str_replace('{page}', $i, $link) . '">' . $i . '</a></li>';
			}
		}

		if ($current_page < $total_page && $total_page > 1) {
			$html .= '<li class="page-item"></li><a class="page-link" href="' . str_replace('{page}', $current_page + 1, $link) . '">Next</a></li></ul>';
		}

		return array(
			'start' => $start,
			'limit' => $limit,
			'html' => $html
		);
	}

	function upload_file($inputfile, &$imgfile)
	{
		if (!empty($_FILES[$inputfile])) {
			if ($_FILES[$inputfile]['error'] > 0) {
				return false;
			} else {
				$clientpath = $_FILES[$inputfile]['tmp_name'];
				$imgfile = $_FILES[$inputfile]['name'];
				$extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
				$allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
				$imgnewfile = md5($imgfile) . $extension;

				if (in_array($extension, $allowed_extensions)) {
					move_uploaded_file($clientpath, '../Uploads/' . $imgnewfile);
					$imgfile = $imgnewfile;
					return true;
				} else {
					echo "<script>alert('Phần mở rộng file không hợp lệ. Chỉ phần mở rộng jpg /jpeg/png/gif cho phép upload file !');</script>";
					return false;
				}
			}
		} else
			return false;
	}
}
