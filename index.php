<?php
/* weiwuer.xyz (C) 2022 */
$Title = "weiwuer.xyz";
?>

<html>
<head>
<title><?php echo($Title); ?></title>
<style>
    section,section2,section3 {
        outline: 1px solid grey;
        display: inline-block;
        padding: 10px;
        margin: 10px;
        max-width: 500px;
    }

    section {
        border-right: black 2px solid;
        border-bottom: black 2px solid;
		width: inherit;
    }
    section2 {
		background: #feff9c;
        border-right: lightgrey 2px solid;
        border-bottom: lightgrey 2px solid;
        border-radius: 10px;
		width: inherit;
    }
    section3 {
		font-family: tahoma;
		background: lightgrey;
        border-right: lightgrey 3px solid;
        border-bottom: lightgrey 2px solid;
		width: inherit;
    }

	.small {
		font-size: 12px;
	}
</style>
</head>

<body>
<h1><?php echo($Title); ?></h1>
<a href="Files/Soldiers_from_Karasahr,_8th_century.jpg"><img src="Files/Soldiers_from_Karasahr,_8th_century.jpg" width=300px></a>
<hr>

<?php 
$Articles = glob("Articles/*.html");
usort($Articles, function($a, $b) { return filemtime($b) - filemtime($a); });
foreach($Articles as &$Article) {
    $RandomInteger = rand(0, 10);
    if ($RandomInteger % 3 == 0) {
        $SectionTag = "section";
    } elseif ($RandomInteger % 3 == 1) {
        $SectionTag = "section2";
    } else {
        $SectionTag = "section3";
    }

    echo "<$SectionTag>\n";
    echo "<a href=\"$Article\">$Article</a>\n";
    include "$Article";
    echo "</$SectionTag>\n";
}
?>
<hr>
<?php include "PHPModules/Footer.html"; ?>
</body>
</html>
