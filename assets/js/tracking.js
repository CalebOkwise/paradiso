(function () {
    var params = new URLSearchParams(window.location.search);
    var fields = ['utm_source','utm_medium','utm_campaign','utm_content','utm_term','fbclid'];
    fields.forEach(function (field) {
        var value = params.get(field);
        if (value) {
            var input = document.getElementById(field);
            if (input) {
                input.value = value;
            }
        }
    });
})();