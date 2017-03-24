<?php
include_once("header.php");
?>
<?php
	
	
	if(isset($_POST["submit"]) && $_POST["submit"] == "提交")
	{
		if(isset($_SESSION['permission'])&&$_SESSION['permission']==1)
		{/***************管理员登陆*************************/
			$questionid=$_POST['questionid'];
			$answer=$_POST['answer'];
			$con=mysql_connect("116.255.150.169:3306","larrychen_f","a619841516");	//连接数据库

			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
				}

			$db=mysql_select_db("larrychen");	//选择数据库
			mysql_query("set names 'gbk'");	//设定字符集
			$sql="UPDATE `larrychen`.`questionlist` SET `answer`='$answer' WHERE `ID`=$questionid;";
			$res_insert = mysql_query($sql,$con);
			if($res_insert)
			{
							
				echo "<script>alert('答案提交成功！'); window.location.href='answeronline.php';</script>";
			}
			else
			{
				//echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
			}
		}
		else
		{/***************用户登陆登陆*************************/
		$question = $_POST["question"];
		$description = $_POST["description"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		date_default_timezone_set('Asia/Shanghai');//设置时区
		$time=date('y-m-d H:i:s',time());
		if(!isset($_SESSION['user_id'])){
				echo "<script>alert('请登录后在提交问题！');</script>";
		}else
		{
			//echo $question.$description.$email.$password;
			if($question == "" || $description == "" || $email == ""|| $password == "")
			{
				echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
			}
			else
			{
				
					$con=mysql_connect("116.255.150.169:3306","larrychen_f","a619841516");	//连接数据库

					if (!$con)
					 {
					  die('Could not connect: ' . mysql_error());
					  }

					$db=mysql_select_db("larrychen");	//选择数据库
					mysql_query("set names 'gbk'");	//设定字符集
					/****************检查数据库是否存在*****************/
					if(!$db)
					{
						/***************创建数据库：larrychen*****************/
						$sql="CREATE DATABASE larrychen";
						mysql_query($sql,$con);
						//echo "database created";
					}else{/********************检查数据表：questionlist是否存在***************************/	
						//echo "<script>alert('正在创建数据库！'); </script>";
						$sql = "SELECT * FROM  `questionlist` WHERE  `question` =  '$question'";	//SQL语句
						$result = mysql_query($sql,$con);	//执行SQL语句
						if(!$result){
						/***************未查询到结果，就创建数据表：questionlist*****************/
						$sql = "CREATE TABLE `larrychen`.`questionlist` (`ID` TINYINT(16) NOT NULL AUTO_INCREMENT PRIMARY KEY, `question` VARCHAR(128) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL, `description` CHAR(128) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL,`answer` CHAR(128) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL, `email` VARCHAR(16) NOT NULL, `password` CHAR(16) NOT NULL) ENGINE = InnoDB;";
						mysql_query($sql,$con);
						$sql = "ALTER TABLE `user` ADD UNIQUE( `ID`);";
						mysql_query($sql,$con);
						$sql = "ALTER TABLE `user` ADD INDEX(`ID`);";
						mysql_query($sql,$con);
						$sql = "ALTER TABLE `questionlist` ADD `Time` DATETIME NOT NULL;";
						mysql_query($sql,$con);
						//echo "<script>alert('数据库创建成功！'); </script>";
						
						}
					}
					$sql = "SELECT * FROM  `questionlist` WHERE  `question` =  '$question'";	//SQL语句
					$result = mysql_query($sql,$con);	//执行SQL语句
					$num = mysql_num_rows($result);	//统计执行结果影响的行数
					if(!$num)	//如果不存在该问题
					{
						//echo "查询结果：".$num;
						$sql="INSERT INTO `larrychen`.`questionlist` (`ID`, `question`, `description`, `email`, `password`,`Time`) VALUES (NULL, '$question', '$description', '$email', '$password','$time');";
						//echo $sql;
						$res_insert = mysql_query($sql,$con);
						if($res_insert)
						{
							
							echo "<script>alert('问题提交成功！'); window.location.href='answeronline.php';</script>";
						}
						else
						{
							echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
						}
					}
					else	//如果存在该问题
					{			
						echo "<script>alert('该问题已经存在！'); history.go(-1);</script>";
						
					}
				mysql_close($con);
				}
			}
		/*******关闭数据库*********/
		}
	}
	else
	{
		//echo "<script>alert('提交未成功！'); history.go(-1);</script>";
		//echo "<script>alert('提交未成功！'); </script>";
	}
	
?>
<link rel="stylesheet" href="private/styles/answeronline.css" type="text/css" />
<link rel="stylesheet" href="private/styles/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="private/styles/form.css" type="text/css" />
<script type="text/javascript" src="private/scripts/utility.js"></script>   
<div id="homecontent" class="answerlist">
    <div class="all_left">
	<!--list-->
    
    <div class="sample">
        <h1>在线答疑</h1>
		
		<dl class="faqs">
<!--	<dt>Is this the first question?</dt>
        <dd>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.</dd>
        <dt>If the previous was the first question this must be the second one. Isn't it?</dt>
        <dd>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. </dd>
        <dt>And what about the third question?</dt>
        <dd>Nam eget dui. Etiam rhoncus. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. </dd>
