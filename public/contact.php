<?php 
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../session.php";
$title = "ModernBlog - Thoughtful Stories & Insights"; 
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<?php require_once "../templates/head.php" ?>

<body>

    <?php require_once "../templates/navbar.php" ?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="page-header-content">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="page-title" data-aos="fade-up">Get In Touch</h1>
                        <p class="page-subtitle" data-aos="fade-up" data-aos-delay="100">
                            We'd love to hear from you! Whether you have a question, feedback, or want to
                            collaborate, don't hesitate to reach out.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container my-5">
        <!-- Success Message -->
        <div class="success-message" id="successMessage">
            <h5 class="mb-2">Message Sent Successfully!</h5>
            <p class="mb-0">Thank you for reaching out. We'll get back to you within 24 hours.</p>
        </div>

        <!-- Contact Info Cards -->
        <section class="contact-info-section">
            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <h4 class="contact-title">Email Us</h4>
                        <div class="contact-details">
                            <p>For general inquiries and support</p>
                            <a href="mailto:hello@modernblog.com">hello@modernblog.com</a><br>
                            <a href="mailto:support@modernblog.com">support@modernblog.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <h4 class="contact-title">Call Us</h4>
                        <div class="contact-details">
                            <p>Available Monday to Friday<br>9:00 AM - 6:00 PM EST</p>
                            <a href="tel:+1234567890">+1 (234) 567-890</a><br>
                            <a href="tel:+1987654321">+1 (987) 654-321</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h4 class="contact-title">Visit Us</h4>
                        <div class="contact-details">
                            <p>Our headquarters</p>
                            <address>
                                123 Innovation Street<br>
                                Creative District<br>
                                New York, NY 10001<br>
                                United States
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form & Map Section -->
        <section class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-8" data-aos="fade-right">
                <div class="contact-form-section">
                    <h3 class="mb-4">Send Us a Message</h3>
                    <form id="contactForm" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="firstName" required>
                                <div class="invalid-feedback">
                                    Please provide your first name.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="lastName" required>
                                <div class="invalid-feedback">
                                    Please provide your last name.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" required>
                                <div class="invalid-feedback">
                                    Please provide a valid email address.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label">Subject *</label>
                                <select class="form-select" id="subject" required>
                                    <option value="">Choose a subject...</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="collaboration">Collaboration</option>
                                    <option value="guest-post">Guest Post Submission</option>
                                    <option value="technical">Technical Support</option>
                                    <option value="feedback">Feedback</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a subject.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" id="message" rows="6"
                                    placeholder="Tell us how we can help you..." required></textarea>
                                <div class="invalid-feedback">
                                    Please provide your message.
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter" value="yes">
                                    <label class="form-check-label" for="newsletter">
                                        I'd like to receive updates about new articles and insights
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="privacy" required>
                                    <label class="form-check-label" for="privacy">
                                        I agree to the <a href="#" class="text-primary">Privacy Policy</a> and
                                        <a href="#" class="text-primary">Terms of Service</a> *
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree to our terms to proceed.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-submit" id="submitBtn">
                                    <span class="btn-text">Send Message</span>
                                    <span class="btn-loading d-none">
                                        <span class="spinner-border spinner-border-sm me-2"></span>
                                        Sending...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Map & Additional Info -->
            <div class="col-lg-4" data-aos="fade-left">
                <div class="contact-card h-100">
                    <h4 class="contact-title mb-4">Find Us Here</h4>

                    <!-- Map Placeholder -->
                    <div class="map-container mb-4">
                        <div class="map-placeholder bg-light rounded" style="height: 250px; display: flex; align-items: center; justify-content: center;">
                            <div class="text-center text-muted">
                                <i class="bi bi-geo-alt-fill display-4 mb-2"></i>
                                <p class="mb-0">Interactive Map<br><small>New York, NY</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-details">
                        <h6 class="mb-3">Office Hours</h6>
                        <div class="mb-2">
                            <strong>Monday - Friday:</strong><br>
                            9:00 AM - 6:00 PM EST
                        </div>
                        <div class="mb-3">
                            <strong>Saturday:</strong><br>
                            10:00 AM - 4:00 PM EST
                        </div>
                        <div class="mb-4">
                            <strong>Sunday:</strong><br>
                            Closed
                        </div>

                        <h6 class="mb-3">Follow Us</h6>
                        <div class="social-links">
                            <a href="#" class="me-3" title="Twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="me-3" title="Facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="me-3" title="Instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="me-3" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Frequently Asked Questions</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="faq-item" data-aos="fade-up" data-aos-delay="0">
                            <button class="faq-question">
                                How can I submit a guest post?
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </button>
                            <div class="faq-answer">
                                We welcome high-quality guest posts! Please send us your pitch including the topic,
                                a brief outline, and your writing samples to hello@modernblog.com. We'll review
                                your submission within 3-5 business days.
                            </div>
                        </div>

                        <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                            <button class="faq-question">
                                Can I republish your articles on my website?
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </button>
                            <div class="faq-answer">
                                We appreciate your interest in sharing our content! Please contact us for
                                permission and proper attribution guidelines. We generally allow republishing
                                with proper credit and a canonical link back to the original article.
                            </div>
                        </div>

                        <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                            <button class="faq-question">
                                How often do you publish new content?
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </button>
                            <div class="faq-answer">
                                We publish new articles 3-4 times per week across various categories including
                                technology, design, lifestyle, and travel. Subscribe to our newsletter to stay
                                updated with our latest content.
                            </div>
                        </div>

                        <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                            <button class="faq-question">
                                Do you offer sponsored content opportunities?
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </button>
                            <div class="faq-answer">
                                Yes, we work with brands that align with our values and audience interests.
                                All sponsored content is clearly labeled and maintains our editorial standards.
                                Contact us with your proposal and we'll discuss potential collaboration opportunities.
                            </div>
                        </div>

                        <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                            <button class="faq-question">
                                How can I unsubscribe from your newsletter?
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </button>
                            <div class="faq-answer">
                                You can unsubscribe at any time by clicking the unsubscribe link at the bottom
                                of any newsletter email. If you need assistance, please contact our support team
                                at support@modernblog.com.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Newsletter Section -->
    <?php require_once "../templates/newsletter.php" ?>
    <!-- Footer -->
    <?php require_once "../templates/footer.php" ?>




    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Theme toggle functionality
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const htmlElement = document.documentElement;

        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        htmlElement.setAttribute('data-bs-theme', savedTheme);
        updateThemeIcon(savedTheme);

        themeToggle.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            htmlElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        });

        function updateThemeIcon(theme) {
            themeIcon.className = theme === 'dark' ? 'bi bi-moon-fill' : 'bi bi-sun-fill';
        }

        // Navbar scroll effect
        const navbar = document.getElementById('mainNavbar');

        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Scroll to top button
        const scrollToTopBtn = document.getElementById('scrollToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });

        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // FAQ functionality
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const faqItem = question.parentElement;
                const answer = faqItem.querySelector('.faq-answer');
                const icon = question.querySelector('.faq-icon');

                // Close all other FAQ items
                faqQuestions.forEach(otherQuestion => {
                    if (otherQuestion !== question) {
                        const otherItem = otherQuestion.parentElement;
                        const otherAnswer = otherItem.querySelector('.faq-answer');
                        const otherIcon = otherQuestion.querySelector('.faq-icon');

                        otherQuestion.classList.remove('active');
                        otherAnswer.classList.remove('show');
                        otherIcon.style.transform = 'rotate(0deg)';
                    }
                });

                // Toggle current FAQ item
                const isActive = question.classList.contains('active');

                if (isActive) {
                    question.classList.remove('active');
                    answer.classList.remove('show');
                    icon.style.transform = 'rotate(0deg)';
                } else {
                    question.classList.add('active');
                    answer.classList.add('show');
                    icon.style.transform = 'rotate(180deg)';
                }
            });
        });

        // Contact form handling
        const contactForm = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        const successMessage = document.getElementById('successMessage');

        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Check form validity
            if (!contactForm.checkValidity()) {
                e.stopPropagation();
                contactForm.classList.add('was-validated');
                return;
            }

            // Show loading state
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoading = submitBtn.querySelector('.btn-loading');

            submitBtn.disabled = true;
            btnText.classList.add('d-none');
            btnLoading.classList.remove('d-none');

            // Simulate form submission
            setTimeout(() => {
                // Hide loading state
                submitBtn.disabled = false;
                btnText.classList.remove('d-none');
                btnLoading.classList.add('d-none');

                // Show success message
                successMessage.classList.add('show');

                // Reset form
                contactForm.reset();
                contactForm.classList.remove('was-validated');

                // Scroll to success message
                successMessage.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                // Hide success message after 6 seconds
                setTimeout(() => {
                    successMessage.classList.remove('show');
                }, 6000);

            }, 2000);
        });

        // Newsletter form handling
        const newsletterForm = document.querySelector('.newsletter-form');

        newsletterForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const emailInput = newsletterForm.querySelector('input[type="email"]');
            const email = emailInput.value.trim();

            // Basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!email) {
                showFormMessage('Please enter your email address.', 'error');
                return;
            }

            if (!emailRegex.test(email)) {
                showFormMessage('Please enter a valid email address.', 'error');
                return;
            }

            // Show success message
            const btn = newsletterForm.querySelector('button');
            const originalText = btn.textContent;

            btn.textContent = 'Subscribed!';
            btn.style.background = '#10b981';
            btn.disabled = true;

            setTimeout(() => {
                btn.textContent = originalText;
                btn.style.background = '';
                btn.disabled = false;
                emailInput.value = '';
                showFormMessage('Thank you for subscribing! You\'ll receive our latest articles soon.', 'success');
            }, 1500);
        });

        function showFormMessage(message, type) {
            // Remove existing messages
            const existingMessage = document.querySelector('.newsletter-message');
            if (existingMessage) {
                existingMessage.remove();
            }

            // Create new message
            const messageDiv = document.createElement('div');
            messageDiv.className = `newsletter-message alert ${type === 'error' ? 'alert-danger' : 'alert-success'} mt-3`;
            messageDiv.style.borderRadius = '50px';
            messageDiv.style.border = 'none';
            messageDiv.style.background = type === 'error' ? 'rgba(220, 53, 69, 0.9)' : 'rgba(16, 185, 129, 0.9)';
            messageDiv.style.color = 'white';
            messageDiv.style.textAlign = 'center';
            messageDiv.textContent = message;

            // Insert after form
            newsletterForm.parentNode.insertBefore(messageDiv, newsletterForm.nextSibling);

            // Remove message after 4 seconds
            setTimeout(() => {
                if (messageDiv.parentNode) {
                    messageDiv.remove();
                }
            }, 4000);
        }

        // Form field validation feedback
        const formInputs = document.querySelectorAll('#contactForm input, #contactForm select, #contactForm textarea');

        formInputs.forEach(input => {
            input.addEventListener('blur', () => {
                if (input.checkValidity()) {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                } else {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                }
            });

            input.addEventListener('input', () => {
                if (input.classList.contains('is-invalid') && input.checkValidity()) {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                }
            });
        });

        // Character counter for message textarea
        const messageTextarea = document.getElementById('message');
        const maxLength = 1000;

        // Create character counter
        const counterDiv = document.createElement('div');
        counterDiv.className = 'form-text text-end';
        counterDiv.innerHTML = `<span id="charCount">0</span>/${maxLength} characters`;
        messageTextarea.parentNode.appendChild(counterDiv);

        messageTextarea.setAttribute('maxlength', maxLength);

        messageTextarea.addEventListener('input', () => {
            const currentLength = messageTextarea.value.length;
            document.getElementById('charCount').textContent = currentLength;

            if (currentLength > maxLength * 0.9) {
                counterDiv.classList.add('text-warning');
            } else {
                counterDiv.classList.remove('text-warning');
            }
        });
    </script>
</body>

</html>