define(function(require) {

    var $ = require('jquery');
    var selectize = require('selectize');

    var $input = $('[data-selectize]');
    var $form = $input.closest('form');
    var searchField = $input.data('selectize');
    var url = $input.data('url');

    $input.selectize({
        valueField: searchField,
        labelField: searchField,
        searchField: [searchField],
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
                    callback(res.data);
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

