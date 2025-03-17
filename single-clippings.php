<?php
global $tpl_engine;

the_post();
get_header();
?>

<div class="c-wrapper">
  <?php the_content(); ?>
</div>

<?php get_footer(); ?>
