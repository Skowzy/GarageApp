<?php

function dump($element)
{
echo "<div style='border:1px solid #ccc; padding:10px; margin:10px;background-color: #fff;'>";
    echo "<strong>Type:</strong> " . gettype($element) . "<br>";
    echo "<strong>Content:</strong> <pre>";

    if (is_array($element) || is_object($element)) {
        echo htmlspecialchars(print_r($element, true));
    } else {
        echo htmlspecialchars(var_export($element, true));
    }

    echo "</pre></div>";
}