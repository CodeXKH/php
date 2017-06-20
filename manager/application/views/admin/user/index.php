<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CMS管理后台</title>

	</head>
	<body>

			
			<!-- 用户列表主体开始 -->		
			<div id="layout_right_content" class="layout_right_content">
				<!-- 用户列表面包屑 -->
				<div class="route_bg">
					<a href="<?php echo base_url()?>admin/main/index">主页</a><i class="fa fa-angle-double-right" style="padding:5px 5px 0px 5px"></i>
					<a href="javascript:void(0)">用户列表</a>
				</div>
				<!-- 用户列表面包屑结束 -->
				
				<!-- 用户列表导航条 -->			
				<div class="route_nav">
					<button type="button" class="btn btn-success nav_add">添加用户</button>
					<button type="button" class="btn btn-success nav_search">搜索用户</button>
					<input type="text" class="form-control" id="nav_txt" placeholder="请输入用户名称" value="<?=$username ?>">
					<div style="clear: both;"></div>
				</div>
				<!-- 用户列表导航条结束 -->				
			
				<div class="route_con">
					<table class="table table-hover">
						<thead>
							<tr>
								<th style="text-align: center">序号</th>
								<th style="text-align: center">姓名</th>
								<th style="text-align: center">邮箱</th>
								<th style="text-align: center">时间</th>
								<th style="text-align: center">操作</th>
							</tr>
						</thead>
						<tbody>
						<?php  $i=1?>
						<?php foreach ($user as $item):?>
							<tr style="text-align: center">
								<th scope="row" style="text-align: center"><?=$i++?></th>
								<td><?=$item->username?></td>
								<td><?=$item->email?></td>
								<td><?=$item->regdate?></td>
								<td>
									<a href="<?php echo base_url().'admin/user/main/edit/'.$item->id?>"  title="更新"><i class="fa fa-pencil-square-o edit_hover"></i></a>
									<a href="javascript:void(0)" onclick="td_delete(<?=$item->id?>)" title="删除"><i class="fa fa-trash-o del_hover"></i></a>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>	
					
					<div class="con_pager">
						<div id="pager" ></div><!--分页-->	
						<div style="clear: both;"></div>
					</div>
							
				</div>				
			</div>		
			<!-- 用户列表主体结束 -->

		<script type="text/javascript" language="javascript">

	        $(document).ready(function() {
		        
		        //调用分页方法
	            $("#pager").pager({ pagenumber: 1, pagecount: <?=$count ?>, buttonClickCallback: PageClick });

		        //添加用户
	            $(".nav_add").click(function(){
						location.href="<?php echo base_url().'admin/user/main/add'?>";
		         })
		         
		        //模糊查询
	            $(".nav_search").click(function(){
	            	var username=$('#nav_txt').val();
					if(isEmpty(username)){
						 $(".nav_search").focus();
						 alert("内容不能为空!");
						 return false;
					}
	            	location.href="<?php echo base_url().'admin/user/main/index/'?>"+username;
		         })
	        });

	        
	        //删除数据
	        function td_delete(id){
				var icon = $(this).attr("icon");
				$.tmDialog.confirm({width:450,height:250,title:"退出",icon:icon,content:"您确认删除吗!!!",callback:function(ok){
					if(ok){
			        	$.ajax({
							type:"post",
							url:"<?php echo site_url('admin/user/main/user_delete');?>",
							data:{"id":id},
							success:function(data){
								if(data==1){
									toastr.success("删除成功");
									location.reload();
								}else{
									toastr.error("删除失败");
								}
							}
						});
					}
				}});		        
		    }
	        
	        //ajax请求分页
	        PageClick = function(pageclickednumber) {
	            $("#pager").pager({ pagenumber: pageclickednumber, pagecount: <?=$count ?>, buttonClickCallback: PageClick });
				$.ajax({
					type:"post",
					url:"<?php echo base_url().'admin/user/main/user_page'?>",
					dataType:"json",
					data:{"pagenumber":pageclickednumber,"username":$('#nav_txt').val()},
					success:function(data){
						var html="";
						var sort=(pageclickednumber-1)*10;
						for(var n=0;n<data.length;n++){
							html+="<tr style='text-align: center'>"
								+"  <th scope='row' style='text-align: center'>"+(++sort)+"</th>"
								+"  <td>"+data[n].username+"</td>"
								+"  <td>"+data[n].email+"</td>"
								+"  <td>"+data[n].regdate+"</td>"
								+"  <td>"
								+"	  <a href='<?php echo base_url().'admin/user/main/edit/'?>"+data[n].id+"' title='更新'><i class='fa fa-pencil-square-o'></i></a>"
								+"	  <a href='javascript:void(0)' onclick='td_delete("+data[n].id+")' title='删除'><i class='fa fa-trash-o'></i></a>"
								+"</td>"
								+"</tr>";
						}
						$(".table tbody").html(html);
					}
				});
	        }
		</script>			
	
	</body>
</html>
