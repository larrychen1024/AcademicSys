<?php
/*开始一个会话*/
session_start();
$lastpage=$_GET['page'];
$error_msg = "";
//如果用户未登录，即未设置$_SESSION['user_id']时，执行以下代码
if(!isset($_SESSION['user_id'])){
	if(isset($_POST["submit"]) && $_POST["submit"] == "登陆")
	{
		$user = $_POST["username"];
		$psw = md5($_POST["password"]);
		if($user == "" || $psw == "")
		{
			echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
		}
		else
		{
			$con=mysql_connect("116.255.150.169:3306","larrychen_f","a619841516");	//连接数据库

			mysql_select_db("larrychen");
			mysql_query("set names 'gbk'");
			/*********************************取出这一行*********************************/
			$sql = "select * from user where username = '$user' and password = '$psw'";
			$result = mysql_query($sql);
			$num = mysql_num_rows($result);
			if($num==1)
			{
				$row = mysql_fetch_array($result);	//将数据以索引方式储存在数组中
				$_SESSION['user_id']=$row['ID'];
                $_SESSION['username']=$row['username'];
				//echo $row['ID'].$row['username'].$row['email'].$row['phone'];
				//echo "<script>alert('登陆成功！'); window.location.href='../index.php';</script>";
				//echo $lastpage;
                if($psw=='228cb804830fa11f765a66e5a37daa67')
                {
					$_SESSION['permission']=1;
                }
				echo "<script>alert('登陆成功！');</script>";
				$home_url = '../index.php';
				
				
				
               header('Location: '.$home_url);
			}
			else
			{
				echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
			}
		}
	}
}else
	{
		echo "<script>alert('提交未成功！'); history.go(-1);</script>";
	}

?>