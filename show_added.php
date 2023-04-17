<?php

include 'includes/config/config.php';

include 'includes/header.php';

?>

<div>
    <h3>Provider</h3>
    <table class="table table-light table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Website</th>
                <th scope="col">Facebook</th>
                <th scope="col">Instagram</th>
                <th scope="col">LinkedIn</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM provider";
            $result = $conn->query($sql);
            while ($row=$result->fetch_assoc()) {
                ?>
                <tr>
                    <th scope="row"><?= $row['provider_name'];?></th>
                    <td><?= $row['type'];?></td>
                    <td><?= $row['title'];?></td>
                    <td><?= $row['description'];?></td>
                    <td><?= $row['website'];?></td>
                    <td><?= $row['facebook'];?></td>
                    <td><?= $row['instagram'];?></td>
                    <td><?= $row['linkedin'];?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>


    <div class="col-3">
        <h3>Qytetet</h3>
        <table class="table table-light table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Emri i qyetetit</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM city ORDER BY city_name";
            $result = $conn->query($sql);
            while ($row=$result->fetch_assoc()) {
                ?>
                <tr>
                    <th scope="row"><?= $row['city_name'];?></th>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php

include 'includes/scripts.php';

?>