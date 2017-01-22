<?php
	//edit.php
	require("functions.php");

	
	if(isset($_GET["delete"]) && isset($_GET["id"])) {
		// kustutan
		
		deleteGuitar($_GET["id"]);
		header("Location: data.php");
		exit();
	}
	
	
	//kas kasutaja uuendab andmeid
	if(isset($_POST["update"])){
		
		updateGuitar($_POST["id"], $_POST["nimi"],$_POST["brand"],$_POST["type"],$_POST["color"],$_POST["mudel"]);
		
		header("Location: edit.php?id=".$_POST["id"]."&success=true");
        exit();	
		
	}
	
	//saadan kaasa id
	$c = getSingleGuitar($_GET["id"]);
	//var_dump($c);

	
?> 

<h3><a href="data.php"> Tagasi </a></h3>

<h2>Muuda andmed</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
			<input type="hidden" name="id" value="<?=$_GET["id"];?>" > 
	
	
			<label><b>Omaniku nimi</b></label><br>
			<input name="nimi" type="text" value="<?php echo $c->nimi;?>">
			
			<br><br>
			<label><b>Firma</b></label><br>
			<input name="nimi" type="text" value="<?php echo $c->brand;?>">
			
			<br><br>
			<label><b>Tuup</b></label><br>
			<input name="nimi" type="text" value="<?php echo $c->type;?>">
			
			<br><br>
			<label><b>Varv</b></label><br>
			<input name="color" type="color" value="<?=$c->color;?>" > 
			
			<br><br>
			
			<label><b>Mudel</b></label><br>
			<input name="mudel" type="text" value="<?php echo $c->mudel;?>"  >
			
			<br><br>
	<input type="submit" name="update" value="Salvesta"> 
  </form>
  
  
 <br>
 <br>
 <a href="?id=<?=$_GET["id"];?>&delete=true">Kustuta</a>