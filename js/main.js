// habilita o uso do $
jQuery(function($){

  var browser = (function() {
  var test = function(regexp) {return regexp.test(window.navigator.userAgent)}
  switch (true) {
      case test(/edg/i): return "Microsoft Edge";
      case test(/trident/i): return "Microsoft Internet Explorer";
      case test(/firefox|fxios/i): return "Mozilla Firefox";
      case test(/opr\//i): return "Opera";
      case test(/ucbrowser/i): return "UC Browser";
      case test(/samsungbrowser/i): return "Samsung Browser";
      case test(/chrome|chromium|crios/i): return "Google Chrome";
      case test(/safari/i): return "Apple Safari";
      default: return "Other";
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

    var default_load_more = function(){

      var $defaultC = $("#defaultContainer");
      $page++;

      $.ajax({
          type: "GET",
          data: {action: 'default_load_more', page: $page},
          dataType: "html",
          url: $ajaxPath,
          beforeSend: function() {
              $defaultC.append('<div id="loader" class="loader-container small"><div class="loader"></div></div>');
          },
          success: function(data) {
              // transforma a data em objeto
              var $data = $(data);
              // verifica se existe dados
              if($data.length) {
                  // oculta o conteudo
                  $data.hide();
                  // insere no conteudo a data
                  $defaultC.append($data);
                  // da o fadeIn no conteudo e oculta a div #temp_load
                  $data.fadeIn(500, function(){
                      $('#loader').remove();
                      loading = false;
                  })
              } else {
                  $('#loader').remove();
              }
          }
      });
    }

    var category_load_more = function($category){

      var $defaultC = $("#defaultContainer");
      $page++;

      $.ajax({
          type: "GET",
          data: {action: 'category_load_more', page: $page, category: $category},
          dataType: "html",
          url: $ajaxPath,
          beforeSend: function() {
              $defaultC.append('<div id="loader" class="loader-container small"><div class="loader"></div></div>');
          },
          success: function(data) {
              // transforma a data em objeto
              var $data = $(data);
              // verifica se existe dados
              if($data.length) {
                  // oculta o conteudo
                  $data.hide();
                  // insere no conteudo a data
                  $defaultC.append($data);
                  // da o fadeIn no conteudo e oculta a div #temp_load
                  $data.fadeIn(500, function(){
                      $('#loader').remove();
                      loading = false;
                  })
              } else {
                  $('#loader').remove();
              }
          }
      });
    }

    var podcast_load_more = function($category, $id){

      var $defaultC = $($id);
      $page++;

      $.ajax({
          type: "GET",
          data: {action: 'podcast_load_more', page: $page, category: $category},
          dataType: "html",
          url: $ajaxPath,
          beforeSend: function() {
              $defaultC.append('<div id="loader" class="loader-container small"><div class="loader"></div></div>');
          },
          success: function(data) {
              // transforma a data em objeto
              var $data = $(data);
              // verifica se existe dados
              if($data.length) {
                  // oculta o conteudo
                  $data.hide();
                  // insere no conteudo a data
                  $defaultC.append($data);
                  // da o fadeIn no conteudo e oculta a div #temp_load
                  $data.fadeIn(500, function(){
                      $('#loader').remove();
                      loading = false;
                  })
              } else {
                  $('#loader').remove();
              }
          }
      });
    }


    var search_load_more = function($s){

      var $defaultC = $("#defaultContainer");
      $page++;

      $.ajax({
          type: "GET",
          data: {action: 'search_load_more', page: $page, s: $s},
          dataType: "html",
          url: $ajaxPath,
          beforeSend: function() {
              $defaultC.append('<div id="loader" class="loader-container small"><div class="loader"></div></div>');
          },
          success: function(data) {
              // transforma a data em objeto
              var $data = $(data);
              // verifica se existe dados
              if($data.length) {
                  // oculta o conteudo
                  $data.hide();
                  // insere no conteudo a data
                  $defaultC.append($data);
                  // da o fadeIn no conteudo e oculta a div #temp_load
                  $data.fadeIn(500, function(){
                      $('#loader').remove();
                      loading = false;
                  })
              } else {
                  $('#loader').remove();
              }
          }
      });
    }

    var load = function(url){
      $.ajax({
          type: "GET",
          data: {action: 'loadPost', url: url},
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
              if($data.length) {
                  // oculta o conteudo
                  $data.hide();
                  //limpa o container
                  $content.empty();
                  // insere no conteudo a data
                  $content.append($data);
                  // da o fadeIn no conteudo e oculta a div #temp_load
                  $data.fadeIn(500, function(){
                      $('#loader').remove();
                      loading = false;
                  })
              } else {
                  $('#loader').remove();
              }
          }
      });

    }

    var load_home = function(){
      $.ajax({
          type: "GET",
          data: {action: 'load_home'},
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
              if($data.length) {
                  // oculta o conteudo
                  $data.hide();
                  //limpa o container
                  $content.empty();
                  // insere no conteudo a data
                  $content.append($data);
                  // da o fadeIn no conteudo e oculta a div #temp_load
                  $data.fadeIn(500, function(){
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

    var load_search = function(s){

      $page = 1;

      $.ajax({
          type: "GET",
          data: {action: 'load_search', search: s},
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
              if($data.length) {
                  // oculta o conteudo
                  $data.hide();
                  //limpa o container
                  $content.empty();
                  // insere no conteudo a data
                  $content.append($data);
                  // da o fadeIn no conteudo e oculta a div #temp_load
                  $data.fadeIn(500, function(){
                      $('#loader').remove();
                      loading = false;
                  })
              } else {
                  $('#loader').remove();
              }
          }
      });
    }

    var load_tag = function(tag){
      $.ajax({
          type: "GET",
          data: {action: 'load_tag', tag: tag},
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
              if($data.length) {
                  // oculta o conteudo
                  $data.hide();
                  //limpa o container
                  $content.empty();
                  // insere no conteudo a data
                  $content.append($data);
                  // da o fadeIn no conteudo e oculta a div #temp_load
                  $data.fadeIn(500, function(){
                      $('#loader').remove();
                      loading = false;
                  })
              } else {
                  $('#loader').remove();
              }
          }
      });
    }

    var load_category = function(slug){

      $page = 1;

      $.ajax({
          type: "GET",
          data: {action: 'load_category', slug: slug},
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
              if($data.length) {
                  // oculta o conteudo
                  $data.hide();
                  //limpa o container
                  $content.empty();
                  // insere no conteudo a data
                  $content.append($data);
                  // da o fadeIn no conteudo e oculta a div #temp_load
                  $data.fadeIn(500, function(){
                      $('#loader').remove();
                      loading = false;
                  })
              } else {
                  $('#loader').remove();
              }
          }
      });
    }

	var load_esport = function($slug){

      var $defaultC = $("#eSportsContainer");
      $page++;

      $.ajax({
          type: "GET",
          data: {action: 'load_esport', EsSlug: $slug},
          dataType: "html",
          url: $ajaxPath,
          beforeSend: function() {
              $defaultC.html('<div id="loader" class="loader-container small"><div class="loader"></div></div>');
          },
          success: function(data) {
              // transforma a data em objeto
              var $data = $(data);
              // verifica se existe dados
              if($data.length) {
                  // oculta o conteudo
                  $data.hide();
                  // insere no conteudo a data
                  $defaultC.html($data);
                  // da o fadeIn no conteudo e oculta a div #temp_load
                  $data.fadeIn(500, function(){
                      $('#loader').remove();
                      loading = false;
                  })
              } else {
                  $('#loader').remove();
              }
          }
      });
    }

	var overlayToggle = function(){
      $(".back-overlay").toggleClass("back-overlay-show");
    }

    var headerToggle = function(){
      $("#navMenu").toggleClass("menu-show");
    }

    $(document).on("click", ".back-overlay", function(){
      overlayToggle();
      headerToggle();
    });

    $(document).on("click", ".post", function(){
      var url = $(this).attr('href');
      var title = $(this).attr('alt');

      //request
      load(url);

      window.history.pushState("obj", title, url);
      $(window).scrollTop(0);

    });

    $(document).on("click", "#headerBtn", function(){
      headerToggle();
      overlayToggle();
    });

	$(document).on("click", ".game-selector .game", function(){
		console.log("click");
		$(".game-selector .game").removeClass("active");
		load_esport($(this).attr("slug"));
		$(this).addClass("active");
	});

    //submit do search form
    $('#searchform').submit(function (evt) {
      evt.preventDefault();
      var $s = $("#s").val();
      load_search($s);
      window.history.pushState("obj", "Busca por " + $s, "/?s=" + $s);
      $(window).scrollTop(0);
    });

    //todo clique em link
    $(document).on("click", "a", function(){
      if($(this).attr("id") != "podDownload" && $(this).attr("id") != "playerPodDownload" && $(this).attr("id") != "socialLink" && $('.post-container').find($(this)).length == 0 && $('#sbi_images').find($(this)).length == 0)
        return false;

      if($(this).attr("id") == "tagLink")
        return false;
    });

    $(document).on("click", "#home", function(){
      load_home();
      window.history.pushState("obj", $(this).attr('alt'), $(this).attr('href'));
      $(window).scrollTop(0);
    });

    $(document).on("click", ".category-item", function(){
      load_category($(this).attr('slug'));
      window.history.pushState("obj", $(this).attr('alt'), $(this).attr('href'));
      $(window).scrollTop(0);
    });

    $(document).on("click", "#tagLink", function(){
      load_tag($(this).attr('tag'));
      window.history.pushState("obj", $(this).attr('tag'), $(this).attr('href'));
      $(window).scrollTop(0);
    });

    $(document).on("click", ".menu-link", function(){
      $(window).scrollTop(0);
    });

    $(document).on("click", "#defaultLoadMore", function(){
      default_load_more();
    });

    $(document).on("click", "#searchLoadMore", function(){
      search_load_more($(this).attr("s"));
    });

    $(document).on("click", "#categoryLoadMore", function(){
      category_load_more(window.location.pathname);
    });

    $(document).on("click", "#podcastsLoadMore", function(){
      podcast_load_more($(this).attr("slug"), $(this).attr("container"));
    });

    //modifica conteúdo do meta
    $("#metaInformation").ready(function(){
	  $("head meta").remove();
	  $("head title").remove();
      $("head").prepend($("#metaInformation").contents());
    });

    $(document).ajaxComplete(function() {
      $("head").prepend($("#metaInformation").contents());

      $(".post-container").find("a").attr("target", "_blank");
      $(".post-container").find("a").attr("rel", "noopener noreferrer");

    });

	$(document).on("click", "#homeScrollBtn", function(){
		$(document).scrollTop(window.innerHeight);
	});

    //mudança de página no histórico -----------------------------------------------------------------------------
    window.onpopstate = function(event) {
      $(window).scrollTop(0);

      if(window.location.href == homeUrl){
        load_home();
      }
      else if((window.location.href).includes("?s=")){
        load_search((window.location.href).split("?s=")[1]);
      }
      else if((window.location.href).includes("category")){
        load_category(window.location.pathname);
      }
      else if((window.location.href).includes("tag")){
        //separa a string em um array pelo separador indicado na func split()
        load_tag(window.location.href.split("tag/")[1]);
      }
      else
        load(window.location.href);
      $(window).scrollTop(0);
    }

    $(document).on("click", "#podPlay", function(){

      if(browser == 'firefox') {
        var player = document.getElementById('player');
        var playerSource = document.getElementById('playerSource');
        var playerDownload = document.getElementById('playerPodDownload');

        //carrega no source e audio
        playerSource.src = $(this).attr("source");
        playerDownload.href = $(this).attr("source");
        player.load();

        togglePlay();
      } else {
        let win = window.open($(this).attr("source"), '_blank');
        win.focus();
      }
    });

	$(document).on("click", ".podcast-select option", function(){
		var url = $(this).attr('value');
		  var title = $(this).attr('title');

		  //request
		  load(url);

		  window.history.pushState("obj", title, url);
		  $(window).scrollTop(0);
	});

	$(document).on("click", "#loadDisqus", function() {
		var d = document, s = d.createElement('script');
		s.src = 'https://playerselect.disqus.com/embed.js';

        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);

		$(this).remove();

    });

    $("body").keyup(function (k)
    {
      if (k.keyCode == 32)
      {
        togglePlay()
      }
      else
      {
        if (k.keyCode == 39)
        {
          c.currentTime += 15
        }
        else
        {
          if (k.keyCode == 37)
          {
            c.currentTime -= 15
          }
        }
      }
    });

});

// player


function initVolumeBar()
{
	var a = document.getElementById("player");
	var b = a.volume;
	var d = document.getElementById("vol-obj");
	d.value = b;
	d.addEventListener("click", c);

	function c(f)
	{
		var e = f.offsetX / this.offsetWidth;
		a.volume = e;
		d.value = e
	}
}

function initProgressBar()
{
	var f = document.getElementById("player");
	var b = f.duration;
	var c = f.currentTime;
	var d = calculateTotalValue(b - c);
	document.getElementById("end-time").innerHTML = d;
	var a = calculateCurrentValue(c);
	document.getElementById("start-time").innerHTML = a;
	var e = document.getElementById("seek-obj");
	e.value = f.currentTime / f.duration;
	e.addEventListener("click", g);
	if (f.currentTime == f.duration)
	{
		document.getElementById("play-btn-icon").classlist.toggle("fa-play");
		document.getElementById("play-btn-icon").classlist.toggle("fa-pause")
	}

	function g(i)
	{
		var h = i.offsetX / this.offsetWidth;
		f.currentTime = h * f.duration;
		e.value = h / 100
	}
}

function initPlayers(a)
{
	for (var b = 0; b < a; b++)
	{
		(function ()
		{
			var d = document.getElementById("player-container"),
				c = document.getElementById("player"),
				f = false,
				h = document.getElementById("play-btn");
			var g = document.getElementById("plus-btn"),
				j = document.getElementById("less-btn");
			var i = document.getElementById("volume-btn");
			var e = c.volume;
			if (h != null)
			{
				h.addEventListener("click", function ()
				{
					togglePlay()
				})
			}
			if (g != null)
			{
				g.addEventListener("click", function ()
				{
					c.currentTime += 15
				})
			}
			if (j != null)
			{
				j.addEventListener("click", function ()
				{
					c.currentTime -= 15
				})
			}
			if (i != null)
			{
				i.addEventListener("click", function ()
				{
					if (c.volume != 0)
					{
						e = c.volume;
						c.volume = 0;
						i.classList.toggle("fa-volume-up");
						i.classList.toggle("fa-volume-mute")
					}
					else
					{
						c.volume = e;
						i.classList.toggle("fa-volume-up");
						i.classList.toggle("fa-volume-mute")
					}
				})
			}
		}())
	}
}

function togglePlay()
{
	if (player.paused === false)
	{
		player.pause();
		isPlaying = false;
		if (document.getElementById("play-btn-icon").classList.contains("fa-pause"))
		{
			document.getElementById("play-btn-icon").classList.remove("fa-pause");
			document.getElementById("play-btn-icon").classList.add("fa-play")
		}
	}
	else
	{
		player.play();
		document.getElementById("play-btn-icon").classList.remove("fa-play");
		document.getElementById("play-btn-icon").classList.add("fa-pause");
		isPlaying = true
	}
	var a = document.getElementById("audio-player");
	var b = document.getElementsByTagName("footer")[0];
	if (!a.classList.contains("player-active"))
	{
		a.classList.add("player-active");
		b.classList.add("onPlay")
	}
}

function calculateTotalValue(a)
{
	var f = Math.floor(a / 60);
	var c = a - f * 60;
	var e = "";
	if (c < 10)
	{
		e = "0" + c.toString()
	}
	else
	{
		e = c.toString()
	}
	var d = e.substr(0, 2);
	var b = f + ":" + d;
	return b
}

function calculateCurrentValue(b)
{
	var e = parseInt(b / 3600) % 24,
		a = parseInt(b / 60) % 60,
		d = b % 60,
		f = d.toFixed(),
		c = (a < 10 ? "0" + a : a) + ":" + (f < 10 ? "0" + f : f);
	return c
}
initPlayers(jQuery("#player-container").length);
window.addEventListener("keydown", function (a)
{
	if (a.keyCode == 32 && a.target == document.body)
	{
		a.preventDefault()
	}

});
