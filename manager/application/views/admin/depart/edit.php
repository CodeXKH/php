<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CMS管理后台</title>
	</head>

	<body>
		<!-- 部门列表主体开始 -->
		<div id="layout_right_content" class="layout_right_content">
			<!--更新部门面包屑-->
			<div class="route_bg">
				<a href="<?php echo base_url()?>admin/main/index">主页</a><i class="fa fa-angle-double-right" style="padding: 5px 5px 0px 5px"></i>
				<a href="javascript:void(0)">更新部门</a>
			</div>
			<!--更新部门面包屑结束-->

			<div class="route_con">
				<form class="form-horizontal">

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-1 control-label">部门名</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="name" maxlength="20" name="name"  value="<?php echo $name;?>">
						</div>
					</div>

					<div class="form-group">
						<button type="button" style="margin: 19px 33px 3px;" class="btn btn-success" onclick="submitdata()">（成功）Success</button>
						<button type="button" style="margin: 19px 3px 3px;" class="btn btn-primary" onclick="location='<?php echo base_url().'admin/depart/main'?>'">（返回）Success</button>
					</div>

				</form>
			</div>
		</div>
		<!-- 部门列表主体结束 -->
		<script type="text/javascript">
		
			function submitdata() {
				var name = $("#name").val();
				
				if(isEmpty(name)){
					 $("#name").focus();
					 return false;
				}
		
				$.ajax({
					type: "post",
					url: "<?php echo site_url('admin/depart/main/depart_update');?>",
					data: {
						"name": name,"id": <?=$id ?>
					},
					success: function(data) {
						if (data == 1) {
							toastr.success("更新成功");
							location.href="<?php echo base_url().'admin/depart/main'?>";
						} else if(data == 2){
							toastr.error("该部门已经存在，在更换部门名");
						}else {
							toastr.error("更新失败");
						}
					}
				});
			}
		</script>
	</body>

</html>