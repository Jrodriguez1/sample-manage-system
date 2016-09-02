<!-- <html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>coreseek中文全文搜索在php程序中的应用</title>
</head>
<body>
<h3><font color="blue">coreseek全文搜索在php程序中应用</font></h3>
<form action="index.php" method="post">
输入搜索的关键词：<input type="text" name="keyword" size="30" />
<input type="submit" name="sub" value="搜索" />
</form>
<hr /> -->
<?php
echo "<pre />";
#引入接口文件，其实你懂的，就是一个类
require_once('sphinxapi.php');
if(isset($_POST['sub']) && $_POST['keyword'] != ''){
    $keyword = trim($_POST['keyword']);    //接收关键词

    $sph = new SphinxClient();            //实例化 sphinx 对象
    $sph->SetServer('localhost',9312);    //连接9312端口
    $sph->SetMatchMode(SPH_MATCH_ANY);    //设置匹配方式
    $sph->SetSortMode(SPH_SORT_RELEVANCE);    //查询结果根据相似度排序
    $sph->SetArrayResult(true);                //设置结果返回格式,true以数组,false以PHP hash格式返回，默认为false
    
    $result = $sph->query($keyword, 'dede');//执行搜索操作,参数(关键词，索引名)
    print_r($result);
}
?>