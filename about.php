<?php include('includes/header.php'); ?>

<style>
    .about-section { background: #fff; padding: 80px 0; }
    .profile-img { 
        width: 100%; max-width: 350px; border-radius: 20px; 
        box-shadow: 20px 20px 0px #6c5ce7; transition: 0.3s;
    }
    .profile-img:hover { transform: translateY(-10px); }
    .skill-badge { 
        background: #f1f0ff; color: #6c5ce7; border: 1px solid #dcd9ff;
        padding: 5px 15px; border-radius: 50px; display: inline-block; 
        margin: 5px; font-weight: 500; font-size: 0.9rem;
    }
    .social-icons a { 
        font-size: 1.5rem; margin-right: 15px; color: #6c5ce7; 
        transition: 0.3s; 
    }
    .social-icons a:hover { color: #333; transform: scale(1.2); }
    .startup-box {
        border-left: 5px solid #6c5ce7; background: #f8f9fa;
        padding: 20px; border-radius: 0 15px 15px 0; margin: 20px 0;
    }
</style>

<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 text-center mb-5 mb-lg-0">
                <img src="assets/images/rahul.jpg" alt="Rahul Kumar" class="profile-img">
            </div>

            <div class="col-lg-7">
                <h6 class="text-primary fw-bold text-uppercase">Full-Time Web Developer</h6>
                <h1 class="display-5 fw-bold mb-3">Rahul Kumar</h1>
                <p class="lead text-muted">
                    Specializing in PHP, HTML, CSS, Java, and Database Management. <br>
                    <strong>Building robust digital solutions from Bihar to the world.</strong>
                </p>

                <p>
                    I have developed <strong>50+ websites</strong> so far for my clients based in 
                    USA, UK, Australia, Singapore, and South Africa. I love to write blog posts 
                    on WordPress and SEO niche and I run a well-established YouTube channel.
                </p>

                <div class="startup-box">
                    <h5 class="fw-bold"><i class="bi bi-rocket-takeoff-fill text-primary"></i> Wpfixhub Startup</h5>
                    <p class="mb-0">In February 2025, I launched <strong>Wpfixhub</strong>, which has become my most successful startup venture to date.</p>
                </div>

                <div class="mt-4">
                    <h6 class="fw-bold mb-3">Core Expertise:</h6>
                    <span class="skill-badge">WordPress Development</span>
                    <span class="skill-badge">SEO Optimization</span>
                    <span class="skill-badge">Affiliate Marketing</span>
                    <span class="skill-badge">Blogging</span>
                    <span class="skill-badge">YouTube Content</span>
                    <span class="skill-badge">Online Courses</span>
                </div>

                <div class="social-icons mt-4">
                    <a href="https://github.com/RahulkumarWordpressSpecialist" target="_blank"><i class="bi bi-github"></i></a>
                    <a href="https://www.linkedin.com/in/rahul-kumar-3222bb25a" target="_blank"><i class="bi bi-linkedin"></i></a>
                    <a href="https://www.instagram.com/rahulkumar_digital_marketer" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.facebook.com/share/1JGw8fKc7j/" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.upwork.com/freelancers/~011c18843647eb734e" target="_blank" title="Hire Me on Upwork"><i class="bi bi-briefcase-fill"></i></a>
                </div>

                <div class="mt-4">
                    <a href="https://wp-fixhub.com" class="btn btn-primary btn-lg rounded-pill px-4 me-2">Visit WPFixHub</a>
                    <a href="http://rahul.wp-fixhub.com" class="btn btn-outline-dark btn-lg rounded-pill px-4">Portfolio</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>