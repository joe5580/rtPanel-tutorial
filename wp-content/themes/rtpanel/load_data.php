<?php
require("../../../wp-load.php");
if($_POST['page'])
{
$page = $_POST['page'];
$cur_page = $page;
$page -= 1;
$per_page = 5; // Per page records
$previous_btn = true;
$next_btn = true;
$first_btn = false;
$last_btn = false;
$start = $page * $per_page; 


$query_pag_data = "select p.*
from wp_posts p, wp_terms t, wp_term_taxonomy tt, wp_term_relationships tr,
wp_terms t2, wp_term_taxonomy tt2, wp_term_relationships tr2,
wp_terms t3, wp_term_taxonomy tt3, wp_term_relationships tr3

where p.id = tr.object_id and t.term_id = tt.term_id and tr.term_taxonomy_id = tt.term_taxonomy_id

and p.id = tr2.object_id and t2.term_id = tt2.term_id and tr2.term_taxonomy_id = tt2.term_taxonomy_id

and p.id = tr3.object_id and t3.term_id = tt3.term_id and tr3.term_taxonomy_id = tt3.term_taxonomy_id

and (tt.taxonomy = 'category' and tt.term_id = t.term_id and t.name = 'News')

and p.post_type = 'post' LIMIT $start, $per_page";

//$query_pag_data = "SELECT * FROM  wp_posts where post_type = 'post' LIMIT $start, $per_page ";
$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());


$msg = "";

while ($row = mysql_fetch_array($result_pag_data)) {
$msg .= "<li><a href=''>" . $row['post_title']. "</a></li>";
}
$msg = "<div class='sidebarContent'><ul>" . $msg . "</ul></div>"; // Content for Data
/* -----Total count--- */

$query_pag_num = "SELECT COUNT(*) AS count FROM wp_posts where post_type = 'post'";
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count = $row['count'];
$no_of_paginations = ceil($count / $per_page);
/* -----Calculating the starting and endign values for the loop----- */

/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */

$msg .= "<div  id='pagination' class='pagination'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active news_pre'></li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive news_pre'></li>";
}


// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active news_next'></li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive news_next'></li>";
}


$msg = $msg . "</ul> <a id='more_news' href='".home_url()."/news/'>More News</a></div>";  // Content for pagination
echo $msg;
}
?>