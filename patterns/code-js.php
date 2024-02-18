<?php
/**
 * Title: Code - JS
 * Slug: code-js
 * Description: Display code with JavaScript syntax highlighting.
 * Categories: alxwntr/code
 * Keywords: code, js, javascript
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
        "name":"Code - JS"
    }
}
-->
<div class="wp-block-group" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--2)">
    <!-- wp:heading --><h2 class="wp-block-heading">JavaScript</h2><!-- /wp:heading -->
    <!-- wp:code {
        "className":"language-js"
    } -->
    <pre class="wp-block-code language-js">
        <code>const whatever = () => { ... };</code>
    </pre>
    <!-- /wp:code -->
</div><!-- /wp:group -->
