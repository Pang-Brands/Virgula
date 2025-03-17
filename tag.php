<?php
  global $tpl_engine;

  $current_tag = get_queried_object();

  if (array_key_exists('is_ajax', $_GET) && $_GET['is_ajax'] == 'true') {
    if(array_key_exists('mega_menu', $_GET)) {
      $category_id = $current_tag->term_id;
      $tpl_engine->partial('mega_menu_posts', array('current_tag' => $current_tag));
    } else {
      $current_page = array_key_exists('pagina', $_GET) ? $_GET['pagina'] : '1';
      $tpl_engine->partial('category_last_posts_part_one', array(
                                                                  'current_page' => $current_page,
                                                                  'current_tag' => $current_tag
                                                                )
      );
    }
    die();
  }

  get_header();
?>
<div class='c-category'>
  <div class="c-wrapper">
      <?php $tpl_engine->partial('category_highlight', array(
                                                      'current_tag' => $current_tag
                                                      )
      ); ?>
      <section class="s-container">
        <div class="u-content-grid">
          <div class="u-content-left">
            <?php $tpl_engine->partial('category_last_posts_part_one', array(
                                                                      'current_tag' => $current_tag
                                                                      )
            ); ?>
          </div>
          <?php if (!is_mobile()): ?>
            <aside class="u-content-right">
              <?php $tpl_engine->partial('most_read_sidebar', array(
                                                              'current_tag' => $current_tag
                                                              ) 
              ); ?>
            </aside>
          <?php endif ?>
        </div>
      </section>
  </div>
</div>

<?php get_footer(); ?>
