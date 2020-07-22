<?php
if (isset($_COOKIE["Linguagem"])) {
    switch ($_COOKIE["Linguagem"]) {
        case 'reduc':
            header('Location: reduc');           
            break;
        case 'csharp':
            header('Location: csharp');
            break;
        default:
            header('Location: reduc');
            break;
    }
} else {
    header('Location: reduc');
}
