<?php
function register_stylesheet()
{
  wp_register_style('style', get_stylesheet_directory_uri() . '/style.css');
}
function add_stylesheet()
{
  register_stylesheet();
  wp_enqueue_style('style', '', array(), '1.0', false);
}
add_action('wp_enqueue_scripts', 'add_stylesheet');





function menu_setup()
{
  register_nav_menus(array(
    'global' => 'グローバルメニュー',
    'footer' => 'フッターメニュー'
  ));
}
add_action('after_setup_theme', 'menu_setup');

function valueSet()
{
  global $topName;
  $topName = "サイト";
  global $workID;
  $workID = 'workのカテゴリID';
}
add_action('after_setup_theme', 'valueSet');



function shortcode_url()
{
  return get_home_url();
}
add_shortcode('url', 'shortcode_url');


function shortcode_siteurl()
{
  return site_url();
}
add_shortcode('site_url', 'shortcode_siteurl');


function shortcode_templateurl()
{
  return get_stylesheet_directory_uri();
}
add_shortcode('thema_url', 'shortcode_templateurl');

function post_has_archive($args, $post_type)
{
  if ('post' == $post_type) {
    $args['rewrite'] = true; // リライトを有効にする
    $args['has_archive'] = 'blog'; // 任意のスラッグ名
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

add_theme_support('post-thumbnails');
add_theme_support('custom-logo');

remove_filter('pre_user_description', 'wp_filter_kses');

remove_filter('pre_term_description', 'wp_filter_kses');

remove_filter('pre_term_name', 'wp_filter_kses');

function sns_share()
{
?>
  <!-- snsシェア -->
  <div class="sns__container">
    <a class="sns__twitter" href="https://twitter.com/share?url=<?php echo get_the_permalink(); ?>&text=<?php echo get_the_title(); ?>" target="_blank" rel="nofollow noopener">
      <i class="fab fa-twitter-square"></i>
    </a>
    <a class="sns__facebook" href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener">
      <i class="fab fa-facebook-square"></i>
    </a>
    <a class="sns__pocket" href="http://getpocket.com/edit?url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>" target="_blank" rel="nofollow noopener">
      <i class="fab fa-get-pocket"></i>
    </a>
    <a class="sns__line" href="https://social-plugins.line.me/lineit/share?url=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener">
      <i class="fab fa-line"></i>
    </a>
  </div>
<?php
}

function prev_next_page($isWork)
{
?>
  <div class="entry-pager blog-box">
    <?php
    global $workID;
    $prev_post = ($isWork) ? get_previous_post(true) : get_previous_post(false, $workID);
    $next_post = ($isWork) ? get_next_post(true) : get_next_post(false, $workID);

    ?>
    <?php if ($prev_post) : ?>
      <a href="<?php echo get_permalink($prev_post->ID); ?>" class="prev-link">
        <?php if (get_the_post_thumbnail($prev_post->ID)) :  ?>
          <?php echo get_the_post_thumbnail($prev_post->ID, 'full'); ?>
        <?php else :  ?>
          <img src="<?php echo get_template_directory_uri(); ?>/img/thumbnail.png" alt="">
        <?php endif; ?>
        <div class="pn-link">
          <h4>前の記事へ</h4>
          <h3><?php (mb_strlen(get_the_title($prev_post->ID)) <= 30) ? print(get_the_title($prev_post->ID)) : print(mb_substr(get_the_title($prev_post->ID), 0, 30) . '...') ?><h3>
        </div>
      </a>
    <?php else : ?>
      <div class="prev-link"></div>
    <?php endif; ?>

    <?php if ($next_post) :  ?>
      <a href="<?php echo get_permalink($next_post->ID); ?>" class="next-link">
        <div class="pn-link">
          <h4>次の記事へ</h4>
          <h3><?php (mb_strlen(get_the_title($next_post->ID)) <= 30) ? print(get_the_title($next_post->ID)) : print(mb_substr(get_the_title($next_post->ID), 0, 30) . '...') ?></h3>
        </div>
        <?php if (get_the_post_thumbnail($next_post->ID)) :  ?>
          <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?>
        <?php else :  ?>
          <img src="<?php echo get_template_directory_uri(); ?>/img/thumbnail.png" alt="">
        <?php endif; ?>
      </a>
    <?php endif; ?>
  </div>

<?php
}
