$(function(){
    $('nav.mobile').click(function(){ // dblclick
        var listaMenu = $('nav.mobile ul');
        var icone = $('.botao-menu-mobile').find('i');
        
        /** 
        * ABERTURA COM fadeIn()
        * if(listaMenu.is(':hidden') == true)
                listaMenu.fadeIn();
          else
                listaMenu.fadeOut();
        */

        /**
        * ABERTURA E FECHAMENTO SEM EFEITO
        * if(listaMenu.is(':hidden') == true) {
                listaMenu.show();
          else
                listaMenu.hide();
        */

        if(listaMenu.is(':hidden') == true) {
            icone.removeClass('fa-bars');
            icone.addClass('fa-xmark');
            listaMenu.slideToggle();
        } else {
            icone.removeClass('fa-xmark');
            icone.addClass('fa-bars');
            listaMenu.slideToggle();
        }
    })

    // Sistema de Rolagem

    if($('target').length > 0) {
        // Signifca que o elemento existe, onde o retorno de array > 0
        var elemento = '.'+$('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html, body').animate({'scrollTop': divScroll}, 2000);
    }
})