
<footer>
    <div id="footer_main">
        <div id="footer_main_container">
            <div id="footer_main_nav_links">
                <p><a href="https://nkurs.co/contact.php">Kontakto</a></p>
                <p><a href="#">Bëhu pjesë e platformës</a></p>
            </div>
            <div id="footer_main_down">
                <div id="footer_main_down_logo">
                    <img id="white_nkurs_logo" src="assets/images/logo/nkurs-white.png" alt="">
                    <img id="black_nkurs_logo" src="assets/images/logo/nkurs-black.png" alt="">
                </div>
                <div id="footer_main_down_sc">
                    <div id="footer_main_down_sc_title">
                        <p>Na ndiqni në</p>
                    </div>
                    <div id="footer_main_down_sc_links">
                        <a href="https://www.instagram.com/nkurs.co/"><?= file_get_contents("assets/icons/instagram.svg");?></a>
                        <a href="https://www.tiktok.com/@nkurs.co"><?= file_get_contents("assets/icons/tiktok.svg");?></a>
                        <a href="https://www.facebook.com/nkurs.co"><?= file_get_contents("assets/icons/facebook.svg");?></a>
                        <a href="https://www.linkedin.com/company/nkurs/"><?= file_get_contents("assets/icons/linkedin.svg");?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="footer_side">
        <?php echo file_get_contents("assets/icons/copyright.svg"); ?>
        <p>nkurs, all rights reserved</p>
    </div>
</footer>
</body>
</html>
