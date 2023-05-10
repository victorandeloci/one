<?php
    $args = [
        'post_type' => 'post',
        'category_name' => 'highlight',
        'order' => 'DESC',
        'posts_per_page' => 8
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) :
?>

    <section id="highlights">
        <div class="container">
            <h2 class="subtitle">Destaques</h2>            
        </div>
        <div class="highlight-container">
            <div class="items">
                <?php
                    while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part('elements/highlight_item');
                    }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>