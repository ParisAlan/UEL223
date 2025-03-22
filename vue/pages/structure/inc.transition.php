<!-- L'overlay avec la vidéo -->
<div id="overlay" class="overlay">
    <video id="logo1" class="overlay-video" autoplay loop muted>
        <source src="vue/assets/images/boucing-football-american.mp4" type="video/mp4">
    </video>
</div>

<style>
    /* Le fond noir qui couvrira tout l'écran */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--white-color);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .overlay-video {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
</style>

<script>
    function triggerEffect() {
        document.getElementById('overlay').style.display = 'flex';

        setTimeout(function() {
            // Cacher l'overlay
            document.getElementById('overlay').style.display = 'none';

            document.body.classList.add('dark-theme');
        }, 1500);
    }

    $(document).ready(function() {
        let darkMode = true;
        let img = $('.header-logo');

        $('#btn-da').on('click', function() {
            if (darkMode) {
                // STRUCTURE
                img.attr('src', 'vue/assets/images/hudsonskyhawks.png'); // Changer l'image
                $('#header_blue').css('background-color', 'var(--lightlightgray-color)');
                $('#header_blue').css('border-bottom', '3px solid var(--orange-color)');
                $('#header_blue .header-navi-lien').css('color', 'var(--primary-color)');

                // PAGE INDEX
                $('.slogan').css('background-color', 'var(--lightlightgray-color)');
                $('.slogan-text').css('color', 'var(--orange-color)');
                $('.news').css('background-color', 'var(--lightgray-color)');
                $('.news-title h2').css('color', 'var(--primary-color)');
                $('.news h3').css('color', '#0F4D6B');
                $('.doyen').css('background-color', '#E0E8EE');
                $('.doyen-pic').css('border', '4px solid #0F4D6B');
                $('.doyen-text').css('color', '#0F4D6B');
                $('.doyen-signature').css('color', '#0F4D6B');
                $('.slide.slide2').css('background-color', 'var(--white-color)');
                $('.articles-text').css('color', 'var(--primary-color)');

                // PAGE CAMPUS
                $('.presentation').css('background-color', 'var(--lightlightgray-color)');
                $('.bibliothèque').css('background-color', 'var(--lightlightgray-color)');
                $('.carousel-up').css('background-color', 'var(--lightgray-color)');
                $('.carousel-up h2').css('color', 'var(--primary-color)');
                $('.biblio-text p').css('color', 'var(--primary-color)');
                $('.left-title').css('color', 'var(--primary-color)');
                $('.biblio-pics img').css('box-shadow', '-50px -40px 0px -10px var(--primary-color)');

                // Mettre à jour l'état pour indiquer que le mode dark est activé
                darkMode = false;
            } else {
                // STRUCTURE
                img.attr('src', 'vue/assets/images/hudsonlogo.png');
                $('#header_blue').css('background-color', '');
                $('#header_blue').css('border-bottom', '');
                $('.header-navi-lien').css('color', '');

                // PAGE INDEX
                $('.slogan').css('background-color', '');
                $('.slogan-text').css('color', '');
                $('.news').css('background-color', '');
                $('.news-title h2').css('color', '');
                $('.news h3').css('color', '');
                $('.doyen').css('background-color', '');
                $('.doyen-pic').css('border', '');
                $('.doyen-text').css('color', '');
                $('.doyen-signature').css('color', '');
                $('.slide.slide2').css('background-color', '');
                $('.articles-text').css('color', '');


                // PAGE CAMPUS
                $('.presentation').css('background-color', '');
                $('.bibliothèque').css('background-color', '');
                $('.carousel-up').css('background-color', '');
                $('.carousel-up h2').css('color', '');
                $('.biblio-text p').css('color', '');
                $('.left-title').css('color', '');
                $('.biblio-pics img').css('box-shadow', '');

                // Mettre à jour l'état pour indiquer que le mode normal est réactivé
                darkMode = true;
            }
        });
    });
</script>