$(document).ready(function () {
    let darkMode = true;
    let img = $('.header-logo');

    $('#btn-da').on('click', function () {
        if (darkMode) {
            // STRUCTURE
            img.attr('src', 'vue/assets/images/hudsonskyhawks.png'); // Changer l'image
            $('#header_blue').css('background-color', 'var(--secondary-color)');
            $('#header_blue').css('border-bottom', '3px solid var(--orange-color)');
            $('#header_blue .header-navi-lien').css('color', 'var(--white-color)');
            $('.footer').css('background', 'none');
            $('.footer').css('background-color', 'var(--secondary-color)');

            // PAGE INDEX
            $('.slogan').css('background-color', 'var(--lightlightgray-color)');
            $('.enseignement').css('background-color', 'var(--lightlightgray-color)');
            $('.enseignement h2').css('color', 'var(--primary-color)');
            $('.enseignement h3').css('color', 'var(--primary-color)');
            $('.slogan-text').css('color', 'var(--orange-color)');
            $('.news').css('background-color', 'var(--secondary-color)');
            $('.news h3').css('color', '#1C2134');
            $('.doyen').css('background-color', 'var(--lightlightgray-color)');
            $('.doyen-pic').css('border', '4px solid #0F4D6B');
            $('.doyen-text').css('color', '#0F4D6B');
            $('.doyen-signature').css('color', '#0F4D6B');
            $('.slide.slide2').css('background-color', 'var(--white-color)');
            $('.articles-text').css('color', 'var(--primary-color)');
            $('#doc, #art, #book, #science').css('color', 'var(--orange-color)');
            $('.element').css('border', '4px solid var(--orange-color)');

            // PAGE PROGRAMMES
            $('#section_prog').css('background-color', 'var(--secondary-color)');
            $('.h2').css('color', 'var(--primary-color)');
            $('#section_prog h2').css('color', 'var(--white-color)');
            $('.prog').css('background-color', 'var(--white-color)');
            $('.prog').css('border', '2px solid var(--orange-color)');
            $('.prog h3').css('color', 'var(--primary-color)');
            $('.prog p').css('color', 'var(--primary-color)');
            $('.ensavoirplus').css('border', '2px solid var(--primary-color)');
            $('.ensavoirplus').css('color', 'var(--primary-color)');

            $('#candidatures').css('background-color', 'var(--lightlightgray-color)');
            $('.links').css('color', 'var(--orange-color)');
            $('.h4').css('color', 'var(--orange-color)');
            $('.text_spacing').css('color', 'var(--primary-color)');
            $('.text_cursus p').css('color', 'var(--primary-color)');
            $('.underline').css('border-bottom', '4px solid var(--orange-color)');
            $('.cursus_contact').css('box-shadow', '10px 10px 0px var(--orange-color)');
            $('.cursus_contact').css('background-color', 'var(--lightgray-color)');
            $('.cursus_contact li').css('color', 'var(--primary-color)');
            $('#num_licence').css('color', 'var(--primary-color)');
            $('#accroche_sign').css('color', '#0F4D6B');

            $('#formation_alt_cont').css('background-color', 'var(--secondary-color)');
            $('#formation_alt_cont h2').css('color', 'var(--white-color)');

            $('#erasmus').css('background-color', 'var(--lightlightgray-color)');
            $('#anim_erasmus::after').css('background', 'var(--orange-color)');
            $('#erasmus p').css('color', 'var(--primary-color)');
            $('#pays').css('color', 'var(--orange-color)');
            $('#anim_erasmus').css('color', 'var(--orange-color)');

            $('.button_inscription').css('background-color', 'var(--orange-color)');
            $('.button_inscription').css('box-shadow', 'none');

            // PAGE CAMPUS
            $('.presentation').css('background-color', 'var(--lightlightgray-color)');
            $('.bibliothèque').css('background-color', 'var(--lightlightgray-color)');
            $('.carousel-up').css('background-color', 'var(--secondary-color)');
            $('.biblio-text p').css('color', 'var(--primary-color)');
            $('.left-title').css('color', 'var(--primary-color)');
            $('.biblio-pics img').css('box-shadow', '-50px -40px 0px -10px var(--primary-color)');

            // PAGE UNIVERSITE
            $('#story_univ').css('background-color', 'var(--secondary-color)');
            $('#story_univ h2').css('color', 'var(--white-color)');
            $('#text_story').css('background-color', 'var(--secondary-color)');
            $('#rubrique_stat').css('background-color', 'var(--orange-color)');
            $('.stat p').css('color', 'var(--white-color)');
            $('.fa-star').css('color', 'var(--orange-color)');
            $('.stat i').css('color', 'var(--white-color)');
            $('#organigramme').css('background-color', 'var(--lightgray-color)');
            $('#organigramme h2, .level-1 h1, .level-1 p').css('color', 'var(--primary-color)');
            $('.equipe_fac').css('border', '4px solid var(--primary-color)');
            $('#section_emplois').css('background-color', 'var(--lightgray-color)');
            $('#section_emplois h2').css('color', 'var(--orange-color)');
            $('.card').css('background-color', 'var(--secondary-color)');
            $('.card').css('border', '1px solid var(--orange-color)');

            // PAGE PANIER
            $('.panier').css('background-color', 'var(--lightlightgray-color)');
            $('.panier h2').css('color', 'var(--orange-color)');
            $('.total-panier').css('color', 'var(--orange-color)');

            // PAGE BOUTIQUE
            $('.highlight-shop').css('background-color', 'var(--lightgray-color)');
            $('.highlight-shop h2').css('color', 'var(--orange-color)');
            $('.highlight-txt, .button-s').css('background-color', 'var(--secondary-color)');

            //PAGE PRODUCTS
            $('.search-results').css('background-color', 'var(--lightlightgray-color)');
            $('.search-results h2').css('color', 'var(--orange-color)');
            $('.btn').css('background-color', 'var(--orange-color)');

            //PAGE PRODUIT
            $('.product-container').css('background-color', 'var(--lightlightgray-color)');
            $('.product-container h1').css('color', 'var(--orange-color)');
            $('.product-container p, .product-container h3').css('color', 'var(--primary-color)');
            $('.product-container strong').css('color', 'var(--orange-color)');

            // PAGE ARTICLES
            $('.article').css('background-color', 'var(--lightlightgray-color)');
            $('.article-title').css('color', 'var(--white-color)');
            $('.article strong').css('color', 'var(--white-color)');
            $('.article-description').css('color', 'var(--orange-color)');
            $('.article-container').css('background-color', 'var(--secondary-color)');
            $('.btn-back').css('background-color', 'var(--orange-color)');

            // Mettre à jour l'état pour indiquer que le mode dark est activé
            darkMode = false;
        } else {
            // STRUCTURE
            img.attr('src', 'vue/assets/images/hudsonlogo.png');
            $('#header_blue').css('background-color', '');
            $('#header_blue').css('border-bottom', '');
            $('#header_blue .header-navi-lien').css('color', '');
            $('.footer').css('background', '');
            $('.footer').css('background-color', '');

            // PAGE INDEX
            $('.slogan').css('background-color', '');
            $('.enseignement').css('background-color', '');
            $('.enseignement h2').css('color', '');
            $('.enseignement h3').css('color', '');
            $('.slogan-text').css('color', '');
            $('.news').css('background-color', '');
            $('.news h3').css('color', '');
            $('.doyen').css('background-color', '');
            $('.doyen-pic').css('border', '');
            $('.doyen-text').css('color', '');
            $('.doyen-signature').css('color', '');
            $('.slide.slide2').css('background-color', '');
            $('.articles-text').css('color', '');
            $('#doc, #art, #book, #science').css('color', '');
            $('.element').css('border', '');

            // PAGE CAMPUS
            $('.presentation').css('background-color', '');
            $('.bibliothèque').css('background-color', '');
            $('.carousel-up').css('background-color', '');
            $('.carousel-up h2').css('color', '');
            $('.biblio-text p').css('color', '');
            $('.left-title').css('color', '');
            $('.biblio-pics img').css('box-shadow', '');

            // PAGE PROGRAMMES
            $('#section_prog').css('background-color', '');
            $('.h2').css('color', '');
            $('#section_prog h2').css('color', '');
            $('.prog').css('background-color', '');
            $('.prog').css('border', '');
            $('.prog h3').css('color', '');
            $('.prog p').css('color', '');
            $('.ensavoirplus').css('border', '');
            $('.ensavoirplus').css('color', '');

            $('#candidatures').css('background-color', '');
            $('.links').css('color', '');
            $('.h4').css('color', '');
            $('.text_spacing').css('color', '');
            $('.text_cursus p').css('color', '');
            $('.underline').css('border-bottom', '');
            $('.cursus_contact').css('box-shadow', '');
            $('.cursus_contact').css('background-color', '');
            $('.cursus_contact li').css('color', '');
            $('#num_licence').css('color', '');
            $('#accroche_sign').css('color', '');

            $('#formation_alt_cont').css('background-color', '');
            $('#formation_alt_cont h2').css('color', '');

            $('#erasmus').css('background-color', '');
            $('#anim_erasmus::after').css('background', '');
            $('#erasmus p').css('color', '');
            $('#pays').css('color', '');
            $('#anim_erasmus').css('color', '');

            $('.button_inscription').css('background-color', '');
            $('.button_inscription').css('box-shadow', '');

            // PAGE UNIVERSITE
            $('#story_univ').css('background-color', '');
            $('#story_univ h2').css('color', '');
            $('#text_story').css('background-color', '');
            $('#rubrique_stat').css('background-color', '');
            $('.stat p').css('color', '');
            $('.fa-star').css('color', '');
            $('.stat i').css('color', '');
            $('#organigramme').css('background-color', '');
            $('#organigramme h2, .level-1 h1, .level-1 p').css('color', '');
            $('.equipe_fac').css('border', '');
            $('#section_emplois').css('background-color', '');
            $('#section_emplois h2').css('color', '');
            $('.card').css('background-color', '');
            $('.card').css('border', '');

            // PAGE PANIER
            $('.panier').css('background-color', '');
            $('.panier h2').css('color', '');
            $('.total-panier').css('color', '');

            // PAGE BOUTIQUE
            $('.highlight-shop').css('background-color', '');
            $('.highlight-shop h2').css('color', '');
            $('.highlight-txt, .button-s').css('background-color', '');

            //PAGE PRODUCTS
            $('.search-results').css('background-color', '');
            $('.search-results h2').css('color', '');
            $('.btn').css('background-color', '');

            //PAGE PRODUIT
            $('.product-container').css('background-color', '');
            $('.product-container h1').css('color', '');
            $('.product-container p, .product-container h3').css('color', '');
            $('.product-container strong').css('color', '');

            // PAGE ARTICLES
            $('.article').css('background-color', '');
            $('.article-title').css('color', '');
            $('.article strong').css('color', '');
            $('.article-description').css('color', '');
            $('.article-container').css('background-color', '');
            $('.btn-back').css('background-color', '');

            // Mettre à jour l'état pour indiquer que le mode normal est réactivé
            darkMode = true;
        }
    });
});