<?php

include 'includes/config/config.php';

$cityNumber = $_POST['cityNumber'];

?>

<div id="new_city_inputs_<?= $cityNumber ?>" class="city_inputs_container">
    <div class="row">
        <div id="provider_city_container" class="col-sm-6">
            <label class="form-label" for="select_provider_city">Qyteti <span id="required_star">*</span></label>
            <select class="form-select" id="select_provider_city" name="provider_city[]">
                <option value="">Zgjedh qytetin</option>
                <?php
                $sql = "SELECT * FROM city ORDER BY city_name";
                $result = $conn->query($sql);
                while ($row=$result->fetch_assoc()) {
                    ?>
                    <option value="<?= $row['city_id'];?>"><?= $row['city_name'];?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div id="provider_email_container" class="col-sm-6">
            <label class="form-label" for="provider_email">Email</label>
            <input type="email" class="form-control" id="provider_email" name="provider_email[]" placeholder="Shëno këtu">
        </div>
    </div>
    <div id="new_towns_input_container_<?= $cityNumber ?>" >
        <div class="row">
            <div id="provider_towns_quantity" class="col-sm-6">
                <label>Sa pika janë në këtë qytet</label>
                <div id="provider_towns_quantity_container">
                    <input type='button' id="delete_town" value='-' class='qtyminus minus' field='quantity' />
                    <input type='number' name='quantity' value='1' class='qty' id="towns_quantity" readonly/>
                    <input type='button' id="add_town" value='+' class='qtyplus plus' field='quantity' />
                </div>
            </div>
        </div>
        <div id="new_town_inputs_<?= $cityNumber ?>" class="new_town_inputs">
            <div class="row">
                <div id="provider_address_container" class="col-sm-6">
                    <label class="form-label" for="provider_address">Adresa e pikës 1 <span id="required_star">*</span></label>
                    <input type="text" class="form-control" id="provider_address" name="provider_address_<?= $cityNumber ?>[]" placeholder="Shëno adresen">
                </div>
                <div id="provider_google_maps_location_container" class="col-sm-6">
                    <label class="form-label" for="provider_google_maps_location" id="provider_google_maps_location_label">Lokacioni në Google Maps</label>
                    <input type="text" class="form-control" id="provider_google_maps_location" name="provider_google_maps_location_<?= $cityNumber ?>[]" placeholder="Linku i Google Maps">
                </div>
            </div>
            <div class="row">
                <label id="phone_label" class="form-label">Numri i telefonit në këtë pikë</label>
                <div id="provider_phone_container" class="col-sm-4">
                    <input type="text" class="form-control" id="provider_phone_number" name="provider_phone_number_<?= $cityNumber ?>_1[]" placeholder="Shëno numrin">
                </div>
                <div id="provider_phone_container" class="col-sm-4">
                    <input type="text" class="form-control" id="provider_phone_number" name="provider_phone_number_<?= $cityNumber ?>_1[]" placeholder="Shëno numrin">
                </div>
                <div id="provider_phone_container" class="col-sm-4">
                    <input type="text" class="form-control" id="provider_phone_number" name="provider_phone_number_<?= $cityNumber ?>_1[]" placeholder="Shëno numrin">
                </div>
            </div>
        </div>
    </div>
</div>