<?php
if ($args['past_year'] === true) {
    // Get posts from the past year
    $date_query = array(
        array(
            'after' => '1 year ago',
        )
    );
} elseif ($args['all_years'] === true) {
    // Get posts from all years
    $date_query = null;
} else {
    // Get posts from the specified year
    $date_query = array(
        array(
            'year' => $year,
        )
    );
}
?>