import './bootstrap';
import 'admin-lte/dist/js/adminlte.min.js';
import $ from 'jquery';
import 'datatables.net';
import '@fortawesome/fontawesome-free/css/all.min.css';
import '@fortawesome/fontawesome-free/js/all.min.js';

$(document).ready(function () {
    $('.datatable').DataTable();
});
