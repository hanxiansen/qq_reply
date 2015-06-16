<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>那些神回复</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="my_style.css">
</head>
<body>
<h1>那些神回复</h1>
<div id="main">
	<?php
	   error_reporting(E_USER_NOTICE);
		/* 设置页码显示编码格式 */
		header("Content-type: text/html;charset=utf-8");
	
		/* 配置数据库 */
		require('db_conf.php');

    	/* 获取页码 */
    	//通过get获取要显示的页码
		$page = $_GET['p'];
    	//设置初始
    	if($page == null) {
    	    $page = 1;
    	}
    	//设置要是显示出来的页码
    	$show_page = 5;
		//设置分页数据(通过sql语句将每页显示的列表用数据语言表示出来)
        $sql = "select * from qq_01 limit ".(($page-1)*5).",5";
        //把sql语言传入数据库
	    $result = mysql_query($sql);
	    //对分页数据进行处理
	    if ($result) { 
	        while (false != $row = mysql_fetch_assoc($result)) {
	            echo "<div class='create_reply'>";
	            echo "<h3>".$row['title']."</h3>";
	            $content = $row['content'];
	            //超过300字符串的部分替换为......
	            if (strlen($content) > 300) {
	                $str1 = substr($content, 0, 300);
	                $content = $str1."......";
	            }
	            echo "<div class='content'>".$content."</div>";
	            echo "<a class='want_alter' href='create_reply.php?p=".$row['id']."'>查看详情</a>";
	            echo "</div>";
	        }
	    }
	    
	    /* 设置页码显示 */
    	//设置页码显示的初级状态
    	$page_banner  = "<div class='page_banner'>";
    	//上一页
    	$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a>";
    	
    	//具体页码显示
        //计算总页码
        $total_query = mysql_query("select count(*) from qq_01");
        $total_fetch = mysql_fetch_array($total_query);
        $total_page =  $total_fetch['count(*)'];
        //利用for循环将页码展示出来
    	for ($i = 1; $i<=ceil($total_page/$show_page); $i++) {
    	    $page_banner .= "<span class='page_num'></span>";
    	    $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>$i</a>";
    	    $page_banner .= "</span>";
    	}
    	
    	//下一页
    	$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a>";
    	//将页码结果输出为html形式
    	echo $page_banner."</div>";
    	//释放结果
    	mysql_free_result($result);
    	//关闭数据库连接
    	mysql_close($conn);
	?>
</div>
	

    


</body>
</html>




