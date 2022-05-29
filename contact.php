<?php
/*
Template Name: Contact
Template Post Type: page
*/
?>
<?php global $topName;
$topName = 'サイト' ?>
<?php get_header(); ?>
<div id="template-page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="contact-box ">
                <h2 class="blog-detail__title"><?php the_title(); ?></h2>

                <div class="blog-detail__body">
                    <div class="blog-content"><?php echo the_content(); ?></div>
                </div>
            </div>

    <?php endwhile;
    endif; ?>
</div>
<?php get_footer(); ?>