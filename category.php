<?php 
    get_header();
    $term = get_queried_object();
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
?>

<main id="category">
    <div class="container">
        <h2 class="subtitle"><?= $term->name ?></h2>
        <div class="post-list-container">
            <?php
                wp_reset_query();

                $args = [
                    'post_type' => 'post',
                    'posts_per_page' => 16,
                    'category_name' => $term->slug,
                    'paged' => $paged
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
        <div id="pagination">
            <?php
                echo paginate_links( [
                    'base'         => str_replace( 9999, '%#%', esc_url( get_pagenum_link( 9999 ) ) ),
                    'total'        => $query->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'end_size'     => 2,
                    'mid_size'     => 1,
                    'prev_next'    => true,
                    'prev_text'    => sprintf('<span class="pagination-before"></span>'),
                    'next_text'    => sprintf('<span class="pagination-next"></span>'),
                    'add_args'     => false,
                    'add_fragment' => ''
                ] );
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
