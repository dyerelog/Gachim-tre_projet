<?php 

include "pdoGachimetre.php";

//Mise en forme de la date du jour
$date = date('Y-m-d');

//Initialisation des variables
$poids_journee = 0;
$poids_semaine = 0;

//Calcul du poids total de la journée  
$res_poids_journee = pdoGachimetre::getPoidsJournee($date);

for($i = 0; $i < count($res_poids_journee); $i++){
	$poids_journee += $res_poids_journee[$i]['poids'];
}

//Calcul du poids total de la semaine
$res_poids_semaine = pdoGachimetre::getPoidsSemaine();

for($i = 0; $i < count($res_poids_semaine); $i++){
	$poids_semaine += $res_poids_semaine[$i]['poids'];
}

//Dernier gachis
$res_dernier_gachis = pdoGachimetre::getDernierGachis();

//Gachis total depuis la mise en place du système
$res_poids_total = pdoGachimetre::getPoidsTotal();

?>

<div class="divDroite">
	<div class="poidsJournee">
		<section class="cumulJournee">
			<p>Cumul journée</p>
			<!-- Conversion du poids en kg s'il est supérieur ou égalà 1000g -->
			<?php 
				if($poids_journee >= 1000){
					$poids_journee /= 1000; ?>
					<!-- Affichage du poids du gaspillage de pain de la journée -->
					<p><?php echo $poids_journee; ?> kg</p>
			<?php } 
				else{ ?>
					<p><?php echo $poids_journee; ?> g</p>
			<?php } ?>
		</section>

		<section class="cumulSemaine">
			<p>Cumul semaine</p>
			<!-- Conversion du poids en kg s'il est supérieur ou égalà 1000g -->
			<?php 
				if($poids_semaine >= 1000){
					$poids_semaine /= 1000; ?>
					<!-- Affichage du poids du gaspillage de pain de la semaine -->
					<p><?php echo $poids_semaine; ?> kg</p>
			<?php } 
				else{ ?>
					<p><?php echo $poids_semaine; ?> g</p>
			<?php } ?>
		</section>

		<section class="cumulTotal">
			<p>Cumul total</p>
			<!-- Conversion du poids en kg s'il est supérieur ou égalà 1000g -->
			<?php 
				if($res_poids_total[0]['poids'] >= 1000){
					$res_poids_total[0]['poids'] /= 1000; ?>
					<!-- Affichage du poids du gaspillage de pain depuis la mise en place du gachimètre -->
					<p><?php echo $res_poids_total[0]['poids']; ?> kg</p>
			<?php } 
				else{ ?>
					<p><?php echo $res_poids_total[0]['poids']; ?> g</p>
			<?php } ?>
		</section>
	</div>
</div>