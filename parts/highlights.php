<?php
    $args = [
        'post_type' => 'post',
        'category_name' => 'highlight',
        'order' => 'DESC',
        'posts_per_page' => 5
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()):
?>

    <section id="highlights">
        <div class="container">
            <h2 class="subtitle">Destaques</h2>            
        </div>
        <div class="highlight-container">
            <div class="items">
                <?php
                    while ($query->have_posts()):
                        $query->the_post();
                ?>
                    <a href="<?= get_permalink() ?>" class="highlight-item" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
                        <div class="overlay"></div>
                        <div class="content">
                            <h3><?= get_the_title() ?></h3>
                            <p><?= excerpt(15) ?></p>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>