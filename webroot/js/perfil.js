$(".search").each(function() {
    var title = $(this).text();
    $(this).html("<input type=\"text\" placeholder=\" " + title + "\" />");
});
$('.button-collapse').sideNav({
    menuWidth: 300, // Default is 300
    edge: 'left', // Choose the horizontal origin
    closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
    draggable: true // Choose whether you can drag to open on touch screens
});

$('#modalContraseña').on('hidden.bs.modal', function(e) {
    $(".button-collapse").sideNav();
})
$('#modalUsuario').on('hide.bs.modal', function(e) {
    $(".button-collapse").sideNav();
})


$(document).ready(function() {
    $('select').material_select();
});
$('.datepicker').pickadate({
    min: new Date(1900, 1, 1),
    max: new Date(),
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100, // Creates a dropdown of 15 years to control year
    // The title label to use for the month nav buttons
    labelMonthNext: 'Mes siguiente',
    labelMonthPrev: 'Mes anterior',

    // The title label to use for the dropdown selectors
    labelMonthSelect: 'Selecciona un mes',
    labelYearSelect: 'Selecciona un año',

    // Months and weekdays
    monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],

    // Materialize modified
    weekdaysLetter: ['D', 'L', 'M', 'X', 'J', 'V', 'S'],

    // Today and clear
    today: 'Hoy',
    clear: 'Limpiar',
    close: 'Cerrar',
});

var tabla = $('#tabla').DataTable({
    select: true,
    searching: true,
    responsive: true,
    language: {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
tabla.columns().every(function() {
    var that = this;

    $('input', this.header()).on('keyup change', function() {
        if (that.search() !== this.value) {
            that
                .search(this.value)
                .draw();
        }
    });
    $("input", this.header()).click(function(event) {
        event.stopPropagation();
        // Do something
    });
});
var tablaArt = $('#tablaArticulos').DataTable({
    select: true,
    searching: true,
    responsive: true,
    language: {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
tablaArt.columns().every(function() {
    var that = this;

    $('input', this.header()).on('keyup change', function() {
        if (that.search() !== this.value) {
            that
                .search(this.value)
                .draw();
        }
    });
    $("input", this.header()).click(function(event) {
        event.stopPropagation();
        // Do something
    });
});
var tablaCom = $('#tablaComentarios').DataTable({
    select: true,
    searching: true,
    responsive: true,
    language: {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
tablaCom.columns().every(function() {
    var that = this;

    $('input', this.header()).on('keyup change', function() {
        if (that.search() !== this.value) {
            that
                .search(this.value)
                .draw();
        }
    });
    $("input", this.header()).click(function(event) {
        event.stopPropagation();
        // Do something
    });
});
window.setInterval(function() {
    $('.img-circle').css('width', $('.img-circle').width());
    $('.img-circle').css('height', $('.img-circle').width());
}, 1);
