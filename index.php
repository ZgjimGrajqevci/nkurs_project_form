<?php
session_start();

$title = 'forms';

include 'includes/config/config.php';

include 'includes/header.php';

include 'includes/navbar.php';

    ?>
    <div id="layout-wrapper" class="container">
        <div id="first_section" class="row">
            <div id="first_section_txt" class="col-sm-7">
                <p>Nëse dëshironi që kursi juaj të shfaqet në platformen nkurs, është FALAS!<br>
                    Dhe nuk ju merr kohë më shumë se 10 minuta.</p>
            </div>
            <div id="first_section_img" class="col-sm-5">
                <img src="assets/images/hologram-off.png" alt="">
            </div>
        </div>
        <div id="first_line">
            <img src="assets/images/connecting-line-long.png" alt="" id="connecting_line_long">
            <img src="assets/images/connecting-line-short.png" alt="" id="connecting_line_short">
        </div>
        <div id="second_section" class="row">
            <div id="second_section_img" class="col-sm-5">
                <img src="assets/images/hologram-on.png" alt="">
            </div>
            <div id="second_section_txt" class="col-sm-7">
                <p>Vetëm shikojeni videon se si ta regjistroni kursin tuaj në platformë.</p>
            </div>
        </div>
        <div id="second_line">
            <img src="assets/images/connecting-line-medium.png" alt="" id="connecting_line_medium">
            <img src="assets/images/connecting-line-short-second.png" alt="" id="connecting_line_short_second">
        </div>
        <div id="third_section">
