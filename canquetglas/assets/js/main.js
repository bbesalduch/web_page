/**
 * Hotel Can Quetglas - Main JavaScript
 *
 * @package CanQuetglas
 */

(function() {
    'use strict';

    // DOM Elements
    const header = document.getElementById('site-header');
    const menuToggle = document.getElementById('menu-toggle');
    const mobileNav = document.getElementById('mobile-nav');
    const bookingBar = document.getElementById('booking-bar');
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxClose = document.querySelector('.lightbox-close');
    const contactForm = document.getElementById('contact-form');

    /**
     * Header Scroll Effect
     */
    function handleHeaderScroll() {
        if (!header) return;

        const scrollY = window.scrollY;

        if (scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        // Booking bar visibility
        if (bookingBar) {
            if (scrollY > 500) {
                bookingBar.classList.add('visible');
            } else {
                bookingBar.classList.remove('visible');
            }
        }
    }

    /**
     * Mobile Navigation
     */
    function initMobileNav() {
        if (!menuToggle || !mobileNav) return;

        menuToggle.addEventListener('click', function() {
            const isActive = menuToggle.classList.toggle('active');
            mobileNav.classList.toggle('active');
            mobileNav.setAttribute('aria-hidden', !isActive);
            menuToggle.setAttribute('aria-expanded', isActive);
            document.body.style.overflow = isActive ? 'hidden' : '';
        });

        // Close on link click
        const mobileLinks = mobileNav.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                menuToggle.classList.remove('active');
                mobileNav.classList.remove('active');
                mobileNav.setAttribute('aria-hidden', 'true');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            });
        });

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileNav.classList.contains('active')) {
                menuToggle.classList.remove('active');
                mobileNav.classList.remove('active');
                mobileNav.setAttribute('aria-hidden', 'true');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        });
    }

    /**
     * Scroll Animations (Fade In)
     */
    function initScrollAnimations() {
        const animatedElements = document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right');

        if (!animatedElements.length) return;

        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -50px 0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        animatedElements.forEach(el => observer.observe(el));
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]:not([href="#"])');

        anchorLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    e.preventDefault();
                    const headerHeight = header ? header.offsetHeight : 0;
                    const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Lightbox Gallery
     */
    function initLightbox() {
        const galleryItems = document.querySelectorAll('.gallery-item');

        if (!galleryItems.length || !lightbox || !lightboxImage) return;

        galleryItems.forEach(item => {
            item.addEventListener('click', function() {
                const largeUrl = this.getAttribute('data-large');
                const img = this.querySelector('img');
                const imgUrl = largeUrl || (img ? img.src : '');

                if (imgUrl) {
                    lightboxImage.src = imgUrl;
                    lightboxImage.alt = img ? img.alt : '';
                    lightbox.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            });
        });

        // Close lightbox
        function closeLightbox() {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
            lightboxImage.src = '';
        }

        if (lightboxClose) {
            lightboxClose.addEventListener('click', closeLightbox);
        }

        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && lightbox.classList.contains('active')) {
                closeLightbox();
            }
        });
    }

    /**
     * Gallery Filter
     */
    function initGalleryFilter() {
        const filterButtons = document.querySelectorAll('.gallery-filter-btn');
        const galleryItems = document.querySelectorAll('#gallery-grid .gallery-item');

        if (!filterButtons.length || !galleryItems.length) return;

        filterButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                // Update active state
                filterButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');

                galleryItems.forEach(item => {
                    const categories = item.getAttribute('data-category') || '';

                    if (filter === 'all' || categories.includes(filter)) {
                        item.style.display = '';
                        setTimeout(() => item.classList.add('visible'), 50);
                    } else {
                        item.classList.remove('visible');
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    /**
     * Contact Form (AJAX)
     */
    function initContactForm() {
        if (!contactForm) return;

        const formMessage = document.getElementById('form-message');

        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            formData.append('action', 'canquetglas_contact');

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Enviando...';
            submitBtn.disabled = true;

            fetch(canquetglasData.ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                formMessage.style.display = 'block';

                if (data.success) {
                    formMessage.innerHTML = '<p style="color: var(--color-gold);">' + data.data.message + '</p>';
                    contactForm.reset();
                } else {
                    formMessage.innerHTML = '<p style="color: #e74c3c;">' + data.data.message + '</p>';
                }
            })
            .catch(error => {
                formMessage.style.display = 'block';
                formMessage.innerHTML = '<p style="color: #e74c3c;">Error al enviar el mensaje. Por favor, inténtelo de nuevo.</p>';
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    /**
     * Parallax Effect for Hero
     */
    function initParallax() {
        const hero = document.querySelector('.hero-media');

        if (!hero || window.innerWidth < 768) return;

        function updateParallax() {
            const scrollY = window.scrollY;
            const heroHeight = document.querySelector('.hero')?.offsetHeight || 0;

            if (scrollY < heroHeight) {
                hero.style.transform = `translateY(${scrollY * 0.4}px)`;
            }
        }

        window.addEventListener('scroll', updateParallax, { passive: true });
    }

    /**
     * Preloader
     */
    function hidePreloader() {
        const preloader = document.querySelector('.preloader');
        if (preloader) {
            preloader.classList.add('hidden');
            setTimeout(() => preloader.remove(), 500);
        }
    }

    /**
     * Initialize Everything
     */
    function init() {
        // Event listeners
        window.addEventListener('scroll', handleHeaderScroll, { passive: true });

        // Initialize components
        handleHeaderScroll();
        initMobileNav();
        initScrollAnimations();
        initSmoothScroll();
        initLightbox();
        initGalleryFilter();
        initContactForm();
        initParallax();

        // Hide preloader after page load
        window.addEventListener('load', hidePreloader);
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
