/**
 * Form auto-submit
 */

$('body')
    .on('submit', 'form.ajax-form', function (e) {
        e.preventDefault();

        var $self = $(this);
        var formData = $(this).serialize();

        App.ajax({
            type: ($self.attr('method') ? $self.attr('method') : 'GET'),
            url: ($self.attr('action') && $self.attr('action') !== '#' ? $self.attr('action') : ajax_url),
            data: formData
        }).then(function (data) {
            App.triggerFormAction(data.params.action, data.response, data.params, $self);
        }, function (err, message) {
            console.log(err, message);
        });
    })
    .on('click', 'a.ajax-link', function (e) {
        e.preventDefault();
        var $self = $(this);

        var formData = {
            action: $self.attr('data-action'),
            id: $self.attr('data-id')
        };

        var nonce = $self.data('nonce');
        if (nonce) {
            formData['_nonce'] = nonce;
        }

        if ($self.data('target') === 'panel' || $self.data('show-load')) {
            $('body').addClass('atomic-editPane-open');
            $('.atomic-editPanel__form').empty();
        }

        App.ajax({
            type: ($self.attr('data-method') ? $self.attr('data-method') : 'GET'),
            url: $self.attr('href'),
            data: formData
        }).then(function (data) {
            App.triggerLinkAction(data.params.action, data.response, data.params, $self);

            if (data.response.html === false) {
                return false;
            }

            if ($self.attr('data-target') === 'panel') {
                $('.atomic-editPanel__form').html(data.response.html);

                $('.atomic-input').focus();

                $(".atomic-colorPicker").spectrum({
                    allowEmpty: true,
                    preferredFormat: "hex",
                    showInput: true
                });

            }
            else if ($self.data('show-load')) {
                // $('#me-popup').popup('hide');
            }
            if ($self.attr('data-target') === 'slideout') {
                App.fn.slideout.setContent(data.response.html);
            }
        }, function (err, message) {
            console.log(err, message);
        });

        return false;
    })
;

