<?php
	header("content-type:text/html;charset=utf-8");
	 
	//开启session
	session_start();
	 
	//接收表单传递的信息
	$sample_library_m_id = $_POST['sample_library_m_id'];
	$sample_capture_library_id = $_POST['sample_capture_library_id'];
	$capture_name = $_POST['capture_name'];
	$sample_name = $_POST['sample_name'];
	$library_panel = $_POST['library_panel'];
	$barcode_index = $_POST['barcode_index'];
	$library_size = $_POST['library_size'];
	$qubit_concentration = $_POST['qubit_concentration'];
	$qpcr = $_POST['qpcr'];
	$library_volume = $_POST['library_volume'];
	$sample_temperature = $_POST['sample_temperature'];
	$fridge_layer = $_POST['fridge_layer'];
	$save_position = $_POST['save_position'];
	$capture_date = $_POST['capture_date'];
	$capture_man = $_POST['capture_man'];
	$remark = $_POST['remark'];
	 
	//通过php连接到mysql数据库
	$conn=mysql_connect("127.0.0.1:3306","root","cailun781");
	 
	//选择数据库
	mysql_select_db("sampledb");

	//设置客户端和连接字符集
	mysql_query("set names utf8");

	//通过php进行insert操作
	$sqlinsert="insert into sample_capture_library_info values('{$sample_library_m_id}','{$sample_capture_library_id}','{$capture_name}','{$sample_name}','{$library_panel}','{$barcode_index}','{$library_size}','{$qubit_concentration}','{$qpcr}','{$library_volume}','{$sample_temperature}','{$fridge_layer}','{$save_position}','{$capture_date}','{$capture_man}','{$remark}')";

	//添加用户信息到数据库
	$test = mysql_query($sqlinsert);
	if ($test == 1) {
		echo "数据输入成功";
	} else {
		echo "数据输入失败，请检查样本原始文库编号是否有误";
	}


	//调试信息
	// echo "<br>";
	// echo mysql_errno() . ": " . mysql_error(). " ";
	// echo "<br>";
	// //echo $age;
	// echo "<br>";

	//释放连接资源
	mysql_close($conn);

?>

	<hr>

	<form method="post" action="sample_capture_library_info_input.html">
		<td><input type="submit" value="继续输入"></td> 
	</form>

	<form method="post" action="index.html">
		<td><input type="submit" value="回到首页"></td> 
	</form>