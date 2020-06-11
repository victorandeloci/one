<?php query_posts("category_name=podcast"); ?>

<h2><i class="fas fa-headphones-alt"></i> Podcasts</h2>
      <hr>
      <?php if(category_description()) echo category_description(); ?>
      <div class="listen">
        <a href="https://open.spotify.com/show/2Y4n9PntpuhSvObzGZyk4L" data-link="social" id="socialLink" title="Spotify"><i class="fab fa-spotify"></i></a>
        <a href="https://podcasts.google.com/?feed=aHR0cDovL3BsYXllcnNlbGVjdC5jb20uYnIvZmVlZC9wb2RjYXN0Lw%3D%3D&hl=pt-BR" data-link="social" id="socialLink" title="Google Podcasts"><i class="fab fa-google"></i></a>
        <a href="https://playerselect.com.br/feed/podcast/" data-link="social" id="socialLink" title="Feed RSS"><i class="fas fa-rss"></i></a>
      </div>

      <div class="container podcast-selection">
        
		  <div>
			  <h3>PlayerCast</h3>
          <div class="selector">
            <select class="podcast-select" name="Podcasts Selector">
              <option value="default">Selecione um Episódio:</option>
              <?php
                query_posts("category_name=playercast");

                if(have_posts()) : while(have_posts()) : the_post();
                    ?>
                      <option title="<?php the_title(); ?>" value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
                    <?php
                  endwhile;
                endif;

               ?>
            </select>
            <i class="fas fa-arrow-down"></i>
          </div>
		  </div>
		  
		  <div class="after">
		<div class="column">
          <h3>PS News</h3>
          <div class="selector">
            <select class="podcast-select" name="Podcasts Selector">
              <option value="default">Selecione um Episódio:</option>
              <?php
                query_posts("category_name=psnews");

                if(have_posts()) : while(have_posts()) : the_post();
                    ?>
                      <option title="<?php the_title(); ?>" value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
                    <?php
                  endwhile;
                endif;

               ?>
            </select>
            <i class="fas fa-arrow-down"></i>
          </div>
        </div>
        <div class="column">
          <h3>BKP</h3>
          <div class="selector">
            <select class="podcast-select" name="Podcasts Selector">
              <option value="default">Selecione um Episódio:</option>
              <?php
                query_posts("category_name=bkp");

                if(have_posts()) : while(have_posts()) : the_post();
                    ?>
                      <option title="<?php the_title(); ?>" value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
                    <?php
                  endwhile;
                endif;

               ?>
            </select>
            <i class="fas fa-arrow-down"></i>
          </div>
        </div>

		  </div>
      </div>