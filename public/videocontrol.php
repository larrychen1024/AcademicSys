<?php
include_once("header.php");
?>

<!--content-->
<link href="private/styles/coursevideo.css" rel="stylesheet" type="text/css" />
    <!--content-->
    <div id="homecontent">
		<div class="all_left">
			<div class="column2">
			<h2>视频管理</h2>
            <div class='imgholder'></div>
            
           <ol class="videolist">
			<?php
			$con=mysql_connect("116.255.150.169:3306","larrychen_f","a619841516");	//连接数据库

			$db=mysql_select_db("larrychen");	//选择数据库
			mysql_query("set names 'gbk'");	//设定字符集
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}
			if(!$con)
			{
				/***************创建数据库：myschool*****************/
				$sql="CREATE DATABASE larrychen";
				mysql_query($sql,$con);
				//echo "database created";
			}else
			{/********************检查数据表：questionlist是否存在***************************/	
				//echo "<script>alert('正在创建数据库！'); </script>";
				$sql = "SELECT * FROM  `videolist`";	//SQL语句
				$result = mysql_query($sql,$con);	//执行SQL语句
				if(!$result)
				{
					/***************未查询到结果，就创建数据表：questionlist*****************/
					$sql = "CREATE TABLE `larrychen`.`videolist` (`ID` TINYINT(16) NOT NULL AUTO_INCREMENT PRIMARY KEY, `coursename` VARCHAR(128) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL,`videoname` CHAR(128) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL, `description` CHAR(128) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL) ENGINE = InnoDB;";
					//echo $sql;
					mysql_query($sql,$con);
					$sql = "ALTER TABLE `user` ADD UNIQUE( `ID`);";
					mysql_query($sql,$con);
					$sql = "ALTER TABLE `user` ADD INDEX(`ID`);";
					mysql_query($sql,$con);
					$sql = "ALTER TABLE `videolist` ADD  `Time` DATETIME NOT NULL ;";
					//echo $sql;
					mysql_query($sql,$con);
					//echo "<script>alert('数据库创建成功！'); </script>";			
				}
			}
			
			
			$sql = "SELECT * FROM  `videolist`";	//SQL语句
			$result = mysql_query($sql,$con);	//执行SQL语句
			date_default_timezone_set('Asia/Shanghai');//设置时区
			$time=date('y-m-d H:i:s',time());		
			while($row = mysql_fetch_array($result))	//将数据以索引方式储存在数组中)
			{
			?>
			<li> 
			<p class="video_name"> <?php echo "《".$row['coursename']."》";?></p>
            
			<p> <?php echo $row['description'];?></p>
            <p class="readmore"> <?php echo "上传时间：".$row['Time'];?></p>
				<div class="play">
				<p class="readmore">
				<a href="removevideo.php?rmid=<?php echo $row['ID'];?>&videoname=<?php echo $row['videoname'];?>" class="show" name="">删除这条记录 &raquo;</a>
				</p>
				</div>
           </p>
       
            </li>
            	
                 <?php
					}
		  		 ?>
			
        	<br class='clear'>
			</ol>

			</div>
		</div>
		<!--video-->
		<p class="readmore">
           	<a href="videoupload.php" class="show" name="">视频上传&raquo;</a>
		</p>
		<br class="clear">
	</div>
<!--end content--->

<?php
include_once("footer.php");
?>