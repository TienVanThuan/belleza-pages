<?php

/*===================================
WP更新通知を消す
===================================*/
add_filter('pre_site_transient_update_core', create_function('$a', "return null;"));

// プラグイン更新通知非表示
remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;"));

// テーマ更新通知非表示
remove_action('load-update-core.php', 'wp_update_themes');
add_filter('pre_site_transient_update_themes', create_function('$a', "return null;"));

// generatorを非表示にする
remove_action('wp_head', 'wp_generator');



/*===================================
アイキャッチ画像
===================================*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(220, 165, true );
add_image_size( 'default_post_thumb', 400, 300, true);
add_image_size( 'career_post_thumb', 300, 400, true);
add_image_size( 'feedback_avatar', 300, 300, true);
//add_image_size( '75-50', 75, 50, true ); // ニュース サムネイル



/*===================================
ページネーション
===================================*/
function pagination($pages = '', $range = 2) {
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if(1 != $pages) {
		echo "<div class='pagination'>";
		//echo "<div class='pagination'><span>Page ".$paged." of ".$pages."</span>";
		//if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		if($paged > 1) echo "<a class='prev' href='".get_pagenum_link($paged - 1)."'>&laquo;</a>";

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a>";
			}
		}
		if ($paged < $pages) echo "<a class='next' href='".get_pagenum_link($paged + 1)."'>&raquo;</a>";
		//if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
		echo "</div>";
	}
}



/*===================================
親ページのスラッグを取得
===================================*/
function is_parent_slug() {
	global $post;
	if ($post->post_parent) {
		$post_data = get_post($post->post_parent);
		return $post_data->post_name;
	}
}



/*===================================
カスタム投稿
===================================*/
/*add_action( 'init', 'create_post_type' );
function create_post_type() {

	// ブログ
	register_post_type( 'blog',
		array(
			'labels' => array(
				'name' => __( 'ブログ' ),
				'singular_name' => __( 'ブログ')
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'menu_position' =>5,
			'has_archive' => true
		)
	);

	// ブログ カテゴリ
	register_taxonomy(
		'blog-category',
		'blog',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'カテゴリ',
			'singular_label' => 'カテゴリ',
			'public' => true,
			'show_ui' => true
		)
	);


}*/




/*===================================
Add Page Content Custom Post
===================================*/


add_action( 'init', 'create_post_type_page_ct' );
function create_post_type_page_ct() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'comments', // post comments
		'revisions', // post revisions
		'post-formats', // post formats
	);
	// ブログ
	register_post_type( 'page-ct',
		array(
			'labels' => array(
				'name' => __( 'Page Content' ),
				'singular_name' => __( 'Page Content')
			),
			'public' => true,
			'supports' => $supports,
			'menu_position' =>5,
			'has_archive' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'menu_icon' => 'dashicons-schedule',
		)
	);

	// ブログ カテゴリ
	register_taxonomy(
		'page-ct-category',
		'page-ct',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'Category',
			'singular_label' => 'Category',
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
		)
	);
}


/*===================================
Add Work Custom Post
===================================*/
add_action( 'init', 'create_post_type_works' );

function create_post_type_works() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'comments', // post comments
		'revisions', // post revisions
		'post-formats', // post formats
		'revisions',
		'trackbacks',
		'page-attributes'
	);
	// ブログ
	register_post_type( 'works',
		array(
			'labels' => array(
				'name' => __( 'Works' ),
				'singular_name' => __( 'Works')
			),
			'public' => true,
			'supports' => $supports,
			'menu_position' =>5,
			'has_archive' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'dich-vu'),
			'menu_icon' => 'dashicons-businessman',
		)
	);

	// ブログ カテゴリ
	register_taxonomy(
		'works-category',
		'works',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'Category',
			'singular_label' => 'Category',
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
		)
	);
}

/*===================================
Add Portfolio Custom Post
===================================*/
add_action( 'init', 'create_post_type_portfolio' );

function create_post_type_portfolio() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'comments', // post comments
		'revisions', // post revisions
		'post-formats', // post formats
		'revisions',
		'trackbacks',
		'page-attributes'
	);
	// ブログ
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => __( 'Portfolio' ),
				'singular_name' => __( 'Portfolio')
			),
			'public' => true,
			'supports' => $supports,
			'menu_position' =>5,
			'has_archive' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'du-an'),
			'taxonomies' => array('post_tag'),
			'menu_icon' => 'dashicons-portfolio',
		)
	);

	// ブログ カテゴリ
	register_taxonomy(
		'portfolio-category',
		'portfolio',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'Category',
			'singular_label' => 'Category',
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
		)
	);

}



