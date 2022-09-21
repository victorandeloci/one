// habilita o uso do $
jQuery(function($) {

  var browser = (function() {
    let test = function(regexp) {
      return regexp.test(window.navigator.userAgent)
    }
    switch (true) {
      case test(/edg/i):
        return "Microsoft Edge";
      case test(/trident/i):
        return "Microsoft Internet Explorer";
      case test(/firefox|fxios/i):
        return "Mozilla Firefox";
      case test(/opr\//i):
        return "Opera";
      case test(/ucbrowser/i):
        return "UC Browser";
      case test(/samsungbrowser/i):
        return "Samsung Browser";
      case test(/chrome|chromium|crios/i):
        return "Google Chrome";
      case test(/safari/i):
        return "Apple Safari";
      default:
        return "Other";
    }
  })();

  //url da página atual
  var pagePath = "";
  //título da página atual
  var pageTitle = "";
  var loading = true;
  var $window = $(window);
  var $ajaxPath = "https://playerselect.com.br/wp-admin/admin-ajax.php";
  var $content = $('#mainContainer');
  var $page = 1;
  var homeUrl = "https://playerselect.com.br/";

  var default_load_more = function() {

    var $defaultC = $("#defaultContainer");
    $page++;

    $.ajax({
      type: "GET",
      data: {
        action: 'default_load_more',
        page: $page
      },
      dataType: "html",
      url: $ajaxPath,
      beforeSend: function() {
        $defaultC.append('<div id="loader" class="loader-container small"><div class="loader"></div></div>');
      },
      success: function(data) {
        // transforma a data em objeto
        var $data = $(data);
        // verifica se existe dados
        if ($data.length) {
          // oculta o conteudo
          $data.hide();
          // insere no conteudo a data
          $defaultC.append($data);
          // da o fadeIn no conteudo e oculta a div #temp_load
          $data.fadeIn(500, function() {
            $('#loader').remove();
            loading = false;
          })
        } else {
          $('#loader').remove();
        }
      }
    });
  }

  var category_load_more = function($category) {

    var $defaultC = $("#defaultContainer");
    $page++;

    $.ajax({
      type: "GET",
      data: {
        action: 'category_load_more',
        page: $page,
        category: $category
      },
      dataType: "html",
      url: $ajaxPath,
      beforeSend: function() {
        $defaultC.append('<div id="loader" class="loader-container small"><div class="loader"></div></div>');
      },
      success: function(data) {
        // transforma a data em objeto
        var $data = $(data);
        // verifica se existe dados
        if ($data.length) {
          // oculta o conteudo
          $data.hide();
          // insere no conteudo a data
          $defaultC.append($data);
          // da o fadeIn no conteudo e oculta a div #temp_load
          $data.fadeIn(500, function() {
            $('#loader').remove();
            loading = false;
          })
        } else {
          $('#loader').remove();
        }
      }
    });
  }

  var podcast_load_more = function($category, $id) {

    var $defaultC = $($id);
    $page++;

    $.ajax({
      type: "GET",
      data: {
        action: 'podcast_load_more',
        page: $page,
        category: $category
      },
      dataType: "html",
      url: $ajaxPath,
      beforeSend: function() {
        $defaultC.append('<div id="loader" class="loader-container small"><div class="loader"></div></div>');
      },
      success: function(data) {
        // transforma a data em objeto
        var $data = $(data);
        // verifica se existe dados
        if ($data.length) {
          // oculta o conteudo
          $data.hide();
          // insere no conteudo a data
          $defaultC.append($data);
          // da o fadeIn no conteudo e oculta a div #temp_load
          $data.fadeIn(500, function() {
            $('#loader').remove();
            loading = false;
          })
        } else {
          $('#loader').remove();
        }
      }
    });
  }

  var search_load_more = function($s) {

    var $defaultC = $("#defaultContainer");
    $page++;

    $.ajax({
      type: "GET",
      data: {
        action: 'search_load_more',
        page: $page,
        s: $s
      },
      dataType: "html",
      url: $ajaxPath,
      beforeSend: function() {
        $defaultC.append('<div id="loader" class="loader-container small"><div class="loader"></div></div>');
      },
      success: function(data) {
        // transforma a data em objeto
        var $data = $(data);
        // verifica se existe dados
        if ($data.length) {
          // oculta o conteudo
          $data.hide();
          // insere no conteudo a data
          $defaultC.append($data);
          // da o fadeIn no conteudo e oculta a div #temp_load
          $data.fadeIn(500, function() {
            $('#loader').remove();
            loading = false;
          })
        } else {
          $('#loader').remove();
        }
      }
    });
  }

  var load = function(url) {
    $.ajax({
      type: "GET",
      data: {
        action: 'loadPost',
        url: url
      },
      dataType: "html",
      url: $ajaxPath,
      beforeSend: function() {
        $content.empty();
        $content.append('<div class="loader-container"><div class="loader"></div></div>');
      },
      success: function(data) {

        // transforma a data em objeto
        var $data = $(data);
        // verifica se existe dados
        if ($data.length) {
          // oculta o conteudo
          $data.hide();
          //limpa o container
          $content.empty();
          // insere no conteudo a data
          $content.append($data);
          // da o fadeIn no conteudo e oculta a div #temp_load
          $data.fadeIn(500, function() {
            $('#loader').remove();
            loading = false;
          })
        } else {
          $('#loader').remove();
        }
      }
    });

  }

  var load_home = function() {
    $.ajax({
      type: "GET",
      data: {
        action: 'load_home'
      },
      dataType: "html",
      url: $ajaxPath,
      beforeSend: function() {
        $content.empty();
        $content.append('<div class="loader-container"><div class="loader"></div></div>');
      },
      success: function(data) {

        // transforma a data em objeto
        var $data = $(data);
        // verifica se existe dados
        if ($data.length) {
          // oculta o conteudo
          $data.hide();
          //limpa o container
          $content.empty();
          // insere no conteudo a data
          $content.append($data);
          // da o fadeIn no conteudo e oculta a div #temp_load
          $data.fadeIn(500, function() {
            $('#loader').remove();
            loading = false;
          })
        } else {
          $('#loader').remove();
        }
      }
    });

    $page = 1;

  }

  var load_search = function(s) {

    $page = 1;

    $.ajax({
      type: "GET",
      data: {
        action: 'load_search',
        search: s
      },
      dataType: "html",
      url: $ajaxPath,
      beforeSend: function() {
        $content.empty();
        $content.append('<div class="loader-container"><div class="loader"></div></div>');
      },
      success: function(data) {

        // transforma a data em objeto
        var $data = $(data);
        // verifica se existe dados
        if ($data.length) {
          // oculta o conteudo
          $data.hide();
          //limpa o container
          $content.empty();
          // insere no conteudo a data
          $content.append($data);
          // da o fadeIn no conteudo e oculta a div #temp_load
          $data.fadeIn(500, function() {
            $('#loader').remove();
            loading = false;
          })
        } else {
          $('#loader').remove();
        }
      }
    });
  }

  var load_tag = function(tag) {
    $.ajax({
      type: "GET",
      data: {
        action: 'load_tag',
        tag: tag
      },
      dataType: "html",
      url: $ajaxPath,
      beforeSend: function() {
        $content.empty();
        $content.append('<div class="loader-container"><div class="loader"></div></div>');
      },
      success: function(data) {

        // transforma a data em objeto
        var $data = $(data);
        // verifica se existe dados
        if ($data.length) {
          // oculta o conteudo
          $data.hide();
          //limpa o container
          $content.empty();
          // insere no conteudo a data
          $content.append($data);
          // da o fadeIn no conteudo e oculta a div #temp_load
          $data.fadeIn(500, function() {
            $('#loader').remove();
            loading = false;
          })
        } else {
          $('#loader').remove();
        }
      }
    });
  }

  var load_category = function(slug) {

    $page = 1;

    $.ajax({
      type: "GET",
      data: {
        action: 'load_category',
        slug: slug
      },
      dataType: "html",
      url: $ajaxPath,
      beforeSend: function() {
        $content.empty();
        $content.append('<div class="loader-container"><div class="loader"></div></div>');
      },
      success: function(data) {

        // transforma a data em objeto
        var $data = $(data);
        // verifica se existe dados
        if ($data.length) {
          // oculta o conteudo
          $data.hide();
          //limpa o container
          $content.empty();
          // insere no conteudo a data
          $content.append($data);
          // da o fadeIn no conteudo e oculta a div #temp_load
          $data.fadeIn(500, function() {
            $('#loader').remove();
            loading = false;
          })
        } else {
          $('#loader').remove();
        }
      }
    });
  }

  var load_esport = function($slug) {

    var $defaultC = $("#eSportsContainer");
    $page++;

    $.ajax({
      type: "GET",
      data: {
        action: 'load_esport',
        EsSlug: $slug
      },
      dataType: "html",
      url: $ajaxPath,
      beforeSend: function() {
        $defaultC.html('<div id="loader" class="loader-container small"><div class="loader"></div></div>');
      },
      success: function(data) {
        // transforma a data em objeto
        var $data = $(data);
        // verifica se existe dados
        if ($data.length) {
          // oculta o conteudo
          $data.hide();
          // insere no conteudo a data
          $defaultC.html($data);
          // da o fadeIn no conteudo e oculta a div #temp_load
          $data.fadeIn(500, function() {
            $('#loader').remove();
            loading = false;
          })
        } else {
          $('#loader').remove();
        }
      }
    });
  }

  var overlayToggle = function() {
    $(".back-overlay").toggleClass("back-overlay-show");
  }

  var headerToggle = function() {
    $("#navMenu").toggleClass("menu-show");
  }

  $(document).on("click", ".back-overlay", function() {
    overlayToggle();
    headerToggle();
  });

  $(document).on("click", "#headerBtn", function() {
    headerToggle();
    overlayToggle();
  });

  $(document).on("click", ".game-selector .game", function() {
    $(".game-selector .game").removeClass("active");
    load_esport($(this).attr("slug"));
    $(this).addClass("active");
  });

  //submit do search form
  $('#searchform').submit(function(evt) {
    evt.preventDefault();
    var $s = $("#s").val();
    load_search($s);
    window.history.pushState("obj", "Busca por " + $s, "/?s=" + $s);
    $(window).scrollTop(0);
  });

  $(document).on("click", "#defaultLoadMore", function() {
    default_load_more();
  });

  $(document).on("click", "#searchLoadMore", function() {
    search_load_more($(this).attr("s"));
  });

  $(document).on("click", "#categoryLoadMore", function() {
    category_load_more(window.location.pathname);
  });

  $(document).on("click", "#podcastsLoadMore", function() {
    podcast_load_more($(this).attr("slug"), $(this).attr("container"));
  });

  $(document).on("click", "#homeScrollBtn", function() {
    $(document).scrollTop(window.innerHeight);
  });

  $(document).on("click", ".podcast-select option", function() {
    let url = $(this).attr('value');
    window.location.href = url;
  });

  $(document).on("click", "#loadDisqus", function() {
    var d = document,
      s = d.createElement('script');
    s.src = 'https://playerselect.disqus.com/embed.js';

    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);

    $(this).remove();

  });

});
