$(document).ready(function () {
    console.log("JS ACTIVED !");

    ///////////////////////////////////////////// CONSTRUCTION /////////////////////////////////////////////////////

    // ouverture porte
    $(".header-navi-lien[title='Se déconnecter'] i").hover(
        function () {
            $(this).removeClass("fa-door-closed").addClass("fa-door-open");
        },
        function () {
            $(this).removeClass("fa-door-open").addClass("fa-door-closed");
        }
    );

    //////////////////////////////////////// SHOP /////////////////////////////////////////////////////////////////


    // Lorsqu'une taille est sélectionnée dans la liste déroulante
    $('#taille-select').change(function () {
        var selectedOption = $(this).find('option:selected');  // Option sélectionnée
        var stock = selectedOption.data('stock');  // Récupérer le stock associé à la taille sélectionnée
        var stockInfo = $('#stock-info');  // Cible l'élément où le stock sera affiché

        if (stock > 0) {
            stockInfo.text("Stock restant : " + stock + " articles.");
            stockInfo.css("color", "green");
            stockInfo.css("background-color", "#B0F2b6");
            stockInfo.css("border", "3px solid green");
            stockInfo.css("padding", "1em");
            stockInfo.css("width", "90%");
        } else {
            stockInfo.text("Désolé, cette taille est épuisée.");
            stockInfo.css("color", "red");
            stockInfo.css("background-color", "#F2B0B0");
            stockInfo.css("border", "3px solid red");
            stockInfo.css("padding", "1em");
            stockInfo.css("width", "90%");
        }
    });


    //////////////////////////////////////// ADMIN /////////////////////////////////////////////////////////////////

    $(document).ready(function () {
        const modal = $("#editModal");
        const closeBtn = $(".close");
        const editForm = $("#editForm");

        // Quand on clique sur ✏️, on ouvre la modale et on pré-remplit les champs
        $(".edit-user").on("click", function () {
            const userId = $(this).data("id");
            const userIdentifiant = $(this).data("identifiant");

            $("#edit_id").val(userId);
            $("#edit_identifiant").val(userIdentifiant);

            modal.show();
        });

        // Quand on clique sur la croix, on ferme la modale
        closeBtn.on("click", function () {
            modal.hide();
        });

        // Quand on clique en dehors de la modale, on la ferme
        $(window).on("click", function (event) {
            if ($(event.target).is(modal)) {
                modal.hide();
            }
        });


        const modal2 = $("#editModal2");

        // Quand on clique sur ✏️, on ouvre la modale et on pré-remplit les champs
        $(".edit-admin").on("click", function () {
            const userId = $(this).data("id");
            const userIdentifiant = $(this).data("identifiant");

            $("#edit_id").val(userId);
            $("#edit_identifiant").val(userIdentifiant);

            modal2.show();
        });

        // Quand on clique sur la croix, on ferme la modale
        closeBtn.on("click", function () {
            modal2.hide();
        });

        // Quand on clique en dehors de la modale, on la ferme
        $(window).on("click", function (event) {
            if ($(event.target).is(modal2)) {
                modal2.hide();
            }
        });

        const modal3 = $("#editArticleModal");

        // Quand on clique sur ✏️, on ouvre la modale et on pré-remplit les champs
        $(".edit-article").on("click", function () {
            const userId = $(this).data("id");
            const userIdentifiant = $(this).data("identifiant");

            $("#edit_id").val(userId);
            $("#edit_identifiant").val(userIdentifiant);

            modal3.show();
        });

        // Quand on clique sur la croix, on ferme la modale
        closeBtn.on("click", function () {
            modal3.hide();
        });

        // Quand on clique en dehors de la modale, on la ferme
        $(window).on("click", function (event) {
            if ($(event.target).is(modal3)) {
                modal3.hide();
            }
        });
    });



    //////////////////////////////////////// ADMIN SHOP  /////////////////////////////////////////////////////////////////

    $(".owl-carousel").owlCarousel({
        loop: true, // Permet de faire une boucle infinie
        margin: 10, // Espacement entre les éléments
        responsive: {
            0: { items: 1 }, // Sur petits écrans, 1 image
            600: { items: 2 }, // À partir de 600px, 2 images
            1000: { items: 2 } // À partir de 1000px, 3 images
        }
    });


});







//////////////////////////////////////// PRODUCTS  /////////////////////////////////////////////////////////////////

document.addEventListener("DOMContentLoaded", function () {
    const searchBox = document.querySelector(".search-box");
    const searchInput = document.querySelector(".input-search");
    const searchButton = document.querySelector(".btn-search");

    searchButton.addEventListener("click", function (event) {
        // Si le champ de recherche est vide et caché, on l'affiche sans soumettre
        if (searchInput.value.trim() === "") {
            event.preventDefault(); // Empêche l'envoi du formulaire
            searchBox.classList.add("active"); // Ajoute une classe pour l'afficher
            searchInput.focus(); // Met le focus sur l'input
        }
    });
});

