<?php
require "./vendor/autoload.php";

use DiDom\Document;

$start = readline("enter id to start from: \n ");
$end = readline("enter id to stop at: \n ");
$total = $end - $start + 1;
for ($i = $start; $i <= $end; $i++) {
    $document = new Document("https://xkcd.com/{$i}/", true);
    $url = $document->find('#comic')[0]->children()[1]->src;
    $title = $document->first('head')->first('title')->text();
    $file_name = str_replace('xkcd:-','', join('-', explode(' ', $title)));
    file_put_contents("./downloads/{$file_name}.jpg", file_get_contents("https:{$url}"));
    echo ("$file_name downloaded successfully. \n");
}

echo ("Total $total files downloaded successfully. \n");



