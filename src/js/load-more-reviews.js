jQuery(function ($) {
    var page = 1;
    var canLoad = true;
    var ajaxUrl = MyAjaxReviews.ajaxurl;
    var reviewsContainer = $(".reviews__inner");
    var preloader = $(".ajax-preloader");
    var currentLanguage = document.documentElement.lang;
    function loadReviews(page, lang) {
        if (canLoad) {
            canLoad = false;
            preloader.show();

            var data = {
                action: "load_more_reviews",
                page: page,
                lang: lang
            };

            $.post(ajaxUrl, data, function (response) {
                preloader.hide();

                if (response !== "no_posts") {
                    if(reviewsContainer){
                        reviewsContainer.append(response);
                        canLoad = true;
                    }
                    
                    
                }
            });
        }
    }

    $(document).on("click", ".reviews .pagination span", function (e) {
        e.preventDefault();
        var page = $(this).data("page");
        var lang = $('html').attr('lang');
        reviewsContainer.empty();
        loadReviews(page, lang);
    });

    loadReviews(page, currentLanguage);
});
