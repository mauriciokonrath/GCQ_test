<?php
$accepts = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
if (in_array($accepts[0], array('pt-BR', 'pt-PT'))) { 
	header("Location: https://qubox.ufsc.br/index.html");
} else {
        header("Location: https://qubox.ufsc.br/en/index.html");
}
?>

