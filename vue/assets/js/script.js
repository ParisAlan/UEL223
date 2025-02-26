$(document).ready(function () {
    console.log("JS ACTIVED !");

    ///////////////////////////////////////////// CONSTUCTION /////////////////////////////////////////////////////

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

});
