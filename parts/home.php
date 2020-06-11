<div id="metaInformation">
  <title><?php echo get_bloginfo("name"); ?></title>
  <meta property="og:title" content="<?php echo get_bloginfo("name"); ?>"/>
  <meta property="og:description" content="" />
  <meta property="og:url" content="<?php echo get_home_url(); ?>"/>
</div>

<?php

  get_template_part("parts/featured");

  get_template_part("parts/cards");

  get_template_part("parts/podcasts");

  get_template_part("parts/social");

 ?>
