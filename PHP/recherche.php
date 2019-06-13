
<!DOCTYPE html>
<html lang="fr">
 <head>
  <meta charset="utf-8"/>
  <title>Liste des inscrits</title>
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

   <li class="menuacceuille"><a id="lacc" href="projet.php#preco"><i class="fas fa-home"></i> ACCEUIL</a></li>
   <li class="menucongres"><a id="lcongres" href="projet.php#preco"><i class="fas fa-space-shuttle"></i> Le Congrès</a></li>

   <li class="menuprojet"><a id="lpro"href="#"><i class="fas fa-project-diagram"></i> Le Projets</a>
   <ul class="submenu">
   <li><a id="lbrk" href="break.html#">Breakthrough Starshot</a></li>
   <li><a id="lmiss" href="mars.html#">Misssion habité vers Mars</a></li>
   <li><a id="lcolo" href="colo.html#">Colonisation de Mars  </a></li>
   <li><a id="lhab" href="habita.html#">Habitation Marsienne</a></li>
   <li><a id="lterr" href="terra.html#">Terraformation de Mars</a></li>
   </ul>
   </li>

   <li class="menupropos"><a id="lprp" href="projet.php#propos"><i class="fas fa-question-circle"></i> à propos</a></li>
            <li class="menucontact"><a id="lcnt" href="projet.php#contact"><i class="fas fa-address-book"></i> Nous Contacter</a></li>   
   </ul>
</nav>

 <div id="adminrecherche">

 <?php
   // Page admin
   echo "<p>Login success !</p>";
   
?>
	
   <div id="listeinscritsad">
	   <h2>Informations sur les inscrits :</h2>
	<form method="GET">
	<input type="search" name="q" placeholder="Recherche..."/>
	<input type="submit" name="submit" value="Rechercher"/>
	 
    <select id= "trie" name="trier">
    <option value="vide"  name="vide" onclick="document.getElementById("parvide").className="parvide2"">Aucune</option>
    <option value="nom" name="nom" onclick="document.getElementById("parnom").className="parnom2"">Par Nom</option>
    <option value="prenom" name="prenom" onclick="document.getElementById("parprenom").className="parprenom2"">Par Prénom</option>
    <option value="orga" name="orga" onclick="document.getElementById("parorga").className="parorga2"">Par Organisation</option>
    <option value="date" name="date" onclick="document.getElementById("pardate").className="pardate2"">Par Date d'arrivée</option>
</select>
<a href="deco.php">Deconnexion</a>

</form> 
<br>

	<?php
	
	 $hostname = "localhost";
     $database = "mabase";
     $username = "root";
     $password = "";
         
	  $connection = mysqli_connect($hostname, $username, $password, $database) or die('la connection a échoué' . mysqli_error());
	  $requeteliste="SELECT * FROM inscrits";
	  $resultlist = mysqli_query($connection, $requeteliste) or die('la requete a échoué' . mysqli_error($connection));
	  
	  //tableau avec toute les informations sur les inscrits
	  echo "Liste des participants au congrès :<br>" ;
 echo "<table><thead>";
 echo "<th>Nom</th>";
 echo "<th>Prénom</th>";
 echo "<th>Oragnisation</th>";
 echo "<th>Date d'arrivée</th>";
 echo "<th>Heure d'arrivée</th>";
 echo "<th>Adresse mail</th></thead>";
 
	while($liste=mysqli_fetch_array($resultlist)){
		  
		  echo "<tbody><td>{$liste['nom']}</td><td>{$liste['prenom']}</td>";
		  echo "<td>{$liste['orga']}</td>";
		  echo "<td>{$liste['date']}</td>";
		  echo "<td>{$liste['heure']}</td>";
		  echo "<td>{$liste['mail']}</td></tbody>";
		  echo "</br>";
		  
	  }
	
	echo"</table>";
  echo "</br>";
  

//Recherche par mot sans filtre 

  if(!empty($_GET['submit'])&& !isset($_GET['vide'])){
  
  $articles = $connection->query('SELECT nom,prenom,orga,date FROM inscrits ORDER BY idInscrit DESC');

  if(isset($_GET['q']) AND !empty($_GET['q'])) {
     $q = htmlspecialchars($_GET['q']);
     $articles = $connection->query('SELECT nom,prenom,orga,date FROM inscrits WHERE nom LIKE "%'.$q.'%" ORDER BY idInscrit DESC');
  }
  

  ?>
  <div class="parvide">
     <?php 
      echo "Résultat de la recherche : <br><br>";

echo "<table><thead>";
echo "<th>Nom</th>";
echo "<th>Prénom</th>";
echo "<th>Oragnisation</th>";
echo "<th>Date d'arrivée</th></thead>";


      while($a = $articles->fetch_assoc()) { ?>
 
      <td> <?= $a['nom']?></td><td><?=$a['prenom']?></td><td><?=$a['orga']?></td><td><?=$a['date']?></td>
     <?php ?></tbody></div> <?php } }
      ?>



