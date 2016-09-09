<?php
	// 要命了 notice 也会出来 调试用
	// error_reporting(E_ALL); 
	// ini_set('display_errors', '1'); 
	// ini_set('error_log', dirname(__FILE__) . '/error_log.txt'); //将出错信息输出到一个文本文件 #引入接口文件，其实你懂的，就是一个类

	include '/var/coreseek-3.2.14/testpack/api/sphinxapi.php';
	include 'search_submit.php';

	//获取上个页面输入的信息
	$search_info = $_POST['search_info'];
	$select_data = $_POST['select_data'];

	$sph = new SphinxClient();            //实例化 sphinx 对象
	$sph->SetServer('127.0.0.1',9312);    //连接9312端口
	$sph->SetMatchMode(SPH_MATCH_ALL);    //设置匹配方式
	$sph->SetSortMode(SPH_SORT_RELEVANCE);    //查询结果根据相似度排序
	$sph->SetArrayResult(true);                //设置结果返回格式,true以数组,false以PHP hash格式返回，默认为false
	$sph->SetLimits(0, 1000, 10000);  //匹配结果的偏移量，参数的意义依次为：起始位置，返回结果条数，最大匹配条数
	$sph->SetMaxQueryTime(10);   //最大搜索时间

	$index = '*'; //索引源是配置文件中的 index 类，如果有多个索引源可使用,号隔开：'email,diary' 或者使用'*'号代表全部索引源
	$result = $sph->Query ($search_info, $index);
 
	$result = $result['matches'];
	
	get_data($result, $select_data);

	// $id = $result["matches"];
	// echo $id;

?>
	<hr>

	<form method="post" action="fullsearch.html">
		<td><input type="submit" value="继续检索"></td> 
	</form>

	<form method="post" action="index.html">
		<td><input type="submit" value="回到首页"></td> 
	</form>
