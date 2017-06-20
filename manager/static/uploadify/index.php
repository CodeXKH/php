<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="jquery.min.js" type="text/javascript"></script>
<script src="jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>

<body>
	<h1>Uploadify Demo</h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>
	<script type="text/javascript">
		$(function() {
			$('#file_upload').uploadify({
				'swf'      : 'uploadify.swf',
				'buttonText': '上传图片',
				 'width'     : 99,//flash宽 由于设置的背景图片的宽是60 高是22 所以这里和下面设置60 22
			     'height'    : 24,//flash高
				'formData'     : {
					'id' : '666',
				},
				'buttonImage' : '',//设置按钮图片
				 'progressData' : 'all', // 'percentage''speed''all'//队列中显示文件上传进度的方式：all-上传速度+百分比，percentage-百分比，speed-上传速度
			     'uploader' : 'uploadify.php',
			    /*  'itemTemplate' : '追加到每个上传节点的html', */
			     'fileTypeExts': '*.jpg;*.gif,*.png*.JPG*.jpeg',
			     'preventCaching' : true,//如果为true，则每次上传文件时自动加上一串随机字符串参数，防止URL缓存影响上传结果
			     'fileSizeLimit': '4MB',                                   //最大允许的文件大小为2M
			     'method'   : 'post', //设置上传的方法get 和 post
			     'auto' : true, //是否自动上传 false关闭自动上传 true 选中文件后自动上传
 				'removeTimeout': 1,//如果设置了任务完成后自动从队列中移除，则可以规定从完成到被移除的时间间隔。
 				 'fileTypeDesc' : '请选择图片，仅支持格式JPG,BMP,PNG,GIF，最大4M',
 				'overrideEvents': ['onSelectError', 'onDialogClose'],//重写方法，返回一个错误，选择文件的时候触发
 				'onSelectError': function (file, errorCode, errorMsg) {
	 				switch(errorCode) {
		 				case-100:
		 				alert("上传的文件数量已经超出系统限制的"+ $('#file_upload').uploadify('settings', 'queueSizeLimit') + "个文件！");
		 				break;
		 				case-110:
		 				alert("文件 ["+ file.name + "] 大小超出系统限制的"+ $('#file_upload').uploadify('settings', 'fileSizeLimit') + "大小！");
		 				break;
		 				case-120:
		 				alert("文件 ["+ file.name + "] 大小异常！");
		 				break;
		 				case-130:
		 				alert("文件 ["+ file.name + "] 类型不正确！");
		 				break;
	 				}
	 				return false;
 				},
 				//检测FLASH失败调用
 				'onFallback': function () {
 					alert("您未安装FLASH控件，无法上传！请安装FLASH控件后再试。");
 				},
 	           'onUploadSuccess':function(file,data,response){
               },
     		    
			});

		});
	</script>
</body>
</html>