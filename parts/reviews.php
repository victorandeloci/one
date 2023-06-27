<section id="reviews">
    <div class="container">
        <h2 class="subtitle">Textos</h2>
        <div class="post-list-container">
            <?php
                wp_reset_query();

                $args = [
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'category_name' => 'textos'
                ];

                $query = new WP_Query( $args );

                if ($query->have_posts()) :
                    while ($query->have_posts()) :

                        $query->the_post();
                        get_template_part( 'elements/post_card' );

                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>