<?php
include "../core/ReclamationC.php";
$probC=new ReclamationC();
$liste=$probC->afficherReclamations();
$recnontraite=$probC->nbnontrait();
$probPC=$probC->solMax();
  ?>
<body onload="window.print();">
	<?php
	 foreach($liste as $row)
														{		
													?>
													<table>
													<tr>
													<input type="hidden" name="id_Rec" value="<?php echo $row['id_Rec']; ?>">
													<input type="hidden" name="etat" value="<?php echo $row['etat']; ?>">		
														
														<td><?php echo $row['id_Clt'];  ?></td>
														<td><?php echo $row['id_Cmd'];  ?></td>
														<td><?php echo $row['contenue'];  ?></td>
														<td><?php echo $row['Date'];  ?></td>
														<td><?php echo $row['etat'];  ?></td>

													</tr>


												
												<?php }  ?>
														<td><?php echo $row['id_Cmd'];  ?></td>
														<td><?php echo $row['contenue'];  ?></td>
														<td><?php echo $row['Date'];  ?></td>
														<td><?php echo $row['etat'];  ?></td>
</table>
</body>
