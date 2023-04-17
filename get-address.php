<?php

    include 'includes/config/config.php';

    $provider_id = $_POST['selectedProviderId'];

    $sql = "SELECT * FROM address WHERE provider_id = '".$provider_id."' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        ?>
        <div id="course_location_container">
            <div class="row">
                <div id="course_online_status_container" class="col-sm-6">
                    <label class="form-label" for="course_online_status">Zgjedh Statusin e kursit <span id="required_star">*</span></label>
                    <select class="form-select" id="course_online_status" name="course_online_status">
                        <option value="">Zgjedh</option>
                        <option value="off">Fizikisht</option>
                        <option value="on">Online</option>
                        <option value="both">Fizikisht & Online</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" id="show_addresses" style="display: none">
                    <p id="course_location_label">Në cilat lokacione gjendët ky kurs <span id="required_star">*</span></p>
                    <?php
                    $count = 1;
                    while ($row=$result->fetch_assoc()) {
                        ?>
                        <div id="course_address_row">
                            <div>
                                <input type="checkbox" id="course_location_<?= $count ?>" class="course_location" value="<?= $row['address_id']?>" name="course_located[]">
                            </div>
                            <label class="form-label" for="course_location_<?= $count ?>">
                                Pika <?=$count++?>,
                                <?php
                                $sql_city = 'SELECT * FROM city WHERE city_id = "'. $row['city_id'] .'"';
                                $result_city = $conn->query($sql_city);
                                while ($row_city=$result_city->fetch_assoc()) {
                                    ?>
                                    <?= $row_city['city_name']?>
                                    <?php
                                }
                                ?>
                                (<a id="course_google_maps_link" href=""><?= $row['address']?></a>)
                            </label>
                        </div>
                        <?php
                    }
                    ?>
                    <input type="text" id="course_location_hidden" name="course_location_hidden">
                </div>
            </div>
        </div>
        <?php
    }else{
        ?>

        <?php
    }
?>