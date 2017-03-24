<?php
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册")
	{
		$user = $_POST["username"];
		$psw = md5($_POST["password"]);
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		$psw_confirm = md5($_POST["confirm"]);
		
		if($user == "" || $psw == "" || $psw_confirm == "")
		{
			echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
		}
		else
		{
			if($psw == $psw_confirm)
			{
				$con=mysql_connect("116.255.150.169:3306","larrychen_f","a619841516");	//连接数据库
				if (!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				  }

				$db=mysql_select_db("larrychen");	//选择数据库
				/****************检查数据库是否存在*****************/
				if(!$db)
				{
					/***************创建数据库：myschool*****************/
					$sql="CREATE DATABASE larrychen";
					mysql_query($sql,$con);
				}
				mysql_query("set names 'gbk'");	//设定字符集
				$sql = "select username from user where username = '$_POST[username]'";	//SQL语句
				$result = mysql_query($sql,$con);	//执行SQL语句
				/****************检查数据表是否存在*****************/
				if(!$result)
				{
					/***************创建数据表：user*****************/
					$sql = "CREATE TABLE `larrychen`.`user` (`ID` INT(16) NOT NULL AUTO_INCREMENT PRIMARY KEY, `username` VARCHAR(16) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL, `password` CHAR(32) NOT NULL, `email` VARCHAR(24) NOT NULL, `phone` CHAR(16) NOT NULL) ENGINE = InnoDB;";
					mysql_query($sql,$con);
					$sql = "ALTER TABLE `user` ADD UNIQUE( `ID`);";
					mysql_query($sql,$con);
					$sql = "ALTER TABLE `user` ADD INDEX(`ID`);";
					mysql_query($sql,$con);
					//echo "database created";
				}	
				$sql = "select username from user where username = '$_POST[username]'";	//SQL语句
				$result = mysql_query($sql,$con);	//执行SQL语句
				$num = mysql_num_rows($result);	//统计执行结果影响的行数
				if($num)	//如果已经存在该用户
				{
					echo "<script>alert('用户名已存在'); history.go(-1);</script>";
				}
				else	//不存在当前注册用户名称
				{			
					$sql = "INSERT INTO `larrychen`.`user` (`ID`, `username`, `password`, `email`, `phone`) VALUES (NULL, '$user', '$psw', '$email', '$phone');";
					//echo $sql;
					$res_insert = mysql_query($sql,$con);
					if($res_insert)
					{
						//echo "<script>alert('注册成功！'); history.go(-1);</script>";
						echo "<script>alert('注册成功！'); window.location.href='../index.php';</script>";
					}
					else
					{
						echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
					}
				}
			}
			else
			{
				echo "<script>alert('密码不一致！'); history.go(-1);</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('提交未成功！'); history.go(-1);</script>";
	}
	/*******关闭数据库*********/
	mysql_close($con);
?>