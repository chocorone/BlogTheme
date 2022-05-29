<?php global $topName;
$topName = 'どこにもない場所' ?>
<?php get_header(); ?>


<div id="template-page">
    <div class="not-found-container">
        <h2 id="osagashi">お探しのページは見つかりませんでした</h2>
        <button id="nf-game">
            <img class="nf-img" src="<?php echo get_template_directory_uri(); ?>/img/404.png">
            <div class="nf-game-container">
            <canvas id="unity-canvas" width=800 height=600 style="width: 800px; height: 600px; background: #231F20"></canvas>
            </div>
        </button>
        <a class="totop" href="<?php echo home_url() ?>">トップにもどる</a>
    </div>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/Build/404game.loader.js"></script>
<script type="text/javascript">

    window.onload = function() {


        var Fbutton = document.getElementById("nf-game");
        $(".nf-game-container").css('display', 'none');
        Fbutton.addEventListener(
            'click',
            function() {
            $(".nf-game-container").css('display', 'block');
            $(".nf-img").css('opacity', '0');
            window.setTimeout(deleteImage, 3000);

            var promise =createUnityInstance(document.querySelector("#unity-canvas"), {
                dataUrl: "<?php echo get_template_directory_uri(); ?>/Build/404game.data",
                frameworkUrl: "<?php echo get_template_directory_uri(); ?>/Build/404game.framework.js",
                codeUrl: "<?php echo get_template_directory_uri(); ?>/Build/404game.wasm",
                streamingAssetsUrl: "StreamingAssets",
                companyName: "UsagiMeteor",
                productName: "FlappyRabbit",
                productVersion: "1.0",
                // matchWebGLToCanvasSize: false, // Uncomment this to separately control WebGL canvas render size and DOM element size.
                // devicePixelRatio: 1, // Uncomment this to override low DPI rendering on high DPI displays.
            }, OnLoadProgress);

            promise.then(OnLoadSuccess, OnLoadFailure);
        },
        { once: true }
        );
    };

    var intervalID;

    function deleteImage() {
        $(".nf-img").css('display', 'none');
    }

    var isEnd = false;
    function OnLoadSuccess(e) {
        isEnd = true;
        clearInterval(intervalID);
        document.getElementById("osagashi").innerText ="ゆるいうさぎのゲーム"; 
    }
    function OnLoadFailure(error) {
        //ロードが失敗したときの処理
        isEnd = true;
        clearInterval(intervalID);
        document.getElementById("osagashi").innerText ="読み込み失敗しました"; 
        console.log("読み込み失敗しました");
    }
    function OnLoadProgress(e){
        //ロードの進捗
        document.getElementById("osagashi").innerText ="読み込み中です"; 
        intervalID= setInterval(tenten,500);
    }
    var i=0;
    function tenten(){
        if(!isEnd){
            document.getElementById("osagashi").innerText ="読み込み中です"+'.'.repeat(i); 
            if(i==3){
                i=0;
            }else{
                i++;
            }
        }

    }

</script>

<?php get_footer(); ?>