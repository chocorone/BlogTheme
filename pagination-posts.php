<?php
$prev_link = get_previous_posts_link('←前のページ');
$next_link = get_next_posts_link('次のページ→');

if (isset($prev_link) or isset($next_link)) {
?>
    <ul class="pagination">
        <li class="pagination-prev"><?php isset($prev_link) ? print($prev_link) : '' ?></li>
        <li class="pagination-next"><?php isset($next_link) ? print($next_link) : '' ?></li>
    </ul>
<?php
}
