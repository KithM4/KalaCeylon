<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn More | Exploring the Rich Art Heritage of Sri Lanka</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
        }

        .hero-section {
            position: relative;
            background-image: url('../assets/imgs/blog/1.jpg');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Dark overlay */
            z-index: 1;
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
        }

        .hero-section h1 {
            font-size: 50px;
            font-weight: bold;
        }

        .blog-content {
            padding: 50px 0;
        }

        .blog-content p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .quote {
            font-style: italic;
            font-size: 1.2rem;
            color: #555;
            margin-top: 2rem;
        }

        .author {
            font-weight: bold;
        }

        .related-posts h4 {
            margin-bottom: 30px;
        }

        .related-posts .card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .related-posts .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .related-posts .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .related-posts .card-body {
            padding: 20px;
        }

        .related-posts .card-title {
            font-size: 1.2rem;
            font-weight: 600;
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
</head>

<body>

    <!-- Hero Section -->
    <div class="hero-section text-center">
        <div class="container">
            <h1>Exploring the Rich Art Heritage of Sri Lanka</h1>
            <p>Discover the cultural and artistic treasures of Sri Lanka that define its rich heritage.</p>
        </div>
    </div>

    <!-- Blog Content -->
    <div class="container blog-content">
        <div class="row">
            <div class="col-md-8">
                <h2>The Artistic Evolution of Sri Lanka</h2>
                <p>
                    Sri Lanka's art heritage is a blend of influences from its indigenous
                    traditions and external interactions over millennia. From the ancient
                    frescoes of Sigiriya to the intricate Buddhist statues, Sri Lankan
                    artists have captured the spirit of their culture in ways that have
                    influenced the wider world.
                </p>
                <p>
                    The island's artistic identity is rooted in religious traditions, with
                    many of its most important works being religious in nature. The influence
                    of Buddhism, Hinduism, and colonial powers shaped its evolution. For
                    instance, the famous "Sigiriya Frescoes" dating back to the 5th century
                    are among the earliest examples of Sri Lankan art that combine naturalism
                    and symbolism.
                </p>
                <p>
                    Today, modern Sri Lankan artists continue to evolve traditional methods,
                    experimenting with new media while still remaining connected to their
                    roots.
                </p>

                <div class="quote">
                    <p>"Sri Lankan art isn't just about aesthetics; it's about storytelling and preserving culture." - <span class="author">Anura Wickramasinghe, Art Historian</span></p>
                </div>

                <h3>Key Art Forms in Sri Lanka</h3>
                <p>
                    The richness of Sri Lankan art is reflected through various forms such as
                    sculpture, painting, textile art, and architecture. Sri Lanka has a
                    profound legacy in the following art forms:
                </p>
                <ul>
                    <li>Traditional Paintings: Often featuring religious themes, these paintings
                        showcase vibrant colors and intricate designs.</li>
                    <li>Sculpture: The island is home to numerous statues of Buddha, crafted with
                        extraordinary skill.</li>
                    <li>Textile Arts: Sri Lankan textiles are known for their handwoven techniques
                        and vibrant patterns.</li>
                    <li>Architecture: From ancient temples to colonial-era structures, Sri Lanka's
                        architecture is a fusion of diverse influences.</li>
                </ul>

                <h3>Conclusion</h3>
                <p>
                    Sri Lanka's art forms continue to be a living testament to the island's
                    rich culture. Artists today carry forward these traditions, interpreting them
                    in new and innovative ways, ensuring the heritage remains relevant in the
                    modern world.
                </p>
            </div>

            <!-- Sidebar: other blogs -->
            <div class="col-md-4">
                <div class="related-posts">
                    <h4>Other Blogs</h4>

                    <!-- Post 1: The Evolution of Contemporary Art in Sri Lanka -->
                    <div class="card">
                        <img src="../assets/imgs/blog/3.jpg" class="card-img-top" alt="The Evolution of Contemporary Art in Sri Lanka">
                        <div class="card-body">
                            <h5 class="card-title">The Evolution of Contemporary Art in Sri Lanka</h5>
                            <p class="card-text">Contemporary art in Sri Lanka has evolved drastically over the years. From the colonial influences to the current wave of modern art, this post explores how contemporary Sri Lankan artists are challenging norms and redefining the art scene.</p>
                            <a href="contemporary_art.php" class="btn btn-primary read-more-btn">Read More</a>
                        </div>
                    </div>

                    <!-- Post 2: Why Supporting Local Artists is Essential -->
                    <div class="card mt-4">
                        <img src="../assets/imgs/blog/2.jpg" class="card-img-top" alt="Why Supporting Local Artists is Essential">
                        <div class="card-body">
                            <h5 class="card-title">Why Supporting Local Artists is Essential</h5>
                            <p class="card-text">Supporting local artists not only fosters creativity, but it also helps preserve cultural heritage. In this post, we explore the importance of supporting artists in Sri Lanka and the impact it has on their lives.</p>
                            <a href="local_artists.php" class="btn btn-primary read-more-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->


    <!-- Bootstrap JS & Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>