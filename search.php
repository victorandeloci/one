<?php 
    get_header();
    $search = filter_var($_GET['s'], FILTER_SANITIZE_STRING) ?? '';
?>

<main id="search">
    <div class="container post-list-container">
        <?php
            wp_reset_query();

            $args = [
                'post_type' => 'post',
                'posts_per_page' => 16
            ];

            if (!empty($search))
                $args['s'] = $search;

            $query = new WP_Query( $args );

            if ($query->have_posts()) :
                while($query->have_posts()) :

                    $query->the_post();
                    get_template_part( 'elements/post_card' );

                endwhile;
            endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
