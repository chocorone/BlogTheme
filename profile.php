<?php
/*
Template Name: Profile
Template Post Type: page
*/
?>
<?php global $topName;
$topName = 'プロフィール' ?>
<?php get_header(); ?>


<div id="template-page">

    <section id="box1" class="box">
        <div class="profile-content">
            <div class="profile-card-image  card-text card-img-fromLeft">
                <div class="card">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/profile.png" alt="">
                </div>
            </div>
            <div class="profile-text-container">
                <h2 class="heading_large card-text">リル姉</h2>
                <div class="card-text profile-text">
                    <table class="profile-table">
                        <tr>
                            <th>生年月日</th>
                            <td>2001年6月8日</td>
                        </tr>
                        <tr>
                            <th>出身</th>
                            <td>広島県の盆地</td>
                        </tr>
                        <tr>
                            <th>所属</th>
                            <td>法政大学理工学部応用情報工学科</td>
                        </tr>
                        <tr>
                            <th>サークル</th>
                            <td>計算技術研究会</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section id="box2" class="box">
        <div class="profile-content">
            <div class="profile-text-container card-text">
                <h2 class="heading_large">プログラミング</h2>
                <div class=" profile-text">
                    <p>主にUnityでゲーム開発や、UIElementsを使ったエディタ拡張をしています。</p>
                    <p>また、WordPressでの自作テーマの作成、プログラミングスクールのバイトなどをしています。</p>
                </div>
            </div>

            <div class="profile-card-image  card-text card-img-fromRight">
                <div class="card">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/profile/game2.jpeg" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="box3" class="box">
        <div class="profile-content">
            <div class="profile-card-image  card-text card-img-fromLeft">
                <div class="card">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/profile/3D1.jpg" alt="">
                </div>
            </div>
            <div class="profile-text-container">
                <h2 class="heading_large card-text">3D</h2>
                <div class="card-text profile-text">
                    MMDモデルの作成や、Marvelous Designer、Blenderを使用したクロスシミュレーション・映像制作などをしています。
                </div>
            </div>
        </div>
    </section>

    <section id="box4" class="box">
        <div class="profile-content">
            <div class="profile-text-container card-text">
                <h2 class="heading_large">その他</h2>
                <div class=" profile-text">
                    <p>お菓子作りや裁縫もすきです。</p>
                    <p>高校の学園祭でドレスを展示したりしました</p>
                </div>
            </div>

            <div class="profile-card-image  card-text card-img-fromRight">
                <div class="card ">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/profile/clothes3.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="last-box" class="box">
        <div class="profile-content">
            <div class="profile-card-image  card-text card-img-fromLeft">
                <div class="card">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/profile/datuado1.png" alt="">
                </div>
            </div>
            <div class="profile-text-container">
                <h2 class="heading_large card-text">二次創作</h2>
                <div class="card-text profile-text">
                    <p>3DSの脱出アドベンチャーシリーズが好きです。全人類やってください</p>
                    <p>キャラのMMDモデルやぬいを作ってます</p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>

<script>
    function animateFrom(elem, direction) {
        direction = direction || 1;
        var x = 0,
            y = direction * 100;
        if (elem.classList.contains("card-img-fromLeft")) {
            x = -100;
            y = 100;
        } else if (elem.classList.contains("card-img-fromRight")) {
            x = 100;
            y = 100;
        }
        elem.style.transform = "translate(" + x + "px, " + y + "px)";
        elem.style.opacity = "0";
        gsap.fromTo(elem, {
            x: x,
            y: y,
            autoAlpha: 0
        }, {
            duration: 2,
            x: 0,
            y: 0,
            autoAlpha: 1,
            ease: "expo",
            overwrite: "auto"
        });
    }

    function hide(elem) {
        gsap.set(elem, {
            autoAlpha: 0
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        gsap.registerPlugin(ScrollTrigger);

        gsap.utils.toArray(".card-text").forEach(function(elem) {
            hide(elem);

            ScrollTrigger.create({
                trigger: elem,
                onEnter: function() {
                    animateFrom(elem)
                },
                onEnterBack: function() {
                    animateFrom(elem, -1)
                },
                onLeave: function() {
                    hide(elem)
                }
            });
        });
    });

    $.scrollify({
        section: ".box",
        interstitialSection: "header",
        standardScrollElements: "#last-box,#footer",
        easing: "swing",
        overflowScroll: false,
        //scrollbars :false,
        scrollSpeed: 1000,
    });
</script>