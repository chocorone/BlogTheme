<?php get_header(); ?>

<?php $serchword = get_search_query(); //検索された文字列を取得 
?>

<!-- タイトルの読み込み -->
<div class="category-title-field">
	<?php
	$str = ($serchword == '') ? 'サイトを検索する' : '「' . $serchword . '」検索結果'; ?>
	<h2 class="category-page-name"><?php echo ($str); ?></h2>
</div>
<div class="search_form">
	<?php get_search_form(); ?>
</div>
<?php if (have_posts()) : //記事がある場合 
?>
	<ul class="category-box blog-box">
		<?php
		//記事データの表示
		while (have_posts()) {
			the_post();
		?>
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
		<?php
		}
		?>
	</ul>
	<?php get_template_part('pagination', 'posts'); ?>

<?php else : //記事が無い場合 
?>
	<h3 class="no-result">該当する記事はありません</3>
	<?php endif; ?>

	<?php get_footer(); ?>