<?php //Recherche par nom


 if(!empty($_GET['submit']) && !isset($_GET['nom'])){
  
  $articles = $connection->query('SELECT nom,prenom,date FROM inscrits ORDER BY idInscrit DESC');

  if(isset($_GET['q']) AND !empty($_GET['q'])) {
     $q = htmlspecialchars($_GET['q']);
     $articles = $connection->query('SELECT nom,prenom,date FROM inscrits WHERE nom LIKE "%'.$q.'%" ORDER BY idInscrit DESC');
  }
  

  ?>
  <div class="parnom">
  <?php  echo "Résultat de la recherche par Nom : <br><br>";

echo "<table><thead>";
echo "<th>Nom</th>";
echo "<th>Prénom</th>";
echo "<th>Date d'arrivée</th></thead>";


      while($a = $articles->fetch_assoc()) { ?>
 
      <td> <?= $a['nom']?></td><td><?=$a['prenom']?></td><td><?=$a['date']?></td>
     <?php ?></tbody> </div> ;<?php } }
      ?>

 <?php //recherche par prenom
 
 
 if(!empty($_GET['submit'])&& !isset($_GET['prenom'])){
  
  $articles = $connection->query('SELECT prenom,nom,date,orga FROM inscrits ORDER BY idInscrit DESC');

  if(isset($_GET['q']) AND !empty($_GET['q'])) {
     $q = htmlspecialchars($_GET['q']);
     $articles = $connection->query('SELECT prenom,nom,date,orga FROM inscrits WHERE prenom LIKE "%'.$q.'%" ORDER BY idInscrit DESC');
  }
  
  ?><div class="parprenom">
  <?php echo "Résultat de la recherche par Prénom : <br><br>";

echo "<table><thead>" ;
echo "<th>Prénom</th>";
echo "<th>Nom</th>";
echo "<th>Date d'arrivée</th>";
echo "<th>Organisation</th></thead>";

      while($a = $articles->fetch_assoc()) { ?>
 
 <td> <?=$a['prenom']?></td><td><?=$a['nom']?></td><td><?=$a['date']?></td><td><?=$a['orga']?></td><?php ?></tbody></div> <?php } }

      ?>


<?php //recherche par oragnisation
 
 
 if(!empty($_GET['submit'])&& isset($_GET['orga'])){
  
  $articles = $connection->query('SELECT orga,nom,prenom FROM inscrits ORDER BY idInscrit DESC');

  if(isset($_GET['q']) AND !empty($_GET['q'])) {
     $q = htmlspecialchars($_GET['q']);
     $articles = $connection->query('SELECT orga,nom,prenom  FROM inscrits WHERE orga LIKE "%'.$q.'%" ORDER BY idInscrit DESC');
  }
  
  ?>
  <div class="parorga">
  <?php  echo "Résultat de la recherche par Organisation : <br><br>";
echo "<table><thead>";
echo "<th>Organisation</th>";
echo "<th>Nom</th>";
echo "<th>Prénom</th></thead>";


      while($a = $articles->fetch_assoc()) { ?>
 
      <td> <?= $a['orga']?></td><td><?=$a['nom']?></td><td><?=$a['prenom']?></td>
     <?php ?></tbody></div> <?php } }
      ?>

<?php //recherche par date
 
 
 if(!empty($_GET['submit'])&& isset($_GET['date'])){
  
  $articles = $connection->query('SELECT date,nom,prenom,orga FROM inscrits ORDER BY idInscrit DESC');

  if(isset($_GET['q']) AND !empty($_GET['q'])) {
     $q = htmlspecialchars($_GET['q']);
     $articles = $connection->query('SELECT date,nom,prenom,orga  FROM inscrits WHERE date LIKE "%'.$q.'%" ORDER BY idInscrit DESC');
  }
  
  ?>
  <div class="pardate">
  <?php echo "Résultat de la recherche par Date : <br><br>";
echo "<table><thead>";
echo "<th>Date d'arrivée</th>";
echo "<th>Nom</th>";
echo "<th>Prénom</th>";
echo "<th>orga</th></thead>";


      while($a = $articles->fetch_assoc()) { ?>
 
      <td> <?= $a['date']?></td><td><?=$a['nom']?></td><td><?=$a['prenom']?></td><td><?=$a['orga']?></td>
     <?php ?></tbody> </div><?php } }
      ?>
</div>

</div>

 </body>
</html>
