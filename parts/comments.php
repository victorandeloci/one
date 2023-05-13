<div id="commentsContainer">
    <h2 class="subtitle dark">Comentários</h2>
    <div class="wp-comments-container">
        <?php
            $args = [
                'post_id' => get_the_ID(),
                'status' => 'approve',
                'orderby'=>'comment_date',
                'order'=>'ASC'
            ];

            $comments_query = new WP_Comment_Query;
            $comments = $comments_query->query( $args );

            if ($comments) :
                foreach ($comments as $comment) :
        ?>
            <div class="comment-item">
                <div class="author">
                    <img src="<?= get_avatar_url($comment->comment_author_email) ?>" alt="">
                    <div class="name-date">
                        <span class="name"><?= $comment->comment_author ?></span>
                        <span> - </span>
                        <span class="date"><?= date('d/m/Y', strtotime($comment->comment_date)) ?></span>
                    </div>
                </div>
                <p><?= $comment->comment_content ?></p>
            </div>
        <?php
                endforeach;
            endif;
        ?>
    </div>
    <div class="disqus-comments-container">
        <div id="disqus_thread"></div>
        <script>
            (function() {
                var d = document, s = d.createElement('script');
                s.src = 'https://playerselect.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>
</div>