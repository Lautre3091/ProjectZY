$(function() {
    $( "#tabsUi" ).tabs({
      beforeLoad: function( event, ui ) {
        ui.jqXHR.error(function() {
          ui.panel.html("Probleme lors du chargement de la page" );
        });
      }
    });
  });