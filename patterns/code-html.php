<?php
/**
 * Title: Code - HTML
 * Slug: code-html
 * Description: Display code with HTML syntax highlighting.
 * Categories: 
 * Keywords: code, html
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
        "name":"Code - HTML"
    }
}
-->
<div class="wp-block-group" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--2)">
    <!-- wp:heading --><h2 class="wp-block-heading">HTML</h2><!-- /wp:heading -->
    <!-- wp:code {
        "className":"language-html"
    } -->
    <pre class="wp-block-code language-html">
        <code>&lt;div class="whatever"&gt; ... &lt;/div&gt;</code>
    </pre>
    <!-- /wp:code -->
</div><!-- /wp:group -->
