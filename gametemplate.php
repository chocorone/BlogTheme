<?php
/*
Template Name: ゲームテンプレート
Template Post Type: post
*/
?>
<?php global $topName;
$topName = '作品' ?>
<?php get_header(); ?>
<div id="template-single">


<div class="work-content ">
        <div class="blog-box work-box">
            

        <div class="game-container">
        <h2 class="work-title"><?php the_title(); ?></h2>
        <h3 id="yomikomi">読み込み中</h3>
        <canvas id="unity-canvas" width=800 height=600 style="width: 800px; height: 600px; background: #231F20"></canvas>



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
            </div>
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
<script src="<?php echo home_url() . SCF::get('game-url'); ?>.loader.js"></script>
<script type="text/javascript">

    window.onload = function() {
        var promise =createUnityInstance(document.querySelector("#unity-canvas"), {
            dataUrl: "<?php echo home_url() . SCF::get('game-url');?>.data",
            frameworkUrl: "<?php echo home_url() . SCF::get('game-url');?>.framework.js",
            codeUrl: "<?php echo home_url() . SCF::get('game-url');?>.wasm",
            streamingAssetsUrl: "StreamingAssets",
            companyName: "UsagiMeteor",
            productName: "<?php SCF::get('work-title')?>",
            productVersion: "1.0",
            // matchWebGLToCanvasSize: false, // Uncomment this to separately control WebGL canvas render size and DOM element size.
            // devicePixelRatio: 1, // Uncomment this to override low DPI rendering on high DPI displays.
        }, OnLoadProgress);

        promise.then(OnLoadSuccess, OnLoadFailure);
    }

    var intervalID;

    var isEnd = false;
    function OnLoadSuccess(e) {
        isEnd = true;
        clearInterval(intervalID);
        document.getElementById("yomikomi").innerText ="読み込み完了"; 
    }
    function OnLoadFailure(error) {
        //ロードが失敗したときの処理
        isEnd = true;
        clearInterval(intervalID);
        document.getElementById("yomikomi").innerText ="読み込み失敗しました"; 
        console.log("読み込み失敗しました");
    }
    function OnLoadProgress(e){
        //ロードの進捗
        document.getElementById("yomikomi").innerText ="読み込み中です"; 
        intervalID= setInterval(tenten,1000);
    }
    var i=0;
    function tenten(){
        if(!isEnd){
            document.getElementById("yomikomi").innerText ="読み込み中です"+'.'.repeat(i); 
            if(i==3){
                i=0;
            }else{
                i++;
            }
        }

    }
    

</script>

<?php get_footer(); ?>