<?php
global $tpl_engine;
?>
</main>

<footer class="o-footer">
  <div class="o-footer_container">
    <div class="o-footer-copy">
      <span>COPYRIGHT © VÍRGULA FILMES © 2018</span>
      <strong>PRODUTORA DE BONS MOMENTOS</strong>
      <span>TODOS OS DIREITOS RESERVADOS</span>
    </div>
    <div class="o-footer-social">
      <a href="" target="_blank"><?php $tpl_engine->svg('redes/instagram') ?></a>
      <a href="" target="_blank"><?php $tpl_engine->svg('redes/whatsapp') ?></a>
      <a href="" target="_blank"><?php $tpl_engine->svg('redes/youtube') ?></a>
    </div>
  </div>
</footer>

<?php $tpl_engine->partial('template/marca-dagua'); ?>

<?php wp_footer(); ?>
</body>

</html>