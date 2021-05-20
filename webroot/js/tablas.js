$(".search").each(function() {
    var title = $(this).text();
    $(this).html("<input type=\"text\" placeholder=\" " + title + "\" />");
});

var tabla = $('#tabla').DataTable({
    select: true,
    searching: false,

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




// tabla.columns().every(function() {
//     var that = this;
//     $("input", this.header()).click(function(event) {
//         event.stopPropagation();
//         // Do something
//     });
//     $("input", this.header()).on("keyup change", function() {
//         if (that.search() !== this.value) {
//             that
//                 .search(this.value)
//                 .draw();
//         }
//     });
// });
