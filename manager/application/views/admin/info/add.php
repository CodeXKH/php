<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CMS管理后台</title>
	</head>

	<body>
		<!-- 采购信息列表主体开始 -->
		<div id="layout_right_content" class="layout_right_content">
			<!--添加采购信息面包屑-->
			<div class="route_bg">
				<a href="<?php echo base_url()?>admin/main/index">主页</a><i class="fa fa-angle-double-right" style="padding: 5px 5px 0px 5px"></i>
				<a href="javascript:void(0)">添加采购信息</a>
			</div>
			<!--添加采购信息面包屑结束-->

			<div class="route_con">
				<form class="form-horizontal">

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-1 control-label">采购负责人</label>
						<div class="col-sm-5">
							<input type="email" class="form-control" id="people" maxlength="20" name="people" placeholder="购负责人">
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-1 control-label">部门</label>
						<div class="col-sm-5">
							<select class="form-control" id="departId">
								<?php foreach ($depart as $item):?>
									<option value="<?=$item->id?>"><?=$item->name?></option>
								<?php endforeach;?>										
							</select>	
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-1 control-label">采购时间</label>
						<div class="col-sm-5">
							<input type="email" class="form-control" id="createTime" maxlength="20" name="createTime" placeholder="采购时间">
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-1 control-label">采购金额</label>
						<div class="col-sm-5">
							<input type="email" class="form-control" id="price" maxlength="20" name="price" placeholder="采购金额">
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-1 control-label">详情描述</label>
						<div class="col-sm-5">
							<textarea class="form-control" rows="3" placeholder="详情描述" id="detail"  name="detail" ></textarea>
						</div>
					</div>

					<div class="form-group">
						<button type="button" style="margin: 19px 33px 3px;" class="btn btn-success" onclick="submitdata()">（成功）Success</button>
						<button type="button" style="margin: 19px 3px 3px;" class="btn btn-primary" onclick="location='<?php echo base_url().'admin/info/main'?>'">（返回）Success</button>
					</div>

				</form>
			</div>
		</div>
		<!-- 采购信息列表主体结束 -->
		<script type="text/javascript">
		
			function submitdata() {
				
				var people = $("#people").val();
				var departId = $("#departId").val();
				var createTime = $("#createTime").val();
				var price = $("#price").val();
				var detail = $("#detail").val();
				
				if(isEmpty(people)){
					 $("#people").focus();
					 alert("请输入负责人姓名!");
					 return false;
				}
				if(isEmpty(departId)){
					 $("#departId").focus();
					 alert("请选择部门!");
					 return false;
				}
				if(isEmpty(createTime)){
					 $("#createTime").focus();
					 alert("请输入采购时间!");
					 return false;
				}
				if(isEmpty(price)){
					 $("#price").focus();
					 alert("请输入采购金额!");
					 return false;
				}
				if(isEmpty(detail)){
					 $("#detail").focus();
					 alert("请输入详情描述!");
					 return false;
				}

				$.ajax({
					type: "post",
					url: "<?php echo site_url('admin/info/main/info_add');?>",
					data: {
						"people": people,
						"departId": departId,
						"createTime": createTime,
						"price": price,
						"detail": detail
					},
					success: function(data) {
						if (data == 1) {
							toastr.success("添加成功");
							setTimeout("location.href='<?php echo base_url().'admin/info/main'?>'",2000);
						} else {
							toastr.error("添加失败");
						}
					}
				});
			}
		</script>
	</body>

</html>