define(["require","jquery","selectize"],function(e){var t=e("jquery"),n=e("selectize"),r=t("[data-selectize]"),i=r.closest("form"),s=r.data("url");r.selectize({valueField:"id",maxItems:r.data("max-items"),maxOptions:r.data("max-options"),allowEmptyOptions:r.data("allow-empty-options")})});