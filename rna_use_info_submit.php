<?php
	header("content-type:text/html;charset=utf-8");
	 
	//开启session
	session_start();
	 
	//接收表单传递的信息
	$sample_rna_id = $_POST['sample_rna_id'];
	$fetch_date = $_POST['fetch_date'];
	$fetch_person = $_POST['fetch_person'];
	$return_date = $_POST['return_date'];
	$return_person = $_POST['return_person'];
	$usage_amount = $_POST['usage_amount'];
	$rest_amount = $_POST['rest_amount'];
	$remark = $_POST['remark'];
	 
	//通过php连接到mysql数据库
	$conn=mysql_connect("127.0.0.1:3306","root","cailun781");
	 
	//选择数据库
	mysql_select_db("sampledb");

	//设置客户端和连接字符集
	mysql_query("set names utf8");

	//通过php进行insert操作
	$sqlinsert="insert into rna_use_info (sample_rna_id, fetch_date, fetch_person, return_date, return_person, usage_amount, rest_amount, remark) values('{$sample_rna_id}','{$fetch_date}','{$fetch_person}','{$return_date}','{$return_person}','{$usage_amount}','{$rest_amount}','{$remark}')";

	//添加用户信息到数据库
	$test = mysql_query($sqlinsert);
	if ($test == 1) {
		echo "数据输入成功";
	} else {
		echo "数据输入失败，请检查样本RNA编号是否有误";
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

	<form method="post" action="rna_use_info_input.html">
		<td><input type="submit" value="继续输入"></td> 
	</form>

	<form method="post" action="index.html">
		<td><input type="submit" value="回到首页"></td> 
	</form>