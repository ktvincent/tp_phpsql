<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Tableau</title>
  <link href="/bootstrap/css/bootstrap.css" rel="stylesheet" />
  <style type="text/css">
    .error {
      background-color: grey;
    }
    
    .warning {
      background-color: red;
    }
    
    .page {
      position: relative;
      left: 450px;
    }
    
    table {
      font-size: 20px;
      font-family: Verdana, arial, helvetica, sans-serif;
      color: #333333;
      text-align: center;
      border-collapse: collapse;
    }
    
    td {
      border: 1px solid black;
    }
		
  </style>
</head>

<body>
  <?php
include 'data.php.txt';
?>
    <div class="container">
      <div class="page-header">
        <h2>Donnees</h2>
      </div>
      <table class="table table-striped table-condensed table-bordered">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Mail</th>
            <th>Taille</th>
            <th>Poids</th>
            <th>Imc</th>
          </tr>
        </thead>
        <tbody>
          <?php
$nb=count($data);
$nbredata=20;
$nbrepage=ceil($nb/$nbredata);
extract($_GET);
          if (isset($page)){
            $chiffredata=($page-1)*$nbredata;
						
for ($i=$chiffredata;$i<($chiffredata+$nbredata);$i++){
	$personne=$data[$i];
	$m=$personne['Poids'];
	$t=$personne['Taille']/100;
	$imc=$m/($t*$t);
	$class="";
	if ($imc >= 25) $class="error";
	if ($imc <= 18) $class="warning";
	echo "<tr class='$class'>";
	echo "<td>".$personne['Nom']."</td>";
	echo "<td>".$personne['Prenom']."</td>";
	echo "<td>".$personne['Email']."</td>";
	echo "<td>".$personne['Taille']."</td>";
	echo "<td>".$personne['Poids']."</td>";
	echo "<td>".round($imc,2)."</td>";
	echo "</tr>";
}
          }
          else{
for ($i=0;$i<$nbredata;$i++){
	$personne=$data[$i];
	$m=$personne['Poids'];
	$t=$personne['Taille']/100;
	$imc=$m/($t*$t);
	$class="";
	if ($imc >= 25) $class="error";
	if ($imc <= 18) $class="warning";
	echo "<tr class='$class'>";
	echo "<td>".$personne['Nom']."</td>";
	echo "<td>".$personne['Prenom']."</td>";
	echo "<td>".$personne['Email']."</td>";
	echo "<td>".$personne['Taille']."</td>";
	echo "<td>".$personne['Poids']."</td>";
	echo "<td>".round($imc,2)."</td>";
	echo "</tr>";
}
          }
?>
        </tbody>
      </table>
      <div class="pagination">
        <form method="get">
          <?php
       if (isset($page)){
          if ($page>1){
           $precedent=$page-1;
					 }
         else 
           $precedent=$page;
       }
       else
         $precedent=1;
       echo "<button name='page' type='submit' value='$precedent'><<</button>";
       
      for ($i=1;$i<=$nbrepage;$i++){
        echo "<button name='page' type='submit' value='$i'>$i</button>";
      }
       if (isset($page)){
         if ($page<$nbredata){
                    $suivant=$page+1;
         }
         else{
                 $suivant=$page;
         }
       }
       else{
         $suivant=2;
         $page=1;
       }
        echo "<button name='page' type='submit' value='$suivant'>>></button><br>";
         echo "<p class='page'>Page:$page</p>";
      
      ?>
        </form>
      </div>
    </div>
</body>

</html>