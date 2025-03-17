<?php
  global $tpl_engine;
  global $post;

  $author_id = $post->post_author;
  $author_meta = get_user_meta($author_id);
  $facebook = get_the_author_meta('facebook', $author_id);
  $twitter = get_the_author_meta('twitter', $author_id);
  $linkedin = get_the_author_meta('linkedin', $author_id);
  $blog = get_the_author_meta('url', $author_id);

  get_header();
?>
<div class="c-author">
  <div class="c-wrapper">
    <div class="c-author__highlight">
      <section class="s-container">
        <div class='c-author__container'>
          <div class="c-author__highlight-thumb">
            <?php echo get_avatar(get_the_author_meta('ID'), 1000); ?>
          </div>
          <div class="c-author__highlight-info">
            <span class="c-author__pre-title">Autor:</span>
            <h2 class="c-author__title"><?php the_author_meta('display_name', $author_id); ?></h2>
            <p class='c-author__description'><?php the_author_meta('description', $author_id); ?></p>
            <ul class='c-author__social-list'>
              <?php if($facebook): ?>
                <li class='c-author__social-item'><a class='c-author__social-link' href="<?php echo $facebook; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/public/images/icons/<?php echo (is_mobile() && !is_tablet())? 'facebook-author@2x.png' : 'facebook_dark@2x.png'; ?>"></a></li>
              <?php endif; ?>
                <?php if($twitter): ?>
                <li class='c-author__social-item'><a class='c-author__social-link' href="<?php echo 'https://twitter.com/' . $twitter; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/public/images/icons/<?php echo (is_mobile() && !is_tablet())? 'twitter-author@2x.png' : 'twitter_dark@2x.png'; ?>"></a></li>
              <?php endif; ?>
              <?php if($linkedin): ?>
                <li class='c-author__social-item'><a class='c-author__social-link' href="<?php echo $linkedin; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/public/images/icons/<?php echo (is_mobile() && !is_tablet())? 'linkedin-author@2x.png' : 'linkedin_dark@2x.png'; ?>"></a></li>
              <?php endif; ?>
              <?php if($blog): ?>
                <li class='c-author__social-item'><a class='c-author__social-link' href="<?php echo $blog; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/public/images/icons/<?php echo (is_mobile() && !is_tablet())? 'blog-author@2x.png' : 'blog_dark@2x.png'; ?>"></a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </section>
    </div>
    <section class="s-container">
      <div class="u-content-grid">
        <div class="u-content-left">
          <?php $tpl_engine->partial('authors_last_posts_part_one', array(
                                                                      'author_id' => $author_id
                                                                    )
          ); ?>
        </div>
        <?php if (!is_mobile()): ?>
          <aside class="u-content-right">
            <?php $tpl_engine->partial('most_read_sidebar'); ?>
          </aside>
        <?php endif ?>
      </div>
    </section>
  </div>
</div>

<?php get_footer(); ?>
