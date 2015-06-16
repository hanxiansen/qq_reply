<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>处理神回复</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="my_style.css">
</head>
<body>
<?php 
    include 'db_conf.php';
    //将传入的get数据进行数据格式化处理
    $sql = "select * from qq_01 where id= ".$_GET['p'];
    //将数据化后的语言导入mysql_query方法中
    $result = mysql_query($sql);
    //对进行query处理后的语言进行输出
    $qq_res = mysql_fetch_assoc($result);
    echo '<div id="main">';
    echo '<h2>'.$qq_res['title'].'<h2>';
    echo '<div class="reply_content">'.$qq_res['content'].'</div>';
    
    
    echo '</div>';

?>









</div>
</body>
</html>




