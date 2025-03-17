<?php
global $tpl_engine;
the_post();
get_header();
?>
<div class='c-404'>
    <div class="c-wrapper">
        <section class='s-container'>
            <div class='c-404__container'>
                <div class='c-404__content'>
                    <h1>404</h1>
                    <h2>Página não encontrada</h2>
                    <p>A página que você procurava não está disponível. Sentimos muito pelo inconveniente.</p>
                    <a href="<?= site_url() ?>" class="o-btn-default"><span class="o-btn-default__span">Voltar para home</span></a>
                </div>
            </div>
        </section>
    </div>
</div>
<?php get_footer(); ?>