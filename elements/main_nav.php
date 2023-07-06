<?php wp_reset_query(); ?>
<nav id="mainNav">
    <a title="Textos" href="<?= bloginfo('url') ?>/category/textos" 
        class="<?= (!is_home() && ((is_single() && !empty(get_the_ID()) && in_category('textos', get_the_ID())) || is_category(['textos', 'analises-games', 'filmes-series', 'artigos'])))
                        ? 'active' 
                        : '' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
    </a>
    <a title="Podcasts" href="<?= bloginfo('url') ?>/podcasts" 
        class="<?= (!is_home() && (is_page('podcasts') || (is_single() && !empty(get_the_ID()) && in_category(['podcast', 'playercast', 'bkp', 'senpai-me-notou', 'psnews'], get_the_ID())) || is_category(['podcast', 'playercast', 'bkp', 'senpai-me-notou', 'psnews'])))
                        ? 'active' 
                        : '' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 96V256c0 53 43 96 96 96s96-43 96-96H208c-8.8 0-16-7.2-16-16s7.2-16 16-16h80V192H208c-8.8 0-16-7.2-16-16s7.2-16 16-16h80V128H208c-8.8 0-16-7.2-16-16s7.2-16 16-16h80c0-53-43-96-96-96S96 43 96 96zM320 240v16c0 70.7-57.3 128-128 128s-128-57.3-128-128V216c0-13.3-10.7-24-24-24s-24 10.7-24 24v40c0 89.1 66.2 162.7 152 174.4V464H120c-13.3 0-24 10.7-24 24s10.7 24 24 24h72 72c13.3 0 24-10.7 24-24s-10.7-24-24-24H216V430.4c85.8-11.7 152-85.3 152-174.4V216c0-13.3-10.7-24-24-24s-24 10.7-24 24v24z"/></svg>
    </a>
    <a title="Início" href="<?= bloginfo('url') ?>" class="<?= (is_home()) ? 'active' : '' ?>">
        <svg viewBox="-1 0 19 19" xmlns="http://www.w3.org/2000/svg"><path d="M299.9 576.2c0 .6-.5.8-1 .8h-1.1c-.6 0-1.1-.2-1.1-.8v-1c0-1-1-2.2-2.1-2.2h-2.2c-1.1 0-2 1.1-2 2.2v1c0 .6-.6.8-1.1.8h-1.1c-.6 0-1-.2-1-.8v-8.4l5.5-5.1c.5-.4 1.1-.4 1.5 0l5.5 5.1.2.4v8Zm2.1-8.6a1 1 0 0 0-.3-.7l-6.7-6.3c-.8-.8-2.2-.8-3 0l-6.7 6.2a1 1 0 0 0-.3.8v9.6c0 1.1 1 1.8 2.1 1.8h3.2c1.2 0 2.1-.7 2.1-1.8v-1c0-.5.5-1 1.1-1 .6 0 1 .5 1 1v1c0 1.1 1 1.8 2.2 1.8h3.2c1.1 0 2.1-.7 2.1-1.8v-9.6Z" transform="translate(-341 -720) translate(56 160)" stroke="none" stroke-width="1" fill-rule="evenodd"/></svg>
    </a>
    <a title="Contato" href="<?= bloginfo('url') ?>/contato" class="<?= (is_page('contato')) ? 'active' : '' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg>
    </a>
    <a title="Sobre" href="<?= bloginfo('url') ?>/sobre" class="<?= (is_page('sobre')) ? 'active' : '' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm169.8-90.7c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
    </a>
</nav>