/*===================================
Add Career Custom Post
===================================*/
add_action( 'init', 'create_post_type_career' );

function create_post_type_career() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'comments', // post comments
		'revisions', // post revisions
		'post-formats', // post formats
		'page-attributes',
	);
	// ブログ
	register_post_type( 'career',
		array(
			'labels' => array(
				'name' => __( 'Career' ),
				'singular_name' => __( 'Career')
			),
			'public' => true,
			'supports' => $supports,
			'menu_position' =>5,
			'has_archive' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'tuyen-dung'),
			'taxonomies' => array('post_tag'),
			'menu_icon' => 'dashicons-groups',
		)
	);

	// ブログ カテゴリ
	register_taxonomy(
		'career-category',
		'career',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'Category',
			'singular_label' => 'Category',
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
		)
	);
}


/*===================================
Add Feedback Custom Post
===================================*/
add_action( 'init', 'create_post_type_feedback' );

function create_post_type_feedback() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'revisions', // post revisions
		'post-formats', // post formats
		'page-attributes',
		
	);
	// ブログ
	register_post_type( 'feedback',
		array(
			'labels' => array(
				'name' => __( 'Feedback' ),
				'singular_name' => __( 'Feedback')
			),
			'public' => true,
			'supports' => $supports,
			'menu_position' =>5,
			'has_archive' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'danh-gia'),
			'menu_icon' => 'dashicons-format-quote',
		)
	);
}

/*===================================
Add Material Cafe Custom Post
===================================*/
add_action( 'init', 'create_post_type_material_cafe' );

function create_post_type_material_cafe() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'comments', // post comments
		'revisions', // post revisions
		'post-formats', // post formats
		'page-attributes',
	);
	// ブログ
	register_post_type( 'material-cafe',
		array(
			'labels' => array(
				'name' => __( 'Material Cafe' ),
				'singular_name' => __( 'Material Cafe')
			),
			'public' => true,
			'supports' => $supports,
			'menu_position' =>5,
			'has_archive' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'material-cafe'),
			'taxonomies' => array('post_tag'),
			'menu_icon' => 'dashicons-groups',
		)
	);

	// ブログ カテゴリ
	register_taxonomy(
		'material-cafe-category',
		'material-cafe',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'Category',
			'singular_label' => 'Category',
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
		)
	);
}


/*===================================
Register Custom Menu && Add Class 'isActive'
===================================*/
function registerCustomMenu() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'secondary-menu' => __( 'Secondary Menu' ),
			'tertiary-menu' => __( 'Tertiary Menu' )
		)
	);
}
function isActiveNavClass ($classes, $item) {
	if (in_array('current-menu-item', $classes) ){
		$classes[] = 'isActive ';
	}
	return $classes;
}
add_action( 'init', 'registerCustomMenu' );
add_filter('nav_menu_css_class' , 'isActiveNavClass' , 10 , 2);


/*============================================
絶対パスを相対パスに
============================================== */
class relative_URI {
	function relative_URI() {
		add_action('get_header', array(&$this, 'get_header'), 1);
		add_action('wp_footer', array(&$this, 'wp_footer'), 99999);
	}
	function replace_relative_URI($content) {
		$home_url = trailingslashit(get_home_url('/'));
		
		$host = $_SERVER["HTTP_HOST"];
		if($host=="dns1.prontonet.ne.jp") {// dns1の場合
			return str_replace($home_url, '/hp/shimakura/xxx/', $content);

		} else {// その他の環境の場合（本番やバックアップサーバー）
			return str_replace($home_url, '/', $content);
			// ドメインルート以外にWPをインストールした場合は以下のようにする
			// return str_replace($home_url, '/blog/', $content); ←フォルダ名「blog」の場合
		}
	}
	function get_header(){
		ob_start(array(&$this, 'replace_relative_URI'));
	}
	function wp_footer(){
		ob_end_flush();
	}
}
new relative_URI();





/*===================================
管理バー 項目非表示
===================================*/

