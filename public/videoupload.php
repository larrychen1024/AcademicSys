<?php
include_once("header.php");
?>
<link rel="stylesheet" href="private/styles/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="private/styles/form.css" type="text/css" />
<script type="text/javascript" src="private/scripts/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	//google验证
	$("#getcode_gg").click(function(){
		$(this).attr("src",'code_gg.php?' + Math.random());
	});
	$(".code_input").mouseleave(function(){
		var code_gg = $("#code_gg").val();
		$.post("chk_code.php?act=gg",{code:code_gg},function(msg){
			if(msg==1){
				//alert("验证码正确！");
			}else{
				//alert("验证码错误！");
			}
		});
	});

});
</script>
<?php
	if(isset($_POST["submit"]) && $_POST["submit"] == "上传")
	{			//判断是否执行提交操作
		$coursename=$_POST['coursename'];
		$description=$_POST['description'];
		if(!is_dir("videos"))
		{			//判断指定文件夹是否存在
			mkdir("videos");			//创建文件夹
		}
		$file=$_FILES['videoname']['name'];			//获取表单提交的文件名称
		//echo "<script>alert('正在处理！'); </script>";		
		if($_FILES['videoname']['error']>0)
		{						//判断文件是否可以上传到服务器
			//echo "上传错误:";
			switch($_FILES['videoname']['error'])
			{
				case 1:
					echo "<script>alert('上传文件大小超出配置文件规定值'); history.go(-1);</script>";
				break;
				case 2:
					echo "<script>alert('上传文件大小超出表单中约定值'); history.go(-1);</script>";
				break;
				case 3:
					echo "上传文件不全";
				break;
				case 4:
					echo "<script>alert('没有上传文件'); history.go(-1);</script>";
				break;	
			}
		}else
		{
			if(is_uploaded_file($_FILES["videoname"]["tmp_name"]))
			{	//对提交进行验证
				date_default_timezone_set('Asia/Shanghai');//设置时区
				//$time=date('y-m-d H:i:s',time());
				$floatTime=time();
				$str=substr($_FILES['videoname']['name'],-4,4);
				$path="videos/".$floatTime.$str;
				$con=mysql_connect("116.255.150.169:3306","larrychen_f","a619841516");	//连接数据库

				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
					}
				$db=mysql_select_db("larrychen");	//选择数据库
				mysql_query("set names 'gbk'");	//设定字符集
				$floatTime=$floatTime.$str;
				$time=date('y-m-d H:i:s',time());
				$sql_1="INSERT INTO `larrychen`.`videolist` (`ID`, `coursename`, `videoname`, `description`, `Time`) VALUES (NULL, '$coursename', '$floatTime', '$description', '$time');";
				mysql_query($sql_1);
				if(move_uploaded_file($_FILES["videoname"]["tmp_name"],$path))
				{	//执行文件上传操作
					echo "<script> alert('视频上传成功');</script>";
					
					$home_url = 'coursevideo.php';
					header('Location: '.$home_url);
				}else {
					echo "<script>alert('视频上传失败！'); </script>";	
				}	
			}
		}
	}
	?>
<!--content-->
<link href="private/styles/coursevideo.css" rel="stylesheet" type="text/css" />
    <!--content-->
    <div id="homecontent">
		<div class="all_left">
			<div class="column2">
			<h2>视频管理</h2>
            <div class='imgholder'></div>
			
			</div>
		
		</div>
		
		<div class="register-container container">
            <div class="row">
            
                <div class="register span6">
                    <form action="videoupload.php"  enctype="multipart/form-data" method="post">
                        <h3>上传视频 <span class="red"><strong>Now!</strong></span></h3>
                        <label for="firstname">课程名称：</label>
                        <input type="text" id="firstname" name="coursename" placeholder="enter the coursename...">
                        <label for="lastname">视频描述</label>
                        <input type="text" id="lastname" name="description" placeholder="enter the description...">
						
						<label for="firstname">选择视频文件：</label>                       
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
						<input type="file" id="lastname" name="videoname">
						<!--<label for="firstname">验证码：</label>   
                        <input type="text" class="code_input" id="code_gg" placeholder="enter your checkcode..."/> <img src="code_gg.php" id="getcode_gg" title="看不清，点击换一张" align="absmiddle">-->
                        <button type="submit" name="submit" value="上传">上传</button>
                    </form>
                </div>
            </div>
        </div>
    
		<br class="clear">
	</div>
<!--end content--->

<?php
include_once("footer.php");
?>