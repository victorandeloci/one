<?php 
    $newsPage = get_page_by_path('news', OBJECT, 'page');
    if (!empty($newsPage)) :
?>

    <section id="news">
        <div class="container">
            <h2 class="subtitle"><?= $newsPage->post_title ?></h2>
            <?= $newsPage->post_content ?>
            <div id="news_container">
                <?php get_template_part('elements/loader'); ?>
            </div>
        </div>
    </section>
<?php endif; ?>