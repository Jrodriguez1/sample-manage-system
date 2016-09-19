<?php
	header("content-type:text/html;charset=utf-8");
	 
	//开启session
	session_start();
	 
	//接收表单传递的信息
	$sample_library_m_id = $_POST['sample_library_m_id'];
	$sequence_type = $_POST['sequence_type'];
	$onto_concentration = $_POST['onto_concentration'];
	$r1_primer = $_POST['r1_primer'];
	$index_primer = $_POST['index_primer'];
	$r2_primer = $_POST['r2_primer'];
	$require_read = $_POST['require_read'];
	$data_path_on_mars = $_POST['data_path_on_mars'];
	 
	//通过php连接到mysql数据库
	$conn=mysql_connect("127.0.0.1:3306","root","cailun781");
	 
	//选择数据库
	mysql_select_db("sampledb");

	//设置客户端和连接字符集
	mysql_query("set names utf8");

	//通过php进行insert操作
	$sqlinsert="insert into nextseq_sequence_info (sample_library_m_id, sequence_type, onto_concentration, r1_primer, index_primer, r2_primer, require_read, data_path_on_mars) values('{$sample_library_m_id}','{$sequence_type}','{$onto_concentration}','{$r1_primer}','{$index_primer}','{$r2_primer}','{$require_read}','{$data_path_on_mars}')";

	//添加用户信息到数据库
	$test = mysql_query($sqlinsert);
	if ($test == 1) {
		echo "数据输入成功";
	} else {
		echo "数据输入失败，请检查样本文库编号是否有误";
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

	<form method="post" action="nextseq_sequence_info_input.html">
		<td><input type="submit" value="继续输入"></td> 
	</form>

	<form method="post" action="index.html">
		<td><input type="submit" value="回到首页"></td> 
	</form>