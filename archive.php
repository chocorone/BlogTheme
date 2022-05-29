<?php global $topName;
$topName = 'ブログ' ?>
<?php get_header(); ?>

<?php make_article("", "最新の投稿", false); ?>

<?php make_article("pgm", "プログラミング", true); ?>

<?php make_article("3d", "3DCG", true); ?>

<?php make_article("脱出アドベンチャー", "脱出アドベンチャーシリーズ", true); ?>

<?php get_footer(); ?>

<?php
function make_article($name, $title, $flag)
{
    global $workID;
?>
    <h2 class="category-name"><?php echo $title; ?></h2>
    <ul class="articles">
        <?php
        if ($flag) {
            query_posts("category_name=" . $name . "&showposts=10");
        } else {
            query_posts("cat=-" . $workID);
        } ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li class="blog-item" >
                    <a class="blog-item__content" href='<?php the_permalink(); ?>'>
                        <div class="blog-item__thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <img width="300px" class="blog-item__thumbnail-image" src="<?php the_post_thumbnail_url('medium'); ?>">
                            <?php else : ?>
                                <img width="300px" class="blog-item__thumbnail-image" src="<?php echo get_template_directory_uri(); ?>/img/thumbnail.png">
                            <?php endif; ?>
                        </div>
                        <div class="blog-item-title">
                            <?php print_title(get_the_title());
                            ?>
                        </div>

                    </a>
                </li>
        <?php endwhile;
        endif; ?>
        <?php if ($flag) : ?>
            <li class="blog-item" onclick="location.href='<?php echo home_url('/category/' . $name . '/'); ?>'">
                <div class="blog-item__content more-read ">
                    <div class="blog-item-title">
                        <h3>もっと見る</h3>
                    </div>
                </div>
            </li>
        <?php endif; ?>
    </ul>

    <?php
}

function print_title($title)
{
    $arr = explode("】", $title);
    if (count($arr) == 2) : ?>
        <h4 class="blog-title-h4"><?php echo $arr[0] . '】' ?></h4>
    <?php endif; 
        $h3_title=(mb_strlen($arr[count($arr) - 1]) <= 30) ? $arr[count($arr) - 1] : mb_substr($arr[count($arr) - 1], 0, 30) . '...';?>

    <h3 class="blog-title-h3"><?php echo $h3_title ?></h3>
<?php
}
?>