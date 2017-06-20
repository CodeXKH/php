<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CMS管理后台</title>
	</head>

	<body>
		<!-- 用户列表主体开始 -->
		<div id="layout_right_content" class="layout_right_content">
			<!--更新用户面包屑-->
			<div class="route_bg">
				<a href="<?php echo base_url()?>admin/main/index">主页</a><i class="fa fa-angle-double-right" style="padding: 5px 5px 0px 5px"></i>
				<a href="javascript:void(0)">更新用户</a>
			</div>
			<!--更新用户面包屑结束-->

			<div class="route_con">
				<form class="form-horizontal">

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-1 control-label">用户名</label>
						<div class="col-sm-5">
							<input type="email" class="form-control" id="username" maxlength="20" name="username" placeholder="用户名"  value="<?php echo $username;?>">
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-1 control-label">密码</label>
						<div class="col-sm-5">
							<input type="password" class="form-control" id="password" maxlength="20" name="password" placeholder="密码" >
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-1 control-label">邮箱</label>
						<div class="col-sm-5">
							<input type="email" class="form-control" id="email" maxlength="20"  name="email" placeholder="邮箱"  value="<?php echo $email;?>">
						</div>
					</div>

					<div class="form-group">
						<button type="button" style="margin: 19px 33px 3px;" class="btn btn-success" onclick="submitdata()">（成功）Success</button>
						<button type="button" style="margin: 19px 3px 3px;" class="btn btn-primary" onclick="location='<?php echo base_url().'admin/user/main'?>'">（返回）Success</button>
					</div>

				</form>
			</div>
		</div>
		<!-- 用户列表主体结束 -->
		<script type="text/javascript">
		
			function submitdata() {
				var username = $("#username").val();
				var password = $("#password").val();
				var email = $("#email").val();
				
				if(isEmpty(username)){
					 $("#username").focus();
					 return false;
				}
				if(isEmpty(password)){
					 $("#password").focus();
					 alert("请输入密码!");
					 return false;
				}
				if(isEmpty(email)){
					 $("#email").focus();
					 alert("请输入邮箱!");
					 return false;
				}
				$.ajax({
					type: "post",
					url: "<?php echo site_url('admin/user/main/user_update');?>",
					data: {
						"username": username,"password": password,"email": email,"id": <?=$id ?>
					},
					success: function(data) {
						if (data == 1) {
							toastr.success("更新成功");
							location.href="<?php echo base_url().'admin/user/main'?>";
						} else if(data == 2){
							toastr.error("该用户已经存在，在更换用户名");
						}else {
							toastr.error("更新失败");
						}
					}
				});
			}
		</script>
	</body>

</html>