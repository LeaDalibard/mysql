<?php

function getAPI()
{
    $content = trim(file_get_contents("https://api.thecatapi.com/v1/images/search"));
    $decoded = json_decode($content, true);
    return $decoded[0]['url'];
}
