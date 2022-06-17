<?php
/* weiwuer.xyz (C) 2022 */
$MetadataTitle = "https://weiwuer.xyz";
$MetadataDescription = "A tiny PHP blog. No database, simple in design, varied topics.";
?>

<html>
<head>
<title><?php echo($MetadataTitle); ?></title>
<meta name="description" content="<?php echo($MetadataDescription); ?>">
<style>
    section,section2,section3 {
        display: inline-block;
        max-width: 500px;
        outline: 1px solid grey;
        margin: 10px;
        padding: 10px;
    }

	.Title:hover:after {
		content: " 🧠";
		font-size: 24px;
	}

    .ArticleLink::before {
		content: "🔗";
		font-size: 12px;
	}
    section {
        border-right: black 2px solid;
        border-bottom: black 2px solid;
		background: beige;
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
		font-family: "Tahoma";
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
<?php include "PHPModules/Menu.php"; ?>

<h1 class=Title><i><?php echo($MetadataTitle); ?></i></h1>
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
    echo "<a class=ArticleLink href=\"$Article\">$Article</a>\n";
    include "$Article";
    echo "</$SectionTag>\n";
}
?>
<hr>
<?php include "PHPModules/Footer.html"; ?>
</body>
</html>
