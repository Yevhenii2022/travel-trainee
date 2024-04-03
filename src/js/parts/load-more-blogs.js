jQuery(function ($) {
    var page = 1;
    var canLoad = true;
    var ajaxUrl = MyAjaxBlogs.ajaxurl;
    var blogsContainer = $("#blog__inner");
    var preloader = $(".ajax-preloader");

    function loadBlogs(category, option, page) {

        if (canLoad) {
            canLoad = false;
            preloader.show();

            var data = {
                action: "load_more_blogs",
                page: page,
                category: category,
                option: option
            };

            $.post(ajaxUrl, data, function (response) {
                preloader.hide();

                if (response !== "no_posts") {
                    blogsContainer.append(response);
                    canLoad = true;
                }
            });
        }
    }



    $(document).on("click", "#category-filter li", function () {
        $("#category-filter li").removeClass("active");
        $(this).addClass("active");
        var category = $(this).data("category");
        var option = $("#blogs__select").val();
        page = 1;
        blogsContainer.empty();
        loadBlogs(category, option);
    });

    $(document).on("change", "#blogs__select", function () {
        if (window.innerWidth > 541) {
            var category = $("#category-filter li.active").data("category");
        } else {
            var category = $("#archive-blogs__select-category").val();
        }

        var option = $(this).val();
        page = 1;
        blogsContainer.empty();
        if (option === "popular") {
            loadBlogs(category, 'post_popularity');
        } else {
            loadBlogs(category, option);
        }
    });
    $(document).on("change", "#archive-blogs__select-category", function () {
        var option = $("#blogs__select").val();
        var category = $(this).val();
        page = 1;
        blogsContainer.empty();
        loadBlogs(category, option);
    });
    $(document).on("click", ".blog .pagination span", function (e) {
        e.preventDefault();
        var page = $(this).data("page");
        var category = $("#category-filter li.active").data("category");
        var option = $("#blogs__select").val();
        blogsContainer.empty();
        loadBlogs(category, option, page);
    });

    loadBlogs("all");
});