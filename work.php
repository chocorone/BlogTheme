<?php
/*
Template Name: Work
Template Post Type: page
*/
?>
<?php global $topName;
$topName = '作品' ?>
<?php get_header(); ?>

<div id="template-page">
    <?php
    $args = array(
        'posts_per_page'   => 20,
        'category_name' => 'Work',
        //'orderby'          => 'ID', // 何順で記事を読み込むか
        'order'            => 'DESC',
    );

    $datas = get_posts($args);


    if ($datas) :
    ?>
        <ul class="articles">
            <?php
            foreach ($datas as $post) :
                setup_postdata($post);
            ?>
                <li class="blog-item">
                    <a class="blog-item__content" href='<?php the_permalink(); ?>'>
                        <div class="blog-item__thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <img width="300px" class="blog-item__thumbnail-image" src="<?php the_post_thumbnail_url('medium'); ?>">
                            <?php else : ?>
                                <img width="300px" class="blog-item__thumbnail-image" src="<?php echo get_template_directory_uri(); ?>/img/thumbnail.png">
                            <?php endif; ?>
                        </div>


                        <h3 class="blog-item__title"><?php the_title(); ?></h3>
                    </a>
                </li>

            <?php
            endforeach;
            ?>
        </ul>
    <?php
    else :
    ?>

        <p>何もありません</p>

    <?php
    endif;

    wp_reset_postdata();
    ?>

</div>

<?php get_footer(); ?>