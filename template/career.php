<?php
/*
 * Template Name: Career Archives Page Layout
 */
 ?>

<?php get_header(); ?>

<div class="p-top">

    <div class="p-top__career career-page">
        <div class="container">
            <div class="careers">
                <div class="careers-item isOpen">
                    <div class="intro">
                        <div class="content">
                            <h1 class="title"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.p-top__career -->

    <div class="p-top__career-page">
        <div class="container">
            <div class="c-row t-row">
                <div style="display:none" class="col-lg-4 left">
                    <div class="c-row">
                        <div class="col-lg-12 title-box">
                            <h1 class="title"></h1>
                            <p class="desc"></p>
                        </div>
                        <div class="col-lg-12">
                            <ul class="ct">
                                <li class="info-v2 phone"></li>
                                <li class="info-v2 email"></li>
                                <li class="info-v2 address"></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <a class="bt bt-v1"  href="<?php echo home_url(); ?>/tai-ho-so-cong-ty/">
                                <h6>Tải hồ sơ</h6>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a class="bt bt-v2" href="<?php echo home_url(); ?>/lien-he/">
                                <h6>Liên hệ</h6>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 right">
                    <div class="c-row">
                        <div class="col-lg-12 title-box">
                            <h1 class="title"></h1>
                            <p class="desc"></p>
                        </div>
                        <div class="col-lg-12 career-items">
                        </div>

                        <div class="pagination">
                            <ul class="items">
                                <li>Prev</li>
                                <li class="isActive">1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>Next</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.p-top -->


<script>

	function ajaxGetPageContent(){
        $.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: "GET",
            data: "action=ajaxGetPageContent",
            success: function(results) {
                var posts = JSON.parse(results);
                // console.log(results);
                $.each(posts, function() {
                    if (this.id === 14) {
                        $('.p-top__career-page .left').find('h1.title').append(this.name);
                        $('.p-top__career-page .left').find('p.desc').append(this.content);
                        $('.p-top__career-page .left').find('li.phone').append(this.phone);
                        $('.p-top__career-page .left').find('li.email').append(this.email);
                        $('.p-top__career-page .left').find('li.address').append(this.address);
                    } else if (this.id === 71) {
                        $('.p-top__career .content').find('h1.title').append(this.name);
                        $('.p-top__career .content').append(this.content);
                        $('.p-top__career .careers-item').css({'background-image': 'url("'+ this.thumbs +'")'});
                    } else if (this.id === 184) {
                        $('.p-top__career-page .right .title-box').find('h1.title').append(this.name);
                        $('.p-top__career-page .right .title-box').find('p.desc').append(this.content);
                    }
                });
            },
            error: function() {
                console.log('Cannot retrieve data.');
            }
        });
    }
    ajaxGetPageContent();

	function ajaxGetCareer(){
		$.ajax({
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
			type: "GET",
            data: "action=ajaxGetCareer",
            beforeSend: function(){
                //add loading icons
                var loading = '<div class="sp sp-circle"></div>'
                $('.p-top__career-page .right').find('.career-items').append(loading);
            },
			success: function(results) {
                $('.p-top__career-page .right').find('.career-items').html(results);
			},
			error: function() {
				console.log('Cannot retrieve data.');
			}
		});
	}
	ajaxGetCareer();
</script>


<?php get_footer(); ?>