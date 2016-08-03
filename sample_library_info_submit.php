<?php
	header("content-type:text/html;charset=utf-8");
	 
	//开启session
	session_start();
	 
	//接收表单传递的信息
	$sample_id = $_POST['sample_id'];
	$sample_name = $_POST['sample_name'];
	$dna_rna = $_POST['dna_rna'];
	$library_time = $_POST['library_time'];
	$M_P = $_POST['M_P'];
	$short_name = $_POST['short_name'];
	$sample_temperature = $_POST['sample_temperature'];
	$fridge_layer = $_POST['fridge_layer'];
	$save_position = $_POST['save_position'];
	$library_volumn = $_POST['library_volumn'];
	$library_set_date = $_POST['library_set_date'];
	$set_man = $_POST['set_man'];
	$library_panel = $_POST['library_panel'];
	$barcode_index = $_POST['barcode_index'];
	$direction = $_POST['direction'];
	$library_size = $_POST['library_size'];
	$qubit_concentration = $_POST['qubit_concentration'];
	$qpcr = $_POST['qpcr'];
	$remark = $_POST['remark'];
	 
	//通过php连接到mysql数据库
	$conn=mysql_connect("127.0.0.1:3306","root","");
	 
	//选择数据库
	mysql_select_db("sampledb");

	//设置客户端和连接字符集
	mysql_query("set names utf8");

	//文库编号
	if ($dna_rna=="DNA") {
		$sample_library_id=$sample_id."-D-".$library_time."-".$M_P;
	} else {
		$sample_library_id=$sample_id."-R-".$library_time."-".$M_P;
	}

	//编号对应表insert操作
	if ($M_P=="M") {
		$corrinsert="insert into sample_name_corresponding(sample_id,sample_library_id,sample_library_m_id) values('{$sample_id}','{$sample_library_id}','{$sample_library_id}')";
	} else {
		$corrinsert="insert into sample_name_corresponding(sample_id,sample_library_id,sample_library_p_id) values('{$sample_id}','{$sample_library_id}','{$sample_library_id}')";
	}

	//添加对应dna编号
	$check=mysql_query($corrinsert);

	//通过php进行insert操作
	$sqlinsert="insert into sample_library_info values('{$sample_library_id}','{$sample_name}','{$short_name}','{$sample_temperature}','{$fridge_layer}','{$save_position}','{$library_volumn}','{$library_set_date}','{$set_man}','{$library_panel}','{$barcode_index}','{$direction}','{$library_size}','{$qubit_concentration}','{$qpcr}','{$remark}')";

	//添加用户信息到数据库
	$test = mysql_query($sqlinsert);
	if ($test == 1) {
		echo "数据输入成功";
	} else {
		echo "数据输入失败，请检查样本编号及样本文库编号是否有误";
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

	<form method="post" action="sample_library_info_input.html">
		<td><input type="submit" value="继续输入"></td> 
	</form>

	<form method="post" action="index.html">
		<td><input type="submit" value="回到首页"></td> 
	</form>