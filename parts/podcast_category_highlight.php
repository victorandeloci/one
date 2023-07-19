<?php
    $category = get_category_by_slug('rpg');
?>

<section id="podcast_category_highlight">
    <div class="container">
        <h2 class="subtitle"><?= $category->name ?></h2>
        <?php if (!empty($category->description)) : ?>
            <p class="category-description"><?= $category->description ?></p>
        <?php endif; ?>
        <div class="pch-list podcast-items">
            <?php
                $args = [
                    'post_type' => 'post',
                    'category_name' => $category->slug,
                    'order' => 'ASC',
                    'posts_per_page' => -1
                ];

                wp_reset_query();
                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part('elements/podcast_item');
                    }
                }
            ?>
        </div>
    </div>
</section>