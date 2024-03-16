<?php
/**
 * Title: Code - PHP
 * Slug: code-php
 * Description: Display code with PHP syntax highlighting.
 * Categories: 
 * Keywords: code, php
 * Viewport Width: 960
 * Block Types:
 * Post Types:
 * Inserter: true
 */

?>

<!--
wp:group {
    "style":{
        "spacing":{
            "margin":{
                "top":"0",
                "bottom":"var:preset|spacing|2"
            }
        }
    },
    "layout":{
        "type":"constrained"
    },
    "metadata":{
        "name":"Code - PHP"
    }
}
-->
<div class="wp-block-group" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--2)">
    <!-- wp:heading --><h2 class="wp-block-heading">PHP</h2><!-- /wp:heading -->
    <!-- wp:code {
        "className":"language-php"
    } -->
    <pre class="wp-block-code language-php">
        <code>function whatever() { ... }</code>
    </pre>
    <!-- /wp:code -->
</div><!-- /wp:group -->
