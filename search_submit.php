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

	function corr_table($entry_name) {
		switch ($entry_name) {
		case "1":
			$res1 = "select * from sample where id = '{$res}' order by id";
			return $res1;
			break;
		case "2":
			$res1 = "select * from sample_use_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "3":
			$res1 = "select * from client_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "4":
			$res1 = "select * from sample_name_corresponding where id = '{$res}' order by id";
			return $res1;
			break;
		case "5":
			$res1 = "select * from sample_dna_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "6":
			$res1 = "select * from dna_use_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "7":
			$res1 = "select * from sample_rna_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "8":
			$res1 = "select * from rna_use_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "9":
			$res1 = "select * from sample_library_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "10":
			$res1 = "select * from library_use_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "11":
			$res1 = "select * from sample_capture_library_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "12":
			$res1 = "select * from capture_library_use_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "13":
			$res1 = "select * from sample_library_miseq where id = '{$res}' order by id";
			return $res1;
			break;
		case "14":
			$res1 = "select * from miseq_sequence_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "15":
			$res1 = "select * from sample_library_nextseq_run where id = '{$res}' order by id";
			return $res1;
			break;
		case "16":
			$res1 = "select * from nextseq_sequence_info where id = '{$res}' order by id";
			return $res1;
			break;
		case "17":
			$res1 = "select * from sample_library_pgm where id = '{$res}' order by id";
			return $res1;
			break;
		case "18":
			$res1 = "select * from pgm_sequence_info where id = '{$res}' order by id";
			return $res1;
			break;
		default:
			echo "未选择查询数据";
		}
	}

	//SQL获取信息
	function get_data($id, $select_data, $colname) {
		//开启session
		session_start();

		//通过php连接到mysql数据库
		$conn=mysql_connect("127.0.0.1:3306","root","cailun781");

		//选择数据库
		mysql_select_db("sampledb");

		//设置客户端和连接字符集
		mysql_query("set names utf8");

		$count = 0;
		while ($id[$count]) {
			//print_r('<pre>');
			//print_r($id);
			$res = $id[$count];
			$table_id = $res['attrs'];
			$table_id = $table_id['table_id'];
			$res = $res['id'];
			$sqlselect=corr_table($table_id);
			$result=mysql_query($sqlselect);

			if ($result = mysql_fetch_array($result)) {
				$i = 0;
				while ($colname[$i]) {
					echo $colname[$i];
					echo "：";
					echo $result[$colname[$i];
					echo "<br>";
					$i = $i + 1;
				}
				echo "<br>";
			} else {
				echo "查询失败，请请检查输入信息是否有误";
			}
			
			$count++;
		}
		//$sqlselect="select * from sample where id = '{$id}' order by id";
		//$result=mysql_query($sqlselect);

		//if ($result = mysql_fetch_array($result)) {
		//	$i = 0;
		//	while ($select_data[$i]) {
		//		corr_entry($select_data[$i]);
		//		echo $result[$select_data[$i]];
		//		echo "<br>";
		//		$i = $i + 1;
		//	}
		//} else {
		//	echo "查询失败，请请检查输入信息是否有误";
		//}
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
