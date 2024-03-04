jQuery("img:not([title])").each(function () {
  if (jQuery(this).attr("alt") !== "")
    jQuery(this).attr("title", jQuery(this).attr("alt"));
});

jQuery("img:not([alt])").each(function () {
  if (jQuery(this).attr("title") !== "")
    jQuery(this).attr("alt", jQuery(this).attr("title"));
});