//全員
//function remove_bar_menus( $wp_admin_bar ) {
	//$wp_admin_bar->remove_menu( 'wp-logo' );      // ロゴ
	//$wp_admin_bar->remove_menu( 'site-name' );    // サイト名
	//$wp_admin_bar->remove_menu( 'view-site' );    // サイト名 -> サイトを表示
	//$wp_admin_bar->remove_menu( 'dashboard' );    // サイト名 -> ダッシュボード (公開側)
	//$wp_admin_bar->remove_menu( 'themes' );       // サイト名 -> テーマ (公開側)
	//$wp_admin_bar->remove_menu( 'customize' );    // サイト名 -> カスタマイズ (公開側)
	//$wp_admin_bar->remove_menu( 'comments' );     // コメント
	//$wp_admin_bar->remove_menu( 'updates' );      // 更新
	//$wp_admin_bar->remove_menu( 'view' );         // 投稿を表示
	//$wp_admin_bar->remove_menu( 'new-content' );  // 新規
	//$wp_admin_bar->remove_menu( 'new-post' );     // 新規 -> 投稿
	//$wp_admin_bar->remove_menu( 'new-media' );    // 新規 -> メディア
	//$wp_admin_bar->remove_menu( 'new-link' );     // 新規 -> リンク
	//$wp_admin_bar->remove_menu( 'new-page' );     // 新規 -> 固定ページ
	//$wp_admin_bar->remove_menu( 'new-user' );     // 新規 -> ユーザー
	//$wp_admin_bar->remove_menu( 'my-account' );   // マイアカウント
	//$wp_admin_bar->remove_menu( 'user-info' );    // マイアカウント -> プロフィール
	//$wp_admin_bar->remove_menu( 'edit-profile' ); // マイアカウント -> プロフィール編集
	//$wp_admin_bar->remove_menu( 'logout' );       // マイアカウント -> ログアウト
	//$wp_admin_bar->remove_menu( 'search' );       // 検索 (公開側)
//}
//add_action('admin_bar_menu', 'remove_bar_menus', 201);

function remove_bar_menus_user( $wp_admin_bar ) {
	$wp_admin_bar->remove_menu( 'comments' );     // コメント
	$wp_admin_bar->remove_menu( 'search' );       // 検索 (公開側)
}

//管理者以外
if(!current_user_can('administrator')){
	add_action('admin_bar_menu', 'remove_bar_menus_user', 201);
}


/*===================================
Add Ajax
===================================*/
function ajaxGetPageContent() {
    $posts = get_posts( array(
        'posts_per_page'   => -1,
        'orderby'          => 'title',
        'order'            => 'ASC',
        'post_type'        => 'page-ct',
        'post_status'      => array( 'publish', 'draft' )
    ) );

    $list = array();
    foreach ( $posts as $post ) {
        $list[] = array(
            'id'   => $post->ID,
            'name' => $post->post_title,
			'link' => get_permalink( $post->ID ),
			'content' => $post->post_content,
			'phone' =>  get_post_meta( $post->ID, 'phone', true ),
			'email' =>  get_post_meta( $post->ID, 'email', true ),
			'address' =>  get_post_meta( $post->ID, 'address', true ),
			'thumbs' => get_the_post_thumbnail_url( $post->ID, '1920' )
        );
    }
    echo json_encode( $list );
    die;
}
add_action( 'wp_ajax_nopriv_ajaxGetPageContent', 'ajaxGetPageContent' );
add_action( 'wp_ajax_ajaxGetPageContent', 'ajaxGetPageContent' );

/*===================================
// SHOW TITLE BOX _ CUSTOM POST TYPE PAGE CONTENT
===================================*/
function ajaxShowTitleBox () {
	$getposts = new WP_query(array(
		'post_type' => 'page-ct',
		'posts_per_page' => -1,
		// 'paged' => $paged
	)); 
	global $wp_query; 
	$wp_query->in_the_loop = true;
	if ( $getposts->have_posts() ) {
		while ($getposts->have_posts()) : $getposts->the_post();
		
			echo '<h1 class="title">'.get_the_title().'</h1>';
			echo '<p class="desc>'.excerpt(60).'</p>';
			
		endwhile; wp_reset_postdata();
	} else {
		echo 'end';
	}
	die();
}
add_action ( 'wp_ajax_nopriv_ajaxShowTitleBox', 'ajaxShowTitleBox' );
add_action ( 'wp_ajax_ajaxShowTitleBox', 'ajaxShowTitleBox' );


