<?php

 if(!isset($_SESSION['login'])) Header("Location: login.php");
 $con = new mysqli("localhost","root","","db");
if (!$con) echo "Nu s-a putut conecta la baza de date!";

$sql_cmd = "SELECT * FROM date";
$res = $con->query($sql_cmd);
$the_db = array();
for($i=0;$i<$res->num_rows;$i++)
{
	$row = $res->fetch_assoc();
	array_push($the_db,array($row['latitudine'],$row['longitudine'],$row['name'],$row['culoare'],$row['dimensiune']));
}

for($i=0;$i<count($the_db);$i++)
{
	//echo "x:".$the_db[$i][0].",y:".$the_db[$i][1].",name:".$the_db[$i][2].",zoom:".$the_db[$i][3]."</br>";
}

echo "<html>
<body>
<div id='map' style='height:100%'></div>
	<script>
	var map;
	function initMap()
	{
		var locs = [];
		var dmns = [];
		map = new google.maps.Map(document.getElementById('map'),{center:{lat:parseFloat(".$the_db[10][0]."),lng:parseFloat(".$the_db[10][1].")},zoom:7});
		";
		
		for($i1=0;$i1<count($the_db);$i1++)
		{
			$x1 = $the_db[$i1][0]; 
			$y1 = $the_db[$i1][1];
			$name = $the_db[$i1][2];
			$culoare = $the_db[$i1][3];
			$dimensiune = $the_db[$i1][4];
			echo "var mrk = new google.maps.Marker({position:{lat:".$x1.",lng:".$y1."},map:map,title:'".$name.",zoom:".$dimensiune."'});\n";
			echo "locs.push(mrk);\n";
			echo "dmns.push(${dimensiune});\n";
		}
		
	    echo "locs.forEach(function(value) {
	        var lcs2 = dmns.shift();
	        google.maps.event.addListener(value,'click', function() {
				map.setCenter(value.getPosition());
				map.setZoom(lcs2);
	    });
	    });";

		
		
echo "

	}
	</script>
	<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDMW3emFldRy1MHgzRKiHbEg-w5ax-j2dA&callback=initMap'async defer></script>
</body>
</html>
";
?>