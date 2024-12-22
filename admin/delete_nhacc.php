<?php
if (isset($_POST['ID'])) {
	$ID = $_POST['ID'];

	require_once('dbhelp.php');

	$sql = 'DELETE FROM  nha_cung_cap WHERE id = ' . $ID;
	execute($sql);

	echo 'Xoá nhà cung cấp thành công';
}
