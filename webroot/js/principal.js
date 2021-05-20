var mosaico ="";
var indice = 1;
$('.button-collapse').sideNav({
    menuWidth: 300, // Default is 300
    edge: 'left', // Choose the horizontal origin
    closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
    draggable: true // Choose whether you can drag to open on touch screens
});
$(document).ready(function() {
    $('select').material_select();
});
$("#btnCargar").on("click", function(){
  indice++;
  $.ajax({

    type: "POST",
    url: "/articulos/pagina/"+indice+".json",
    success:function (response){


      curiosidadItem = $('<div>', { class: "col-lg-4 col-md-6 col-sm-6 col-xs-12 grid-item"});
      tarjetaCuriosidad  =  $('<div>', { class: "card blue-grey darken-1"});
      contenidoCuriosidad  =  $('<div>', { class: "card-content white-text"});
      tituloCuriosidad = $('<span>', { class: "card-title", text:response.curiosidad.titulo});
      curiosidad =   p =  $('<p>', {text:response.curiosidad.curiosidad});
      contenidoCuriosidad.append(tituloCuriosidad);
      contenidoCuriosidad.append(curiosidad);
      accionCuriosidad =  $('<div>', { class: "card-action"});
      fuenteCuriosidad =   $('<a>', { href: response.curiosidad.fuente, text:"Ir a la fuente"});
      accionCuriosidad.append(fuenteCuriosidad);
      tarjetaCuriosidad.append(contenidoCuriosidad);
      tarjetaCuriosidad.append(accionCuriosidad);
      curiosidadItem.append(tarjetaCuriosidad);

      mosaico.append( curiosidadItem );
      mosaico.masonry('appended', curiosidadItem );
      mosaico.masonry();





      for (i = 0; i < 8; i++) {
        articulo =  response.articulos[i];
        if(articulo != undefined){

          gridItem = $('<div>', { class: "col-lg-4 col-md-6 col-sm-6 col-xs-12 grid-item"});
          carta =  $('<div>', { class: "card"});
          cartaImagen =  $('<div>', { class: "card-image waves-effect waves-block waves-light"});
          imagen =  $('<img>', { class: "activator", src: articulo.imagen});
          cartaImagen.append(imagen);

          cartaContenido =  $('<div>', { class: "card-content"});
          cartaTitulo =  $('<span>', { class: "card-title activator grey-text text-darken-4 ojo", text:articulo.titulo});
          ojo =  $('<i>', { class: "material-icons right", text:"visibility"});
          cartaTitulo.append(ojo);
          p =  $('<p>');
          linkFuente =  $('<a>', { href: articulo.fuente, text:"Ir a la fuente"});
          p.append(linkFuente);
          cartaContenido.append(cartaTitulo);
          cartaContenido.append(p);

          cartaReveal =  $('<div>', { class: "card-reveal"});

            cartaTituloReveal =  $('<span>', { class: "card-title activator grey-text text-darken-4 ojo", text:articulo.titulo});
              cerrar =  $('<i>', { class: "material-icons right", text:"close"});
            cartaTituloReveal.append(cerrar);

            cuerpo = $('<p>',{text:articulo.cuerpo});


            linkArticuloWrapper =   $('<p>');
            linkArticulo = $('<a>', { href:"/articulos/ver/"+articulo.slug, text:"Ver articulo"});
            linkArticuloWrapper.append(linkArticulo);

            cartaReveal.append(cartaTituloReveal);
            cartaReveal.append(cuerpo);
            cartaReveal.append(linkArticuloWrapper);


          carta.append(cartaImagen);

          carta.append(cartaContenido);
          carta.append(cartaReveal);

          gridItem.append(carta);


            mosaico.append( gridItem );
            mosaico.masonry('appended', gridItem );
            mosaico.masonry();




        }else{
          $("#btnCargar").text("No quedan articulos pendientes");
          $("#btnCargar").prop('disabled', true);
        }
      }
    }
  });
});

