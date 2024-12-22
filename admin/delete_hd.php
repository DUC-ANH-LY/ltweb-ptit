<?php
if (isset($_POST['ID'])) {
	$ID = $_POST['ID'];

	require_once('dbhelp.php');

	$sql = 'DELETE FROM  hoa_don WHERE id = ' . $ID;
	execute($sql);

	echo 'Xoá nhà cung cấp thành công';
}