/*===================================
// SHOW POST IN HOMEPAGE
===================================*/
function ajaxGetPost() {
    $posts = get_posts( array(
        'posts_per_page'   => -1,
        'orderby'          => 'title',
        'order'            => 'ASC',
        'post_type'        => 'post',
        'post_status'      => array( 'publish', 'draft' )
    ) );

    $list = array();
    foreach ( $posts as $post ) {
        $list[] = array(
            'id'   => $post->ID,
            'name' => $post->post_title,
			'link' => get_permalink( $post->ID ),
			'content' => $post->post_content,
        );
    }
    echo json_encode( $list );
    die;
}
add_action( 'wp_ajax_nopriv_ajaxGetPost', 'ajaxGetPost' );
add_action( 'wp_ajax_ajaxGetPost', 'ajaxGetPost' );

/*===================================
// GET ALL POST WORK
===================================*/
function ajaxGetWorks() {
    $posts = get_posts( array(
        'posts_per_page'   => -1,
        'orderby'          => 'title',
        'order'            => 'ASC',
        'post_type'        => 'works',
        'post_status'      => array( 'publish', 'draft' )
    ) );

    $list = array();
    foreach ( $posts as $post ) {
        $list[] = array(
            'id'   => $post->ID,
            'name' => $post->post_title,
			'link' => get_permalink( $post->ID ),
			'content' => $post->post_content,
			'icons' =>  get_post_meta( $post->ID, 'icons', true ),
			'thumbs' => get_the_post_thumbnail_url( $post->ID, '1920' )
        );
    }
    echo json_encode( $list );
    die;
}
add_action( 'wp_ajax_nopriv_ajaxGetWorks', 'ajaxGetWorks' );
add_action( 'wp_ajax_ajaxGetWorks', 'ajaxGetWorks' );


/*===================================
// SHOW PORTFOLIO POST IN HOMEPAGE
===================================*/
function ajaxShowPortfolioHP () {
	    $getposts = new WP_query(array(
			'post_type' => 'portfolio',
			'posts_per_page' => 8,
			// 'paged' => $paged
		)); 
	    global $wp_query; 
		$wp_query->in_the_loop = true;
		if ( $getposts->have_posts() ) {
			while ($getposts->have_posts()) : $getposts->the_post();
				echo '<div class="col-md-3 col-sm-6 items">';
				echo '<a class="item" href="'.get_the_permalink().'">';
				if(has_post_thumbnail()) {
					echo '<div class="thumb"><img src="'.get_the_post_thumbnail_url( $post->ID, 'default_post_thumb' ).'" alt="'.get_the_title().'"></div>';
				} else {
					echo '<div class="thumb"><img src="'.get_site_url().'/images/noimage.png" alt="'.get_the_title().'"></div>';
				}
				echo '<h4 class="title">'.get_the_title().'</h4>';
				echo '</a>';
				echo '</div>';
			endwhile; wp_reset_postdata();
		} else {
			echo '<div class="col-lg-12"><p>Chưa có bài viết nào!!</p></div>';
		}
	die();
}
add_action ( 'wp_ajax_nopriv_ajaxShowPortfolioHP', 'ajaxShowPortfolioHP' );
add_action ( 'wp_ajax_ajaxShowPortfolioHP', 'ajaxShowPortfolioHP' );


/*===================================
// GET ALL POST PORTFOLIO
===================================*/

function ajaxGetPortfolio() {
    $posts = get_posts( array(
        'posts_per_page'   => -1,
        'orderby'          => 'title',
        'order'            => 'ASC',
        'post_type'        => 'portfolio',
        'post_status'      => array( 'publish', 'draft' )
    ) );

    $list = array();
    foreach ( $posts as $post ) {
        $list[] = array(
            'id'   => $post->ID,
            'name' => $post->post_title,
			'link' => get_permalink( $post->ID ),
			'content' => $post->post_content,
			'thumbs' => get_the_post_thumbnail_url( $post->ID, 'medium_large' )
        );
    }
    echo json_encode( $list );
    die;
}
add_action( 'wp_ajax_nopriv_ajaxGetPortfolio', 'ajaxGetPortfolio' );
add_action( 'wp_ajax_ajaxGetPortfolio', 'ajaxGetPortfolio' );

