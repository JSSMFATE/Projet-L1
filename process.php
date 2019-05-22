
<?php
// cette page vérifie si le champ de connexion admin est correct

$admin=$_POST['admin'];
$mdp=$_POST['mdp'];

         $hostname = "localhost";
         $database = "mabase";
         $username = "root";
         $password = "";

    $admin=stripcslashes($admin);
    $mdp=stripcslashes($mdp);
    $co = mysqli_connect($hostname, $username, $password, $database);
    mysqli_select_db($co,"mabase");
    
    $admin= mysqli_real_escape_string($co,$admin);
    $mdp= mysqli_real_escape_string($co,$mdp);
    $listeadmin="SELECT * FROM admintable WHERE admin='$admin' and mdp='$mdp'"; 
    
    $result = mysqli_query($co,$listeadmin) or die('la connection a échoué\n' . mysqli_error($co));

    $row=mysqli_fetch_array($result);
  
    
 if ($row['admin']==$admin && $row['mdp']==$mdp && !empty($row['admin'])&& !empty($row['mdp'])){
		
		echo "login success";
		
		header("location:recherche.php");
exit();	
		
	}else
	echo"erreur";

	

    
?>
