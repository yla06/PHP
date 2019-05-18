<?php
 require_once 'bootstrap.php';
 
 $categories = array();
if ($result = mysql_query('SELECT * FROM shop_categories')) {
    while($tmp = mysql_fetch_assoc($result)) {
        $categories[] = $tmp;
    }
    mysql_close($link);
}
?>

<ul class="category">
    <li class="item">
    <?php
        foreach($categories AS $category) {
                echo ' <a href="?cat=' . $category['categories_id'] . '" class="item">' . $category['categories_title'] . '</a>';
        }
    ?>
        </li>
</ul>
 

