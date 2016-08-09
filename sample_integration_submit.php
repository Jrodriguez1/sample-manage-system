<?php
	header("content-type:text/html;charset=utf-8");
	 
	//开启session
	session_start();
	 
	//接收表单传递的信息
	$sample_integrate_id = $_POST['sample_integrate_id'];
	$sample_integrate_name = $_POST['sample_integrate_name'];
	$sample_date = $_POST['sample_date'];
	$sample_number = $_POST['sample_number'];
	$sample_temperature = $_POST['sample_temperature'];
	$fridge_layer = $_POST['fridge_layer'];
	$save_position = $_POST['save_position'];
	$is_backup = $_POST['is_backup'];
	$is_resample = $_POST['is_resample'];
	$man_in_charge = $_POST['man_in_charge'];
	$remark = $_POST['remark'];
	$gene = $_POST['gene'];
	$locus = $_POST['locus'];
	$mutation_frequency = $_POST['mutation_frequency'];
	$method = $_POST['method'];
	$kit_manufacturer = $_POST['kit_manufacturer'];
	$kit_name = $_POST['kit_name'];
	$integration_sample_id = $_POST['integration_sample_id'];
	 
	//通过php连接到mysql数据库
	$conn=mysql_connect("127.0.0.1:3306","root","");
	 
	//选择数据库
	mysql_select_db("sampledb");

	//设置客户端和连接字符集
	mysql_query("set names utf8");

	//切分整合的样本编号，顺便去掉可能误输入的尾部多余分号
	$integration_sample_id = explode(";", $integration_sample_id);
	$count = count($integration_sample_id);
	if (empty($integration_sample_id[$count - 1]) == 1) {
		$count = $count - 1;
	}

	$integratoinsamplecheck="insert into sample_integration_corr (sample_integrate_id) values('{$sample_integrate_id}')";
	$res = mysql_query($integratoinsamplecheck);
	if ($res == 1) {
		while ($count > 0) {
			$flag = 0;
			$sampleidinsert="insert into sample_integration (sample_id, sample_integrate_id) values('{$integration_sample_id[$count - 1]}', '{$sample_integrate_id}')";
			$result = mysql_query($sampleidinsert);
			if ($result == 1) {
				// echo "数据输入成功";
				// echo "<br>";
			} else {
				// echo "数据输入失败，请检查输入是否有误";
				// echo "<br>";
				$flag = 1;
				break;
			}
			$count = $count - 1;
		}
		if ($flag == 0) {
			//通过php进行insert操作
			$sqlinsert="insert into sample_integration_info (sample_integrate_id, sample_integrate_name, sample_date, sample_number, sample_temperature, fridge_layer, save_position, is_backup, is_resample, remark, man_in_charge, gene, locus, mutation_frequency, method, kit_manufacturer, kit_name) values('{$sample_integrate_id}','{$sample_integrate_name}','{$sample_date}','{$sample_number}','{$sample_temperature}','{$fridge_layer}','{$save_position}','{$is_backup}','{$is_resample}','{$remark}','{$man_in_charge}','{$gene}','{$locus}','{$mutation_frequency}','{$method}','{$kit_manufacturer}','{$kit_name}')";

			//添加用户信息到数据库
			$test = mysql_query($sqlinsert);
			if ($test == 1) {
				echo "数据输入成功";
			} else {
				echo "数据输入失败，请检查整合样本编号是否有误并重新输入";
				$delete1 = "delete from sample_integration where sample_integrate_id = '$sample_integrate_id'";
				$delete2 = "delete from sample_integration_corr where sample_integrate_id = '$sample_integrate_id'";
				$r1 = mysql_query($delete1);
				$r2 = mysql_query($delete2);
			}
		} else {
			$delete2 = "delete from sample_integration_corr where sample_integrate_id = '$sample_integrate_id'";
			$r2 = mysql_query($delete2);
			$delete1 = "delete from sample_integration where sample_integrate_id = '$sample_integrate_id'";
			$r1 = mysql_query($delete1);
			echo "数据输入失败，请检查原始样本编号是否存在并重新输入";
		}
	} else {
		echo "数据输入失败，请检查整合样本编号是否已经存在并重新输入";
		$delete2 = "delete from sample_integration_corr where sample_integrate_id = '$sample_integrate_id'";
		$r2 = mysql_query($delete2);
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

	<form method="post" action="sample_integration_input.html">
		<td><input type="submit" value="继续输入"></td> 
	</form>

	<form method="post" action="index.html">
		<td><input type="submit" value="回到首页"></td> 
	</form>