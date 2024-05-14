/************************Cases Hover Effect***************************/
$('.service__list a:nth-child(1)').addClass('active').siblings().removeClass('acitve');

$('.service__item').on('mousemove', function (e) {
	var service_id = $(this).data("service");

	$('.service__img.img-' + service_id).addClass('active').siblings().removeClass('active');
	$('.shape-box-' + service_id).addClass('current').siblings().removeClass('current');

	if (service_id != 1) {
		$('.service__list a:nth-child(1)').removeClass('active');
	}
});
$('.service__item').on('mouseout', function (e) {
	var service_id = $(this).data("service");
	$('.service__list a:nth-child(' + service_id + ')').addClass('active').siblings().removeClass('active');
});