


<!DOCTYPE html>
<html>
  <!-- Il faut que tu commit à chaque fois que tu reussi une partie -->
  <!-- exo1: clarté: 2/4 fonctionnement: 4/4 -->
  <!-- exo2: clarté: 2.5/4 fonctionnement: 1.5/4 artistique: 1/1 -->
  <!-- exo3: 0/4 -->
	<body> 
  
    <h1>
       FILMS
    </h1>    

    <form>
      <fieldset>
      <SELECT name="nom" size="1">
        <?php
            
          $conn = mysqli_connect("dwarves.iut-fbleau.fr","kwan-tea","CUDDZA1662","kwan-tea")
          or die("Impossible");
        
          $liste = mysqli_query($conn,"SELECT DISTINCT nom
                                    FROM Artiste");
          while($artiste=mysqli_fetch_assoc($liste)){
            echo "<OPTION>".$artiste['nom']; // manque </option>
          }
 
        ?>
        
      </SELECT>
      <input type="submit" name="Chercher" value="Chercher" />
      </fieldset>
    </form>

    <table border=1>
 
      <tr>
      <th> Titre </th>
      <th> Annee </th>
      <th> Genre </th>
      <th> Realisateur </th>
      </tr>
    
    <?php
      
       $link = mysqli_connect("dwarves.iut-fbleau.fr","kwan-tea","CUDDZA1662","kwan-tea") // pas besoin de se connecter 2 fois
       or die("Impossible");
      
       $resultat= mysqli_query($link,"SELECT titre,annee,genre,nom
                                    FROM Film NATURAL JOIN Artiste
                                    WHERE idMes = idArtiste");
     if($resultat){
        while($ligne= mysqli_fetch_assoc($resultat)){
        //manque une condition pour prendre seulement le realisateur en question pour l'exo 2
        echo "<tr>";
        echo "<td>".$ligne['titre']."</td>";
        echo "<td>".$ligne['annee']."</td>";
        echo "<td>".$ligne['genre']."</td>";   
        echo "<td>".$ligne['nom']."</td>";
        echo "</tr>";
        }
    }
     //manque la deconnexion
    ?>
      
      
      
    </table>
      
  </body>
</html>
    