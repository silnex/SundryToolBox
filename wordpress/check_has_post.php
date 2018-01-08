<?php
/* get post name from URI */
function getPostName($URI){
    $out = explode("/",$URI);
    $a = 3;   // defend from Infinite loop
    do {
    $postName = array_pop($out);
    $postName = preg_replace("/\s+/","", $postName);
    $a = $a - 1;
    } while ($postName === "" && $a > 0);
    if ($a < 0)
        $postName = "";
    return $postName;
}

function CheckPost(){
    $host = "https://blog.silnex.kr/";  // url to move | if use https, must need openssl
    $postName = getPostName($_SERVER['REQUEST_URI']);  // get post name
    $link = $host.$postName."/";
    $header = get_headers($link);
    if($header[0] === "HTTP/1.1 200 OK"){
        header("Location: $link");  // redirecting
    }
}

// CheckPost();