/*===================================
// GET ALL POST CAREER
===================================*/
function ajaxGetCareer() {
	$getposts = new WP_query(array(
		'post_type' => 'career',
		'posts_per_page' => 8,
		// 'paged' => $paged
	)); 
	global $wp_query; 
	$wp_query->in_the_loop = true;
	while ($getposts->have_posts()) : $getposts->the_post();
			echo '<div class="item">';
			$postid = $post->ID;
			if(has_post_thumbnail()) {
				echo '<div class="thumb"><a href="'.get_the_permalink().'" alt="'.get_the_title().'"><img src="'.get_the_post_thumbnail_url( $post->ID, 'career_post_thumb' ).'" alt="'.get_the_title().'"></a></div>';
			} else {
				echo '<div class="thumb"><a href="'.get_the_permalink().'" alt="'.get_the_title().'"><img src="'.get_site_url().'/images/noimage-300x400.png" alt="'.get_the_title().'"></a></div>';
			}
			echo '<div class="content">';
			echo '<h3 class="title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
			echo excerpt(30);
			echo '<div class="tag">';
			echo the_tags($postid);
			echo '</div>';
			echo '</div>';
			echo '<div class="apply-job"><a href="'.get_the_permalink().'" class="bt" alt="'.get_the_title().'"><h6>Ứng tuyển</h6></a></div>';
			echo '</div>';
	endwhile; wp_reset_postdata();

	die();
}
add_action( 'wp_ajax_nopriv_ajaxGetCareer', 'ajaxGetCareer' );
add_action( 'wp_ajax_ajaxGetCareer', 'ajaxGetCareer' );

/*===================================
 * PAGE CONTENT CUSTOM POST
 * SHOW SLIDER POST ON WEBSITE PAGES 
 * This function allows displaying slider on the web
===================================*/
function ajaxSliderWebsitePages() {
	$getposts = new WP_query(array(
		// 'orderby' => 'title',
		'order' => 'ASC',
		'post_date' => 'DESC',
		'post_type' => 'page-ct',
		'posts_per_page' => -1,	
		'taxonomy' => 'page-ct-category',
	)); 
	global $wp_query; 
	$wp_query->in_the_loop = true;
	if ( $getposts->have_posts() ) {
		while ($getposts->have_posts()) : $getposts->the_post();
			$terms = get_the_terms( $post->ID , 'page-ct-category' );
			foreach ( $terms as $term ) :
				// adding taxonomy categories slug 'list-of-group-companies'
				if($term->slug === 'website-page-slider'){
					echo '<div class="swiper-slide">';
					echo '<div class="item">';
					echo '<div class="content-box">';
					echo '<div class="container">';
					echo '<h2 class="title">'.get_the_title().'</h2>';
					echo '<p class="desc">';
					echo excerpt(150);
					echo '</p>';
					echo '</div>';
					echo '</div>';
					echo '<div class="item-img">';
					echo '<img src="'.get_the_post_thumbnail_url( $post->ID, '1920' ).'" alt="'.get_the_title().'">';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}
			endforeach; //$terms
		endwhile; wp_reset_postdata();
	} else {
		echo 'end';
	}
	die();
}
add_action ( 'wp_ajax_nopriv_ajaxSliderWebsitePages', 'ajaxSliderWebsitePages' );
add_action ( 'wp_ajax_ajaxSliderWebsitePages', 'ajaxSliderWebsitePages' );





/*===================================
 * PAGE CONTENT CUSTOM POST
 * SHOW SLIDER POST ON WEBSITE PAGES 
 * This function allows displaying slider on the web
===================================*/
function ajaxWebsitePagesService() {
	$getposts = new WP_query(array(
		// 'orderby' => 'title',
		'order' => 'ASC',
		'post_date' => 'DESC',
		'post_type' => 'page-ct',
		'posts_per_page' => -1,	
		'taxonomy' => 'page-ct-category',
	)); 
	global $wp_query; 
	$wp_query->in_the_loop = true;
	if ( $getposts->have_posts() ) {
		while ($getposts->have_posts()) : $getposts->the_post();
			$terms = get_the_terms( $post->ID , 'page-ct-category' );
			foreach ( $terms as $term ) :
				// adding taxonomy categories slug 'list-of-group-companies'
				if($term->slug === 'website-pages-service'){
					echo '<div class="col-lg-3 item">';
					// echo '<div class="item-img">';
					// echo '<img src="" alt=""/>';
					// echo '</div>';
					echo '<div class="item-content">';
					echo '<h3>'.get_the_title().'</h3>';
					echo '<p>'.excerpt(150).'</p>';
					echo '</div>';
					echo '</div>';
				}
			endforeach; //$terms
		endwhile; wp_reset_postdata();
	} else {
		echo 'end';
	}
	die();
}
add_action ( 'wp_ajax_nopriv_ajaxWebsitePagesService', 'ajaxWebsitePagesService' );
add_action ( 'wp_ajax_ajaxWebsitePagesService', 'ajaxWebsitePagesService' );


