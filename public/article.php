<?php 
require_once __DIR__ . "/../session.php";
require_once path("/classes/Article.php");

use Classes\Article;

$title = "ModernBlog - Thoughtful Stories & Insights"; 
$id = (int) $_GET['id'] ?? null;
if (!$id) {
    header("Location:" . url('/'));
    exit;
} else {
$articleModel = new Article;
$article = $articleModel->getById($id);
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<?php require_once "../templates/head.php" ?>

<body>

    <?php require_once "../templates/navbar.php" ?>
    <!-- Article Header -->
    <section class="page-header">
        <div class="page-header-content">
            <div class="container">
                <!-- Breadcrumb -->
                <nav class="breadcrumb" data-aos="fade-up">
                    <a class="breadcrumb-item" href="index.html">Home</a>
                    <a class="breadcrumb-item" href="#" data-category="<?= $article['category_name'] ?>"><?= $article['category_name'] ?></a>
                    <span class="breadcrumb-item active"><?= $article['title'] ?></span>
                </nav>

                <div class="article-header">
                    <h1 class="article-detail-title" data-aos="fade-up" data-aos-delay="100">
                        <?= $article['title'] ?>
                    </h1>

                    <div class="article-detail-meta" data-aos="fade-up" data-aos-delay="200">
                        <div class="d-flex align-items-center flex-wrap">
                            <img src="<?= $article['writer_image'] ?>"
                                alt="<?= $article['writer_name'] ?>" class="author-avatar">
                            <div class="author-info">
                                <div class="fw-semibold"><?= $article['writer_name'] ?></div>
                                <div class="small"><?= $article['writer_job_title'] ?></div>
                            </div>
                            <div class="article-meta-items">
                                <span>
                                    <i class="bi bi-calendar3"></i><?=date('M d, Y', strtotime(htmlspecialchars($article['created_at']))) ?>
                                </span>
                                <span>
                                    <i class="bi bi-clock"></i><?= htmlspecialchars($article['read_duration']) ?> min read
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Featured Image -->
                <img <?= url(htmlspecialchars($article['image'])) ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="article-detail-image" data-aos="fade-up">

                <!-- Article Content -->
                <div class="article-detail-content" data-aos="fade-up" data-aos-delay="200">
                  <?= html_entity_decode($article['description']) ?>
                </div>

                <!-- Share Buttons -->
                <div class="share-buttons" data-aos="fade-up">
                    <h5 class="mb-3">Share this article</h5>
                    <a href="#" class="share-btn twitter">
                        <i class="bi bi-twitter me-2"></i>Twitter
                    </a>
                    <a href="#" class="share-btn facebook">
                        <i class="bi bi-facebook me-2"></i>Facebook
                    </a>
                    <a href="#" class="share-btn linkedin">
                        <i class="bi bi-linkedin me-2"></i>LinkedIn
                    </a>
                </div>

                <!-- Author Bio -->
                <div class="author-bio" data-aos="fade-up">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="<?= htmlspecialchars($article['image']) ?>"
                                alt="<?= htmlspecialchars($article['writer_name']) ?>" class="author-bio-avatar">
                        </div>
                        <div class="col">
                            <h5 class="mb-2"><?= htmlspecialchars($article['writer_name'] )?></h5>
                            <p class="text-muted mb-2"><?= htmlspecialchars($article['writer_job_title'] )?></p>
                            <p class="mb-0">
                            <?= htmlspecialchars($article['writer_about']) ?>    
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Articles -->
        <div class="related-articles mt-5" data-aos="fade-up">
            <h3 class="text-center mb-4">Related Articles</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="related-article-card">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="Building Better Web Performance">
                        <div class="p-3">
                            <h6 class="mb-2">Building Better Web Performance</h6>
                            <p class="small text-muted mb-2">Essential techniques for optimizing website speed and performance...</p>
                            <small class="text-muted">Lisa Park • 8 min read</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="related-article-card">
                        <img src="https://images.unsplash.com/photo-1518186233392-c232efbf2373?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="AI in Creative Industries">
                        <div class="p-3">
                            <h6 class="mb-2">The Rise of AI in Creative Industries</h6>
                            <p class="small text-muted mb-2">Explore how artificial intelligence is transforming creative workflows...</p>
                            <small class="text-muted">David Kim • 6 min read</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="related-article-card">
                        <img src="https://images.unsplash.com/photo-1586953208448-b95a79798f07?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="Home Office Setup">
                        <div class="p-3">
                            <h6 class="mb-2">Home Office Setup: Productivity Tips</h6>
                            <p class="small text-muted mb-2">Create an inspiring and efficient workspace that boosts productivity...</p>
                            <small class="text-muted">Jessica Taylor • 4 min read</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        // Share button functionality
        const shareButtons = document.querySelectorAll('.share-btn');
        shareButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const url = encodeURIComponent(window.location.href);
                const title = encodeURIComponent(document.title);

                let shareUrl = '';
                if (btn.classList.contains('twitter')) {
                    shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
                } else if (btn.classList.contains('facebook')) {
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                } else if (btn.classList.contains('linkedin')) {
                    shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
                }

                if (shareUrl) {
                    window.open(shareUrl, '_blank', 'width=600,height=400');
                }
            });
        });
    </script>
</body>

</html>