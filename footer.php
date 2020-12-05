
		<?php 
			//get_sidebar(); 
		?>


	</div><!-- /.l-contents -->


	<div class="l-footer">
		<!-- <div class="container">
			<div class="footer-menu">
				<ul class="menu">
					<li class="menu-item"><a href="#">About Us</a></li>
					<li class="menu-item"><a href="#">Company</a></li>
					<li class="menu-item"><a href="#">Service</a></li>
					<li class="menu-item"><a href="#">Works</a></li>
					<li class="menu-item"><a href="#">Case Study</a></li>
					<li class="menu-item"><a href="#">Team</a></li>
					<li class="menu-item"><a href="#">Blog</a></li>
					<li class="menu-item"><a href="#">FAQ</a></li>
					<li class="menu-item"><a href="#">Career</a></li>
					<li class="menu-item"><a href="#">Contact</a></li>
					<li class="menu-item"><a href="#">Sitemap</a></li>
					<li class="menu-item"><a href="#">Privacy Policy</a></li>
				</ul>
			</div>
		</div> -->
		<div class="copyright">
			<p><small>&copy; <?php echo '2016-'.date('Y'); ?> - Belleza Vietnam Co., LTD</small></p>
		</div>
	</div><!-- /.l-footer -->


	<div class="l-pagetop">
		<a href="#container" title="このページのトップへ"><i class="fal fa-chevron-circle-up"></i></a>
	</div><!-- /.l-pagetop -->
	
	<div class="l-socical">
		<ul class="social-items">
			<li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
			<li><a href="#"><i class="fab fa-instagram"></i></a></li>
			<li class="title"><h4 >Social Media</h4></li>
			<li class="search search-icons">
				<div class="icons"></div>
			</li>
		</ul>
	</div><!-- /.l-social -->

	<div class="l-search-box">
		<div class="container">
			<div class="c-row">
				<div class="col-lg-12 title-box">
					<h1 class="title">Tìm kiếm</h1>
					<p class="desc">Bạn muốn tìm kiếm dịch vụ gì của chúng tôi?</p>
				</div>
				<div class="col-lg-12">
					<div class="search-form">
						<input type="text" name="search" class="search-control form-control" placeholder="Tìm kiếm ...">
						<button class="bt-search"><i class="far fa-search"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.l-search-box -->
	<div class="svg_import">
		<svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display: none;">
		  <defs>
		    <filter id="goo">
		      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
		      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
		      <feBlend in="SourceGraphic" in2="goo" />
		    </filter>
		  </defs>
		</svg>
	</div>
</div><!-- /#container -->



<?php wp_footer(); ?>


</body>
</html>