/*===================================
 * PAGE CONTENT CUSTOM POST
 * SHOW SLIDER POST ON WEBSITE PAGES 
 * This function allows displaying slider on the web
===================================*/
function ajaxMaterialCafeService() {
	$getposts = new WP_query(array(
		// 'orderby' => 'title',
		'order' => 'ASC',
		'post_date' => 'DESC',
		'post_type' => 'page-ct',
		'posts_per_page' => -1,	
		'taxonomy' => 'page-ct-category',
	)); 
	global $wp_query; 
	$wp_query->in_the_loop = true;
	if ( $getposts->have_posts() ) {
		while ($getposts->have_posts()) : $getposts->the_post();
			$terms = get_the_terms( $post->ID , 'page-ct-category' );
			foreach ( $terms as $term ) :
				// adding taxonomy categories slug 'list-of-group-companies'
				if($term->slug === 'material-cafe-service'){
					echo '<a class="col-lg-3 item" href="'.get_the_permalink().'">';
					echo '<div class="item-img">';
					echo '<img src="'.get_the_post_thumbnail_url( $post->ID, '1920' ).'" alt="'.get_the_title().'">';
					echo '</div>';
					echo '<div class="item-content">';
					echo '<h3>'.get_the_title().'</h3>';
					echo '<p>'.excerpt(30).'</p>';
					echo '</div>';
					echo '</a>';
				}
			endforeach; //$terms
		endwhile; wp_reset_postdata();
	} else {
		echo 'end';
	}
	die();
}
add_action ( 'wp_ajax_nopriv_ajaxMaterialCafeService', 'ajaxMaterialCafeService' );
add_action ( 'wp_ajax_ajaxMaterialCafeService', 'ajaxMaterialCafeService' );


/*===================================
 * PAGE CONTENT CUSTOM POST
 * SHOW SLIDER POST ON WEBSITE PAGES 
 * This function allows displaying slider on the web
===================================*/
function ajaxGetFeedbackSlider() {
	$getposts = new WP_query(array(
		'order' => 'ASC',
		'post_date' => 'DESC',
		'post_type' => 'information',
		'post_type' => 'feedback',
		'posts_per_page' => -1,
	)); 
	global $wp_query; 
	$wp_query->in_the_loop = true;
	while ($getposts->have_posts()) : $getposts->the_post();
		echo '<div class="swiper-slide">';
		echo '<div class="client">';
		echo '<div class="client-item">';
		echo '<div class="area-top">';
		echo '<div class="avatar"><img src="'.get_the_post_thumbnail_url( $post->ID, '1920' ).'" alt="'.get_the_title().'"></div>';
		echo '<div class="info">';
		echo '<h4>'.get_the_title().'</h4>';
		echo '<h5>'.get_field('jobs').'</h5>';
		echo '</div>';
		echo '</div>';
		echo '<div class="area-bottom">';
		echo '<div class="ct">';
		echo get_the_content();
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div> ';
		echo '</div>';
	endwhile; wp_reset_postdata();

	die();
}
add_action( 'wp_ajax_nopriv_ajaxGetFeedbackSlider', 'ajaxGetFeedbackSlider' );
add_action( 'wp_ajax_ajaxGetFeedbackSlider', 'ajaxGetFeedbackSlider' );
/*===================================
 * PAGE CONTENT CUSTOM POST
 * SHOW CONTENT POST FEATURE ON WEBSITE PAGES 
 * This function allows displaying slider on the web
===================================*/
function ajaxWebsiteFreatured() {
	$getposts = new WP_query(array(
		// 'orderby' => 'title',
		'order' => 'ASC',
		'post_date' => 'DESC',
		'post_type' => 'page-ct',
		'posts_per_page' => -1,	
		'taxonomy' => 'page-ct-category',
	)); 
	$count_of_post = 0;
	global $wp_query; 
	$wp_query->in_the_loop = true;
	if ( $getposts->have_posts() ) {
		while ($getposts->have_posts()) : $getposts->the_post();
			$terms = get_the_terms( $post->ID , 'page-ct-category' );
			
			foreach ( $terms as $term) :
				// adding taxonomy categories slug 'list-of-group-companies'
				if($term->slug === 'website-page'){
					echo '<div class="item">';
					echo '<div class="item-number">';
					echo '<div class="circle">';
					echo '<span>';
					$count_of_post++;
					echo $count_of_post;
					echo '</span>';
					echo '</div>';
					echo '</div>';
					echo '<div class="item-content ">';
					echo '<h3>'.get_the_title().'</h3>';
					echo '<p>'.get_the_content().'</p>';
					echo '</div>';
					echo '</div>';
				}
			endforeach; //$terms
		endwhile; wp_reset_postdata();
	} else {
		echo 'end';
	}
	die();
}
add_action ( 'wp_ajax_nopriv_ajaxWebsiteFreatured', 'ajaxWebsiteFreatured' );
add_action ( 'wp_ajax_ajaxWebsiteFreatured', 'ajaxWebsiteFreatured' );



