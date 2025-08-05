<?php 
require_once __DIR__ . "/../session.php";
require_once path("/classes/Category.php");
require_once path("/classes/Article.php");

use Classes\Category;
use Classes\Article;

$title = "ModernBlog - Thoughtful Stories & Insights"; 

$categoryModel = new Category;
$articleModel = new Article;
$categories = $categoryModel->getAll();
$articles = $articleModel->getAll(category_id: $_GET['category_id']??null);
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<?php require_once "../templates/head.php" ?>

<body>

    <?php require_once "../templates/navbar.php" ?>
    <!-- Hero Carousel -->
    <section class="hero-carousel" id="heroCarousel">
        <div id="featuredCarousel" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#featuredCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#featuredCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#featuredCarousel" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner h-100">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                        class="carousel-bg" alt="Featured Article">
                    <div class="carousel-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h1 class="hero-title" data-aos="fade-up">The Future of Remote Work: Trends and Predictions</h1>
                                    <p class="hero-excerpt" data-aos="fade-up" data-aos-delay="100">
                                        Explore how remote work is evolving and what it means for the future of professional collaboration.
                                        From hybrid models to digital nomadism, discover the trends shaping tomorrow's workplace.
                                    </p>
                                    <div class="hero-meta" data-aos="fade-up" data-aos-delay="200">
                                        <i class="bi bi-person-circle me-2"></i>Sarah Johnson •
                                        <i class="bi bi-calendar3 ms-3 me-2"></i>March 15, 2024 •
                                        <i class="bi bi-clock ms-3 me-2"></i>8 min read
                                    </div>
                                    <a href="article.html" class="btn-hero" data-aos="fade-up" data-aos-delay="300">
                                        Read Full Article <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                        class="carousel-bg" alt="Featured Article">
                    <div class="carousel-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h1 class="hero-title">Mastering Minimalist Design Principles</h1>
                                    <p class="hero-excerpt">
                                        Learn how to create clean, effective designs that communicate clearly and engage users
                                        without overwhelming them. Discover the power of simplicity in modern design.
                                    </p>
                                    <div class="hero-meta">
                                        <i class="bi bi-person-circle me-2"></i>Mike Chen •
                                        <i class="bi bi-calendar3 ms-3 me-2"></i>March 12, 2024 •
                                        <i class="bi bi-clock ms-3 me-2"></i>6 min read
                                    </div>
                                    <a href="article.html" class="btn-hero">
                                        Read Full Article <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1527168027773-0cc890c4f42e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                        class="carousel-bg" alt="Featured Article">
                    <div class="carousel-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h1 class="hero-title">Sustainable Travel: A Guide to Eco-Friendly Adventures</h1>
                                    <p class="hero-excerpt">
                                        Discover how to explore the world responsibly while minimizing your environmental impact
                                        and supporting local communities. Travel with purpose and consciousness.
                                    </p>
                                    <div class="hero-meta">
                                        <i class="bi bi-person-circle me-2"></i>Emma Davis •
                                        <i class="bi bi-calendar3 ms-3 me-2"></i>March 10, 2024 •
                                        <i class="bi bi-clock ms-3 me-2"></i>7 min read
                                    </div>
                                    <a href="article.html" class="btn-hero">
                                        Read Full Article <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#featuredCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#featuredCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container" data-aos="fade-up">
            <h2 class="cta-title">Discover weekly stories curated for you</h2>
            <p class="mb-0">Join thousands of readers who trust us to deliver the most insightful content every week.</p>
        </div>
    </section>

    <!-- Category Filter -->
    <section class="category-filter">
        <div class="container">
            <div class="category-scroll d-flex">
                <a href="<?= url('') ?>" class="category-btn <?= !isset($_GET['category_id'])?'active' :'' ?>" data-category="all">All Articles</a>
                <?php foreach($categories as $category) { ?>
                <a href="<?= url("?category_id=".$category['id']) ?>" class="category-btn  <?= isset($_GET['category_id']) && $_GET['category_id'] == $category['id'] ?"active" :"" ?>"" data-category="<?= htmlspecialchars($category['name'] )?>"><?= htmlspecialchars($category['name']) ?></a>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section class="articles-section">
        <div class="container py-3">
            <h2 class="section-title" data-aos="fade-up">Latest Articles</h2>

            <div class="row g-4 m-5 py-5">
                <?php foreach($articles  as $article) { ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                        <article class="article-card">
                            <div class="article-image">
                                <img src="<?= url(htmlspecialchars($article['image'])) ?>" alt="<?= htmlspecialchars($article['title']) ?>">
                                <div class="category-badge"><?= htmlspecialchars($article['category_name']) ?></div>
                            </div>
                            <div class="article-content">
                                <div class="article-meta">
                                    <img src="<?= url(htmlspecialchars($article['writer_image'])) ?>" alt="<?= htmlspecialchars($article['writer_name']) ?>" class="author-avatar">
                                    <div>
                                        <div class="fw-medium"><?= htmlspecialchars($article['writer_name']) ?></div>
                                        <div class="small"><?=date('M d, Y', strtotime(htmlspecialchars($article['created_at']))) ?></div>
                                    </div>
                                </div>
                                <h3 class="article-title">
                                    <a href="<?= url('article.php?id='.$article['id']) ?>"><?= htmlspecialchars($article['title']) ?></a>
                                </h3>
                                <p class="article-excerpt">
                                    Explore how artificial intelligence is transforming creative workflows and what it means for artists and designers in the digital age.
                                </p>
                                <div class="article-footer">
                                    <span class="read-time">
                                        <i class="bi bi-clock me-1"></i><?= htmlspecialchars($article['read_duration']) ?> min read
                                    </span>
                                    <a href="<?= url('article.php?id='.$article['id']) ?>" class="btn-read-more">
                                        Read More <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>



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

        // Sample articles data
        const articles = [{
                id: 1,
                title: "The Rise of AI in Creative Industries",
                excerpt: "Explore how artificial intelligence is transforming creative workflows and what it means for artists and designers in the digital age.",
                author: "David Kim",
                avatar: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80",
                category: "technology",
                date: "March 8, 2024",
                readTime: "6 min read",
                image: "https://images.unsplash.com/photo-1518186233392-c232efbf2373?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 2,
                title: "Building Better Web Performance",
                excerpt: "Essential techniques for optimizing website speed and performance to improve user experience and search rankings.",
                author: "Lisa Park",
                avatar: "https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80",
                category: "technology",
                date: "March 5, 2024",
                readTime: "8 min read",
                image: "https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 3,
                title: "Mindful Living in a Digital Age",
                excerpt: "Strategies for maintaining mental well-being and meaningful connections in our increasingly connected world.",
                author: "Alex Rodriguez",
                avatar: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80",
                category: "lifestyle",
                date: "March 3, 2024",
                readTime: "5 min read",
                image: "https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 4,
                title: "Home Office Setup: Productivity Tips",
                excerpt: "Create an inspiring and efficient workspace that boosts productivity and supports your professional success.",
                author: "Jessica Taylor",
                avatar: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80",
                category: "lifestyle",
                date: "March 1, 2024",
                readTime: "4 min read",
                image: "https://images.unsplash.com/photo-1586953208448-b95a79798f07?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 5,
                title: "Color Psychology in Modern Design",
                excerpt: "Understanding how colors influence emotions and decision-making in user interface and brand design.",
                author: "Mike Chen",
                avatar: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80",
                category: "design",
                date: "February 28, 2024",
                readTime: "7 min read",
                image: "https://images.unsplash.com/photo-1541701494587-cb58502866ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 6,
                title: "Hidden Gems: European Travel Guide",
                excerpt: "Discover lesser-known destinations across Europe that offer authentic experiences away from the tourist crowds.",
                author: "Emma Davis",
                avatar: "https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80",
                category: "travel",
                date: "February 25, 2024",
                readTime: "9 min read",
                image: "https://images.unsplash.com/photo-1488646953014-85cb44e25828?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 7,
                title: "The Future of Sustainable Business",
                excerpt: "How companies are adapting to environmental challenges and creating value through sustainable practices.",
                author: "Robert Wilson",
                avatar: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80",
                category: "business",
                date: "February 22, 2024",
                readTime: "6 min read",
                image: "https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 8,
                title: "Nutrition Myths Debunked",
                excerpt: "Separating fact from fiction in the world of nutrition and healthy eating habits.",
                author: "Dr. Sarah Mitchell",
                avatar: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80",
                category: "health",
                date: "February 20, 2024",
                readTime: "8 min read",
                image: "https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 9,
                title: "Typography Trends for 2024",
                excerpt: "Explore the latest typography trends that are shaping modern web and print design this year.",
                author: "Mike Chen",
                avatar: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80",
                category: "design",
                date: "February 18, 2024",
                readTime: "5 min read",
                image: "https://images.unsplash.com/photo-1586953209026-b85adf3b3ca5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            }
        ];

        let currentFilter = 'all';
        let articlesPerPage = 6;
        let currentPage = 1;

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
        let lastScrollTop = 0;

        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            lastScrollTop = scrollTop;
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

        // Initialize page
        document.addEventListener('DOMContentLoaded', () => {
            renderArticles();

            // Add stagger animation to hero elements
            const heroElements = document.querySelectorAll('[data-aos]');
            heroElements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Parallax effect for hero section (with limits to prevent overlap)
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const heroCarousel = document.getElementById('heroCarousel');

            if (heroCarousel && scrolled < window.innerHeight) {
                const parallaxValue = scrolled * 0.3; // Reduced parallax intensity
                heroCarousel.style.transform = `translateY(${parallaxValue}px)`;
            }
        });

        // Add loading animation to cards
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-up');
                    cardObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe cards for animation
        setTimeout(() => {
            document.querySelectorAll('.article-card').forEach(card => {
                cardObserver.observe(card);
            });
        }, 100);
    </script>
</body>

</html>