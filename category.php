<?php global $topName;
$topName = 'ブログ' ?>
<?php get_header(); ?>
<div class="category-title-field">
    <h2 class="category-page-name"><?php echo single_cat_title(); ?></h2>
</div>

<ul class="category-box blog-box">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li class="category-item" onclick="location.href='<?php the_permalink(); ?>'">
                <div class="category-item__thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                        <img width="300px" class="category-item__thumbnail-image" src="<?php the_post_thumbnail_url('medium'); ?>">
                    <?php else : ?>
                        <img width="300px" class="category-item__thumbnail-image" src="<?php echo get_template_directory_uri(); ?>/img/thumbnail.png">
                    <?php endif; ?>
                </div>

                <div class="category-item__content">
                    <h3 class="category-item__title"><?php the_title(); ?></h3>
                    <h4 class="category-item__read"><?php the_excerpt(); ?></h4>
                </div>
            </li>
        <?php endwhile;
    else : ?>

        <p>&nbsp</p>
        <h2 class="searched-none">記事はまだありません</h2>
        <p>&nbsp</p>

    <?php endif; ?>
</ul>

<?php get_template_part('pagination', 'posts'); ?>

<?php get_footer(); ?>