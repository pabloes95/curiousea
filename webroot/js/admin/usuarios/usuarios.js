

  var $contextMenu = $("#contextMenu");

  $("#tabla").on("contextmenu", false, function(e) {
    $contextMenu.css({
      display: "block",
      left: e.pageX,
      top: e.pageY
    });
    return false;
  });

  $("body").on("click", false, function() {
     $contextMenu.hide();
  });
