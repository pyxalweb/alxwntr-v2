<?php
/**
 * Title: Layout - Intro
 * Slug: layout-intro
 * Description: Two column layout with text and an image slideshow.
 * Categories: 
 * Keywords: layout, columns, intro, image, photo, slideshow
 * Viewport Width: 960
 * Block Types:
 * Post Types:
 * Inserter: true
 */

?>

<!--
wp:columns {
    "className":"intro"
}
-->
<div class="wp-block-columns intro">
    <!--
    wp:column {
        "width":"66.66%"
    }
    -->
    <div class="wp-block-column" style="flex-basis:66.66%">
        <!-- wp:heading --><h2 class="wp-block-heading">I'm Alex Winter, a web developer in Portland, Oregon.</h2><!-- /wp:heading -->
        <!-- wp:paragraph --><p>For over a decade, I've built hundreds of websites for small and medium-sized businesses. I'm well-versed in various web technologies, with a primary focus on front-end web development using HTML, CSS, and JavaScript. In addition to my technical background, I also have several years of experience as a project manager overseeing teams of designers and developers. Feel free to request my resume for more details.</p><!-- /wp:paragraph -->
    </div><!-- /wp:column -->
    <!--
    wp:column {
        "width":"33.33%"
    }
    -->
    <div class="wp-block-column" style="flex-basis:33.33%">
        <!--
        wp:acf/image-slideshow {
            "name":"acf/image-slideshow",
            "data":{
                "images_0_image":957,
                "_images_0_image":"field_6594b17e55b82",
                "images_1_image":959,
                "_images_1_image":"field_6594b17e55b82",
                "images_2_image":958,
                "_images_2_image":"field_6594b17e55b82",
                "images":3,
                "_images":"field_6594b0f455b81",
                "slide_interval":"4",
                "_slide_interval":"field_6594e47089278",
                "controls_arrows":"0",
                "_controls_arrows":"field_6594e79e24c36",
                "controls_dots":"0",
                "_controls_dots":"field_65a8e1077d3e1",
                "controls":"",
                "_controls":"field_65a8dc6cf77ed",
                "display_image_shape":"circular",
                "_display_image_shape":"field_6594dbc9c4a20",
                "display_alignment":"0",
                "_display_alignment":"field_65ab4a938be87",
                "display":"",
                "_display":"field_65ab49c88be86"
            },
            "mode":"preview"
        }
        /-->
    </div><!-- /wp:column -->
</div><!-- /wp:columns -->
