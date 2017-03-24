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
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
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
        <form action="public/logincheck.php" method="post">
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
              <a href="public/regcheck.php">注册</a>
            </p>
          </fieldset>
        </form>
      </div>
      <div class="topbox last">
        <h2>学生登陆入口</h2>
        <form action="public/logincheck.php#" method="post">
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
              <a href="public/register.php">注册</a>
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
        <li class="right" id="toggle"><a id="slideit" href="public/logout.php">注销</a></li>
		</ul>
		<?php	
			}
		?> 
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="#">数字信号处理及VLSI设计</a></h1>
      <!--<p>精品课程</p>-->
    </div>
    <div id="topnav">
      <ul>
        <li class="active"><a href="#">课程介绍</a></li>
        <li><a href="public/leadingteacher.php?pagename='leadingteacher.php'" >主讲教师</a></li>
        <li><a href="public/teachingteam.php">教师团队</a></li>
        <li><a href="public/teachingcontent.php">教学内容</a></li>
        <li><a href="public/coursevideo.php">课程录像</a></li>
        <li><a href="public/reference.php">参考资料</a></li>
        <li class="last"><a href="public/answeronline.php">在线答疑</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="featured_slide">
    <div class="featured_box"><a href="#"><img src="images/1.jpg" alt="" /></a>
      <div class="floater">
        <h2>1. 重庆市研究生教育优质课程</h2>
        <p> 重庆邮电大学《数字信号处理VLSI设计》课程建设已经成为第三批立项建设重庆市研究生教育优质课程。《数字信号处理 VLSI 设计》无论是从人才培养还是从课程建设的角度看，都属于数字集成电路设计类课程中较为前沿基础类的课程，需要有信号与系统、数字信号处理、数字集成电路设计、电子设计自动化方面的基础知识。是从事数字集成电路及系统设计、计算机及通信类电子产品开发所必备的一门专业课程。
</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
    </div>
    <div class="featured_box"><a href="#"><img src="images/2.jpg" alt="" /></a>
      <div class="floater">
        <h2>2.教师团队</h2>
        <p>教学团队成员长期从事微电子学与固体电子学专业的硕士研究生的教学工作，主要承担了《数字信号处理VLSI设计》，《半导体器件物理》，《集成电路器件电子学》，《量子论与光子技术》，《微电子器件可靠性》等专业基础课及专业核心课程。已完成市级教改项目多项，在研省部级教改项目4项。获得省部级教学成果奖2项。
</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
    </div>
    <div class="featured_box"><a href="#"><img src="images/3.jpg" alt="" /></a>
      <div class="floater">
        <h2>3. 教学理念</h2>
        <p>课程组遵照"理论与实践教学相结合，以工程应用为主体"的教学理念，在教学方法和手段方面采取了一系列的举措，取得了良好的教学效果。</p><p>本课程是是电子和通信类专业的专业基础课程，实际应用范围广泛。在工科专业人才的实践能力和创新能力培养中占据重要地位。在该课的教学过程中遵循下面的教学理念。</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
    </div>
    <div class="featured_box"><a href="#"><img src="images/4.jpg" alt="" /></a>
      <div class="floater">
        <h2>4. 师生互动</h2>
        <p>《数字信号处理VLSI设计》课程建设，非常注重师生间的互动交流。包括课堂上的理论教学，课堂下的实践教学，都鼓励学生勇于提出自己的疑问，通过学术交流来澄清对一些基本概念的认识，加深对所学理论及设计技术的深入了解。
</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
    </div>
    <div class="featured_box"><a href="#"><img src="images/5.jpg" alt="" /></a>
      <div class="floater">
        <h2>5. 学术交流</h2>
        <p>《数字信号处理VLSI设计》课题组注重学术交流。王巍教授经常参加集成电路设计领域的国内及国际会议。积极参与承办了"2013国际微纳技术及应用研讨会"，参加了2012年-2014年集成电路设计分会举办的ICCAD年会。
</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="homecontent">
    <div class="fl_left">
      <div class="column2">
       <h2>课程简介</h2>
            
            <p> 《数字信号处理VLSI设计》是重庆邮电大学光电工程学院面向微电子学与固体电子学、电路与系统、集成电路工程专业研究生所开设的一门专业课程。学时数为32学时。</p>
            <p>本课程主要介绍数字信号处理的算法、算法的VLSI硬件设计技术。具体内容包括计算机算法基础、FIR数字滤波器算法及FPGA实现、IIR数字滤波器算法及FPGA实现、DFT算法及FPGA优化设计技术、多级信号处理的硬件设计、迭代边界、流水线及并行处理、重定时、展开和折叠、脉动结构设计等。</p>
            <div class="imgholder"><img src="images/6.jpg" class="imglist"alt="" /></div>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        <br class="clear" />
        <h2> 课程定位</h2>
            <div class="imgholder"></div>
            <p> 重庆邮电大学《数字信号处理VLSI设计》课程目前为校级研究生教育优质课程，在此基础上，该课程成为第三批立项建设重庆市研究生教育优质课程。</p><p>《数字信号处理 VLSI 设计》无论是从人才培养还是从课程建设的角度看，都属于数字集成电路设计类课程中较为前沿基础类的课程，需要有信号与系统、数字信号处理、数字集成电路设计、电子设计自动化方面的基础知识。是从事数字集成电路及系统设计、计算机及通信类电子产品开发所必备的一门专业课程。力求建成重庆市研究生教育优质课程，为重庆市高校开设该类课程提供公共的共享资源，开放其他高校的研究生选修该课程。</p>
            
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        <br class="clear" />
        <h2>教学手段和方法</h2>
            <div class="imgholder"></div>
            <p> 采用灵活多样的方式和先进的教学理念来开展教学活动。首先，采用理论教学与实验教学相结合的方式；其次，在课堂教学过程中，采用引导式、提问式等课堂教学手段，积极调动学生的课堂学习积极性，触发他们对一些问题进行深入思考；其三，在考核环节，除了考察理论知识的熟悉程度，更加重要的是布置堂下实验项目，并请学生就所完成的设计及仿真结果进行讨论分析； 其四，在课程教学网站上，开设在线答疑专栏，给学生提供实时在线与各位教师进行问题交流的渠道。

