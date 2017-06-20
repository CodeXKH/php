<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>采购系统后台</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/index.css" />
		<script src="<?php echo base_url(); ?>static/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo base_url(); ?>static/js/util.js" type="text/javascript" charset="utf-8"></script>

	</head>

	<body bgcolor="#F7F5FA">
		<!--顶部-->
		<div class="layout_top_header">
			<div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #8d8d8d">采购系统后台管理</span></div>
		</div>
		<!--顶部结束-->
		
		<!--中部开始-->
		<div class="layout_content">
			<div class="c_sign">
				<div class="s_con"><input type="text" id="user"  placeholder="请输入用户名"   /></div>
				<div class="s_con"><input type="password" id="pwd" placeholder="请输入密码"  /></div>
				<div class="s_con"><input type="text" id="ver"  placeholder="请输入验证码" /><a href="javascript:void(0)" onclick="load_captcha('captcha','<?php echo site_url('captcha/index');?>');" title="换一张" id="captcha" ><?php echo $img  ?></a></div>
				<div class="s_but"><button class='b_login'>登 录</button></div>
			</div>
		</div>
		<!--中部结束-->
		
		<!--版权-->
		<div class="layout_footer">
			<p style="line-height: 30px">Copyright © 2017 - 采购系统后台</p>
		</div>
		<!--版权结束-->
		
		<script type="text/javascript">
			/*点击更换验证码*/
			function load_captcha(id,url){
				$('#'+id).html('');
				$("#"+id).load(url); 
	        }
			$(function(){
				$(".b_login").on("click",cms_login);
			});

			/*空格登录*/
			$(document).keydown(function(e){
				if(e.keyCode==13){
					$(".b_login").trigger("click");
				}
			});
			
			/*登陆方法*/
			function cms_login(){
				var user = $("#user").val();
				var pwd = $("#pwd").val();
				var ver = $("#ver").val();
				
				if(isEmpty(user)){
					 $("#user").focus();
					 alert("请输入账号!");
					 return false;
				}
				
				if(isEmpty(pwd)){
					 $("#pwd").focus();
					 alert("请输入密码!");
					 return false;
				}
				
				if(isEmpty(ver)){
					 $("#ver").focus();
					 alert("请输入验证码!");
					 return false;
				}
				
				$.ajax({
					type:"post",
					/* beforeSend:function(){$(".b_login").off("click").text("登陆中...");},
					error:function(){$(".b_login").on("click",tm_login).text("登陆");}, */
					data:{"name":user,"password":pwd,"verimg":ver},
					url:"<?php echo site_url('admin/login/user');?>",
					success:function(data){
						if(data==0){
							alert('验证码错误');
							load_captcha('captcha','<?php echo site_url('captcha/index');?>');
						}else if(data==1){
							window.location.href = "<?php base_url()?>/admin/main/index";
						}else {
							alert("请正确输入账号和密码 ！");
							$("#user").select();
							$("#pwd").val("");
							$("#b_login").on("click",cms_login).text("登陆");
							load_captcha('captcha','<?php echo site_url('captcha/index');?>');
						}
					}
				});

			};
		</script>
	</body>

</html>