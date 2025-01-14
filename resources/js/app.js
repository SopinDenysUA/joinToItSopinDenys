import './bootstrap';
import 'admin-lte/dist/js/adminlte.min.js';
import $ from 'jquery';
import 'datatables.net';
/*import 'datatables.net-dt/css/jquery.dataTables.css';*/

$(document).ready(function () {
    $('.datatable').DataTable();
});
