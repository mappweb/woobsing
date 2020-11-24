try{

    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');

    window.toastr = require('toastr');
    window.$.fn.DataTable = require('./plugins/datatables/jquery.dataTables.min');

    require('../utils/general');
    require('../utils/ajax');


} catch (e) {
    //console.log(e);
}
