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
        }, 2000);
    }
</script>