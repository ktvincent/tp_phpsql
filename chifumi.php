<!DOCTYPE html>
<html>
	<body>
    
    <form method="post" action="chifumi.php">
      <fieldset>
        <legend><b><h1>PIERRE, FEUILLE, CISEAUX !</h1></b>
        <legend>Choisissez votre coup :</legend>
        </legend> 
        <a href="?coup=0"><img src="img/pierre.png"></a>
        <a href="?coup=1"><img src="img/feuille.png"></a>
        <a href="?coup=2"><img src="img/ciseaux.png"></a>
      </fieldset>
    </form>
    
  <?php 
    
  if(isset($_GET['coup'])){
  $x = $_GET['coup'];
  $y = rand(0,2);

  
    
  $matrice = array();
  $matrice[0] = array('Egalite','Gagne','Perdu');
  $matrice[1] = array('Perdu','Egalite','Gagne');
  $matrice[2] = array('Gagne','Perdu','Egalite');
    
    
  if($x =="0") 
      $moncoup ="pierre.png";
  if($x =="1") 
    $moncoup ="feuille.png";
  if($x =="2") 
    $moncoup = "ciseaux.png";
    
    
  if($y ==0) 
    $ia = "pierre.png";
  if($y ==1) 
    $ia = "feuille.png";
  if($y ==2) 
    $ia = "ciseaux.png";
    echo "Votre coup - - - - - - - - - - - - L'ordinateur</br>";
     echo "<img src=img/$moncoup>";
     echo "<img src=img/$ia></br>";
    
    echo "<h3>";
    echo $matrice[$y][$x];
    echo "</h3>";
    echo "</br>";
  }
   
  
   
  ?>
    

	</body>
</html>