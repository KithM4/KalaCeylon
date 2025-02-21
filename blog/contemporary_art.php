<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn More | The Evolution of Contemporary Art in Sri Lanka</title>
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
            background-image: url('../assets/imgs/blog/3.jpg');
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
            transition: all 0.3s ease;
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
            transition: background-color 0.3s ease;
        }

        .read-more-btn:hover {
            background-color: black;
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <div class="hero-section text-center">
        <div class="container">
            <h1>The Evolution of Contemporary Art in Sri Lanka</h1>
            <p>Discover how contemporary Sri Lankan artists are reshaping the art scene, blending tradition and modernity.</p>
        </div>
    </div>

    <!-- Blog Content -->
    <div class="container blog-content">
        <div class="row">
            <div class="col-md-8">
                <h2>The Journey of Contemporary Art in Sri Lanka</h2>
                <p>
                    Contemporary art in Sri Lanka has undergone a remarkable evolution, particularly in the past few decades.
                    From the influences of colonialism to the rise of modern Sri Lankan artists challenging cultural and social norms,
                    the evolution of contemporary art is a story of resilience and creativity. Artists in Sri Lanka today are increasingly
                    experimenting with new media while drawing inspiration from both traditional art forms and global artistic trends.
                </p>
                <p>
                    During the post-colonial era, Sri Lankan artists grappled with identity and nationalism, seeking to express their
                    cultural heritage in a contemporary setting. The incorporation of indigenous materials, local motifs, and traditional
                    forms into modern art helped to define the Sri Lankan contemporary art scene. Over time, the influx of new global
                    influences further diversified the artistic landscape.
                </p>
                <p>
                    Artists today are exploring issues such as social change, environmental concerns, and the evolving political landscape.
                    They are using art as a platform to address important conversations in Sri Lankan society, all while retaining a deep
                    respect for the island's rich cultural history.
                </p>

                <div class="quote">
                    <p>"Sri Lankan contemporary art bridges the gap between tradition and modernity, creating a unique artistic voice for the nation." - <span class="author">Chandrika Kumari, Art Critic</span></p>
                </div>

                <h3>Key Artists of the Contemporary Scene</h3>
                <p>
                    Some notable artists from the contemporary Sri Lankan art scene have been recognized both nationally and internationally:
                </p>
                <ul>
                    <li><strong>Geoffrey Bawa</strong>: Renowned architect whose designs combine traditional Sri Lankan forms with modernist principles.</li>
                    <li><strong>Prageeth Manohansa</strong>: A contemporary painter who blends Sri Lankan cultural themes with a unique modern style.</li>
                    <li><strong>Senaka Senanayake</strong>: Famous for his vibrant paintings depicting Sri Lankan wildlife and landscapes, exploring themes of nature and conservation.</li>
                    <li><strong>Ruwanthi Vithana</strong>: A sculptor whose work incorporates traditional materials such as wood and bronze, with a contemporary twist.</li>
                </ul>

                <h3>Conclusion</h3>
                <p>
                    Sri Lanka's contemporary art scene continues to flourish as new generations of artists push boundaries and redefine
                    artistic expressions. By blending rich traditions with modern innovations, they are ensuring that Sri Lankan art
                    remains relevant and impactful in an ever-changing world.
                </p>
            </div>

            <div class="col-md-4">
                <div class="related-posts">
                    <h4>Other Blogs</h4>

                    <!-- Post 1: The Evolution of Contemporary Art in Sri Lanka -->
                    <div class="card">
                        <img src="../assets/imgs/blog/4.jpg" class="card-img-top" alt=" How Technology is Shaping the Future of Art">
                        <div class="card-body">
                            <h5 class="card-title"> How Technology is Shaping the Future of Art</h5>
                            <p class="card-text">Technology is reshaping the world of art, offering new platforms
                                and possibilities for artists. In this blog post, we discuss how
                                digital tools, social media, and e-commerce are transforming the
                                way artists connect with the world..</p>
                            <a href="future_art.php" class="btn btn-primary read-more-btn">Read More</a>
                        </div>
                    </div>

                    <!-- Post 2: Why Supporting Local Artists is Essential -->
                    <div class="card mt-4">
                        <img src="../assets/imgs/blog/1.jpg" class="card-img-top" alt="Exploring the Rich Art Heritage of Sri Lanka">
                        <div class="card-body">
                            <h5 class="card-title">Exploring the Rich Art Heritage of Sri Lanka</h5>
                            <p class="card-text">Supporting local artists not only fosters creativity, but it also helps preserve cultural heritage. In this post, we explore the importance of supporting artists in Sri Lanka and the impact it has on their lives.</p>
                            <a href="richart.php" class="btn btn-primary read-more-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <!-- Bootstrap JS & Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>