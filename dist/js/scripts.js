    (function($) {
    "use strict";

   // Adicionar estado ativo aos links de navegação da barra lateral
    var path = window.location.href; // porque a propriedade 'href' do elemento DOM é o caminho absoluto
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Alternar a navegação lateral
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);

