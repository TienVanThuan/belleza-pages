<?php
/*
 Template Name: home
 */
 ?>

<?php get_header(); ?>


<div class="p-top">
    
    <div class="p-top__about">
        <div class="container">
            <div class="c-row">
                
            </div>     
        </div>
    </div><!-- /.p-top__about -->

    <div class="p-top__slide">
        <div class="container">
            <div class="slides">
                <div class="slides-item isOpen" data-image="<?php bloginfo('template_directory'); ?>/img/top/slide/img_01.jpg">
                    
                    <div class="intro">
                        <div class="content">
                            <h1 class="title">Belleza Vietnam</h1>
                            <p>Đơn Vị Cung Cấp Giải Pháp Website Tổng Thể.</p>
                            <p>Dành Cho Doanh Nghiệp, Tổ Chức, Shop Bán Hàng, Nhà Quảng Cáo, Cá Nhân Kinh Doanh …</p>
                        </div>
                    </div>
                </div>

                <div class="slides-item" data-image="<?php bloginfo('template_directory'); ?>/img/top/slide/img_04.jpg">
                    
                    <div class="intro">
                        <div class="content">
                            <h1 class="title">Material Cafe</h1>
                            <p>Chúng tôi xây dựng một chuỗi nhà hàng kinh doanh với cafe và các món ăn Nhật Bản.</p>
                            <p>Chúng tôi mong muốn Material Cafe sẽ trở thành nơi kết nối với tất cả mọi người.</p>
                        </div>
                    </div>
                </div>

                <div class="slides-item" data-image="<?php bloginfo('template_directory'); ?>/img/top/slide/img_03.jpg">
                    
                    <div class="intro">
                        <div class="content">
                            <h1 class="title">Nhập Khẩu</h1>
                            <p>Chúng tôi chuyên nhập khẩu và cung cấp những sản phẩm làm đẹp đến từ Nhật Bản.</p>
                            <p>Chúng tôi luôn tự hào là nhà phân phối sản phẩm tốt nhất thị trường Việt Nam.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div><!-- /.p-top__slide -->

    <div class="p-top__mission">
        <div class="container">
            <div class="c-row">
                
                
            </div>
        </div>
    </div><!-- /.p-top__mission -->

    <div class="p-top__service">
        <div class="container">
            <div class="c-row service-area">

                

                <div class="col-lg-4 service-img">
                    <div class="img" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/top/slide/img_01.jpg')"></div>
                </div>

                <div class="col-lg-8 service-box">
                    <div class="c-row">
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div><!-- /.p-top__service -->

    <!-- <div class="p-top__feedback">
        <div class="container">
                <div class="c-row">

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        

                    </div>
                    
                    <div class="swiper-pagination"></div>
                </div>
                
            </div>
        </div>
    </div> -->
    <!-- /.p-top__feedback -->

    <!-- <div class="p-top__our-project">
        <div class="container">
            <div class="c-row portfolio-tt">
                
            </div>
            <div class="c-row portfolio-ct"></div>
            <div class="c-row portfolio-bt"></div>
        </div>
    </div> -->
    <!-- ./.p-top__project -->

    <div class="p-top__our-product">
		<div class="container">
			<div class="c-row product-ct">
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <?php the_content(); ?>

                <?php endwhile; else: endif; ?>

            </div>
            <div class="c-row product-bt"></div>
        </div>
    </div><!-- ./.p-top__project -->

    <div class="p-top__career">
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
    </div><!-- /.p-top__career -->

    <div class="p-top__contact">
        <div class="container">
            <div class="c-row">
                
                <div class="col-lg-8">
                    <ul class="ct">
                        <li class="info-v1 phone"></li>
                        <li class="info-v1 email"></li>
                        <li class="info-v2 address"></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <a class="bt bt-v1"  href="<?php echo home_url(); ?>/tai-ho-so-cong-ty/">
                        <h6>Tải hồ sơ</h6>
                    </a>
                </div>
                <div class="col-lg-2">
                    <a class="bt bt-v2" href="<?php echo home_url(); ?>/lien-he/">
                        <h6>Liên hệ</h6>
                    </a>
                </div>
            </div>
        </div>
	</div><!-- /.p-top__contact -->
</div><!-- /.p-top -->
<?php get_footer(); ?>