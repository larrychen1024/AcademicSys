<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//开启一个会话
session_start();
?>
<html>
<head>
<title>数字信号处理及VLSI设计</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<?php if($curfile!="teachingteam.php") {
	?>
<script type="text/javascript" src="../scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="../scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.cycle.setup.js"></script>
<?
	}
?>
</head>
<body>
<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
       <div class="topbox">
        <h2>注册须知</h2>
        <p>未注册的用户名请先注册，用户可以使用中文名注册。</p>
        <p>注册时，请使用英文和数字混合作为密码，密码长度不少于6位。</p>
        <p>注册本网站，则默认同意本站注册协议。</p>
        <p class="readmore"><a href="#">用户协议 &raquo;</a></p>
      </div>
      <div class="topbox">
        <h2>教师登陆入口</h2>
        <form action="logincheck.php" method="post">
          <fieldset>
            <legend>Teachers Login Form</legend>
            <label for="teachername">用户名:
              <input type="text" name="username" id="teachername" value="" />
            </label>
            <label for="teacherpass">密码:
              <input type="password" name="password" id="teacherpass" value="" />
            </label>
            <label for="teacherremember">
              <input class="checkbox" type="checkbox" name="teacherremember" id="teacherremember" checked="checked" />
              记住密码</label>
            <p>
              <input type="submit" name="submit" id="teacherlogin" value="登陆" />
              &nbsp;
              <a href="register.php">注册</a>
            </p>
          </fieldset>
        </form>
      </div>
      <div class="topbox last">
        <h2>学生登陆入口</h2>
        <form action="logincheck.php#" method="post">
          <fieldset>
            <legend>Pupils Login Form</legend>
            <label for="pupilname">用户名:
              <input type="text" name="username" id="pupilname" value="" />
            </label>
            <label for="pupilpass">密码：
              <input type="password" name="password" id="pupilpass" value="" />
            </label>
            <label for="pupilremember">
              <input class="checkbox" type="checkbox" name="pupilremember" id="pupilremember" checked="checked" />
              记住密码</label>
            <p>
              <input type="submit" name="submit" id="pupillogin" value="登陆" />
              &nbsp;
              <a href="register.php">注册</a>
            </p>
          </fieldset>
        </form>
      </div>
      <br class="clear" />
    </div>
    <div id="loginpanel">
      <?php
        if(!isset($_SESSION['user_id'])){
           // echo '<p class="error">'.$error_msg.'</p>';
        ?>	
		<ul>
        <li class="left">点击登陆 &raquo;</li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel">管理员</a><a id="closeit" style="display: none;" href="#slidepanel">关闭面板</a></li>
		</ul>
	 <?php 
		}
		else if( isset($_SESSION['username']))
		{
		?>
		<ul>
		<li class="left"><?php	echo $_SESSION['username']; ?></li>
        <li class="right" id="toggle"><a id="slideit" href="logout.php?ge=0">注销</a></li>
		</ul>
		<?php	
			}
		?> 
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<?php
$curfile = basename($_SERVER['PHP_SELF']);
?>
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="#">数字信号处理及VLSI设计</a></h1>
      <!--<p>精品课程</p>-->
    </div>
    <div id="topnav">
      <ul>
        <li ><a href="../index.php">课程介绍</a></li>
        <li <?php if($curfile=="leadingteacher.php") echo "class='active'";?>> <a href="leadingteacher.php">主讲教师</a></li>
        <li <?php if($curfile=="teachingteam.php") echo "class='active'";?>><a href="teachingteam.php">教师团队</a></li>
        <li <?php if($curfile=="teachingcontent.php") echo "class='active'";?>><a href="teachingcontent.php">教学内容</a></li>
        <li <?php if($curfile=="coursevideo.php") echo "class='active'";?>><a href="coursevideo.php">课程录像</a></li>
        <li <?php if($curfile=="reference.php") echo "class='active'";?>><a href="reference.php">参考资料</a></li>
        <li class="last"><a href="answeronline.php">在线答疑</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>