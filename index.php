<html>
  <header>
    <link href="prettify.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="prettify.js"></script>
  </header>
  <body>
<?php


/*
 *
 * author: koma5
 * mail: marco@5th.ch
 * inspired by: http://blog.fefe.de/
 * "a nerds way of reading a website..."
 *
 */
 
 $localSitePath = "/code2html/class.loadHTML.php?q=";
 
 $requestedURL = $_SERVER["REQUEST_URI"]; // ankers will not be in the URI '#'
 
 $url = substr($requestedURL, strlen($localSitePath));
 
 $rawContent = file_get_contents($url);
 
 $escapedHTML = htmlspecialchars($rawContent);

 //echo $escapedHTML;
 
  echo "<pre><code>". urls2links($escapedHTML)."</code></pre>";
 

 
 function urls2links($input, $localSitePath) {
  $input = preg_replace("/href=&quot;([^h][^t][^t][^p].{1,20})&quot;/i", "href=&quot;<a href=\"".$localSitePath.$url."\\1\">\\1</a>&quot;", $input);
  //$input = preg_replace("/(href=&quot;[^h][^t][^t][^p]\?{1,20})/i", "<strong>\\1</strong>", $input);
  return $input;
 }

 
 ?>
  </body>
</html>