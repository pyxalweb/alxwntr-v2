<?php
if ($args['date'] === true) {
    // Get posts from the last year
    $posts_date = array(
        array(
            'after' => '1 year ago',
        )
    );
} else {
    // Get posts from the specified year
    $posts_date = array(
        array(
            'year' => $year,
        )
    );
}
?>