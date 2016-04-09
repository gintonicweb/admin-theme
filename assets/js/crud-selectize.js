define(function(require) {

    var $ = require('jquery');
    var selectize = require('selectize');

    var $input = $('[data-selectize]');
    var $form = $input.closest('form');
    var searchField = $input.data('selectize');
    var url = $input.data('url');

    $input.selectize({
        valueField: 'id',
        maxItems: $input.data('max-items'),
        maxOptions: $input.data('max-options'),
    });
});

