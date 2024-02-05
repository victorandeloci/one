<?php $obj = $args['obj']; ?>

<table>
    <?php
        $prevLeague = '';
        foreach ($obj as $i => $item) :
            $league = $item->league->name;
            if ($league != $prevLeague) :
            ?>
                <tr>
                    <td class="title"><h3><?= $league; ?></h3></td>
                </tr>
            <?php endif; ?>
                <tr>
                    <td class="<?= ($item->winner->id == $item->opponents[0]->opponent->id) ? 'winner' : '' ?>">
                        <?php if (!empty($item->opponents[0]->opponent->image_url)) : ?>
                            <img src="<?= one_str_lreplace('/', '/thumb_', $item->opponents[0]->opponent->image_url) ?>" alt="<?php ($item->opponents[0]->opponent->acronym) ? $item->opponents[0]->opponent->acronym : $item->opponents[0]->opponent->name ?>" title="<?= $item->opponents[0]->opponent->name; ?>">
                        <?php else : ?>
                            <p><?= $item->opponents[0]->opponent->name ?></p>
                        <?php endif; ?>
                        <span><?= $item->results[0]->score; ?></span>
                    </td>
                    <td class="x"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg></td>
                    <td class="<?= ($item->winner->id == $item->opponents[1]->opponent->id) ? 'winner' : '' ?>">
                        <span><?= $item->results[1]->score; ?></span>
                        <?php if (!empty($item->opponents[1]->opponent->image_url)) : ?>
                            <img src="<?= one_str_lreplace('/', '/thumb_', $item->opponents[1]->opponent->image_url) ?>" alt="<?php ($item->opponents[1]->opponent->acronym) ? $item->opponents[1]->opponent->acronym : $item->opponents[1]->opponent->name ?>" title="<?= $item->opponents[1]->opponent->name; ?>">
                        <?php else : ?>
                            <p><?= $item->opponents[1]->opponent->name ?></p>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td class="date"><p><?= date('d/m', strtotime($item->begin_at)); ?></p></td>
                </tr>
            <?php
                $prevLeague = $league;
        endforeach;
    ?>
</table>