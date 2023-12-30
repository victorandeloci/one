function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}

docReady(function () {
    // esports stats
    var eSportsForm = document.getElementById('one_esports_stats_form');
    if (eSportsForm) {
        eSportsForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // settings save fetch
            let formData = new FormData();
            formData.append('action', 'one_esports_stats_save');
            formData.append('one_esports_stats_panda_token', document.getElementById('one_esports_stats_panda_token').value);

            fetch(ajaxurl, {
                method: 'POST',
                body: formData
            })
                .then(function (response) {
                    return response.text();
                })
                .then((text) => {
                    if (text != null && text != '')
                        alert(text);
                });
        });
    }

    // xml news
    var newsForm = document.getElementById('one_news_form');
    if (newsForm) {
        newsForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // settings save fetch
            let formData = new FormData();
            formData.append('action', 'one_news_save');
            formData.append('one_news_feed_url', document.getElementById('one_news_feed_url').value);

            fetch(ajaxurl, {
                method: 'POST',
                body: formData
            })
                .then(function (response) {
                    return response.text();
                })
                .then((text) => {
                    if (text != null && text != '')
                        alert(text);
                });
        });
    }
});
