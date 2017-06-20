/**
 * Created by Administrator on 14-11-16. 左侧菜单效果
 */
$(".menu_head").click(
		function() {
			$(this).addClass("current").next(".menu_body").slideToggle(800)
					.parent().siblings(".childUlLi").find(".menu_body")
					.slideUp("slow");
			$(this).parent().siblings(".childUlLi").find(".menu_head")
					.removeClass("current");
		});

/* 个人中心设置 */
$(function() {

	$("#ad_setting").click(function() {
		$("#ad_setting_ul").show();
	});
	$("#ad_setting_ul").mouseleave(function() {
		$(this).hide();
	});
	$("#ad_setting_ul li").mouseenter(function() {
		$(this).find("a").attr("class", "ad_setting_ul_li_a");
	});
	$("#ad_setting_ul li").mouseleave(function() {
		$(this).find("a").attr("class", "");
	});
});

/* 注销用户 */
$("#m_destroy").on("click", function() {
	var icon = $(this).attr("icon");
	$.tmDialog.confirm({
		width : 450,
		height : 250,
		title : "退出",
		icon : icon,
		content : "您确认退出吗!!!",
		callback : function(ok) {
			if (ok) {
				location.href = "/admin/main/destroy";
			}
		}
	});
});