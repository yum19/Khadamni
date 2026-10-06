<?php
$adresseEVN = ""; // Initialisation de la variable adresseEVN

// Vérifier si l'adresse est passée dans l'URL
if (isset($_GET["adresseEVN"])) {
    $adresseEVN = $_GET["adresseEVN"]; // Récupérer l'adresse depuis l'URL
?>
<br>
<br>
<br>
<br>
<br>
<br>

<center><iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $adresseEVN; ?>&output=embed"></iframe></center>

<?php
} else {
    // Si l'adresse n'est pas passée dans l'URL, afficher le formulaire
?>
<form method="GET">
    <p>
        <input type="text" name="adresseEVN" placeholder="Enter address" value="<?php echo $adresseEVN; ?>">
    </p>
    <p>
        <?php echo $adresseEVN; ?>
    </p>
    <button type="submit" name="submit_address">Afficher sur la carte</button>
</form>
<?php
}
?>
