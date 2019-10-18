<?php
$text = file_get_contents( 'https://www.nbkr.kg/index1.jsp?item=2747&lang=RUS' );
$content_utf = mb_convert_encoding($text, 'HTML-ENTITIES', 'UTF-8');
$dom = new domDocument;
@$dom->loadHTML($content_utf);
$dom->preserveWhiteSpace = false;
$tables = $dom->getElementsByTagName('table');
$tr = $tables->item(0)->getElementsByTagName('tr');
$rows = $tables->item(0)->getElementsByTagName('tr');
$content = "<div style='background:red;' '>";
$content2 = "</div>";
$content3 = "<br>";
for($i=0;$i<6;$i++)
    {


        $item = $rows->item($i)->getElementsByTagName('td');
        foreach ($item as $ff){
            echo $content;
            echo $dom->saveXML($ff);
            echo $content2;
        }
        echo $content3;

    }

?>
