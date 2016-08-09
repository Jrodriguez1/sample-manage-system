<?php
	header("content-type:text/html;charset=utf-8");
	 
	//开启session
	session_start();
	 
	//接收表单传递的信息
	$sample_id = $_POST['sample_id'];
	$collect_hospital = $_POST['collect_hospital'];
	$department = $_POST['department'];
	$admission_number = $_POST['admission_number'];
	$bed_number = $_POST['bed_number'];
	$diagnosis = $_POST['diagnosis'];
	$gene_detection = $_POST['gene_detection'];
	$conclusion = $_POST['conclusion'];
	$sexuality = $_POST['sexuality'];
	$age = $_POST['age'];
	$doctor = $_POST['doctor'];
	$in_hospital_date = $_POST['in_hospital_date'];
	$sampling_position = $_POST['sampling_position'];
	$sampling_date = $_POST['sampling_date'];
	$surgery_date = $_POST['surgery_date'];
	$cancer_name = $_POST['cancer_name'];
	$cancer_stage = $_POST['cancer_stage'];
	$pathological_result = $_POST['pathological_result'];
	$molecular_result = $_POST['molecular_result'];
	$immunohistochemical_result = $_POST['immunohistochemical_result'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$family_information = $_POST['family_information'];
	$remark = $_POST['remark'];
	 
	//通过php连接到mysql数据库
	$conn=mysql_connect("127.0.0.1:3306","root","cailun781");
	 
	//选择数据库
	mysql_select_db("sampledb");

	//设置客户端和连接字符集
	mysql_query("set names utf8");

	//通过php进行insert操作
	$sqlinsert="insert into client_info values('{$sample_id}','{$collect_hospital}','{$department}','{$admission_number}','{$bed_number}','{$diagnosis}','{$gene_detection}','{$conclusion}','{$sexuality}','{$age}','{$doctor}','{$in_hospital_date}','{$sampling_position}','{$sampling_date}','{$surgery_date}','{$cancer_name}','{$cancer_stage}','{$pathological_result}','{$molecular_result}','{$immunohistochemical_result}','{$address}','{$phone}','{$family_information}','{$remark}')";

	//添加用户信息到数据库
	$test = mysql_query($sqlinsert);
	if ($test == 1) {
		echo "数据输入成功";
	} else {
		echo "数据输入失败，请检查样本编号是否有误";
	}

	// //调试信息
	// echo "<br>";
	// echo mysql_errno() . ": " . mysql_error(). " ";
	// echo "<br>";
	// echo $age;
	// echo "<br>";

	//释放连接资源
	mysql_close($conn);

?>
	<hr>

	<form method="post" action="client_input.html">
		<td><input type="submit" value="继续输入"></td> 
	</form>

	<form method="post" action="index.html">
		<td><input type="submit" value="回到首页"></td> 
	</form>