<?php
  global $tpl_engine;
  global $post;

  $is_search = (array_key_exists('s', $_GET) && $_GET['s'] != '') ? $_GET['s'] : false;
  $current_page = array_key_exists('pagina', $_GET) ? $_GET['pagina'] : '1';

  $args = array(
    's' => $is_search,
    'posts_per_page' => 15,
    'paged' => $current_page,
  );
  $search_query = new WP_Query($args);

  if (array_key_exists('is_ajax', $_GET) && $_GET['is_ajax'] == 'true') {
    $tpl_engine->partial('search_results', array(
      'search_query' => $search_query,
      'is_search' => $is_search,
      'current_page' => $current_page,
    ));
    die();
  }

  $current_page = array_key_exists('pagina', $_GET) ? $_GET['pagina'] : '1';
  
?>
<?php get_header(); ?>
<div class='c-search-content'>
  <div class="c-wrapper">
    <section class="s-container">
      <div class="c-search-top <?php echo (!$is_search)? 'c-search-top--no-results' : '';?>">
        <span class="c-search-top__text">Resultados da busca para: </span><h2 class="c-search-top__search-item"><?php echo $is_search; ?></h2>
      </div>
    </section>
    <section class="s-container">
      <?php if($is_search && $search_query->posts) : ?>
        <?php $tpl_engine->partial('search_results', array(
          'current_page' => $current_page,
          'is_search' => $is_search
        )); 
        ?>
      <?php else : ?>
        <div class="c-search-no-results">
            <div class="c-search-no-results__text-container">
                <h3 class="c-search-no-results__title">Nenhum resultado!</h3>
                <p class="c-search-no-results__text">Não foi possível encontrar nenhum resultado para esta pesquisa, confira se digitou todas as palavras corretamente. Que tal procurar por um termo diferente?</p>
                <a class="js-search-button o-search-button o-search-button--dark-tablet" href="#"><img class="o-search-button__img-dark" src="<?php bloginfo('template_url'); ?>/public/images/icons/search-dark.png"><img class="o-search-button__img-light" src="<?php bloginfo('template_url'); ?>/public/images/icons//icon-search-2x.png">Buscar</a>
            </div>
            <img class="c-search-no-results__img" src="<?php bloginfo('template_url'); ?>/public/images/img-nenhum-resultado-busca.png">
            <span class="c-search-no-results__small">Precisa de ajuda? <a href="#">Fale com nossos especialistas!</a></span>
        </div>
        <?php $tpl_engine->partial('other_posts'); ?>
      <?php endif; ?>
    </section>
  </div>
</div>
<?php get_footer(); ?>
