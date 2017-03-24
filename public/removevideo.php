<?php
include_once("header.php");
?>
<!--content-->
    <div id="homecontent">
    <div class="all_left">
<?php
		$con=mysql_connect("116.255.150.169:3306","larrychen_f","a619841516");	//连接数据库

		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
			}
		$db=mysql_select_db("larrychen");	//选择数据库
		mysql_query("set names 'gbk'");	//设定字符集
		if(isset($_GET['rmid'])&&$_GET['rmid']!='')
		{
			$rmid=$_GET['rmid'];
			$videoname=$_GET['videoname'];
			//echo "即将删除的记录：".$rmid;
			$sql="DELETE FROM  `larrychen`.`videolist` WHERE  `videolist`.`ID` = $rmid "; 
			
			$result = mysql_query($sql,$con);	//执行SQL语句
			$FilePath="videos/".$videoname;
			
			//删除文件或目录 
			if(is_file($FilePath))
			{ 
				if(unlink($FilePath))
				{ 
					echo "<script> alert("."'"."本地文件：".$FilePath."删除成功！"."'".");</script>"; 
				}else
				{ 
					echo "<script> alert("."'"."本地文件：".$FilePath."删除失败！尝试修改文件权限删除..."."'".");</script>";
					if(chmod($FilePath,0777))
					{ 
						unlink($FilePath); 
						echo "<script> alert("."'"."本地文件：".$FilePath."权限修改后删除完毕！"."'".");</script>";
					}else
					{ 
						echo "<script> alert("."'"."本地文件：".$FilePath."无法通过WEB方式删除，可能是FTP权限对此文件有所设置！"."'".");</script>";
					} 
				} 
			}  
		}else
		{
			echo "<script>alert('删除失败！');</script>";
		}
		$home_url = 'videocontrol.php';
		header('Location: '.$home_url);
?>

    </div>
    
    <br class="clear">
  </div>
<?php
include_once("footer.php");
?>
