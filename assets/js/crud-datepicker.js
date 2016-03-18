define(function(require) {
    var $ = require('jquery');
    var datetimepicker = require('datetimepicker');

    $('[role=datetime-picker]').each(function() {
        var picker = $(this);
        var date = null;

        if (picker.data('timestamp') && picker.data('timezone-offset')) {
            var timezoneOffset = picker.data('timezone-offset');
            date = new Date(picker.data('timestamp') * 1000);

            picker.parents('form').on('submit', function () {
                var timezoneDiff = timezoneOffset + date.getTimezoneOffset();
                var currentDate = picker.data('DateTimePicker').date();
                var convertedDate = currentDate.add(timezoneDiff, 'minutes');
                picker.data('DateTimePicker').date(convertedDate);
            });
        }

        picker.datetimepicker({
            locale: $(this).data('locale'),
            format: $(this).data('format'),
            date: date ? date : picker.val()
        });
    });
})
