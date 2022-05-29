<?php
/*
Template Name: ホーム
Template Post Type: page
*/
?>
<?php global $topName;
$topName = 'サイト' ?>
<?php get_header(); ?>
<div id="sitemap">
  <div id="top-image">
    <a class="star-button" id="home-star" href="#"></a>
    <a class="star-button" id="blog-star" href="/blog/"></a>
    <a class="star-button" id="profile-star" href="/profile/"></a>
    <a class="star-button" id="work-star" href="/work/"></a>
  </div>


</div>
<div id="footer-button">
  <a href="" id="jumpa"></a>
</div>


<?php get_footer(); ?>

<script type="text/javascript">
  window.onload = function() {
    var Fbutton = document.getElementById("jumpa");
    $("footer").css('display', 'none');
    Fbutton.onclick = function() {
      $("footer").css('display', 'block');
      var position = $("#jump").offset().top;
      $("html, body").animate({
        scrollTop: position
      }, 800, "swing");
      let oldHref = Fbutton.getAttribute('href');
      let newHref = oldHref.replace('', '#jump');
      Fbutton.setAttribute('href', newHref);
    }

    $(".main-wrapper").css('height', 'calc(100%+10px)');
    $("main").css('animation', 'bg 250s infinite linear');
  };
</script>