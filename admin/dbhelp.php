<?php
require_once('config.php');


function execute($sql)
{

	try {
		$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
		// tạo hóa đơn
		mysqli_query($conn, $sql);
		$id = null;
		if (strpos($sql, 'hoa_don')) {
			$id = mysqli_insert_id($conn);
		}
		mysqli_close($conn);
		$_SESSION['status'] = 'Thành công';
		if ($id != null) {
			return $id;
		}
	} catch (Exception $e) {
		$_SESSION['status'] = 'Không thành công';
		die($e);
	}
}


function executeResult($sql)
{

	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);


	$resultset = mysqli_query($conn, $sql);
	$list      = [];
	while ($row = mysqli_fetch_array($resultset, 1)) {
		$list[] = $row;
	}

	mysqli_close($conn);

	return $list;
}
