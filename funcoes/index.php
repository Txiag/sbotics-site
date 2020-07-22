<?php
if (isset($_COOKIE["Linguagem"])) {
    switch ($_COOKIE["Linguagem"]) {
        case 'reduc':
            header('Location: reduc.php');           
            break;
        case 'csharp':
            header('Location: csharp.php');
            break;
        default:
            header('Location: reduc.php');
            break;
    }
} else {
    header('Location: reduc.php');
}