-->		<ol class="questionlist">
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
			$sql = "SELECT * FROM  `questionlist`";	//SQL语句
			$result = mysql_query($sql,$con);	//执行SQL语句
			if(!$result)
			{
				/***************未查询到结果，就创建数据表：questionlist*****************/
				$sql = "CREATE TABLE `larrychen`.`questionlist` (`ID` TINYINT(16) NOT NULL AUTO_INCREMENT PRIMARY KEY, `question` VARCHAR(128) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL, `description` CHAR(128) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL,`answer` CHAR(128) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL, `email` VARCHAR(16) NOT NULL, `password` CHAR(16) NOT NULL) ENGINE = InnoDB;";
				mysql_query($sql,$con);
				$sql = "ALTER TABLE `user` ADD UNIQUE( `ID`);";
				mysql_query($sql,$con);
				$sql = "ALTER TABLE `user` ADD INDEX(`ID`);";
				mysql_query($sql,$con);
				$sql = "ALTER TABLE  `questionlist` ADD  `Time` DATETIME NOT NULL ;";
				mysql_query($sql,$con);
				//echo "<script>alert('数据库创建成功！'); </script>";			
			}
		}
		
		$sql = "SELECT * FROM  `questionlist`";	//SQL语句
		$result = mysql_query($sql,$con);	//执行SQL语句
		$time=date('y-m-d H:i:s',time());		
		while($row = mysql_fetch_array($result))	//将数据以索引方式储存在数组中)
		{
		?>
		
		<li><dt><?php echo $row['question'].":".$row['description']."。[".$row['Time']."]";?></dt>
		<dd><?php if($row['answer']!=""){
			echo $row['answer'];
			}else {
				echo "等待回答...";
				}
				?>
				</dd>
			</li>
		<?php
		}
		?>
			</dl> 
		</ol>		
		<?php	
		if(isset($_SESSION['permission'])&&$_SESSION['permission']==1)
		{
		?>
			<p class="readmore"><a href="answermanage.php" class="">问题管理&raquo;</a></p>
		<?php
			}
		?>
	</div>
	<!--end list-->
    <!--form-->
    <div class="register-container container">
            <div class="row">
            
                <div class="register span6">
					
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <h3>
						<?php	
						if(isset($_SESSION['permission'])&&$_SESSION['permission']==1)
						{
							echo "提交答案";
						}else{
						?>
						提交你的问题
						<?php
							}
						?> <span class="red"><strong>Now!</strong></span></h3>
                        <label for="firstname">
						<?php	
						if(isset($_SESSION['permission'])&&$_SESSION['permission']==1)
						{
							echo "请选择将要回答的问题：";
						}else{
						?>
						问题
						<?php
							}
						?>
						</label>
						<?php
						if(isset($_SESSION['permission'])&&$_SESSION['permission']==1)
						{
						?>
						<select name="questionid" class="selectquestion">
							<?php 
							$con=mysql_connect("116.255.150.169:3306","larrychen_f","a619841516");	//连接数据库

							$db=mysql_select_db("larrychen");	//选择数据库
							mysql_query("set names 'gbk'");	//设定字符集
							if (!$con)
							{
								die('Could not connect: ' . mysql_error());
								}	
							$sql = "SELECT * FROM  `questionlist`";	//SQL语句
							$result = mysql_query($sql,$con);	//执行SQL语句
							while($row = mysql_fetch_array($result))	//将数据以索引方式储存在数组中)
							{
								echo "<option value=".$row['ID'].">".$row['question']."</option>";
								};
							?>
						</select>
						<?php 
						}
						else
						{
						?>
						<input type="text" id="firstname" name="<?php	
							if(isset($_SESSION['permission'])&&$_SESSION['permission']==1)
							{
							echo "questionid";
							}else{
							echo "question";
							}
							?>" placeholder="<?php	
							if(isset($_SESSION['permission'])&&$_SESSION['permission']==1)
							{
							echo "请选择将要回答的问题：";
							}else{
							echo "enter your question...";
							}
							?>">
						<?php
						}
						?>
                        <label for="lastname">
						<?php	
						if(isset($_SESSION['permission'])&&$_SESSION['permission']==1)
						{
							echo "答案";
						}else{
						?>
						描述
						<?php
							}
						?>
						</label>
                        <input type="text" id="lastname" name="<?php	
						if(isset($_SESSION['permission'])&&$_SESSION['permission']==1)
						{
							echo "answer";
						}else{
							echo "description";
						}
						?>" placeholder="<?php	
						if(isset($_SESSION['permission'])&&$_SESSION['permission']==1)
						{
							echo "enter the answer...";
						}else{
							echo "enter detail description...";
						}
						?>">
						<?php	
						if(!isset($_SESSION['permission'])||$_SESSION['permission']!=1)
						{
						?>
						
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="enter your email...">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="choose a password...">
						<?php
						}
						?>
                        <button type="submit" name="submit" value="提交">提交</button>
                    </form>
	
                </div>
            </div>
        </div>
    
    <!--end form-->
	</div>
</div>
<?php
include_once("footer.php");
?>