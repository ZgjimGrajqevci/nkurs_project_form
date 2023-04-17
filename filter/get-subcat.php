<?php
include "../includes/config/config.php";

if (isset($_POST["category_id"])){
    $parent_id = $_POST["category_id"];
    $sql = 'SELECT * FROM category WHERE parent_category_id = "'.$parent_id.'"';
    $parent=$conn->query($sql);
    $row = $parent->fetch_assoc();
    if (!empty($row)){
        ?>
        <div id="subcategory_list_container">
            <div id="subcategory_back">
                <button id="subcategory_back_btn">
                    <img src="assets/icons/dropdown-arrow.svg" alt="">
                    <?php
                    $sql_cat = 'SELECT * FROM category WHERE category_id = "'. $parent_id .'"';
                    $category=$conn->query($sql_cat);
                    while ($cate=$category->fetch_assoc()){
                        echo $cate['category_name'];
                    }
                    ?>
                </button>
            </div>
            <div id="subcategory_list_categories">
                <ul>
                    <?php
                    $query = 'SELECT * FROM category WHERE parent_category_id = "'.$parent_id.'"';
                    $result=$conn->query($query);
                    while($row=$result->fetch_assoc()){
                        ?>
                        <li>
                            <input type="radio" class="subcategory" id="<?= $row['category_id'] .'_'. $row['category_name'];?>" name="subcategory" value="<?= $row['category_id'];?>">
                            <label for="<?= $row['category_id'] .'_'. $row['category_name'];?>"><?= $row['category_name'];?></label>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
            <?php
    }else{

    }
}
if (isset($_POST["subcategory_id"])){
    $parent_id = $_POST["subcategory_id"];

    $sql = 'SELECT * FROM category WHERE parent_category_id = "'.$parent_id.'"';
    $parent=$conn->query($sql);
    $row = $parent->fetch_assoc();
    if (!empty($row)){
        ?>
        <div id="second_subcategory_list_container">
            <div id="second_subcategory_back">
                <button id="second_subcategory_back_btn">
                    <img src="assets/icons/dropdown-arrow.svg" alt="">
                    <?php
                    $sql_subcat = 'SELECT * FROM category WHERE category_id = "'. $parent_id .'"';
                    $category=$conn->query($sql_subcat);
                    while ($cate=$category->fetch_assoc()){
                        echo $cate['category_name'];
                    }
                    ?>
                </button>
            </div>
            <div id="second_subcategory_list_categories">
                <ul>
                    <?php
                    $query = 'SELECT * FROM category WHERE parent_category_id = "'.$parent_id.'"';
                    $result=$conn->query($query);
                    while($row=$result->fetch_assoc()){
                        ?>
                        <li>
                            <input type="radio" class="second_subcategory" id="<?= $row['category_id'] .'_'. $row['category_name'];?>" name="second-subcategory" value="<?= $row['category_id'];?>">
                            <label for="<?= $row['category_id'] .'_'. $row['category_name'];?>"><?= $row['category_name'];?></label>
                        </li>
                            <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php
    }else{

    }
}
?>