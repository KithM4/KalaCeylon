<?php include('../web/layouts/header.php'); ?>

<style>

    body {
        padding-top: 80px;
    }

    .blog-card {
        border: none; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        margin-bottom: 30px; 
    }
 
    .blog-card img {
        height: 250px;
        object-fit: cover; 
    }
 
    .blog-title {
        font-size: 1.8rem; 
        font-weight: bold;
        color: #2c3e50; 
    }
   
    .blog-summary {
        font-size: 1rem; 
        color: #34495e; 
        line-height: 1.5; 
    }
  
    .blog-date {
        font-size: 0.9rem; 
        color: #7f8c8d; 
    }

    .read-more-btn {
        margin-top: 20px; 
        color: #fff; 
        background-color: coral; 
        border: none; 
    }
  
    .read-more-btn:hover {
        margin-top: 20px; 
        color: #fff; 
        background-color: black; 
        border: none;
    }
</style>

    <h2 class="text-center mb-5" style="font-size: 2.5rem; color: #2c3e50">
        KalaCeylon Blog
    </h2>

    <!-- Blog Posts Section -->
    <div class="row">
        
        <!-- Blog 1 -->
        <div class="col-md-6">
            <div class="card blog-card">
                <img src="assets/imgs/blog/1.jpg" class="card-img-top" alt="Blog 1" />
                <div class="card-body">
                    <h3 class="blog-title">
                        Exploring the Rich Art Heritage of Sri Lanka
                    </h3>
                    <p class="blog-summary">
                        Sri Lanka has a deep and diverse cultural history, and its art
                        forms reflect the richness of its heritage. From traditional
                        paintings to intricate sculptures, we delve into how Sri Lankan
                        artists express their cultural identity through their work...
                    </p>
                    <p class="blog-date">Published on January 12, 2025</p>
                    <a href="blog/richart.php" class="btn btn-primary read-more-btn" target="_blank">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog 2 -->
        <div class="col-md-6">
            <div class="card blog-card">
                <img src="assets/imgs/blog/3.jpg" class="card-img-top" alt="Blog 2" />
                <div class="card-body">
                    <h3 class="blog-title">
                        The Evolution of Contemporary Art in Sri Lanka
                    </h3>
                    <p class="blog-summary">
                        Contemporary art in Sri Lanka has evolved drastically over the
                        years. From the colonial influences to the current wave of
                        modern art, this post explores how contemporary Sri Lankan
                        artists are challenging norms and redefining the art scene...
                    </p>
                    <p class="blog-date">Published on January 10, 2025</p>
                    <a href="blog/contemporary_art.php" class="btn btn-primary read-more-btn" target="_blank">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog 3 -->
        <div class="col-md-6">
            <div class="card blog-card">
                <img src="assets/imgs/blog/2.jpg" class="card-img-top" alt="Blog 3" />
                <div class="card-body">
                    <h3 class="blog-title">
                        Why Supporting Local Artists is Essential
                    </h3>
                    <p class="blog-summary">
                        Supporting local artists not only fosters creativity, but it
                        also helps preserve cultural heritage. In this post, we explore
                        the importance of supporting artists in Sri Lanka and the impact
                        it has on their lives...
                    </p>
                    <p class="blog-date">Published on January 8, 2025</p>
                    <a href="blog/local_artists.php#" class="btn btn-primary read-more-btn" target="_blank">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog 4 -->
        <div class="col-md-6">
            <div class="card blog-card">
                <img src="assets/imgs/blog/4.jpg" class="card-img-top" alt="Blog 4" />
                <div class="card-body">
                    <h3 class="blog-title">
                        How Technology is Shaping the Future of Art
                    </h3>
                    <p class="blog-summary">
                        Technology is reshaping the world of art, offering new platforms
                        and possibilities for artists. In this blog post, we discuss how
                        digital tools, social media, and e-commerce are transforming the
                        way artists connect with the world...
                    </p>
                    <p class="blog-date">Published on January 5, 2025</p>
                    <a href="blog/future_art.php" class="btn btn-primary read-more-btn" target="_blank">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
<?php include('../web/layouts/footer.php'); ?>
