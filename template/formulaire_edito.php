<?php
if (isset($_POST['contenu'])) {
    require_once("controller/EditoController.php");
    traiter_formulaire_edito();
}
?>
<div class="connexion">
    <form action="index.php?page=modifier_edito" method="post">
        <div class="connect-p1">
            <h3>Texte Edito</h3>
        </div>
        <div class="connect-p2">
            <label for="contenu">Texte : </label>
            <br>
            <input class="input-edito" type="text" name="contenu" id="zone_texte" />
            <br>
            <button type="submit" id="bouton" disabled>Enregistrer</button>
        </div>
    </form>
</div>
<script>
    const entree = document.getElementById("zone_texte");
    const bouton = document.getElementById("bouton");

    entree.addEventListener('change', () => {
        if (entree.value.length > 200 || entree.value.length == 0) {
            bouton.disabled = true;
        } else {
            bouton.disabled = false;
        }
    });

</script>