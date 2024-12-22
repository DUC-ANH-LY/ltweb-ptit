<?php
if (isset($_POST['ID'])) {
	$ID = $_POST['ID'];

	require_once('dbhelp.php');

	$sql = 'DELETE FROM  danh_muc WHERE id = ' . $ID;
	execute($sql);

	echo 'Xoá danh mục thành công';
}
