
<!-- ####################################################################################################### -->
<div class="wrapper col5">
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
			include("getip.php");
			include("counts_visitors.php");
			$ip=get_real_ip(); 
			echo "本机IP：".$ip;
		?>
	</p>
	<br class="clear" />
	<!--<p class="fl_left">
		<?php 
		echo "网站累计访问次数：".$countstr;
		?>
	</p>-->
	<br class="clear" />
	<br class="clear" />
  </div>
</div>
</body>
</html>