/*===================================
 * PAGE CONTENT CUSTOM POST TYPE
 * SHOW SLIDER ON WEBSITE PAGES 
 * This function allows displaying slider on the web
===================================*/
function ajaxGetSliderMCPageCT() {
	$getposts = new WP_query(array(
		// 'orderby' => 'title',
		'order' => 'ASC',
		'post_date' => 'DESC',
		'post_type' => 'page-ct',
		'posts_per_page' => -1,	
		'taxonomy' => 'page-ct-category',
	)); 
	global $wp_query; 
	$wp_query->in_the_loop = true;
	if ( $getposts->have_posts() ) {
		while ($getposts->have_posts()) : $getposts->the_post();
			$terms = get_the_terms( $post->ID , 'page-ct-category' );
			foreach ( $terms as $term ) :
				// adding taxonomy categories slug 'list-of-group-companies'
				if($term->slug === 'material-cafe-page-slider'){
					echo '<div class="swiper-slide">';
					echo '<div class="item">';
					echo '<div class="item-img">';
					echo '<div class="v1">';
					echo '<img src="'.get_the_post_thumbnail_url( $post->ID, '1920' ).'" alt="'.get_the_title().'">';
					echo '</div>';
					echo '</div>';
					echo '<div class="content-box">';
					echo '<div class="content">';
					echo '<h2 class="title">'.get_the_title().'</h2>';
					echo '<div class="desc">';
					echo get_the_content();
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';

				}
			endforeach; //$terms
		endwhile; wp_reset_postdata();
	} else {
		echo 'end';
	}
	die();
}
add_action ( 'wp_ajax_nopriv_ajaxGetSliderMCPageCT', 'ajaxGetSliderMCPageCT' );
add_action ( 'wp_ajax_ajaxGetSliderMCPageCT', 'ajaxGetSliderMCPageCT' );

