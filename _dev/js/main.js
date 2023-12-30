var page = 1;
var elementsIndexes = [];

function docReady(fn) {
  // see if DOM is already available
  if (document.readyState === 'complete' || document.readyState === 'interactive') {
    // call on next available tick
    setTimeout(fn, 1);
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}

async function sendByAction(method, action, formData = null, params = null) {
  let response = '';
  if (method == 'GET' || method == 'get') {

    params['action'] = action;
    response = await fetch(apiUrl + '?' + new URLSearchParams(params))
      .then(function (response) {
        return response.text();
      });

  } else if (method == 'POST' || method == 'post') {

    formData.append('action', action);
    response = await fetch(apiUrl, {
      method: method,
      body: formData
    })
      .then(function (response) {
        return response.text();
      });

  }

  return response;
}

docReady(function () {
  // podcast selector
  let podcastSelectors = document.querySelectorAll('.podcast-select');
  if (podcastSelectors != null && podcastSelectors.length > 0) {
    podcastSelectors.forEach((select) => {
      select.addEventListener('change', function () {
        if (this.value != null && this.value != '') {
          window.location.href = this.value;
        }
      });
    });
  }

  // podcast load more
  let podcastLoadMoreBtn = document.getElementById('podcastLoadMore');
  if (podcastLoadMoreBtn != null) {
    podcastLoadMoreBtn.addEventListener('click', function (e) {
      e.preventDefault();
      podcastLoadMoreBtn.innerHTML = '<div class="loader"><div class="lds-dual-ring"></div></div>';

      page++;
      fetch((siteUrl + '/wp-json/wp/v2/posts?page=' + page + '&category_slug=podcast&per_page=14'), {
        method: 'GET'
      })
        .then(function (response) {
          return response.text();
        })
        .then(function (text) {
          let items = JSON.parse(text);
          items.forEach((ep, i) => {
            if (!(page == 2 && i == 0)) {
              let podcastItem = document.createElement('div');
              podcastItem.classList.add('podcast-item');

              let thumb = (ep.metadata.podcast_mp3_thumb != null && ep.metadata.podcast_mp3_thumb != '')
                ? ep.metadata.podcast_mp3_thumb
                : (ep.metadata.one_podcast_cover_url != null && ep.metadata.one_podcast_cover_url != '')
                  ? ep.metadata.one_podcast_cover_url
                  : (ep.metadata.episode_cover != null && ep.metadata.episode_cover != '')
                    ? ep.metadata.episode_cover
                    : (ep.featured_image_url != null && ep.featured_image_url != '')
                      ? ep.featured_image_url
                      : themeDirUrl + '/assets/img/default-image.png';
              let podcastItemLink = document.createElement('a');
              podcastItemLink.classList.add('podcast-ep');
              podcastItemLink.setAttribute('title', ep.title.rendered);
              podcastItemLink.setAttribute('href', ep.link);
              podcastItemLink.style.backgroundImage = 'url(' + thumb + ')';

              podcastItem.appendChild(podcastItemLink);
              document.querySelector('#podcastList').appendChild(podcastItem);
            }

            podcastLoadMoreBtn.innerHTML = 'Carregar mais';
          });
        });
    });
  }

  // highlights controllers
  if (document.getElementById('highlights')) {
    let slider = document.querySelector('.highlight-container');
    document.getElementById('hlLeftBtn').addEventListener('click', function () {
      slider.scrollLeft -= 500;
    });
    document.getElementById('hlRightBtn').addEventListener('click', function () {
      slider.scrollLeft += 500;
    });
  }

  // wp gallery
  let wpGalleries = document.querySelectorAll('.wp-block-gallery');
  if (wpGalleries != null && wpGalleries.length > 0) {
    wpGalleries.forEach((wpGallery) => {
      wpGallery.querySelectorAll('.wp-block-image').forEach((image) => {
        image.classList.add('splide__slide');
      });
      wpGallery.classList.add('splide__list');

      let splideTrack = document.createElement('div');
      splideTrack.classList.add('splide__track');
      splideTrack.innerHTML = wpGallery.outerHTML;

      let splideWrap = document.createElement('div');
      splideWrap.classList.add('splide');
      splideWrap.appendChild(splideTrack);

      // render
      wpGallery.replaceWith(splideWrap);

      // start splide
      new Splide(splideWrap).mount();
    });
  }

  // plyr audio player
  let playerElements = document.querySelectorAll('audio');
  if (playerElements) {
    playerElements.forEach((audioElement) => {
      let player = new Plyr(audioElement, {
        controls: (audioElement.getAttribute('hide-controls') == 'true')
          ? ['play', 'progress', 'mute', 'settings']
          : ['play', 'progress', 'current-time', 'mute', 'settings']
      });
    });
  }

  // gallery image view
  document.querySelectorAll('.splide .wp-block-image').forEach((imgBlock) => {
    imgBlock.addEventListener('click', function () {
      let imageViewer = document.getElementById('image_show');
      imageViewer.querySelector('img').setAttribute('src', imgBlock.querySelector('img').getAttribute('src'));
      imageViewer.classList.add('show');
    });
  });

  document.getElementById('image_show').addEventListener('click', function () {
    this.classList.remove('show');
    this.querySelector('img').setAttribute('src', '');
  });

  // esports load
  if (document.getElementById('esports')) {
    let selector = document.querySelector('#esports .game-selector');
    let container = document.getElementById('eSportsContainer');

    // default load
    fetch((apiUrl + '?action=one_esports_load&slug=csgo'), {
      method: 'GET'
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (text) {
        if (text != null && text != '') {
          container.innerHTML = text;
        }
      });

    // selector load
    selector.addEventListener('change', function (e) {
      let slug = selector.value;
      container.innerHTML = '<div class="loader-container"><div class="loader"><div class="lds-dual-ring"></div></div></div>';

      fetch((apiUrl + '?action=one_esports_load&slug=' + slug), {
        method: 'GET'
      })
        .then(function (response) {
          return response.text();
        })
        .then(function (text) {
          if (text != null && text != '') {
            container.innerHTML = text;
          }
        });
    });
  }

  // news load
  if (document.getElementById('news')) {
    let container = document.getElementById('news_container');

    // default load
    fetch((apiUrl + '?action=one_news_load'), {
      method: 'GET'
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (text) {
        if (text != null && text != '') {
          container.innerHTML = text;
        }
      });
  }
});
