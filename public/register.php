<?php
include_once("header.php");
?>
<link rel="stylesheet" href="private/styles/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="private/styles/form.css" type="text/css" />

<script type="text/javascript" src="private/scripts/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	/*匹配用户名*/
	$("input#firstname").mouseleave(function(){
	var preg = /^[\u4e00-\u9fa5A-Za-z0-9_]+$/; //匹配用户名
	var username=$("input#firstname").attr("value");	
	
	if(preg.test(username))
	{
		$("p.username").text(" ");
	}
	else{
		$("p.username").text("用户名格式错误，请使用数字,字母,下划线,中文的组合！");
		}
	});
	
	/***邮箱正则表达式***/
	$("input#email").mouseleave(function(){
	var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; //匹配Email 
	var email=$("input#email").attr("value");	
	
	if(preg.test(email))
	{
		//$("p.email").text("邮箱格式正确！");
		$("p.email").text(" ");
	}
	else{
		$("p.email").text("邮箱格式错误！");
		}
	});
	/**匹配电话*/
	/***邮箱正则表达式***/
	$("input#phone").mouseleave(function(){
	var preg = /^1\d{10}$/; //匹配电话
	var email=$("input#phone").attr("value");	
	
	if(preg.test(email))
	{
		//$("p.phone").text("电话格式正确！");
		$("p.phone").text(" ");
	}
	else{
		$("p.phone").text("电话格式错误！");
		}
	});
	//google验证
	$("#getcode_gg").click(function(){
		$(this).attr("src",'code_gg.php?' + Math.random());
	});
	$(".code_input").mouseleave(function(){
		var code_gg = $("#code_gg").val();
		$.post("chk_code.php?act=gg",{code:code_gg},function(msg){
			if(msg==1){
				
				//$("p.code_input").text("验证码正确！");
				$("p.code_input").text(" ");
			}else{
				
				$("p.code_input").text("验证码错误！");
			}
		});
	});

});
</script>
<div id="homecontent">
	
	<div class="register-container container">
            <div class="row">
            
                <div class="register span6">
                    <form action="regcheck.php" method="post">
                        <h3>马上注册 <span class="red"><strong>Now!</strong></span></h3>
                        <label for="firstname">用户名：<p class="username"> </p></label>
                        <input type="text" id="firstname" name="username" placeholder="enter your username...">
                        <label for="lastname">密码：<p class="password"> </p></label>
                        <input type="password" id="lastname" name="password" placeholder="enter your password...">
						<label for="lastname">确认密码：<p class="confirmpwd"> </p></label>
                        <input type="password" id="lastname" name="confirm" placeholder="confirm your password...">
                        <label for="email">Email：<p class="email"> </p></label>
                        <input type="text" id="email" name="email" placeholder="enter your email...">
                        <label for="password">电话：<p class="phone"> </p></label>
                        <input type="text" id="phone" name="phone" placeholder="enter your phone...">
                        <label for="password">验证码：<p class="code_input"> </p></label>
                        <input type="text" class="code_input" id="code_gg" placeholder="enter your checkcode..."/> <img src="code_gg.php" id="getcode_gg" title="看不清，点击换一张" align="absmiddle">
                        <button type="Submit" name="Submit" value="注册">注册</button>
                    </form>
                </div>
            </div>
        </div>
    <br class="clear">
  </div>
    <!--end content-->


<?php
include_once("footer.php");
?>