<?php
/*
 Template Name: contact
 */
 ?>

<?php get_header(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css">
<style>
    .contact-slide{
        padding:120px 0px;
        text-align:center;
        background:url('<?php bloginfo('template_directory'); ?>/img/top/slide/website-slider-01.jpg');
        background-attachment: fixed;
    }
    h1.title-contact{
        font-size: var(--fs-40); margin-bottom: var(--spacing-size-10); line-height: 1.2;
        color:#fff;
        text-transform:uppercase;
    }
    .contact-slide a{
        text-decoration:none;
        color:#fff;
    }
    .company-detailt{
        background:#FFCF08;
        padding:32px;
        color:#fff;
    }
    .contact-informatiom-title{
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 20px;
        position:relative;
    }
    .contact-informatiom-title::before{
        content: '';
        height: 1px;
        width: 100%;
        position: absolute;
        background-color: #fff;
        bottom: -5px;
    }
    .contact_information_item_main label {
        display: block;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 16px;
    }
    .map-container{
        padding:32px;
    }
    .map-container iframe{
        width:100%;
        height:400px;
        border:2px solid #FFCF08 !important;
    }
    textarea{resize:none !important}
    @media screen and (max-width:860px){
        .contact-slide{
            padding: 50px 0px;
        }
        .contact-form.isOpen{
            padding: 0px !important;
        }
    }
</style>
<div class="contact-slide">
    <h1 class="title-contact">Liên hệ</h1>
    <a href="<?=home_url()?>">Trang chủ</a>&nbsp;<span style="color:#FFCF08">/</span>&nbsp;<a>Liên hệ</a>
</div>
<div class="p-top">
    
    <div class="p-top__contact-elm">
        <div class="container">
            <div class="c-row t-row">
                <!-- <div class="col-lg-4 left">
                    <div class="c-row contact-row">
                        <div class="col-lg-12">
                            <ul class="ct">
                                <li class="info-v2 phone"></li>
                                <li class="info-v2 email"></li>
                                <li class="info-v2 address"></li>
                            </ul>
                        </div>

                        <div class="col-lg-12">
                            <div class="bt bt-v3 map-open">
                                <h6>Xem bản đồ</h6>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-7 right">
                    
                    <div class="contact-form isOpen" style="padding:0px 32px;">

                            <div class="c-row form-row">
                                <?php 
			                        if(have_posts()): while(have_posts()): the_post();
                                    the_content();
                                    endwhile; else: endif; 
                                ?>
                            </div>

                    </div>
                    
                    <div class="contact-map isClose">
                        <div class="c-row map-row">

                            <div class="col-lg-12">
                                <div id='map'></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="company-detailt">
                         <h2 class="contact-informatiom-title">Công ty TNHH Belleza Việt Nam</h2>
                         <div class="contact_information_item_main">
                            <p>
                                <label> Địa chỉ văn phòng</label>
                                <p>
                                    9B Đường Tôn Đức Thắng, Phường Bến Ngé, Quận 1, Thành phố Hồ Chí Minh  <br>
                                </p>
                            </p>
                            <p>
                                <label>Điện thoại</label>
                                <span>0283.620.7485</span>
                            </p>
                            <p>
                                <label>Email</label>
                                <p>Liên hệ công ty: belleza.vietnam@gmail.com</p>
                                <p>Tuyển dụng: career@bellezavietnam.vn</p>
                            </p>
                            <p>
                                <label>Website</label>
                                <p>bellezavietnam.vn</p>
                            </p>
                            <p>
                                <label>Hotline</label>
                                <p>0283.620.7485</p>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.387194044065!2d106.70457161528402!3d10.781627862044704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4ec426c671%3A0x822144ae49cd53c7!2zOWIgxJAuIFTDtG4gxJDhu6ljIFRo4bqvbmcsIELhur9uIE5naMOpLCBRdeG6rW4gMSwgSOG7kyBDaMOtIE1pbmggNzEwMDYsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1590553406860!5m2!1sen!2s" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- /.p-top__contact-elm -->

</div><!-- /.p-top -->
<style>
    .contact-footer{
        background:#F7F7F7;
        padding:15px;
    }
    .box-input-email{
        display:inline;
    }
    .frame{
        height:45px;
        border:1px solid #ccc;
        width:90%;
    }
    .box-input-email input{
        border: none;
        background: #f7f7f7;
        width: 60%;
        height: 95%;
        float: left;
        outline:none;
        padding-left:15px;
    }
    .box-input-email button{
        background: #ffcf08;
        border: none;
        font-weight: bold;
        margin-left: -9px;
        height: 100%;
        float: right;
        outline:none;
        cursor:pointer;
        text-transform:uppercase;
    }
    .box-link-socical .socical-link li{
        font-size: 20px;
        float: left;
        width: 40px;
        height: 40px;
        line-height: 50px;
        border: 1px solid #eeeeee;
        border-right: 0;
        text-align: center;
    }
    .box-link-socical .socical-link li:hover{
        opacity: 0.65;
    }
    .contact-footer .t-row{
        padding: 0px 15px;
    }
    @media (max-width: 640px) {
        .c-row{
            display: block;
        }
        .map-container{
            padding: 32px 0px;
        }
        .p-top__contact-elm{
            margin-bottom: 0;
        }
        .contact-footer .t-row{
            padding: 0;
        }
    }
</style>
<div class="contact-footer">
        <div class="container">
            <div class="c-row t-row">
                <div class="col-lg-3">
                    <div class="box-email">
                        <h3><img src="<?php bloginfo('template_directory') ?>/img/email.png" alt="">&nbsp;&nbsp;ĐĂNG KÝ NHẬN EMAIL</h3>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="box-input-email">
                        <div class="frame">
                            <input type="text" placeholder="Nhập email của bạn">
                            <button>Đăng ký</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-link-socical">
                        <ul class="socical-link">
                            <li><a href="#" target="_blank" class="facebook"><i class="fab fa-facebook-f" style="color: #547bbc;"></i></a></li>
                            <li><a href="#" target="_blank" class="googleplus"><i class="fab fa-google-plus-g" style="color: #db4a37;"></i></a></li>
                            <li><a href="#" target="_blank" class="twitter"><i class="fab fa-twitter" style="color: #79cbf1;"></i></a></li>
                            <li><a href="#" target="_blank" class="youtube"><i class="fab fa-youtube" style="color: #ee1c1b;"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php get_footer(); ?>