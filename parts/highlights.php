<section id="highlights">
    <div class="container title">
        <h2 class="subtitle">Destaques</h2>
        <div class="highlight-controllers">
            <button id="hlLeftBtn">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>  
            </button>
            <button id="hlRightBtn">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
            </button>
        </div>
    </div>
    <div class="highlight-container">
        <div class="items">
            <?php
                // fixed highlights
                wp_reset_query();

                $args = [
                    'post_type' => 'fixed_highlight',
                    'order' => 'DESC',
                    'posts_per_page' => -1
                ];            
                $query = new WP_Query($args);
            
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part('elements/highlight_fixed_item');
                    }
                }

                // highlight items
                wp_reset_query();

                $args = [
                    'post_type' => 'post',
                    'category_name' => 'highlight',
                    'order' => 'DESC',
                    'posts_per_page' => 6
                ];            
                $query = new WP_Query($args);
            
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part('elements/highlight_item');
                    }
                }
            ?>
        </div>
    </div>
</section>