<style>
    .main-footer {
        background: #1a1a2e; /* Deep dark blue */
        color: #d1d1d1;
        padding: 80px 0 30px;
        position: relative;
    }
    .footer-border-top {
        height: 5px;
        background: linear-gradient(90deg, #6c5ce7, #a29bfe);
        width: 100%;
        position: absolute;
        top: 0;
    }
    .footer-title {
        color: #ffffff;
        font-weight: 700;
        margin-bottom: 25px;
        position: relative;
    }
    .footer-title::after {
        content: '';
        width: 40px;
        height: 3px;
        background: #6c5ce7;
        position: absolute;
        bottom: -8px;
        left: 0;
    }
    .footer-link {
        color: #d1d1d1;
        text-decoration: none;
        transition: 0.3s;
        display: block;
        margin-bottom: 12px;
    }
    .footer-link:hover {
        color: #a29bfe;
        padding-left: 8px;
    }
    .social-circle {
        width: 40px;
        height: 40px;
        background: rgba(255,255,255,0.05);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #fff;
        margin-right: 10px;
        transition: 0.4s;
        text-decoration: none;
    }
    .social-circle:hover {
        background: #6c5ce7;
        transform: translateY(-5px);
        color: #fff;
    }
    .footer-bottom {
        background: #161625;
        padding: 20px 0;
        margin-top: 50px;
        border-top: 1px solid rgba(255,255,255,0.05);
    }
    .hire-me-badge {
        background: linear-gradient(45deg, #00b894, #00cec9);
        color: #fff;
        padding: 10px 20px;
        border-radius: 50px;
        display: inline-block;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }
    .hire-me-badge:hover {
        box-shadow: 0 5px 15px rgba(0, 184, 148, 0.4);
        color: #fff;
    }
</style>

<footer class="main-footer">
    <div class="footer-border-top"></div>
    <div class="container">
        <div class="row">
            
            <div class="col-lg-4 mb-4">
                <h5 class="footer-title text-uppercase">About Developer</h5>
                <p class="small">
                    <strong>Rahul Kumar</strong> - Full-Time Web Developer & Founder of <strong>WPFixHub</strong>. 
                    Helping global clients from USA to Australia with robust digital solutions.
                </p>
                <a href="https://www.upwork.com/freelancers/~011c18843647eb734e" target="_blank" class="hire-me-badge mt-2">
                    <i class="bi bi-briefcase-fill me-2"></i> HIRE ME ON UPWORK
                </a>
            </div>

            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-title text-uppercase">Services</h5>
                <a href="#" class="footer-link">WordPress Dev</a>
                <a href="#" class="footer-link">SEO Optimization</a>
                <a href="#" class="footer-link">Blogging</a>
                <a href="#" class="footer-link">Online Courses</a>
            </div>

            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-title text-uppercase">Projects</h5>
                <a href="https://wp-fixhub.com" target="_blank" class="footer-link">WPFixHub.com</a>
                <a href="http://rahul.wp-fixhub.com" target="_blank" class="footer-link">My Portfolio</a>
                <a href="category.php?type=pdf" class="footer-link">PDF Library</a>
                <a href="coverpage.html" class="footer-link">Assignment Cover Page Generate</a>
                <a href="admin/index.php" class="footer-link">Admin Panel</a>
            </div>

            <div class="col-lg-4 mb-4">
                <h5 class="footer-title text-uppercase">Connect with Rahul</h5>
                <p class="small"><i class="bi bi-envelope-at me-2"></i> rahul@wp-fixhub.com</p>
                <div class="social-icons mt-3">
                    <a href="https://github.com/RahulkumarWordpressSpecialist" target="_blank" class="social-circle"><i class="bi bi-github"></i></a>
                    <a href="https://www.linkedin.com/in/rahul-kumar-3222bb25a" target="_blank" class="social-circle"><i class="bi bi-linkedin"></i></a>
                    <a href="https://www.instagram.com/rahulkumar_digital_marketer" target="_blank" class="social-circle"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.facebook.com/share/1JGw8fKc7j/" target="_blank" class="social-circle"><i class="bi bi-facebook"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 small">© 2025 <strong>WPFixHub</strong>. Designed with ❤️ in Bihar, India.</p>
                </div>

            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>