<?php

// link to the font file no the server
$fontname = 'font/Lobster.otf';
// controls the spacing between text
$i=30;
//JPG image quality 0-100
$quality = 100;

function create_image($user){

		global $fontname;	
		global $quality;
		$file = "covers/".md5($user[0]['name']).".jpg";	
	
	// if the file already exists dont create it again just serve up the original	
	if (!file_exists($file)) {	
			

			// define the base image that we lay our text on
			$im = imagecreatefromjpeg("pass.jpg");
			
			// setup the text colours
			$color['white'] = imagecolorallocate($im, 238, 238, 238);
		
			
			// this defines the starting height for the text block
			$y = imagesy($im) - $height - 293;
			 
		// loop through the array and write the text	
		foreach ($user as $value){
			// center the text in our image - returns the x value
			$x = center_text($value['name'], $value['font-size']);	
			imagettftext($im, $value['font-size'], 0, $x, $y+$i, $color[$value['color']], $fontname,$value['name']);
			// add 32px to the line height for the next text block
			$i = $i+32;	
			
		}
			// create the image
			imagejpeg($im, $file, $quality);
			
	}
						
		return $file;	
}

function center_text($string, $font_size){

			global $fontname;

			$image_width = 583;
			$dimensions = imagettfbbox($font_size, 0, $fontname, $string);
			
			return ceil(($image_width - $dimensions[4]) / 2);				
}



	
	
	
	if(isset($_POST['submit'])){
	
	$error = array();
	
		if(strlen($_POST['name'])==0){
			$error[] = 'Please enter a name';
		}
        if(strlen($_POST['name'])==12){
			$fsize = 22;
			
		}
        if(strlen($_POST['name'])==11){
			$fsize = 23;
			
		}
        if(strlen($_POST['name'])==10){
			$fsize = 26;
			
		}
		if(strlen($_POST['name'])==9){
			$fsize = 28;
			
		}
		if(strlen($_POST['name'])==8){
			$fsize = 30;
			
		}
        
        if(strlen($_POST['name'])==7){
			$fsize = 32;
			
		}
        
        if(strlen($_POST['name'])==6){
			$fsize = 33;
			
		}
        
        if(strlen($_POST['name'])==5){
			$fsize = 34;
			
		}	
        
        if(strlen($_POST['name'])==4){
			$fsize = 36;
			
		}
        
        if(strlen($_POST['name'])==3){
			$fsize = 36;
			
		}
        
        if(strlen($_POST['name'])==2){
			$fsize = 36;
			
		}
        if(strlen($_POST['name'])==1){
			$fsize = 36;
			
		}


		
	if(count($error)==0){
		
	$user = array(
	
		array(
			'name'=> $_POST['name'], 
			'font-size'=>$fsize,
			'color'=>'white'),
			
		
	);		
		
	}
		
	}

// run the script to create the image
$filename = create_image($user);

?>


<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
<title>Share a ...</title>
<link href="style.css" rel="stylesheet" type="text/css" />
    <link href="grid.css" rel="stylesheet" type="text/css" />
   
</head>

<body>





<ul>
<?php if(isset($error)){
	
	foreach($error as $errors){
		
		echo '<li>'.$errors.'</li>';
			
	}
	
	
}?>
</ul>

 <div class="grid">
      <div class="unit one-third">
        <pre><form id="subscribe" action="" method="post">

<input type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" name="name" maxlength="12" placeholder="Enter Name Here">
<input name="submit" type="submit" value="Manufacture bottle" />
</form></pre>
      </div>
      <div class="unit two-thirds">
        <pre><img src="<?=$filename;?>?id=<?=rand(0,1292938);?>" width="583" height="749"/><br/><br/></pre>
      </div>
    </div>


<div class="grid">
   <div class="unit golden-large"><div class="txt">Right click on the bottle to save the image</div></div>
    <div class="unit golden-small"><a href="http://www.twitter.com/fatikowais">Developed by @fatikowais</a></div>
    
    </div>
    <object height="0" width="0" data="tone.mp3"></object>

</body>
</html>
