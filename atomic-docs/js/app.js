var App = {
    name: 'Atomic Docs',
    version: '0.0.0',
    _debug: false,
    /**
     * @var _property holds the properties set via the setProp() method
     */
    _property: {},
    /**
     * Set a property. This will overwrite a property if it currently exists
     * @param key
     * @param val
     */
    setProp: function (key, val) {
        var self = this;
        if (App._debug && this._property.hasOwnProperty(key)) {
            console.warn('Overwriting property: ' + key + '; Old Value: ' + this.getProp(key) + '; New Value: ', val);
        }
        this._property[key] = val;
    },
    /**
     * Get a property
     *
     * @param key
     * @param def Return a default value if the key is not found
     * @returns {*}
     */
    getProp: function (key, def) {
        if (this._property.hasOwnProperty(key)) {
            return this._property[key];
        }

        return (typeof def !== 'undefined' ? def : null);
    },
    getRoute: function (route, params) {
        var theRoute = '';
        if (this.getProp('routes').hasOwnProperty(route)) {
            theRoute = this.getProp('routes')[route];

            if (typeof params !== 'undefined') {
                for (var key in params) {
                    theRoute = theRoute.replace('@' + key, params[key]);
                }
            }

            return theRoute;
        }

        return (typeof def !== 'undefined' ? def : null);
    },
    /**
     * Make an AJAX call
     *  Once the call is compvare, we run the parseAjaxResponse method
     *  to check for alerts, html, etc...
     *
     * @param ajaxParams
     * @param showFlashMessage
     * @returns {Promise}
     */
    ajax: function (ajaxParams, showFlashMessage) {
        return new Promise(function (resolve, reject) {
            // App.fn.ajaxWorking.show();

            var defaults = {
                type: 'get',
                url: ajax_url,
                data: {},
                dataType: 'json'
            };

            var params = $.extend(true, {}, defaults, ajaxParams);

            var ajaxRequest = $.ajax(params);

            ajaxRequest.then(function (response, statusText, xhrObj) {
                //App.call('ajaxAddDebug', [params, response]);
                var deparams = App.deparam(params.data);

                $('body').trigger('ajax_action/' + deparams.action, [response, deparams]);

                App.parseAjaxResponse(response, showFlashMessage);

                resolve({
                    status: response.status,
                    response: response,
                    params: deparams
                });
            }, function (xhrObj, textStatus, err) {
                App.parseAjaxResponse(xhrObj.responseJSON);
                reject(xhrObj.responseJSON, textStatus);
                //App.fn.ajaxWorking.hide();
            });

        });
    },
    /**
     * Parse an AJAX response
     *
     * @param response
     */
    parseAjaxResponse: function (response) {
        "use strict";

        if (typeof response !== 'object') {
            // if the response isn't a JSON object we can't do anything with it
            return;
        }

        if (!empty(response.flash)) {

            if (response.flash.varructor !== Array) {
                response.flash = [response.flash];
            }
            $.each(response.flash, function (status, message) {
                if (typeof this.message !== 'undefined' && this.message !== '') {
                    App.fn.flash.show(this);
                }
            });
        }
        if (!empty(response.html)) {
            //console.log(response, response.html.constructor);
            if (response.html.constructor !== Array) {
                response.html = [{
                    html: response.html,
                    target: response.target || '',
                    placement: response.placement || ''
                }];
            }
            //console.log(response.html);

            $.each(response.html, function (i, h) {
                var target = (typeof h.target !== 'undefined' && h.target !== '') ? h.target : App.getProp('ajaxTarget');
                var placement = (typeof h.placement !== 'undefined' && h.placement !== '') ? h.placement : App.getProp('ajaxPlacement');

                //console.log((typeof h.target !== 'undefined' && h.target !== ''), h, placement, target);


                if (placement === 'overwrite') {
                    $(target).html(h.html);
                } else if (placement === 'append') {
                    $(target).append(h.html);
                } else if (placement === 'replace') {
                    $(target).replaceWith(h.html);
                } else {
                    $(target).prepend(h.html);
                }

            });
        }
        if (!empty(response.redirect)) {
            if (response.redirect === 'reload') {
                window.location.reload();
            } else {
                window.location = response.redirect;
            }
        }
    },
    /**
     * Serialize a form
     *
     * @param formArray takes the serialized version of a form
     *          $('form').serialize()
     * @returns {{}}
     */
    objectifyForm: function (formArray) {
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    },
    /**
     * Takes a query string and turns it into an objects
     *      test=1&action=test --> {test: 1, action: 'test'}
     *
     * @param query
     * @returns {{}}
     */
    deparam: function (query) {
        if (typeof query === 'undefined' || typeof query === 'object') {
            return typeof query === 'object' ? query : {};
        }
        var pairs, i, keyValuePair, key, value, map = {};
        // remove leading question mark if its there
        if (query.slice(0, 1) === '?') {
            query = query.slice(1);
        }
        if (query !== '') {
            pairs = query.split('&');
            for (i = 0; i < pairs.length; i += 1) {
                keyValuePair = pairs[i].split('=');
                key = decodeURIComponent(keyValuePair[0]);
                value = (keyValuePair.length > 1) ? decodeURIComponent(keyValuePair[1].replace(/\+/g, '%20')) : undefined;
                map[key] = value;
            }
        }
        return map;
    },
    /**
     * Update a URL parameter
     * @param url
     * @param param
     * @param value
     */
    updateUrlParameter: function (url, param, value) {
        var regex = new RegExp('(' + param + '=)[^\&]+');
        return url.replace(regex, '$1' + value);
    },
    /**
     * Trigger the form action trigger
     *
     * This will trigger ajax_form_action/{form_action} and pass along:
     *      response
     *      paramse
     *      $form
     * @param action action name of the submitted form
     * @param response response of the AJAX call
     * @param params parameters that were sent in the AJAX call
     * @param $form the form object
     */
    triggerFormAction: function (action, response, params, $form) {
        var data = [response, params, $form];

        $('body').trigger('ajax_form_action/' + action, data);
    },
    triggerLinkAction: function (action, response, params, $form) {
        var data = [response, params, $form];
        $('body').trigger('ajax_link_action/' + action, data);
    }
};

function empty(subject) {
    return (typeof subject === 'undefined' || subject === '' || subject === null || subject === false);
}

