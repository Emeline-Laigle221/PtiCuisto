
<?php
    if(isset($_POST['contenu'])){
        require_once("controller/EditoController.php");
        traiter_formulaire_edito();
    }
?>

<form action="index.php?page=modifier_edito" method="post">
    <input type="text" name="contenu" id="zone_texte" />
    <button type="submit" id="bouton" disabled>Enregistrer</button>
</form>
<script>
    const entree = document.getElementById("zone_texte");
    const bouton = document.getElementById("bouton");

    entree.addEventListener('change',()=>{
        if(entree.value.length > 200 || entree.value.length == 0){
            bouton.disabled = true;
        }else{
            bouton.disabled = false;
        }
    });

</script>