<!DOCTYPE html>
<html lang="fr">
 <head>
 
  <title>Liste des inscrits</title>

  <meta charset="UTF-8"/>

  <link rel="stylesheet" type="text/css" href="css/search.css"/>
  <link rel="stylesheet" type="text/css" href="css/header.css"/>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

 

 </head>
 <body>
 <nav>
 <ul> 

   <li class="menuacceuille"><a id="lacc" href="projet.php#"><i class="fas fa-home"></i> ACCEUIL</a></li>
   <li class="menucongres"><a id="lcongres" href="projet.php#preco"><i class="fas fa-space-shuttle"></i> Le Congrès</a></li>

   <li class="menuprojet"><a id="lpro"href="#"><i class="fas fa-project-diagram"></i> Le Projets</a>
   <ul class="submenu">
   <li><a id="lbrk" href="break.html#">Breakthrough Starshot</a></li>
   <li><a id="lmiss" href="mars.html#">Misssion habit� vers Mars</a></li>
   <li><a id="lcolo" href="colo.html#">Colonisation de Mars  </a></li>
   <li><a id="lhab" href="habita.html#">Habitation Marsienne</a></li>
   <li><a id="lterr" href="terra.html#">Terraformation de Mars</a></li>
   </ul>
   </li>

   <li class="menupropos"><a id="lprp" href="projet.php#propos"><i class="fas fa-question-circle"></i> à propos</a></li>
            <li class="menucontact"><a id="lcnt" href="projet.php#contact"><i class="fas fa-address-book"></i> Nous Contacter</a></li>   
   </ul>
</nav>

 <div id="listepublic">

 <h1>Liste des Participants </h1>



 <?php


 
 $hostname = "localhost";
     $database = "mabase";
     $username = "root";
     $password = "";
     
	  $connection = mysqli_connect($hostname, $username, $password, $database) or die('la connection a �chou�' . mysqli_error());
	  $requeteliste="SELECT * FROM inscrits";
	  $resultlist = mysqli_query($connection, $requeteliste) or die('la requete a �chou�' . mysqli_error($connection));



// tableau qui affiche les noms des participants 

 echo "<table><thead>";
 echo "<th>Nom</th>";
 echo "<th>Prenom</th>";
 echo "<th>Oragnisation</th></thead>";
 
 while($liste=mysqli_fetch_array($resultlist)){ 
	    
		  echo "<tbody><tr><td>{$liste['nom']}</td>";
		  echo "<td>{$liste['prenom']}</td>";
		  echo "<td>{$liste['orga']}</td></tr></tbody>";
		    
	  }
	  
	echo"</table>";
    echo "</br>";	  
	?>
	<br>
	<a href="projet.php">Retour page d'acceuille.</a>
	</div>
	</body>
	</html>