</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        <br class="clear" />
        
      </div>

    </div>
    <div class="fl_right">
      <h2>教师团队</h2>
      <ul>
        <li>
          <div class="imgholder"><a href="#"><img src="public/private/images/teachers/1.jpg" class="teacherlist" alt="" /></a></div>
          <p><strong><a href="#">王巍</a></strong></p>
          <p>王巍，男，湖南邵阳人，博士，教授，硕士生导师，电子科技大学微电子学与固体电子学专业博士，中科院微电子所博士后，清华大学信息技术研究院访问学者。美国IEEE高级会员；中国电子学会高级会员；中国光学学会高级会员；中国宇航学会光电技术专业委员会常务委员；《红外与激光工程》编委；《功能材料与器件学报》理事会理事...</p>
          <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        </li>
        <li>
          <div class="imgholder"><a href="#"><img src="public/private/images/teachers/zhangdeming.jpg" class="teacherlist" alt="" /></a></div>
          <p><strong><a href="#">张德明</a></strong></p>
          <p>张德民，男，1955年5月出生，广东梅州人，重庆邮电大学二级教授。国务院"政府特殊津贴"获得者，先后获"四川省优秀青年教师"、"邮电部优秀青年骨干教师"、"邮电部有突出贡献专家"、"全国师德先进个人"、"重庆市优秀教师"、"重庆市名师"等荣誉称号。教育部电子信息科学与工程类教学指导分委员会委员，中国电子学会、中国通信学会高级会员，重庆市电信通信学会通信网与电源专业委员会委员，重庆市第一届政协委员...</p>
          <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        </li>
        <li>
          <div class="imgholder"><a href="#"><img src="public/private/images/teachers/yanghong.jpg " class="teacherlist" alt="" /></a></div>
          <p><strong><a href="#">杨虹</a></strong></p>
          <p>杨虹，男，教授，1966年6月生，四川蓬溪人，1988年毕业于东南大学半导体物理及器件专业，获工学学士学位，1995年8月毕业于电子科技大学电子材料与元器件专业，获工学硕士学位。主要从事电子科学与技术学科、微电子学与固体电子学学科科研和教学工作。现任光电工程学院副院长。重庆市半导体行业协会理事、中国通信学会会员、2004年度首届重庆市高校优秀青年骨干教师、2008年度学校优秀研究生导师...</p>
          <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        </li>
        <li>
          <div class="imgholder"><a href="#"><img src="public/private/images/teachers/pangyu.jpg" class="teacherlist" alt="" /></a></div>
          <p><strong><a href="#">庞宇</a></strong></p>
          <p>庞宇，1978年生，重庆邮电大学光电学院副教授。目前为IEEE会员。受加拿大自然科学与工程理事会（Natural Sciences and Engineering Research Council of Canada, NSERC）及魁北克自然科学与科技研究基金（Fonds Québécois de la Recherchesur la Nature et les Technologies，FQRNT）资助...</p>
          <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        </li>
        <li>
          <div class="imgholder"><a href="#"><img src="public/private/images/teachers/zhanghongsheng.jpg" class="teacherlist" alt="" /></a></div>
          <p><strong><a href="#">张红升</a></strong></p>
          <p>张红升，男，1980年7月生，博士，副教授，硕士生导师。分别于2001、2004和2012年在西安交大微电子专业获学士、硕士和博士学位。长期从事DAB系统和芯片设计研究...</p>
          <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        </li>
        <li class="last">
          <div class="imgholder"><a href="#"><img src="public/private/images/teachers/yuanjun.jpg" class="teacherlist" alt="" /></a></div>
          <p><strong><a href="#">袁军</a></strong></p>
          <p>袁军，男，博士、副教授。

2012年毕业于日本高知工科大学，获博士学位。袁博士长期从事模拟混合电路的测试及验证领域的研究工作...</p>
		<p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
        </li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="http://www.cqupt.edu.cn">重庆邮电大学</a> <a href="#"> 光电工程学院</a></p>
	
		  
	
	<p class="fl_right">
	<?php 
		date_default_timezone_set('Asia/Shanghai');//设置时区
		$time=date('y-m-d H:i:s',time());
		echo "北京时间：20".$time;
	?>
	</p>
	
    <br class="clear" />
	
	<p class="fl_left">
		<?php 
			include("public/getip.php");
			include("public/counts_visitors.php");
			$ip=get_real_ip(); 
			echo "本机IP：".$ip;
		?>
	</p>
	
	<br class="clear" />
	<p class="fl_left">
	<?php 
		echo "网站累计访问次数：".$countstr;
	?>
	</p>
	<br class="clear" />
  </div>
</div>
</body>
</html>
