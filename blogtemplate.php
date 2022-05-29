<?php
/*
Template Name: ブログテンプレート
Template Post Type: post
*/
?>
<?php global $topName;
$topName = 'ブログ' ?>
<?php get_header(1); ?>

<div id="template-single">

    <div class="blog-wrapper">
        <div class="container">
            <div class="content blog-box">
                <div class="entry-header">
                    <!-- パンクズリスト -->
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                    }
                    ?>
                    <h1 class="pagetitle"><?php the_title(); ?></h1>
                    <p class="entry-date"><i class="fa-solid fa-clock"></i><?php echo mysql2date('Y年n月j日', $post->post_date); ?></p>
                </div>

                <div class="entry-content">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            the_content();
                        }
                    } ?>
                </div>

                <?php
                $categories = get_the_category();
                foreach ($categories as $category) {
                    if ($category->name != "Uncategorized") {
                        echo '<i class="fa-solid fa-folder-open"></i> ' . '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>' . '</p>';
                    }
                }
                ?>
                <p class="entry-tag">
                    <?php
                    $tags = get_the_tags();
                    if ($tags != null && is_array($tags)) {
                        foreach ($tags as $tag) {
                            echo '<i class="fa-solid fa-tag"></i> ' . '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '　</a>';
                        }
                    }
                    ?>
                </p>

                <?php sns_share(); ?>
            </div>
            <!-- 前後の記事リンク -->
            <?php prev_next_page(false); ?>

            <!-- 関連記事 -->
            <div class="related-post blog-box">
                <?php
                if (function_exists('related_posts')) {
                    related_posts();
                }
                ?>
            </div>

            <!-- コメント欄 -->
            <div class="blog-box comments">
                <?php comments_template(); ?>
            </div>
        </div>
        <!-- サイドバー -->
        <?php sidebar(); ?>
    </div>

</div>


<?php get_footer(); ?>

<?php

function sidebar()
{
?>
    <div class="sidebar blog-box">
        <a class="profile-area" href="<?php echo home_url().'/profile' ?>">
            <img width="100" src="<?php echo get_template_directory_uri(); ?>/img/profile.png" alt="">
            <h2>リル姉</h2>
        </a>
        <p>プログラミングしたり3Dしたりしてます</p>
        <?php get_search_form(); ?>
        <div class="recent-post">
            <h2>最近の投稿</h2>
            <?php
            global $workID;
            $args = array(
                'posts_per_page'   => 5,
                'order'            => 'DESC',
                'cat'          =>  -(int)$workID,
            );
            $datas = get_posts($args);

            if ($datas) :
            ?>
                <ul class="recent-items">
                    <?php
                    foreach ($datas as $post) :
                        setup_postdata($post);
                    ?>
                        <li >
                        <a class="recent-item" href='<?php the_permalink($post); ?>'>
                            <div class="recent-item__thumbnail">
                                <?php if (has_post_thumbnail($post)) : ?>
                                    <img width="100px" src="<?php echo get_the_post_thumbnail_url($post, 'thumbnail'); ?>">
                                <?php else : ?>
                                    <img width="100px" src="<?php echo get_template_directory_uri(); ?>/img/thumbnail.png">
                                <?php endif; ?>
                            </div>

                            <h4 class="blog-item__title"><?php (mb_strlen(get_the_title($post)) <= 30) ? print(get_the_title($post)) : print(mb_substr(get_the_title($post), 0, 30) . '...') ?></h4>
                                </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php
}
?>