$("#btnEnviar").on("click", function(){
  etiquetasV = $("#etiquetas").val();
  categoriaV = $("#select-categoria").val();

    $.ajax({

          type: "POST",
      url: "/articulos/busqueda.json",
      data: {
              "etiquetas":etiquetasV,
              "categoria" : categoriaV
      },
      success: function(response){
        if(response.respuesta){
          grid = $('<div>', { class: "row grid"});
          $(".lineaBoton").remove();
          for(i = 0; i< 50;i++){
            articulo = response.articulos[i];
            if(articulo != undefined){

              gridItem = $('<div>', { class: "col-lg-4 col-md-6 col-sm-6 col-xs-12 grid-item"});
              carta =  $('<div>', { class: "card"});
              cartaImagen =  $('<div>', { class: "card-image waves-effect waves-block waves-light"});
              imagen =  $('<img>', { class: "activator", src: articulo.imagen});
              cartaImagen.append(imagen);

              cartaContenido =  $('<div>', { class: "card-content"});
              cartaTitulo =  $('<span>', { class: "card-title activator grey-text text-darken-4 ojo", text:articulo.titulo});
              ojo =  $('<i>', { class: "material-icons right", text:"visibility"});
              cartaTitulo.append(ojo);
              p =  $('<p>');
              linkFuente =  $('<a>', { href: articulo.fuente, text:"Ir a la fuente"});
              p.append(linkFuente);
              cartaContenido.append(cartaTitulo);
              cartaContenido.append(p);

              cartaReveal =  $('<div>', { class: "card-reveal"});

                cartaTituloReveal =  $('<span>', { class: "card-title activator grey-text text-darken-4 ojo", text:articulo.titulo});
                  cerrar =  $('<i>', { class: "material-icons right", text:"close"});
                cartaTituloReveal.append(cerrar);

                cuerpo = $('<p>',{text:articulo.cuerpo});


                linkArticuloWrapper =   $('<p>');
                linkArticulo = $('<a>', { href:"/articulos/ver/"+articulo.slug, text:"Ver articulo"});
                linkArticuloWrapper.append(linkArticulo);

                cartaReveal.append(cartaTituloReveal);
                cartaReveal.append(cuerpo);
                cartaReveal.append(linkArticuloWrapper);


              carta.append(cartaImagen);

              carta.append(cartaContenido);
              carta.append(cartaReveal);

              gridItem.append(carta);

              grid.append(gridItem);



            }else{
              if(i==0){
                  gridItem = $('<div>', { class: "col-lg-4 col-md-6 col-sm-6 col-xs-12 grid-item"});
                  carta =  $('<div>', { class: "card"});
                  cartaImagen =  $('<div>', { class: "card-image waves-effect waves-block waves-light"});
                  imagen =  $('<img>', { class: "activator", src: "/img/articulos/notFound.jpg"});
                  cartaImagen.append(imagen);

                  cartaContenido =  $('<div>', { class: "card-conten"});
                  cartaTitulo =  $('<div>', { class: "card-title activator grey-text text-darken-4 ojo", text:"No se han encontrado Articulos"});
                  cartaContenido.append(cartaTitulo);
                  carta.append(cartaImagen);
                  carta.append(cartaContenido);
                  gridItem.append(carta);

                  grid.append(gridItem);



              }
            }
          }
            $(".grid").empty();
            $(".grid").replaceWith(grid);
              $(".grid").masonry();

        }else {
          gridItem = $('<div>', { class: "col-lg-4 col-md-6 col-sm-6 col-xs-12 grid-item"});
          carta =  $('<div>', { class: "card"});
          cartaImagen =  $('<div>', { class: "card-image waves-effect waves-block waves-light"});
          imagen =  $('<img>', { class: "activator", src: "/img/articulos/notFound.jpg"});
          cartaImagen.append(imagen);

          cartaContenido =  $('<div>', { class: "card-conten"});
          cartaTitulo =  $('<div>', { class: "card-title activator grey-text text-darken-4 ojo", text:"No se han encontrado Articulos"});
          cartaContenido.append(cartaTitulo);
          carta.append(cartaImagen);
          carta.append(cartaContenido);
          gridItem.append(carta);
          $(".grid").empty();
          $(".grid").append(gridItem);
          $(".grid").masonry();
        }
          $(".grid").masonry();
      }
    });

});

$(document).ready(function() {
    mosaico = $('.grid').masonry({

        itemSelector: '.grid-item',

    });

});
setInterval(function(){
  if(mosaico != "" && mosaico != false){
       $(".grid").masonry();
  }

}, 500);
