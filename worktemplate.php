<?php
/*
Template Name: 作品テンプレート
Template Post Type: post
*/
?>
<?php global $topName;
$topName = '作品' ?>
<?php get_header(); ?>

<div id="template-single">

    <div class="work-content ">
        <div class="blog-box work-box">
            <?php
            $fields = SCF::get('slidshow-images');
            $movie = SCF::get('work-movie');
            if ($movie != '') {
            ?>
                <div class="nonswipe-image">
                    <video playsinline controls src="<?php echo home_url() . $movie ?>">
                        <p>ブラウザに対応していないため、動画を再生できません。</p>
                    </video>
                </div>
            <?php } else if (count($fields) == 1) { ?>
                <div class="nonswipe-image">
                    <?php
                    $onefield = $fields[0];
                    $oneimgurl = wp_get_attachment_image_src($onefield['slidshow-image'], 'large'); ?>
                    <img src="<?php echo $oneimgurl[0]; ?>">
                </div>
            <?php } else { ?>

                <div class="swiper main-swiper">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($fields as $field) :
                            $imgurl = wp_get_attachment_image_src($field['slidshow-image'], 'large');
                        ?>
                            <div class="swiper-slide">
                                <img src="<?php echo $imgurl[0]; ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="swiper subSwiper">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($fields as $field) :
                            $imgurl = wp_get_attachment_image_src($field['slidshow-image'], 'large');
                        ?>
                            <div class="swiper-slide">
                                <img src="<?php echo $imgurl[0]; ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php } ?>


            <h2 class="work-title"><?php the_title(); ?></h2>
            <div class="work-description">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        the_content();
                    }
                } ?>
            </div>

            <table class="work-table">
                <tr>
                    <th>タイトル</th>
                    <td><?php echo SCF::get('work-title'); ?></td>
                </tr>
                <tr>
                    <th>制作</th>
                    <td><?php echo SCF::get('work-date'); ?></td>
                </tr>
                <?php
                $licence = SCF::get('work-licence');
                if ($licence != 'none') :
                ?>
                    <tr>
                        <th>ライセンス</th>
                        <td><?php echo $licence ?></td>
                    </tr>
                <?php endif;
                $distributeurl =  SCF::get('work-distribute-url');
                if ($distributeurl != '') :
                ?>
                    <tr>
                        <th>配布URL</th>
                        <td><a href="<?php echo $distributeurl ?>"><?php echo $distributeurl ?></a></td>
                    </tr>
                <?php endif; ?>
            </table>

            <p class="entry-tag">
                <?php
                $tags = get_the_tags();
                if ($tags != null && is_array($tags)) {
                    foreach ($tags as $tag) {
                        echo '<i class="fa-solid fa-tag"></i> ' . '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '　　</a>';
                    }
                }
                ?>
            </p>

            <!-- snsシェア -->
            <?php sns_share(); ?>
        </div>
        <?php prev_next_page(true) ?>
        <div class="blog-box comments">
            <?php comments_template(); ?>
        </div>

    </div>
</div>

<script type="text/javascript">
    var subSwiper = new Swiper(".subSwiper", {
        spaceBetween: 10,
        slidesPerView: 4
    });

    var mainSwiper = new Swiper('.main-swiper', {
        thumbs: {
            swiper: subSwiper
        },
        slidesPerView: 'auto',
        spaceBetween: 30,
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true
        },
        centeredSlides: true,
        loop: true,
        autoplay: {
            speed: 1500
        },
        pagination: {
            el: ".swiper-pagination"
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        }
    })
</script>
<?php get_footer(); ?>