<?php

include '../includes/config/config.php';

if (isset($_POST["category_id"])) {
    $parent_id = $_POST["category_id"];
    $sql = 'SELECT * FROM category WHERE category_id = "'.$parent_id.'"';
    $result=$conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        ?>
        <div id="category_selected_path_label_container">
            <p id="category_selected_path_label">E Zgjedhur:</p>
        </div>
        <div id="category_selected_path_category">
            <span><?= $row['category_name']?></span>
        </div>
        <?php
    }
}
if (isset($_POST["subcategory_id"])) {
    $parent_id = $_POST["subcategory_id"];
    $sql = 'SELECT * FROM category WHERE category_id = "'.$parent_id.'"';
    $result=$conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        ?>
        <span id="category_path_arrow_subcategory" class="category_path_arrow"><img src="assets/icons/dropdown-arrow.svg" alt=""></span><span id="category_path_subcategory"><?= $row['category_name']?></span>
        <?php
    }
}
if (isset($_POST["second_subcategory_id"])) {
    $parent_id = $_POST["second_subcategory_id"];
    $sql = 'SELECT * FROM category WHERE category_id = "'.$parent_id.'"';
    $result=$conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        ?>
        <span id="category_path_arrow_second_subcategory" class="category_path_arrow"><img src="assets/icons/dropdown-arrow.svg" alt=""></span><span id="category_path_second_subcategory"><?= $row['category_name']?></span>
<?php
}
}
?>
