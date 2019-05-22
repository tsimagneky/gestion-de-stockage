<?php
    if (isset($_POST["inscr"])) {
        echo "Inscription effectue avec succes";
    } else {
        header('Location: ' . "index.html");
    }
?>