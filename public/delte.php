<?php
include_once("header.php");
?>
<!--content-->
    <div id="homecontent">
    <div class="all_left">
<?php
		$con=mysql_connect("larrychen","larrychen_f","a619841516");	//连接数据库
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
			}
		$db=mysql_select_db("larrychen");	//选择数据库
		mysql_query("set names 'gbk'");	//设定字符集
		if(isset($_GET['delteid'])&&$_GET['delteid']!='')
		{
			$delteid=$_GET['delteid'];
			//echo "即将删除的记录：".$delteid;
			$sql="DELETE FROM  `larrychen`.`questionlist` WHERE  `questionlist`.`ID` = $delteid "; 
			
			$result = mysql_query($sql,$con);	//执行SQL语句
		}else
		{
			//echo "<script>alert('删除失败！');</script>";
		}
		$home_url = 'answermanage.php';
		header('Location: '.$home_url);
?>

    </div>
    
    <br class="clear">
  </div>
<?php
include_once("footer.php");
?>