<!--            <iframe src="https://www.youtube.com/embed/dFlDRhvM4L0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
        </div>
        <div id="contact_alert">
            <div id="contact_alert_container">
                <div id="contact_alert_svg">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 99.3 99.4" style="enable-background:new 0 0 99.3 99.4;" xml:space="preserve">
                        <g>
                            <g>
                                <path class="st0" d="M49.5,98.4c-27,0-49-22-49-49s22-49,49-49s49,22,49,49S76.5,98.4,49.5,98.4z M49.5,6.9
                                    C26.1,6.9,6.9,26,6.9,49.5s19.1,42.6,42.6,42.6S92.1,73,92.1,49.5S73,6.9,49.5,6.9z"/>
                            </g>
                            <g>
                                <path class="st0" d="M57,74.1H42.1c-2.3,0-4.2-1.9-4.2-4.2v-4c0-2.3,1.8-4.1,4-4.2v-6.3c-2.2-0.1-4-2-4-4.2v-4
                                    c0-2.3,1.9-4.2,4.2-4.2h10.8c2.3,0,4.2,1.9,4.2,4.2v14.6c2.2,0.1,4,2,4,4.2v4C61.2,72.1,59.3,74.1,57,74.1z M42.3,69.6h14.4V66h-4
                                    V47.1H42.3v3.6h4V66h-4V69.6z"/>
                            </g>
                            <g>
                                <path class="st0" d="M49.5,41.7c-5.1,0-9.3-4.2-9.3-9.3c0-5.1,4.2-9.3,9.3-9.3c5.1,0,9.3,4.2,9.3,9.3
                                    C58.8,37.5,54.7,41.7,49.5,41.7z M49.5,27.6c-2.7,0-4.9,2.2-4.9,4.9s2.2,4.9,4.9,4.9s4.9-2.2,4.9-4.9S52.2,27.6,49.5,27.6z"/>
                            </g>
                        </g>
                    </svg>
                </div>
                <div id="contact_alert_txt">
                    <p>Nëse keni ndojnë paqartësi mos hezitoni të na kontaktoni</p>
                </div>
            </div>
        </div>
        <div id="forms_container">
            <div id="form_tabs">
                <ul class="nav" role="tablist">
                    <li id="landing_page_tab">
                        <a id="registerProfileForm" data-bs-toggle="tab" href="#provider_form_container" role="tab"><span>Regjistro Profilin</span></a>
                    </li>
                    <li id="landing_page_divider">
                        <span id="divider"></span>
                        <hr id="divider_horizontal">
                    </li>
                    <li id="landing_page_tab">
                        <a id="addCourseForm" data-bs-toggle="tab" href="#course_form_container" role="tab"><span>Shto një kurs të ri</span></a>
                    </li>
                </ul>
            </div>
            <div id="forms" class="tab-content">
                <div id="provider_form_container" class="tab-pane" role="tabpanel">
                    <form id="provider_form" action="add-form-data.php" method="post" enctype="multipart/form-data">
                        <ul id="provider_form_steps">
                            <li class="step active">Emri</li>
                            <li class="step">Rrjete<br> Sociale</li>
                            <li class="step">Foto</li>
                            <li class="step">Lokacioni</li>
                        </ul>
                        <div class="tab">
                            <div class="row">
                                <div id="provider_name_container" class="col-sm-6">
                                    <label class="form-label" for="provider_name">Emri i ofruesit të kursit <span id="required_star">*</span></label>
                                    <input type="text" class="form-control" id="provider_name" name="provider_name" placeholder="Shëno këtu" autocomplete="off">
                                </div>
                                <div id="provider_type_container" class="col-sm-6">
                                    <label class="form-label" for="provider_type">Zgjedh llojin <span id="required_star">*</span></label>
                                    <select class="form-select" id="provider_type" name="provider_type">
                                        <option value="">Zgjedh</option>
                                        <option value="org">Organizatë</option>
                                        <option value="ind">Instruktor/Individ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="instructor_title_container" style="display: none;">
                                <div class="col-sm-12">
                                    <label class="form-label" for="instructor_title">Titulli (profesioni) <span id="required_star">*</span></label>
                                    <input type="text" class="form-control" id="instructor_title" name="instructor_title" placeholder="Shëno këtu" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div id="website_url_container" class="col-sm-6">
                                    <label class="form-label" for="website_url">Website</label>
                                    <input type="text" class="form-control" id="website_url" name="website_url" placeholder="Linku i Website-it" autocomplete="off">
                                </div>
                                <div id="facebook_url_container" class="col-sm-6">
                                    <label class="form-label" for="facebook_url">Facebook</label>
                                    <input type="text" class="form-control" id="facebook_url" name="facebook_url" placeholder="Linku i Facebook-ut" autocomplete="off">
                                </div>
                                <div id="instagram_url_container" class="col-sm-6">
                                    <label class="form-label" for="instagram_url">Instagram</label>
                                    <input type="text" class="form-control" id="instagram_url" name="instagram_url" placeholder="Linku i Instagram-it" autocomplete="off">
                                </div>
                                <div id="linkedin_url_container" class="col-sm-6">
                                    <label class="form-label" for="linkedin_url">Linkedin</label>
                                    <input type="text" class="form-control" id="linkedin_url" name="linkedin_url" placeholder="Linku i LinkedIn-it" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div id="provider_description_container" class="col-sm-12">
                                    <label class="form-label" for="provider_description">Përshkrimi</label>
                                    <textarea class="form-control" rows="5" id="provider_description" name="provider_description" placeholder="Shëno këtu"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div id="provider_logo_container" class="col-sm-12">
                                    <label class="form-label" for="provider_logo_path">Logo <span id="required_star">*</span></label>
                                    <input type="file" class="form-control" id="provider_logo_path" name="provider_logo_path" data-buttonname="btn-secondary" accept="image/*">
                                </div>
                            </div>
                            <div class="row">
                                <div id="provider_image_container" class="col-sm-12">
                                    <label class="form-label" for="provider_image_path">Foto</label>
                                    <input type="file" class="form-control" id="provider_image_path" name="provider_image_path[]" data-buttonname="btn-secondary" accept="image/*, image/heic" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div id="provider_status_container" class="col-sm-6">
                                    <label class="form-label" for="provider_status">Zgjedh vijueshmërin <span id="required_star">*</span></label>
                                    <select class="form-select" id="provider_status" name="provider_status">
                                        <option value="">Zgjedh</option>
                                        <option value="off">Vetëm Fizikisht</option>
                                        <option value="on">Vetëm Online</option>
                                        <option value="both">Fizikisht & Online</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="add_new_city" style="display: none;">
                                <div class="col-sm-6">
                                    <label>Në sa qytete keni kurse </label>
                                    <div id="provider_city_quantity_container">
                                        <input type='button' id="delete_city" value='-' class='qtyminus minus' field='quantity' />
                                        <input type='number' name='quantity' value='1' class='qty' id="cities_quantity" readonly/>
                                        <input type='button' id="add_city" value='+' class='qtyplus plus' field='quantity' />
                                    </div>
                                </div>
                            </div>
                            <div id="new_cities_input_container" style="display: none;">
                                <ul id="new_cities_input_tabs">
                                    <li id="city_inputs_tab_1" class="city_inputs_tab"><a href="#new_city_inputs_1">Qyteti 1</a></li>
                                </ul>
                                <div id="new_city_inputs_1" class="city_inputs_container">
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
                                            <input type="email" class="form-control" id="provider_email" name="provider_email[]" placeholder="Shëno këtu" autocomplete="off">
                                        </div>
                                    </div>
                                    <div id="new_towns_input_container_1">
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
                                        <div id="new_town_inputs_1" class="new_town_inputs">
                                            <div class="row">
                                                <div id="provider_address_container" class="col-sm-6">
                                                    <label class="form-label" for="provider_address" id="provider_address_label">Adresa e pikës 1 <span id="required_star">*</span></label>
                                                    <input type="text" class="form-control" id="provider_address" name="provider_address_1[]" placeholder="Shëno adresen" autocomplete="off">
                                                </div>
                                                <div id="provider_google_maps_location_container" class="col-sm-6">
                                                    <label class="form-label" for="provider_google_maps_location" id="provider_google_maps_location_label">Lokacioni në Google Maps</label>
                                                    <input type="text" class="form-control" id="provider_google_maps_location" name="provider_google_maps_location_1[]" placeholder="Linku i Google Maps" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label id="phone_label" class="form-label">Numri i telefonit në këtë pikë</label>
                                                <div id="provider_phone_container" class="col-sm-4">
                                                    <input type="text" class="form-control" id="provider_phone_number" name="provider_phone_number_1_1[]" placeholder="Shëno numrin" autocomplete="off">
                                                </div>
                                                <div id="provider_phone_container" class="col-sm-4">
                                                    <input type="text" class="form-control" id="provider_phone_number" name="provider_phone_number_1_1[]" placeholder="Shëno numrin" autocomplete="off">
                                                </div>
                                                <div id="provider_phone_container" class="col-sm-4">
                                                    <input type="text" class="form-control" id="provider_phone_number" name="provider_phone_number_1_1[]" placeholder="Shëno numrin" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="provider_form_buttons_containers">
                            <div id="provider_form_buttons">
                                <button type="button" id="provider_form_previous" class="previous">Kthehu</button>
                                <button type="button" id="provider_from_next" class="next">Tjetër</button>
                                <button type="submit" id="submit_provider_form" name="submit_provider_form" class="submit action-button">Përfundo</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="course_form_container" class="tab-pane" role="tabpanel">
                    <form id="course_form" action="add-course-from-data.php"  method="POST" enctype="multipart/form-data">
                        <!-- Circles which indicates the steps of the form: -->
                        <ul id="course_form_steps">
                            <li class="step active">Info Bazë</li>
                            <li class="step">Info shtesë</li>
                            <li class="step">Çmimi</li>
                            <li class="step">Lokacioni</li>
                        </ul>
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                            <div class="row">
                                <div id="select_provider_name_container" class="col-sm-6">
                                    <label class="form-label" for="select_provider_name">Zgjedh ofruesin e kursit <span id="required_star">*</span></label>
                                    <select class="form-select" id="select_provider_name" name="select_provider_id" onchange="getProviderId(this.value)">
                                        <option value="">Zgjedh</option>
                                        <?php
                                        $sql = "SELECT provider_id,provider_name FROM provider";
                                        $result = $conn->query($sql);
                                        while ($row=$result->fetch_assoc()) {
                                            ?>
                                            <option value="<?= $row['provider_id'];?>"><?= $row['provider_name'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div id="course_name_container" class="col-sm-6">
                                    <label class="form-label" for="course_name">Emri i kursit <span id="required_star">*</span></label>
                                    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Shëno këtu" autocomplete="off">
                                </div>
                                <div id="course_category_container" class="col-sm-6">
                                    <label for="">Kategoria <span id="required_star">*</span></label> <br>
                                    <button type="button" id="open_category_btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Zgjedh kategoritë <span><?php echo file_get_contents("assets/icons/dropdown-arrow.svg"); ?></span></button>
                                    <input type="text" id="category2" name="category2">
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="example_modal_label" aria-hidden="true">
                                        <div id="course_modal_dialog" class="modal-dialog modal-lg">
                                            <div id="course_modal_content" class="modal-content">
                                                <div id="category_modal_header" class="modal-header">
                                                    <h5 class="modal-title" id="example_modal_label">Kategoritë</h5>
                                                    <button type="button" id="close_category_modal_box_btn" data-bs-dismiss="modal" aria-label="Close"><img src="assets/icons/x.svg" alt="" id="close_category_modal_box"></button>
                                                </div>
                                                <div id="category_modal_body" class="modal-body">
                                                    <div id="category_filters" class="row">
                                                        <div id="category_list" class="col-lg-4">
                                                            <ul>
                                                                <?php
                                                                $sql = "SELECT * FROM category WHERE parent_category_id IS NULL";
                                                                $getCategory = $conn->query($sql);
                                                                while ($category=$getCategory->fetch_assoc()) {
                                                                    ?>
                                                                    <li>
                                                                        <input type="radio" class="category" id="<?= $category['category_id'] .'_'. $category['category_name'];?>" name="category" value="<?= $category['category_id'];?>" >
                                                                        <label for="<?= $category['category_id'] .'_'. $category['category_name'];?>"><?= $category['category_name'];?></label>
                                                                    </li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                        <div id="subcategory_list" class="col-lg-4"></div>
                                                        <div id="second_subcategory_list" class="col-lg-4">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="category_modal_footer" class="modal-footer">
                                                    <div id="category_selected_path"></div>
                                                    <div id="category_footer_buttons">
                                                        <button type="button" id="add_another_category" class="btn" data-bs-dismiss="modal">Tjetër kategori</button>
                                                        <button type="button" id="add_category_path" class="btn"  data-bs-dismiss="modal">Përfundo</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="results"></div>
                                </div>
                            </div>
                            <div class="row" id="another_category" style="display: none">
                                <div class="col-sm-12">
                                    <label class="form-label" for="course_other_category">Shëno kategorinë <span id="required_star">*</span></label></label>
                                    <textarea class="form-control" rows="3" id="course_other_category" name="course_other_category" placeholder="Shëno këtu"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div id="course_image_container" class="col-sm-12">
                                    <label class="form-label" for="course_image">Foto simbolizuese e kursit</label>
                                    <input type="file" class="form-control" id="course_image" name="course_image" data-buttonname="btn-secondary" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div id="course_learn_container" class="col-sm-12">
                                    <label class="form-label" for="course_learn">Shëno se çfarë do të mësoj studenti/nxënësi në këtë kurs</label>
                                    <textarea class="form-control" rows="5" id="course_learn" name="course_learn" placeholder="Shëno këtu"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div id="course_requirements_container" class="col-sm-12">
                                    <label class="form-label" for="course_requirements">Çfarë kërkesa ka për këtë kurss</label>
                                    <textarea class="form-control" rows="5" id="course_requirements" name="course_requirements" placeholder="Shëno kërkesat"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div id="course_info_container" class="col-sm-12 mb-3">
                                    <label class="form-label" for="course_info">Përshkrimi rreth këti kursi</label>
                                    <textarea class="form-control" rows="5" id="course_info" name="course_info" placeholder="Shëno këtu"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div id="course_new_price_inputs_container">
                                <div id="course_add_price_offers" class="row">
                                    <div class="col-sm-6">
                                        <label for="">Sa oferta i keni</label>
                                        <div id="course_offers">
                                            <input type='button' id="delete_price" value='-' class='qtyminus minus' field='quantity'/>
                                            <input type='number' name='quantity' value='1' class='qty' id="prices_quantity" readonly/>
                                            <input type='button' id="add_price" value='+' class='qtyplus plus' field='quantity'/>
                                        </div>
                                    </div>
                                </div>
                                <div id="course_new_price_inputs_1">
                                    <div class="row">
                                        <div id="course_price_container" class="col-sm-4">
                                            <label class="form-label" for="course_price">Çmimi <span id="required_star">*</span></label>
                                            <input type="number" class="form-control" id="course_price" name="course_price[]" placeholder="Shëno çmimin">
                                        </div>
                                        <div id="course_price_type_container" class="col-sm-6">
                                            <div id="course_price_type">
                                                <input type="radio" id="course_price_hour_0" class="price_type" name="course_price_type_0" value="h">
                                                <label class="form-label" for="course_price_hour_0">Ora</label>
                                                <input type="radio" id="course_price_day_0" class="price_type" name="course_price_type_0" value="d">
                                                <label class="form-label" for="course_price_day_0">Dita</label>
                                                <input type="radio" id="course_price_month_0" class="price_type" name="course_price_type_0" value="m">
                                                <label class="form-label" for="course_price_month_0">Muaji</label>
                                                <input type="radio" id="course_price_offer_0" class="price_type" name="course_price_type_0" value="a">
                                                <label class="form-label" for="course_price_offer_0">Oferta</label>
                                            </div>
                                            <div id="course_price_type_error_container">
                                                <input type="text" id="course_price_type_error" name="course_price_type_error_0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="course_duration_container" class="col-sm-4">
                                            <label class="form-label" for="course_duration">Sa zgjatë kursi</label>
                                            <input type="number" class="form-control" id="course_duration" name="course_duration[]" placeholder="Shëno këtu">
                                        </div>
                                        <div id="course_duration_type_container" class="col-sm-6">
                                            <input type="radio" id="course_duration_hour_0" name="course_duration_type_0" value="h">
                                            <label class="form-label" for="course_duration_hour_0">Orë</label>
                                            <input type="radio" id="course_duration_day_0" name="course_duration_type_0" value="d">
                                            <label class="form-label" for="course_duration_day_0">Ditë</label>
                                            <input type="radio" id="course_duration_week_0" name="course_duration_type_0" value="w">
                                            <label class="form-label" for="course_duration_week_0">Javë</label>
                                            <input type="radio" id="course_duration_month_0" name="course_duration_type_0" value="m">
                                            <label class="form-label" for="course_duration_month_0">Muaj</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="course_intensity_container" class="col-sm-6">
                                            <label class="form-label" for="course_intensity">Sa orë në javë</label>
                                            <input type="number" class="form-control" id="course_intensity" name="course_intensity[]" placeholder="Shëno këtu">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="course_group_container" class="col-sm-6">
                                            <label class="form-label">Numri i individëve në grup</label>
                                            <div id="course_groups">
                                                <input type="number" class="form-control" id="course_pg_lowest" name="course_group_min[]" placeholder="Minimal">
                                                <span id="course_group_split_line">-</span>
                                                <input type="number" class="form-control" id="course_pg_highest" name="course_group_max[]" placeholder="Maksimal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="course_status_row">
                                        <div id="course_status_container" class="col-sm-6">
                                            <label class="form-label" for="course_status">Vijueshmëria për këtë ofertë <span id="required_star">*</span></label>
                                            <select class="form-select" id="course_status" name="course_status[]">
                                                <option value="">Zgjedh Vijueshmërin</option>
                                                <option value="off">Vetëm Fizikisht</option>
                                                <option value="on">Vetëm Online</option>
                                                <option value="both">Fizikisht & Online</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="address_tab">
                            <div id="course_no_location_container">
                                <div class="row">
                                    <div id="course_no_addresses" class="col-lg-12">
                                        <p>Ky kurs mbahet vetëm online sepse ofruesi nuk ka lokacion fizik.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="course_form_buttons_containers">
                            <div id="course_form_buttons">
                                <button type="button" id="course_form_previous" class="previous">Kthehu</button>
                                <button type="button" id="course_form_next" class="next">Tjetër</button>
                                <button type="submit" id="submit_course_data" name="submit_course_form" class="submit action-button">Përfundo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_SESSION['success']) && $_SESSION['success'] != ''){
        ?>
            <div id="after_submit">
                <div id="after_submit_container">
                    <div id="after_submit_svg">
                        <span id="after_submit_svg_success"><?php echo file_get_contents("assets/icons/nike-stroke.svg"); ?></span>
                    </div>
                    <div id="after_submit_txt">
                        <p>Profili u regjistrua!</p>
                        <button type="button" id="add_another_course">Shto kursin</button>
                    </div>
                </div>
            </div>
        <?php
            unset ($_SESSION['success']);
            }
        if (isset($_SESSION['error']) && $_SESSION['error'] != ''){
            ?>
            <div id="after_submit">
                <div id="after_submit_container">
                    <div id="after_submit_svg">
                        <span id="after_submit_svg_error"><?php echo file_get_contents("assets/icons/x-stroke.svg"); ?></span>
                    </div>
                    <div id="after_submit_txt">
                        <p>Profili nuk u regjistrua!</p>
                        <button type="button" id="add_another_course">Provo dhe një herë</button>
                    </div>
                </div>
            </div>
            <?php
            unset ($_SESSION['error']);
        }
        if (isset($_SESSION['course_success']) && $_SESSION['course_success'] != ''){
            ?>
            <div id="after_submit">
                <div id="after_submit_container">
                    <div id="after_submit_svg">
                        <span id="after_submit_svg_success"><?php echo file_get_contents("assets/icons/nike-stroke.svg"); ?></span>
                    </div>
                    <div id="after_submit_txt">
                        <p>Kursi u shtua!</p>
                        <button type="button" id="add_another_course">Shto dhe një kurs</button>
                    </div>
                </div>
            </div>
            <?php
            unset ($_SESSION['course_success']);
        }
        if (isset($_SESSION['course_error']) && $_SESSION['course_error'] != ''){
            ?>
            <div id="after_submit">
                <div id="after_submit_container">
                    <div id="after_submit_svg">
                        <span id="after_submit_svg_error"><?php echo file_get_contents("assets/icons/x-stroke.svg"); ?></span>
                    </div>
                    <div id="after_submit_txt">
                        <p>Kursi nuk u shtua!</p>
                        <button type="button" id="add_another_course">Provo dhe një herë</button>
                    </div>
                </div>
            </div>
            <?php
            unset ($_SESSION['course_error']);
        }
        ?>
    </div><!-- END layout-wrapper -->
    <span id="device_identifier"></span>

<?php

include 'includes/scripts.php';

include 'includes/footer.php';

?>