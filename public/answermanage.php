<?php
include_once("header.php");
?>
<link href="private/styles/coursevideo.css" rel="stylesheet" type="text/css" />
<!--content-->
    <div id="homecontent">
    <div class="all_left">
      <div class="column2">
	  <ol class="videolist">
        
		<?php
		
		$con=mysql_connect("116.255.150.169:3306","larrychen_f","a619841516");	

		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
			}
		$db=mysql_select_db("larrychen");	//选择数据库
		mysql_query("set names 'gbk'");	//设定字符集
		$sql = "SELECT * FROM  `questionlist`";	//SQL语句
		$result = mysql_query($sql,$con);	//执行SQL语句
		$num = mysql_num_rows($result);	//统计执行结果影响的行数
		while($row = mysql_fetch_array($result))	//将数据以索引方式储存在数组中)
		{
		?>
		<li>
			
			<?php 
			echo "问题：".$row['question']."。[".$row['Time']."]";
			echo "<p>描述：".$row['description']."</p>";
			?>
            <div class='imgholder'></div>
            <p>
			<?php 
			if($row['answer']!=""){
			echo "答案：<strong color='blue'>".$row['answer']."</strong>";
			}else{
				echo "答案："."等待回答...";
				}
				?>
            </p>
			
           
			<p class="readmore"><a href="delte.php?delteid=<?php echo $row['ID'];?>">删除这条记录 &raquo;</a></p>	
			<br class='clear'>
			</li>
		<?php
		}
		?>
        </ol>
      </div>

    </div>
    
    <br class="clear">
  </div>
    <!--end content-->


<?php
include_once("footer.php");
?>
