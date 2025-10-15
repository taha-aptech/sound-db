<?php 
include 'header.php';
include 'db.php';
?>

<!-- Hero section -->
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        <div class="hs-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hs-text">
                            <h2><span>Music</span> for everyone.</h2>
                            <p>Welcome to SOUND Group's entertainment portal. Enjoy the latest and classic music and videos in multiple languages!</p>
                            <a href="#" class="site-btn">Download Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hr-img">
                            <img src="img/hero-bg.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- You can add more slides if needed -->
    </div>
</section>
<!-- Hero section end -->

<!-- Intro section -->
<section class="intro-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Unlimited Access to Music & Videos</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <p>Browse, listen, and watch your favorite songs and videos by album, artist, year, genre, and language. Register to rate and review your favorites!</p>
                <a href="register.php" class="site-btn">Register Now</a>
            </div>
        </div>
    </div>
</section>
<!-- Intro section end -->

<!-- Latest Music & Videos Section -->
<section class="latest-section spad">
    <div class="container">
        <div class="row">
            <!-- Latest Music -->
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Latest Music</h2>
                </div>
                <div class="row">
                <?php
                $music_sql = "SELECT m.*, a.artist_name, al.album_name, al.cover_image AS album_cover_image FROM music m 
                              LEFT JOIN artist a ON m.artist_id = a.artist_id 
                              LEFT JOIN album al ON m.album_id = al.album_id 
                              ORDER BY m.created_at DESC LIMIT 5";
                $music_res = mysqli_query($conn, $music_sql);
                while($music = mysqli_fetch_assoc($music_res)) {
                ?>
                    <div class="col-md-12 mb-3">
                        <div class="media align-items-center">
                            <img src="<?php echo !empty($music['album_cover_image']) ? $music['album_cover_image'] : 'img/default_album.jpg'; ?>" class="mr-3" alt="" style="width:60px;height:60px;object-fit:cover;">
                            <div class="media-body">
                                <h5 class="mt-0"><?php echo htmlspecialchars($music['title']); ?>
                                    <?php if($music['is_new']) { ?>
                                        <img src="img/icons/new.gif" alt="New" style="width:32px;vertical-align:middle;">
                                    <?php } ?>
                                </h5>
                                <small>
                                    <?php echo htmlspecialchars($music['artist_name']); ?> | 
                                    <?php echo htmlspecialchars($music['album_name']); ?> | 
                                    <?php echo htmlspecialchars($music['year']); ?>
                                </small>
                                <p><?php echo htmlspecialchars($music['description']); ?></p>
                                <audio controls style="width:100%;">
                                    <source src="<?php echo htmlspecialchars($music['file_path']); ?>" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
            <!-- Latest Videos -->
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Latest Videos</h2>
                </div>
                <div class="row">
                <?php
                $video_sql = "SELECT v.*, a.artist_name, al.album_name FROM video v 
                              LEFT JOIN artist a ON v.artist_id = a.artist_id 
                              LEFT JOIN album al ON v.album_id = al.album_id 
                              ORDER BY v.created_at DESC LIMIT 5";
                $video_res = mysqli_query($conn, $video_sql);
                while($video = mysqli_fetch_assoc($video_res)) {
                ?>
                    <div class="col-md-12 mb-3">
                        <div class="media align-items-center">
                            <img src="<?php echo $video['thumbnail_img'] ? $video['thumbnail_img'] : 'img/default_video.jpg'; ?>" class="mr-3" alt="" style="width:60px;height:60px;object-fit:cover;">
                            <div class="media-body">
                                <h5 class="mt-0"><?php echo htmlspecialchars($video['title']); ?>
                                    <?php if($video['is_new']) { ?>
                                        <img src="img/icons/new.gif" alt="New" style="width:32px;vertical-align:middle;">
                                    <?php } ?>
                                </h5>
                                <small>
                                    <?php echo htmlspecialchars($video['artist_name']); ?> | 
                                    <?php echo htmlspecialchars($video['album_name']); ?> | 
                                    <?php echo htmlspecialchars($video['year']); ?>
                                </small>
                                <p><?php echo htmlspecialchars($video['description']); ?></p>
                                <video controls style="width:100%;max-width:300px;">
                                    <source src="<?php echo htmlspecialchars($video['file_path']); ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Music & Videos Section End -->

<!-- How section -->
<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg">
    <div class="container text-white">
        <div class="section-title">
            <h2>How it works</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="how-item">
                    <div class="hi-icon">
                        <img src="img/icons/brain.png" alt="">
                    </div>
                    <h4>Create an account</h4>
                    <p>Register to rate and review music and videos, and enjoy more features.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="how-item">
                    <div class="hi-icon">
                        <img src="img/icons/pointer.png" alt="">
                    </div>
                    <h4>Browse & Search</h4>
                    <p>Find music and videos by album, artist, year, genre, or language.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="how-item">
                    <div class="hi-icon">
                        <img src="img/icons/smartphone.png" alt="">
                    </div>
                    <h4>Enjoy Content</h4>
                    <p>Listen to songs, watch videos, and share your reviews and ratings.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- How section end -->

<!-- Concept section (unchanged, you can make dynamic if needed) -->
<section class="concept-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Our Concept & artists</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <p>Discover music and videos from various genres, languages, and artists. Enjoy both new and classic content curated for you.</p>
            </div>
        </div>
        <!-- You can make this section dynamic if you want to list artists/albums -->
    </div>
</section>
<!-- Concept section end -->

<!-- Remove Subscription and Premium sections as per requirements -->

<?php include 'footer.php' ?>