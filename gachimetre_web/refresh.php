<?php

include "pdoGachimetre.php";

//Dernier gachis
$res_dernier_gachis = pdoGachimetre::getDernierGachis(); ?>

<!-- Affichage de la division du dernier gâchis en vert si le poids du dernier pain est de moins de 15g -->
<?php if($res_dernier_gachis[0]['poids'] < 15 ){ ?>
		<div style="background-color: #4bd53a;" class="divGauche">
			<div class="dernierPoids">
				<span class="nbrDernierPoids">
					<!-- Affichage du poids du dernier bout de pain jeté -->
					<p id="refreshPara"><?php echo $res_dernier_gachis[0]['poids']; ?> g</p>
					<img src="images/emoteBien.png" alt="Emote bien" height="80%" width="80%">
				</span>
			</div>
		</div>
<?php } ?>

<!-- Affichage de la division du dernier gâchis en orange si le poids du dernier pain est compris entre 15g et 35g -->
<?php if($res_dernier_gachis[0]['poids'] >= 15 && $res_dernier_gachis[0]['poids'] < 35){ ?>
		<div style="background-color: #ff4500; border: 2px solid #a02e03;" class="divGauche">
			<div style="background-color: #ff4500;" class="dernierPoids">
				<span class="nbrDernierPoids">
					<!-- Affichage du poids du dernier bout de pain jeté -->
					<p id="refreshPara"><?php echo $res_dernier_gachis[0]['poids']; ?> g</p>
					<img src="images/emoteBof.png" alt="Emote bof" height="80%" width="80%">
				</span>
			</div>
		</div>
<?php } ?>

<!-- Affichage de la division du dernier gâchis en rouge si le poids du dernier pain est de plus de 35g -->
<?php if($res_dernier_gachis[0]['poids'] >= 35){ ?>
		<div style="background-color: #ff0f00; border: 2px solid #8e0b02;" class="divGauche">
			<div style="background-color: #ff0f00;" class="dernierPoids">
				<span class="nbrDernierPoids">
					<!-- Affichage du poids du dernier bout de pain jeté -->
					<p id="refreshPara"><?php echo $res_dernier_gachis[0]['poids']; ?> g</p>
					<img src="images/emotePasBien.png" alt="Emote pas bien" height="80%" width="80%">
				</span>
			</div>
		</div>
<?php } ?>

