<?php include('layouts/header.php'); ?>

<style>
    /* Styling for section titles */
    .section-title {
        margin-bottom: 30px;
        text-align: center;
        font-weight: bold;
        font-size: 2rem;
        color: #2c3e50;
    }

    /* Styling for story text */
    .story-text {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #34495e;
        text-align: justify;
        margin-bottom: 40px;
    }

    /* Image gallery styling */
    .image-gallery img {
        margin-bottom: 30px;
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    /* Gallery title styling */
    .gallery-title {
        margin-bottom: 50px;
        text-align: center;
        font-weight: bold;
        font-size: 1.5rem;
        margin-top: 50px;
        color: #2c3e50;
    }

    /* Team member image styling */
    .team-member img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
    }
</style>

<div class="container mt-5">

    <!-- Image Gallery Section -->
    <section id="image-gallery">
        <h2 class="gallery-title">Gallery</h2>
        <div class="row image-gallery">
            <div class="col-md-4 mb-4">
                <img src="assets/imgs/gallery/1.png" alt="Art 1" class="img-fluid">
            </div>
            <div class="col-md-4 mb-4">
                <img src="assets/imgs/gallery/2.png" alt="Art 2" class="img-fluid">
            </div>
            <div class="col-md-4 mb-4">
                <img src="assets/imgs/gallery/3.png" alt="Art 3" class="img-fluid">
            </div>
            <div class="col-md-4 mb-4">
                <img src="assets/imgs/gallery/4.png" alt="Art 4" class="img-fluid">
            </div>
            <div class="col-md-4 mb-4">
                <img src="assets/imgs/gallery/5.png" alt="Art 5" class="img-fluid">
            </div>
            <div class="col-md-4 mb-4">
                <img src="assets/imgs/gallery/7.png" alt="Art 6" class="img-fluid">
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section id="intro">
        <h2 class="section-title">Welcome to KalaCeylon</h2>
        <p class="story-text">KalaCeylon is not just an e-commerce platform; it is a celebration of Sri Lanka's
            rich cultural heritage, brought to the world through art. We aim to bridge the gap between the
            traditional craftsmanship of Sri Lanka and the global digital marketplace. Founded with a passion
            for preserving and sharing the beauty of Sri Lankan art, KalaCeylon offers a space for local artists
            to showcase their works while providing customers with access to unique pieces of art that capture
            the essence of Sri Lanka's diverse culture.</p>
        <p class="story-text">We believe in the power of art to transcend borders, connect people, and foster
            cultural understanding. By creating an online platform dedicated to promoting Sri Lankan art, we
            provide a sustainable income for our local artists and bring their creations to a wider audience.
            Every piece of art on KalaCeylon tells a story, from the brushstrokes of a traditional painting to
            the intricate details of a handcrafted sculpture.</p>
    </section>

    <!-- Our Story Section -->
    <section id="our-story">
        <h2 class="section-title">Our Story</h2>
        <p class="story-text">KalaCeylon was born out of the desire to make Sri Lankan art accessible to a
            global audience while supporting local artists. In Sri Lanka, the rich traditions of art are often
            kept within local communities, and artists struggle to find a platform where they can showcase their
            talents and receive the recognition they deserve. KalaCeylon aims to change this by providing a
            user-friendly and secure online space where these artists can display and sell their works.</p>
        <p class="story-text">At the core of KalaCeylon's mission is a commitment to quality and authenticity.
            We work closely with each artist to ensure that their work is represented in the best possible way,
            from high-quality images to detailed descriptions. Our platform is designed to offer a seamless
            shopping experience for art lovers, whether they are searching for a traditional painting, a
            handmade piece of jewelry, or a contemporary sculpture.</p>
        <p class="story-text">The journey to KalaCeylon began when a group of art enthusiasts recognized the
            need for a digital gallery that could provide an outlet for local artists to reach customers beyond
            the physical boundaries of galleries and exhibitions. By creating an e-commerce site that showcases
            the true beauty of Sri Lankan art, we are not only promoting the local art scene but also preserving
            the cultural heritage that defines the island.</p>
        <p class="story-text">Our platform's success is built on the trust and collaboration between KalaCeylon
            and the talented artists who call Sri Lanka home. We are proud to offer a space that highlights the
            diversity and creativity of Sri Lanka's artisans, and we continue to grow as we reach new audiences
            and expand our network of artists.</p>
    </section>

</div>

<!-- Footer -->
<?php include('layouts/footer.php'); ?>
