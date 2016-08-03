<?php
	include 'C:/coreseek-4.1-win32/api/sphinxapi.php';

	header("content-type:text/html;charset=utf-8");
	 
	//开启session
	session_start();

	$search_info = $_POST['search_info'];
	$select_data = $_POST['select_data'];
	
	//实例化
	$sphinx = new SphinxClient();

	//sphinx的主机名和端口
	$sphinx->SetServer ( 'localhost', 9312 );

	//设置返回结果集为php数组格式
	$sphinx->SetArrayResult ( true );

	//匹配结果的偏移量，参数的意义依次为：起始位置，返回结果条数，最大匹配条数
	$sphinx->SetLimits(0, 20, 1000);

	//最大搜索时间
	$sphinx->SetMaxQueryTime(10);

	//执行简单的搜索，这个搜索将会查询所有字段的信息，要查询指定的字段请继续看下文
	$index = 'sample' //索引源是配置文件中的 index 类，如果有多个索引源可使用,号隔开：'email,diary' 或者使用'*'号代表全部索引源
	$result = $sphinx->query ('asd', $index); 
	// echo '<pre>';
	// print_r($result);
	// echo '</pre>';

	//释放连接资源
	//mysql_close($conn);

	//header("Location: http://localhost/index.html?id=".$id); 



	// //添加用户信息到数据库
	// $test = mysql_query($sqlinsert);
	// if ($test == 1) {
	// 	echo "数据输入成功";
	// } else {
	// 	echo "数据输入失败，请检查样本编号是否有误";
	// }



?>

	<hr>

	<form method="post" action="fullsearch.html">
		<td><input type="submit" value="继续检索"></td> 
	</form>

	<form method="post" action="index.html">
		<td><input type="submit" value="回到首页"></td> 
	</form>