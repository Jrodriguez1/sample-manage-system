<?php
	header("content-type:text/html;charset=utf-8");
	 
	//开启session
	session_start();
	 
	//接收表单传递的信息
	$sample_id = $_POST['sample_id'];
	$sample_dna_id = $_POST['sample_dna_id'];
	$sample_name = $_POST['sample_name'];
	$short_name = $_POST['short_name'];
	$sample_temperature = $_POST['sample_temperature'];
	$fridge_layer = $_POST['fridge_layer'];
	$save_position = $_POST['save_position'];
	$extract_amount = $_POST['extract_amount'];
	$qubit_concentration = $_POST['qubit_concentration'];
	$extract_method = $_POST['extract_method'];
	$extract_person = $_POST['extract_person'];
	$extract_date = $_POST['extract_date'];
	 
	//通过php连接到mysql数据库
	$conn=mysql_connect("127.0.0.1:3306","root","cailun781");
	 
	//选择数据库
	mysql_select_db("sampledb");

	//设置客户端和连接字符集
	mysql_query("set names utf8");

	//编号对应表insert操作
	$corrinsert="insert into sample_name_corresponding(sample_id,sample_dna_id) values('{$sample_id}','{$sample_dna_id}')";

	//添加对应dna编号
	$check=mysql_query($corrinsert);

	//通过php进行insert操作
	$sqlinsert="insert into sample_dna_info (sample_dna_id, sample_name, short_name, sample_temperature, fridge_layer, save_position, extract_amount, qubit_concentration, extract_method, extract_person, extract_date) values('{$sample_dna_id}','{$sample_name}','{$short_name}','{$sample_temperature}','{$fridge_layer}','{$save_position}','{$extract_amount}','{$qubit_concentration}','{$extract_method}','{$extract_person}','{$extract_date}')";

	//添加用户信息到数据库
	$test = mysql_query($sqlinsert);
	if ($test == 1) {
		echo "数据输入成功";
	} else {
		echo "数据输入失败，请检查样本编号及样本DNA编号是否有误";
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

	<form method="post" action="sample_dna_info_input.html">
		<td><input type="submit" value="继续输入"></td> 
	</form>

	<form method="post" action="index.html">
		<td><input type="submit" value="回到首页"></td> 
	</form>