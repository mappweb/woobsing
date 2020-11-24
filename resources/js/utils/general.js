;(function (global, $) {
    "use strict";

    //variable global
    let WEB = global.WEB = global.WEB || {};

    //elementos globales
    WEB.ELEMENTS = {};
    WEB.ELEMENTS.body = $('body');

    //events
    WEB.ELEMENTS.body.on('datatable.refresh', refreshDatatable);
    WEB.ELEMENTS.body.on('submit', '#advancedSearch', advancedSearch);


    /**
     *
     */
    function refreshDatatable() {
        window.LaravelDataTables.dataTableBuilder._fnAjaxUpdate();
    }


    /**
     *
     * @param event
     */
    function advancedSearch(event) {

        event.preventDefault();

        WEB.ELEMENTS.body.trigger('datatable.refresh');
    }


})(window, jQuery);