/*===================================
 * MATERIAL CAFE CUSTOM POST TYPE
 * SHOW SLIDER PANCAKES ON WEBSITE PAGES 
 * This function allows displaying slider on the web
===================================*/
function ajaxGetMCPancakeSlider() {
	$getposts = new WP_query(array(
		// 'orderby' => 'title',
		'order' => 'ASC',
		'post_date' => 'DESC',
		'post_type' => 'material-cafe',
		'posts_per_page' => -1,	
		'taxonomy' => 'material-cafe-category',
	)); 
	global $wp_query; 
	$wp_query->in_the_loop = true;
	if ( $getposts->have_posts() ) {
		while ($getposts->have_posts()) : $getposts->the_post();
			$terms = get_the_terms( $post->ID , 'material-cafe-category' );
			foreach ( $terms as $term ) :
				// adding taxonomy categories slug 'list-of-group-companies'
				if($term->slug === 'pancake'){
					echo '<div class="swiper-slide">';
					echo '<div class="menu-item">';
					echo '<div class="area-top">';
					echo '<img src="'.get_the_post_thumbnail_url( $post->ID, '1920' ).'" alt="'.get_the_title().'">';
					echo '</div>';
					echo '<div class="area-bottom">';
					echo '<h4 class="title-vn">'.get_the_title().'</h4>';
					echo '<p class="title-en">'.get_field('english_name').'</p>';
					echo '<p class="title-jp">'.get_field('japanese_name').'</p>';
					echo '<p class="price">'.get_field('price').'</p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}
			endforeach; //$terms
		endwhile; wp_reset_postdata();
	} else {
		echo 'end';
	}
	die();
}
add_action ( 'wp_ajax_nopriv_ajaxGetMCPancakeSlider', 'ajaxGetMCPancakeSlider' );
add_action ( 'wp_ajax_ajaxGetMCPancakeSlider', 'ajaxGetMCPancakeSlider' );

/*===================================
 * MATERIAL CAFE CUSTOM POST TYPE
 * SHOW SLIDER HASHED BEEF ON WEBSITE PAGES 
 * This function allows displaying slider on the web
===================================*/
function ajaxGetMCHashedBeefSlider() {
	$getposts = new WP_query(array(
		// 'orderby' => 'title',
		'order' => 'ASC',
		'post_date' => 'DESC',
		'post_type' => 'material-cafe',
		'posts_per_page' => -1,	
		'taxonomy' => 'material-cafe-category',
	)); 
	global $wp_query; 
	$wp_query->in_the_loop = true;
	if ( $getposts->have_posts() ) {
		while ($getposts->have_posts()) : $getposts->the_post();
			$terms = get_the_terms( $post->ID , 'material-cafe-category' );
			foreach ( $terms as $term ) :
				// adding taxonomy categories slug 'list-of-group-companies'
				if($term->slug === 'hashed-beef'){
					echo '<div class="swiper-slide">';
					echo '<div class="menu-item">';
					echo '<div class="area-top">';
					echo '<img src="'.get_the_post_thumbnail_url( $post->ID, '1920' ).'" alt="'.get_the_title().'">';
					echo '</div>';
					echo '<div class="area-bottom">';
					echo '<h4 class="title-vn">'.get_the_title().'</h4>';
					echo '<p class="title-en">'.get_field('english_name').'</p>';
					echo '<p class="title-jp">'.get_field('japanese_name').'</p>';
					echo '<p class="price">'.get_field('price').'</p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}
			endforeach; //$terms
		endwhile; wp_reset_postdata();
	} else {
		echo 'end';
	}
	die();
}
add_action ( 'wp_ajax_nopriv_ajaxGetMCHashedBeefSlider', 'ajaxGetMCHashedBeefSlider' );
add_action ( 'wp_ajax_ajaxGetMCHashedBeefSlider', 'ajaxGetMCHashedBeefSlider' );

/*===================================
 * MATERIAL CAFE CUSTOM POST TYPE
 * SHOW SLIDER DRINKS ON WEBSITE PAGES 
 * This function allows displaying slider on the web
===================================*/
function ajaxGetMCDrinksSlider() {
	$getposts = new WP_query(array(
		// 'orderby' => 'title',
		'order' => 'ASC',
		'post_date' => 'DESC',
		'post_type' => 'material-cafe',
		'posts_per_page' => -1,	
		'taxonomy' => 'material-cafe-category',
	)); 
	global $wp_query; 
	$wp_query->in_the_loop = true;
	if ( $getposts->have_posts() ) {
		while ($getposts->have_posts()) : $getposts->the_post();
			$terms = get_the_terms( $post->ID , 'material-cafe-category' );
			foreach ( $terms as $term ) :
				if($term->slug === 'drinks'){
					echo '<div class="swiper-slide">';
					echo '<div class="menu-item">';
					// echo '<div class="area-top">';
					// echo '<img src="'.get_the_post_thumbnail_url( $post->ID, '1920' ).'" alt="'.get_the_title().'">';
					// echo '</div>';
					echo '<div class="area-bottom">';
					echo '<h4 class="title-vn">'.get_the_title().'</h4>';
					echo '<p class="title-en">'.get_field('english_name').'</p>';
					echo '<p class="title-jp">'.get_field('japanese_name').'</p>';
					echo '<p class="price">'.get_field('price').'</p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}
			endforeach; //$terms
		endwhile; wp_reset_postdata();
	} else {
		echo 'end';
	}
	die();
}
add_action ( 'wp_ajax_nopriv_ajaxGetMCDrinksSlider', 'ajaxGetMCDrinksSlider' );
add_action ( 'wp_ajax_ajaxGetMCDrinksSlider', 'ajaxGetMCDrinksSlider' );




/*===================================
// LIMIT POST CONTENT && EXCERPT 
===================================*/
	function excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt) >= $limit) {
			array_pop($excerpt);
			$excerpt = implode(" ", $excerpt) . '...';
		} else {
			$excerpt = implode(" ", $excerpt);
		}
		$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
		return $excerpt;
	}
	
	function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content) >= $limit) {
			array_pop($content);
			$content = implode(" ", $content) . '...';
		} else {
			$content = implode(" ", $content);
		}
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content); 
		$content = str_replace(']]>', ']]>', $content);
		return $content;
	}
/*===================================
// Remove Span wrap Contact Form
===================================*/	
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    $content = str_replace('<br />', '', $content);
        
    return $content;
});
/*===================================
// Woocommerce Setting
===================================*/	
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart');

	function blz_remove_cart_button() {
		if ( is_product() ) {
		   add_filter( 'woocommerce_is_purchasable', '__return_false' );
		}
	}
	add_action( 'wp_head', 'blz_remove_cart_button' );
?>