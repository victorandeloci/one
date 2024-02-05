<div id="live_video">
  <div class="container">
    <h2 class="subtitle"><?= $args['title'] ?></h2>
    <p><?= $args['description'] ?></p>
    <iframe 
      src="https://www.youtube.com/embed/<?= $args['live_video_id'] ?>?autoplay=1&mute=1&modestbranding=1&autohide=1&showinfo=0&controls=0" 
      title="YouTube video player" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
      allowfullscreen>
    </iframe>
  </div>
</div>
