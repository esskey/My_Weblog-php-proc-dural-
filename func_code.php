<?php

function bbcodereplace($code) {

$code = htmlspecialchars($code);
$code = preg_replace('#\[b\](.+)\[/b\]#isU', '<span style="font-weight:bold">$1</span>', $code);
$code = preg_replace('#\[i\](.+)\[/i\]#isU', '<span style="font-style:italic;">$1</span>', $code);
$code = preg_replace('#\[u\](.+)\[/u\]#isU', '<span style="text-decoration:underline;">$1</span>', $code);
$code = preg_replace('#\[img\](.+)\[/img\]#isU', '<img src="$1"/>', $code);

return $code;

}

?>