<?php
/*
    This file is part of PhotoShow.

    PhotoShow is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    PhotoShow is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with PhotoShow.  If not, see <http://www.gnu.org/licenses/>.
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>NewPhoto</title>
	<meta name="author" content="Thibaud Rohmer">
	<link href='http://fonts.googleapis.com/css?family=Quicksand:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="inc/stylesheet.css" type="text/css" media="screen" charset="utf-8">
	
<?php
require_once 'src/layout.php';
require_once 'src/settings.php';
require_once 'src/secu.php';

$settings=get_settings();
$action=parse_action($_GET['f']);

if($action['layout']=="image"){
	echo "<style>\n .layout_thumbs{\n display:none;\n }\n </style>\n";
}else{
	echo "<style>\n .layout_image{\n display:none;\n }\n </style>\n";
}
?>

</head>
<body>
<div id="container">
	<div class="layout_thumbs">
		<div id="menu">
			<?php 
				menu($action['dir'],$action['subdir']); 
			?>
		</div>
		<div id="boards_panel">
			<?php
				board($action['display']); 
			?>
		</div>
	</div>
	<div class="layout_image">
		<div id="top">
			<div id="exif">
				<?php
				if($action['layout']=='image') {
					$rp=relative_path($action['display'],$settings['photos_dir']);
					//require("inc/exif.php?file=$rp");
				}
				?>
			</div>

			<?php
				$image="";
				if($action['layout']=="image") {
					$image	=	"src/getfile.php?file=".relative_path($action['display'],$settings['photos_dir']);
				}
			?>
			<div id="image_big" style="background: url('<?php echo $image; ?>') no-repeat center center; background-size: contain;">

			</div>

			<div id="comments">
			
			</div>
		</div>
		<div id="bottom_thumbs">
		
		</div>
	</div>
</div>
</body>
</html>
