 <?php
    include 'partials/header.php';


    // fetch featured post from the database
    $featured_query = "SELECT * FROM posts WHERE is_featured=1";
    $featured_result = mysqli_query($connection, $featured_query);
    $featured = mysqli_fetch_assoc($featured_result);

    // fetch 9 post from posts table
    $query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
    $posts = mysqli_query($connection, $query);
    ?>


 <section class="featured">
     <section class="singlepost" style="display: flex;">
         <div class="container singlepost__container background-section slide image-1"></div>
         <div class="container singlepost__container background-section slide image-2"></div>
         <div class="container singlepost__container background-section slide image-3"></div>
     </section>

     <section class="doublepost">
         <div class="container doublepost__container" id="stay0">
             <h3 style="text-transform: uppercase;"> key highlights that define The Renewed Minds Ministries' approach to its mission</h3>
             <p><b style="padding-left: .2rem;">Clarity in Gospel :</b> The ministry is committed to preaching the gospel of Christ to the world without any ambiguity, ensuring that the message is accessible and transformative.</p>
             <p class="hidden-paragraph"><b style="padding-left: .2rem;">Clarity in Gospel :</b> The ministry is committed to preaching the gospel of Christ to the world without any ambiguity, ensuring that the message is accessible and transformative.</p>
             <p><b style="padding-left: .2rem;">Spiritual Growth :</b> Discipleship is a cornerstone of the ministry's efforts, facilitating the spiritual growth of individuals seeking a deeper connection with God.</p>
             <p class="hidden-paragraph"><b style="padding-left: .2rem;">Self-awareness :</b> The Renewed Minds Ministries guides people towards self-awareness, helping them recognize their true identities and the opportunities meant for their personal development.</p>
             <p class="hidden-paragraph"><b style="padding-left: .2rem;"> Leadership Development :</b> The ministry takes a proactive role in raising and equipping leaders who are capable of not only leading themselves but also inspiring and guiding others, making resources and training readily available.</p>
             <p class="hidden-paragraph"><b style="padding-left: .2rem;">Purpose Discovery :</b> Individual purpose is a crucial element of the ministry's work, which it facilitates through mentorship and coaching, enabling people to identify and pursue their life's purpose.</p>
             <p class="hidden-paragraph"><b style="padding-left: .2rem;">Global Network :</b> The Renewed Minds Ministries strives to build a global network of individuals who are deeply committed to transformational leadership, fostering positive change worldwide.</p>
             <a href="#stay0" class="category__button" onclick="toggleParagraphs()">Read More</a>

         </div>
         <div class="container doublepost__container background-img">
             <h3 class="background_img-h3">HARRY SAM</h3>
             <p class="background_img-p"> To make known his magnificent, glory, Power and knowledge that there will not be any ambiguity, that whosoever that come in contact with me would have met God in earthen vessel.
             </p>
             <a href="https://wa.me/+2347066620020" class="category__button">Talk To Us</a>

         </div>


     </section>
 </section>
 <!-- show featured post if there's any  -->
 <?php if (mysqli_num_rows($featured_result) == 1) : ?>
     <section class="featured">


         <div class="container featured__container">
             <div class="post__thumbnail">
                 <img src="./images/<?= $featured['thumbnail'] ?>">
             </div>
             <div class="post__info">
                 <?php
                    // fetch category from categories table using category_id of post
                    $category_id = $featured['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id=$category_id";
                    $category_result = mysqli_query($connection, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                    ?>
                 <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>
                 <h2 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>
                 <p class="post__body"><?= substr($featured['body'], 0, 150) ?>...</p>
                 <div class="post__author">
                     <?php
                        // fetch author from users table using author_id
                        $author_id = $featured['author_id'];
                        $author_query = "SELECT * FROM users WHERE id=$author_id";
                        $author_result = mysqli_query($connection, $author_query);
                        $author = mysqli_fetch_assoc($author_result);

                        ?>
                     <div class="post__author-avatar">
                         <img class="" src="./images/<?= $author['avatar'] ?>">
                     </div>
                     <div class="post__author-info">
                         <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                         <small><?= date("M d, Y - H:i", strtotime($featured['date_time'])) ?></small>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 <?php endif ?>
 <!--===================================   END OF FEATURED =====================-->



 <section class="posts <?= $featured ? '' : 'section__extra-margin' ?>">
     <div class="container posts__container">
         <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
             <article class="post">
                 <div class="post__thumbnail">
                     <img src="./images/<?= $post['thumbnail'] ?>">
                 </div>
                 <div class="post__info">
                     <?php
                        // fetch category from categories table using category_id of post
                        $category_id = $post['category_id'];
                        $category_query = "SELECT * FROM categories WHERE id=$category_id";
                        $category_result = mysqli_query($connection, $category_query);
                        $category = mysqli_fetch_assoc($category_result);
                        ?>
                     <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
                     <h3 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h3>
                     <p class="post__body"> <?php
                                            $body = htmlspecialchars_decode($post['body']);
                                            $body = strip_tags($body, '<br>');
                                            $body_snippet = substr($body, 0, 150);
                                            echo $body_snippet;
                                            ?>...</p>
                     <div class="post__author">
                         <?php
                            // fetch author from users table using author_id
                            $author_id = $post['author_id'];
                            $author_query = "SELECT * FROM users WHERE id=$author_id";
                            $author_result = mysqli_query($connection, $author_query);
                            $author = mysqli_fetch_assoc($author_result);

                            ?>
                         <div class="post__author-avatar">
                             <img src="./images/<?= $author['avatar'] ?>">
                         </div>
                         <div class="post__author-info">
                             <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                             <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
                         </div>
                     </div>
                 </div>
             </article>
         <?php endwhile ?>
     </div>
 </section>

 <!--===================================   END OF POSTS=====================-->

 <section class="category__buttons">
     <div class="container category__buttons-container">
         <?php
            $all_categories_query = "SELECT * FROM categories";
            $all_categories = mysqli_query($connection, $all_categories_query);
            ?>
         <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
             <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>
         <?php endwhile ?>
     </div>
 </section>

 <script>
     const slides = document.querySelectorAll('.slide');
     let currentSlide = 0;

     function showSlide(slideIndex) {
         slides.forEach((slide) => {
             slide.style.opacity = 0;
         });

         slides[slideIndex].style.opacity = 1;
     }

     function nextSlide() {
         currentSlide = (currentSlide + 1) % slides.length;
         showSlide(currentSlide);
     }

     // Initial display of the first slide
     showSlide(currentSlide);

     // Automatic slide change (uncomment if you want automatic sliding)
     const slideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
 </script>

 <script>
     var hiddenParagraphs = document.getElementsByClassName("hidden-paragraph");
     var btn = document.querySelector(".category__button");
     var isHidden = true;

     function toggleParagraphs() {
         isHidden = !isHidden;

         for (var i = 0; i < hiddenParagraphs.length; i++) {
             hiddenParagraphs[i].style.display = isHidden ? "none" : "block";
         }

         btn.textContent = isHidden ? "Read More" : "Read Less";
     }
 </script>
 <!--===================================   END OF CATEGORY BUTTONS=====================-->

 <?php
    include 'partials/footer.php';
    ?>