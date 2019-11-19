function delay(callback, ms) {
    var timer = 0;
    return function() {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}
function searchProduct(){
    let url = window.location.href + 'search';
    let q = $('#search').val();
    let searchContainer = $('#search-container');
    if(q) {
        $.get(url, { q: q})
    .done(function (data) {
            searchContainer.html(data);
        })
            .fail(function () {
                searchContainer.html('');
            });
    } else {
        searchContainer.html('');
    }
}
function showSearch() {
    $('#body-container').addClass('d-none');
    $('#search-container').removeClass('d-none');
    $('#bottom-navbar').addClass('d-none');
    $('#brand').find('i').removeClass('fa-heart-o').addClass('fa-arrow-left');
}
function hideSearch() {
    $('#search-container').addClass('d-none').html('');
    $('#body-container').removeClass('d-none');
    $('#bottom-navbar').removeClass('d-none');
    $('#search').val('');
    $(this).find('i').removeClass('fa-arrow-left').addClass('fa-heart-o');
}

$(document).on('focus', '#search', showSearch);
$(document).on('keyup', '#search', delay(searchProduct, 500));
$(document).on('click', '#brand', hideSearch);