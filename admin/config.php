<?php
if (!function_exists('currency_format')) {

	function currency_format($number, $suffix = 'đ')
	{
		if (!empty($number)) {
			return number_format($number, 0, ',', '.') . "{$suffix}";
		}
	}
}
define('HOST', 'localhost');
define('DATABASE', 'nhacungcap');
define('USERNAME', 'root');
define("PASSWORD", '');

$conn = mysqli_connect("localhost", "root", "", DATABASE);
mysqli_set_charset($conn, "utf8");
