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
    var form = document.getElementById('one_esports_stats_form');
    if (form) {
        form.addEventListener('submit', function (e) {
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
});
