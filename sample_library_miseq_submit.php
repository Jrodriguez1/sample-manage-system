<?php
	header("content-type:text/html;charset=utf-8");
	 
	//开启session
	session_start();
	 
	//接收表单传递的信息
	$sample_library_m_id = $_POST['sample_library_m_id'];
	$onto_miseq_date = $_POST['onto_miseq_date'];
	$sample_name = $_POST['sample_name'];
	$project_info = $_POST['project_info'];
	$resource = $_POST['resource'];
	$lib_prep_input = $_POST['lib_prep_input'];
	$extract_lib_prep_method = $_POST['extract_lib_prep_method'];
	$i7_index_id = $_POST['i7_index_id'];
	$index1 = $_POST['index1'];
	$i5_index_id = $_POST['i5_index_id'];
	$index2 = $_POST['index2'];
	$lib_qubit_concentration = $_POST['lib_qubit_concentration'];
	$lib_qpcr_concentration = $_POST['lib_qpcr_concentration'];
	$library_wiki_path = $_POST['library_wiki_path'];
	$remark = $_POST['remark'];
	 
	//通过php连接到mysql数据库
	$conn=mysql_connect("127.0.0.1:3306","root","");
	 
	//选择数据库
	mysql_select_db("sampledb");

	//设置客户端和连接字符集
	mysql_query("set names utf8");

	//通过php进行insert操作
	$sqlinsert="insert into sample_library_miseq values('{$sample_library_m_id}','{$onto_miseq_date}','{$sample_name}','{$project_info}','{$resource}','{$lib_prep_input}','{$extract_lib_prep_method}','{$i7_index_id}','{$index1}','{$i5_index_id}','{$index2}','{$lib_qubit_concentration}','{$lib_qpcr_concentration}','{$library_wiki_path}','{$remark}')";

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

	<form method="post" action="sample_library_miseq_input.html">
		<td><input type="submit" value="继续输入"></td> 
	</form>

	<form method="post" action="index.html">
		<td><input type="submit" value="回到首页"></td> 
	</form>