<?php
include "../includes/config/config.php";

if (isset($_POST["category"])){
    $category = implode("','", $_POST['category']);

    $sql = 'SELECT * FROM category WHERE category_id = "'.$category.'"';
    $cat=$conn->query($sql);
    while($cate=$cat->fetch_assoc()){

        if (isset($_POST["subcategory"])){
            $subcategory = implode("','", $_POST['subcategory']);

            $sql2 = 'SELECT * FROM category WHERE category_id = "'.$subcategory.'"';
            $subcat=$conn->query($sql2);
            while($subcate=$subcat->fetch_assoc()){
                if (isset($_POST["second_subcategory"])){
                    $second_subcategory = implode("','", $_POST['second_subcategory']);

                    $sql3 = 'SELECT * FROM category WHERE category_id = "'.$second_subcategory.'"';
                    $sec_subcat=$conn->query($sql3);
                    while($sec_subcate=$sec_subcat->fetch_assoc()){
                        ?>
                            <div id="course_category_path">
                                <ul id="course_category_path_container">
                                    <input type="text" id="selected_category_id" name="selected_category_id[]" value="<?= $cate['category_id'];?>" readonly>
                                    <input type="text" id="selected_category_id" name="selected_category_id[]" value="<?= $subcate['category_id'];?>" readonly>
                                    <input type="text" id="selected_category_id" name="selected_category_id[]" value="<?= $sec_subcate['category_id'];?>" readonly>
                                    <span id="selected_category_path">
                                        <?php
                                        echo $cate['category_name'].' '.
                                            file_get_contents("../assets/icons/dropdown-arrow.svg").
                                            $subcate['category_name']
                                        .' '. file_get_contents("../assets/icons/dropdown-arrow.svg")
                                        . $sec_subcate['category_name']
                                        .' '
                                        ?>
                                        <img src="assets/icons/x.svg" alt="" id="remove_category_path">
                                    </span>
                                </ul>
                            </div>
                        <?php
                    }
                }
                else{
                    ?>
                    <div id="course_category_path">
                        <ul id="course_category_path_container">
                            <input type="text" id="selected_category_id" name="selected_category_id[]" value="<?= $cate['category_id'];?>" readonly>
                            <input type="text" id="selected_category_id" name="selected_category_id[]" value="<?= $subcate['category_id'];?>" readonly>
                            <span id="selected_category_path">
                                <?php
                                echo $cate['category_name']
                                . ' ' .
                                file_get_contents("../assets/icons/dropdown-arrow.svg") . $subcate['category_name']
                                    .' '
                                ?>
                                 <img src="assets/icons/x.svg" alt="" id="remove_category_path">
                            </span>
                        </ul>
                    </div>
                        <?php
                }
            }
        }
        else{
            ?>
            <div id="course_category_path">
                <ul id="course_category_path_container">
                    <input type="text" id="selected_category_id" name="selected_category_id[]" value="<?= $cate['category_id'];?>" readonly>
                    <span id="selected_category_path">
                        <?php
                        echo $cate['category_name']
                        . ' '
                        ?>
                        <img src="assets/icons/x.svg" alt="" id="remove_category_path">
                    </span>
                </ul>
            </div>
                    <?php
        }
    }
}
?>