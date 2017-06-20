<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>采购系统后台管理</title>


		<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/index.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/font-awesome.min.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/bootstrap.min.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>static/sg/sg.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>static/uploadify/uploadify.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>static/toastr/toastr.min.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/Pager.css" type="text/css" media="screen" />
		

		<script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>static/sg/sg.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>static/sg/sgutil.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>static/toastr/toastr.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>static/js/util.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.pager.js"></script>
	</head>

	<body>
		<!--顶部-->
		<div class="layout_top_header">
			<div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #8d8d8d">采购系统后台</h1></span></div>
			<div id="ad_setting" class="ad_setting">
				<a class="ad_setting_a" href="javascript:; ">
					<i class="fa fa-user"></i>
					<span><?php echo $name = $this->session->userdata('name');?></span>
					<i class="fa fa-arrow-down"></i>
				</a>
				<ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
					<li class="ad_setting_ul_li"> <a><i class="fa fa-user"></i> 个人中心 </a> </li>
					<li class="ad_setting_ul_li"> <a><i class="fa fa-cog"></i> 设置 </a> </li>
					<li class="ad_setting_ul_li" id="m_destroy" data-open="lslide" icon="warn"> <a><i class="fa fa-sign-out"></i><span class="font-bold"> 退出</span> </a> </li>
				</ul>
			</div>
		</div>
		<!--顶部结束-->
		
		<!--菜单-->
		<div class="layout_left_menu">
			<ul id="menu">
				<li class="childUlLi">
					<a href="javascript:void(0)" class="menu_head"> <i class="fa fa-bars"></i>用户管理</a>
					<ul style="display:none" class="menu_body">
						<li><a href="<?php echo base_url().'admin/user/main'?>"><i class="fa fa-angle-right"></i>用户列表</a></li>
						<li><a href="<?php echo base_url().'admin/user/main/add'?>"><i class="fa fa-angle-right"></i>添加用户</a></li>
					</ul>
				</li>
				<li class="childUlLi">
					<a href="javascript:void(0)" class="menu_head"> <i class="fa fa-bars"></i>部门管理</a>
					<ul style="display:none" class="menu_body">
						<li><a href="<?php echo base_url().'admin/depart/main'?>"><i class="fa fa-angle-right"></i>部门列表</a></li>
						<li><a href="<?php echo base_url().'admin/depart/main/add'?>"><i class="fa fa-angle-right"></i>添加部门</a></li>
					</ul>
				</li>
				<li class="childUlLi">
					<a href="javascript:void(0)" class="menu_head"> <i class="fa fa-bars"></i>采购管理</a>
					<ul style="display:none" class="menu_body">
						<li><a href="<?php echo base_url().'admin/info/main'?>"><i class="fa fa-angle-right"></i>采购信息列表</a></li>
						<li><a href="<?php echo base_url().'admin/info/main/add'?>"><i class="fa fa-angle-right"></i>添加采购信息</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!--菜单结束-->
		
		<!--底部-->	
		<div class="layout_footer">
			<p style="line-height: 30px">Copyright © 2017 - 采购系统后台</p>
		</div>
		<!--底部结束-->
		
		<script type="text/javascript" src="<?php echo base_url(); ?>static/js/common.js"></script>
		<script type="text/javascript">
				var path=location.pathname;
				
				$("#menu").find("li").each(function(){
					$(this).find("li>a").each(function(){
					
						var href=$(this).attr("href");
		
						if(href.toLocaleLowerCase().indexOf(path) >-1){
							$(this).parent().parent().css("display","block");
							$(this).parent().parent().parent().attr("class","childUlLi selected opened");
						} 
					});
				});

		</script>
	</body>

</html>