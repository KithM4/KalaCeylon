<?php include('layouts/header.php'); ?>

<style>
    body {
        padding-top: 80px;
    }

    .contact-section {
        background-color: #f8f9fa;
        padding: 60px 0;
    }

    .contact-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: all 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .contact-card i {
        font-size: 40px;
        color: #007bff;
        margin-bottom: 20px;
    }

    .contact-card h5 {
        font-size: 20px;
        color: #333;
        margin-bottom: 15px;
    }

    .contact-card p {
        color: #555;
        font-size: 16px;
    }

    .section-heading {
        font-size: 30px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .section-description {
        font-size: 16px;
        color: #6c757d;
    }
</style>

<!-- Contact Form -->
<section id="contact" class="container my-5 py-5 mt-5 contact-section">
    <div class="container text-center mt-5">
        <h3 class="section-heading">Get In Touch</h3>
        <hr class="mx-auto" />
        <p class="w-50 mx-auto section-description">
            We’d love to hear from you! Whether you have a question, feedback, or
            need assistance, feel free to reach out.
        </p>
        <div class="row mt-5">
            <!-- Contact Details -->
            <div class="col-md-4 mb-4">
                <div class="contact-card">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <h5>Phone</h5>
                    <p>011 465 165</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="contact-card">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <h5>Email</h5>
                    <p>support@kalaceylon.com</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="contact-card">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <h5>Location</h5>
                    <p>Colombo, Sri Lanka</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include('layouts/footer.php'); ?>
