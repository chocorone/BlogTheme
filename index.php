<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="blog-box">
            <h1 class="blog-detail__title"><?php the_title(); ?></h1>

            <div class="blog-detail__body">
                <div class="blog-content"><?php echo the_content(); ?></div>
            </div>
        </div>

<?php endwhile;
endif; ?>
<?php get_footer(); ?>