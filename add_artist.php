<!DOCTYPE html>
<html>
   <body>
    
     <?php
     $test = FALSE;
     echo "<fieldset>";
     
      if (isset($_GET['nomA']) && isset($_GET['prenomA']) && isset($_GET['anneeA'])){
						 $nomA = $_GET['nomA'];
             $prenomA = $_GET['prenomA'];
             $anneeA = $_GET['anneeA'];
     
						  echo "L'artiste ".$nomA." a ete ajoute avec succes!";
		}
  
    echo"</fieldset>";
     
     
    
    ?>
      
      
     
   <form method="get" action="add_artist.php">
    <fieldset>
      <legend><b><h1>Ajouter un artiste</h1></b></legend>
        <input id="el1"type="text" name="nomA"  placeholder="Nom (ex: Hitchcock)" />
        <input id="el2"type="text" name="prenomA"  placeholder="Prenom (ex: Alfred)" />
        <input id="el3" type="text" name="anneeA" placeholder="Anne de naissance (ex: 1947)" />
    </fieldset>
      <input type="submit" name="accepter" value="Ajouter" />
   </form>
     
     
     
     <fieldset>
      <legend><h1>Liste des artistes</h1></legend>
        
       <table border=1>
 
      <tr>
      	<th> Nom </th>
     	 	<th> Annee de naissance </th>
      </tr>
         
       <?php      
          $conn = mysqli_connect("dwarves.iut-fbleau.fr","kwan-tea","CUDDZA1662","kwan-tea")
          or die("Impossible");
         
         $stmt = mysqli_prepare($conn, "INSERT INTO Artiste (nom,prenom,anneeNaiss) VALUES (?,?,?)");
         mysqli_stmt_bind_param($stmt,"ssi",$nomA,$prenomA,$anneeA);
         mysqli_execute($stmt);
         
        
          $liste = mysqli_query($conn,"SELECT nom,prenom,anneeNaiss FROM Artiste ORDER BY nom");
					
         if($liste){
      	while($artiste=mysqli_fetch_assoc($liste)){
        //manque une condition pour prendre seulement le realisateur en question pour l'exo 2
        	echo "<tr>";
        	echo "<td>".$artiste['nom']." ".$artiste['prenom']."</td>";
        	echo "<td>".$artiste['anneeNaiss']."</td>";
        	echo "</tr>";
       }
    	}
         
  
        ?>
              </table>
      
     </fieldset>
					
     
  </body>
  
  
  </html>