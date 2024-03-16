<?php
/**
 * Title: Code - CSS
 * Slug: code-css
 * Description: Display code with CSS syntax highlighting.
 * Categories: 
 * Keywords: code, css
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
        "name":"Code - CSS"
    }
}
-->
<div class="wp-block-group" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--2)">
    <!-- wp:heading --><h2 class="wp-block-heading">CSS</h2><!-- /wp:heading -->
    <!-- wp:code {
        "className":"language-css"
    } -->
    <pre class="wp-block-code language-css">
        <code>.whatever { ... }</code>
    </pre>
    <!-- /wp:code -->
</div><!-- /wp:group -->
