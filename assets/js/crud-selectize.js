define(function(require) {

    var $ = require('jquery');
    var selectize = require('selectize');

    var $input = $('[data-selectize]');
    var $form = $input.closest('form');
    var url = $input.data('url');

    $input.selectize({
        valueField: 'id',
        maxItems: $input.data('max-items'),
        maxOptions: $input.data('max-options'),
        allowEmptyOptions: $input.data('allow-empty-options'),
    });
});

