<?php 
    /* Template Name: Sobre e Equipe */
    get_header();
    $post = get_post();
?>

<main class="post page about-team">
    <div class="container">
        <div class="content">
            <h1><?= get_the_title() ?></h1>
            <?= get_the_content() ?>            
        </div>
        <?php get_template_part('elements/social_links'); ?>
    </div>
    <?php
        $team = get_page_by_path('equipe', OBJECT, 'page');
        if ($team) :
    ?>
            <section id="team">
                <div class="team-title">
                    <div class="container">
                        <h2 class="subtitle"><?= $team->post_title ?></h2>
                    </div>
                </div>
                <div class="thumb" style="background-image: url(<?= get_the_post_thumbnail_url($team->ID) ?>);">
                    <div class="decoration"></div>
                </div>
                <?php
                    wp_reset_query();

                    $args = [
                        'post_type' => 'team',
                        'order' => 'ASC'
                    ];
                
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                ?>
                        <div class="container team-container">
                            <div class="team-list">
                                <?php
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        if (empty(get_post_meta(get_the_ID(), 'founder', true))) {
                                            get_template_part('elements/team_member');
                                        }
                                    }
                                ?>
                            </div>
                        </div>                        
                <?php endif; ?>
                <?php
                    wp_reset_query();

                    $args = [
                        'post_type' => 'team',
                        'order' => 'ASC',
                        'meta_query'  => [
                            [
                                'key' => 'founder',
                                'value' => 'true'
                            ]
                        ]
                    ];
                
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                ?>
                        <div class="container team-container">
                            <h3 class="subtitle center">Fundadores</h3>
                            <div class="team-list">
                                <?php
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        get_template_part('elements/team_member');
                                    }
                                ?>
                            </div>
                        </div>                        
                <?php endif; ?>
            </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
