<?php
    get_header();

    get_template_part('parts/highlights');
    get_template_part('parts/featured_content');
    get_template_part('parts/podcast');
    get_template_part('parts/social');
    get_template_part('parts/videos');
    get_template_part('parts/news');
?>
    <div class="esports-reviews-container">
        <div class="container">
            <?php
                get_template_part('parts/esports_stats');
                get_template_part('parts/reviews');
            ?>
        </div>
    </div>
<?php
    get_footer();
?>
