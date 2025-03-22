<?php
require_once 'structure/inc.head.php';
?>

<?php
require_once 'structure/inc.header.php';
?>

<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM cursus WHERE id = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $cursus = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cursus) {
?>
        <section class="cursus">
            <h1 class="titre_h1"><?php echo htmlspecialchars($cursus['titre']); ?></h1>
            <div class="row-column">
                <div class="cursus-container">
                    <section class="presentation sections">
                        <h2 class="titre_h2">Présentation du Cursus</h2>
                        <p><?php echo nl2br(htmlspecialchars($cursus['presentation'])); ?></p>
                    </section>

                    <section class="objectifs sections">
                        <h2 class="titre_h2">Objectif Général du Programme</h2>
                        <p><?php echo nl2br(htmlspecialchars($cursus['objectif'])); ?></p>
                    </section>

                    <section class="structure sections">
                        <h2 class="titre_h2">Structure du Programme</h2>
                        <h3>Matières Principales</h3>
                        <ul class="liste_cursus">
                            <?php
                            $matieres = explode(',', $cursus['matieres_principales']);
                            foreach ($matieres as $matiere) {
                                echo "<li>" . htmlspecialchars(trim($matiere)) . "</li>";
                            }
                            ?>
                        </ul>
                        <h3>Options Possibles</h3>
                        <ul class="liste_cursus">
                            <?php
                            $options = explode(',', $cursus['options_possibles']);
                            foreach ($options as $option) {
                                echo "<li>" . htmlspecialchars(trim($option)) . "</li>";
                            }
                            ?>
                        </ul>
                    </section>

                    <section class="debouches sections">
                        <h2 class="titre_h2">Débouchés et Opportunités Professionnelles</h2>
                        <p><?php echo nl2br(htmlspecialchars($cursus['debouches'])); ?></p>
                    </section>

                    <section class="admission sections">
                        <h2 class="titre_h2">Admission et Conditions</h2>
                        <p><?php echo nl2br(htmlspecialchars($cursus['admission_conditions'])); ?></p>
                    </section>
                </div>
            </div>
        </section>

<?php
    } else {
        echo "<p>Cursus introuvable.</p>";
    }
} else {
    echo "<p>Paramètre ID invalide.</p>";
}

require_once 'structure/inc.footer.php';
?>