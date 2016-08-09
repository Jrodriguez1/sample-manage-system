<?php
	error_reporting(0);
	header("content-type:text/html;charset=utf-8");
	 
	// //开启session
	// session_start();

	// //通过php连接到mysql数据库
	// $conn=mysql_connect("127.0.0.1:3306","root","");

	// //选择数据库
	// mysql_select_db("sampledb");

	// //设置客户端和连接字符集
	// mysql_query("set names utf8");

	function corr_entry($entry_name) {
		switch ($entry_name) {
		case "sample_id":
			echo "样本编号：";
			break;
		case "sample_name":
			echo "样本名称：";
			break;
		case "order_id":
			echo "订单号：";
			break;
		case "sample_date":
			echo "收样日期：";
			break;
		case "sample_number":
			echo "样本量：";
			break;
		case "sample_temperature":
			echo "温度：";
			break;
		case "fridge_layer":
			echo "冰箱层：";
			break;
		case "save_position":
			echo "存放位置：";
			break;
		case "is_backup":
			echo "是否备份：";
			break;
		case "is_resample":
			echo "是否重送样：";
			break;
		case "remark":
			echo "备注：";
			break;
		case "man_in_charge":
			echo "负责人：";
			break;
		default:
			echo "未选择查询数据";
		}
	}

	//SQL获取信息
	function get_data($id, $select_data) {
		//开启session
		session_start();

		//通过php连接到mysql数据库
		$conn=mysql_connect("127.0.0.1:3306","root","cailun781");

		//选择数据库
		mysql_select_db("sampledb");

		//设置客户端和连接字符集
		mysql_query("set names utf8");

		// echo $id;
		// print_r($select_data);
		$sqlselect="select * from sample where id = '{$id}' order by id";
		$result=mysql_query($sqlselect);
		if ($result = mysql_fetch_array($result)) {
			$i = 0;
			while ($select_data[$i]) {
				corr_entry($select_data[$i]);
				echo $result[$select_data[$i]];
				echo "<br>";
				$i = $i + 1;
			}
		} else {
			echo "查询失败，请请检查输入信息是否有误";
		}
		mysql_close($conn);
	}
 
	// $search_info = $_POST['search_info'];
	// $search_type = $_POST['search_type'];
	// $select_data = $_POST['select_data'];

	// //通过php连接到mysql数据库
	// $conn=mysql_connect("127.0.0.1:3306","root","");

	// //选择数据库
	// mysql_select_db("sampledb");

	// //设置客户端和连接字符集
	// mysql_query("set names utf8");

	// if ($search_type = "sample_id") {
	// 	//通过php进行insert操作
	// 	$sqlselect="select * from sample where sample_id = '{$search_info}' order by id";
	// } elseif ($search_type = "sample_name") {
	// 	$sqlselect="select * from sample where sample_name = '{$search_info}' order by id";
	// } else {
	// 	$sqlselect="select * from sample where order_id = '{$search_info}' order by id";
	// }

	// $result=mysql_query($sqlselect);
	// if ($result = mysql_fetch_array($result)) {
	// 	$i = 0;
	// 	while ($select_data[$i]) {
	// 		corr_entry($select_data[$i]);
	// 		echo $result[$select_data[$i]];
	// 		echo "<br>";
	// 		$i = $i + 1;
	// 	}
	// } else {
	// 	echo "查询失败，请请检查输入信息是否有误";
	// }
	

	//echo $select_data[0];	
	//释放连接资源
	// mysql_close($conn);

	//header("Location: http://localhost/index.html?id=".$id); 



	// //添加用户信息到数据库
	// $test = mysql_query($sqlinsert);
	// if ($test == 1) {
	// 	echo "数据输入成功";
	// } else {
	// 	echo "数据输入失败，请检查样本编号是否有误";
	// }



?>
