<footer>
    <div class="footer__socials">
        <!--<a href="www.youtube.com" target="_black"><i class="uil uil-youtube"></i></a>-->
        <a href="https://m.facebook.com/profile.php/?id=100000238007501" target="_blank"><i class="uil uil-facebook-f"></i></a>
        <a href="https://instagram.com/harrysam07?igshid=MzMyNGUyNmU2YQ==" target="_blank"><i class="uil uil-instagram"></i></a>
        <a href="https://www.linkedin.com/in/orodiran-harry-samuel-akintunde-aba6a8a0" target="_blank"><i class="uil uil-linkedin"></i></a>
        <a href=" https://x.com/harrysam07?t=Bue0sqtCo4akq8gXJa5L4A&s=08" target="_black"><i class="uil uil-twitter"></i></a>
    </div>

    <div class="container footer__container">
        <article>
            <h4>Categories</h4>
            <ul>
                <?php
                $all_categories_query = "SELECT * FROM categories";
                $all_categories = mysqli_query($connection, $all_categories_query);
                ?>
                <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
                    <li> <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class=""><?= $category['title'] ?></a></li>
                <?php endwhile ?>

            </ul>
        </article>
        <article>
            <h4>Support</h4>
            <ul>
                <li><a href="https://wa.me/+2347066620020">Online Support</a></li>
                <li><a href="mailto:lifeimpactnetwork.ng@gmail.com">Email</a></li>
            </ul>
        </article>

        <article>
            <h4>Permalinks</h4>
            <ul>
                <li><a href="<?= ROOT_URL ?>index.php">Home</a></li>
                <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>prayer.php">Prayer Request</a></li>
                <li><a href="<?= ROOT_URL ?>donate.php">Donate</a></li>
            </ul>
        </article>
    </div>
    <div class="footer__copyright">
        <small>Copyright &copy; 2023 HARRY SAM MINISTRIES</small>
    </div>

</footer>

<script src="<?= ROOT_URL ?>js/main.js"></script>

</body>

</html>