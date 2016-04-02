define(function(require) {

    var $ = require('jquery');
    var selectize = require('selectize');

    var $input = $('[data-selectize]');
    var $form = $input.closest('form');
    var searchField = $input.data('selectize');
    var url = $input.data('url');
    var maxItems = $input.data('max-items');

    $input.selectize({
        valueField: 'id',
        labelField: searchField,
        searchField: [searchField],
        maxItems: maxItems,
        maxOptions: 10,
        options: [],
        create: false,
        render: {
            option: function (item, escape) {
                return '<div>' + escape(item[searchField]) + '</div>';
            }
        },
        load: function (query, callback) {
            data = {};
            data[searchField] = query;
            $.ajax({
                url: url,
                dataType: 'json',
                data: data,
                error: function() {
                    console.log('error fetching ' + searchField + ' from ' + url);
                    callback();
                },
                success: function(res) {
                    var results = $.map(res.data, function (name, id) {
                        return {value: id, text: name};
                    })
                    console.log(results);
                    callback(results);
                }
            });
        },
    });

    $form.submit(function (){
        var users = $input.val().split(",");
        users.forEach(function(user){
            $('<input />')
                .attr('type', 'hidden')
                .attr('name', $input.attr('name') + '[]')
                .attr('value', user)
                .appendTo($form);
        });
        $input.remove();
    });

});

