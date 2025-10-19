// JavaScript for MyMI Wallet "How It Works" Page

// Initialize AOS (Animate On Scroll)
document.addEventListener('DOMContentLoaded', function() {
  // Initialize AOS
  AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true,
    mirror: false
  });

  // Navbar scroll effect
  const navbar = document.querySelector('.navbar');
  window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
      navbar.classList.add('navbar-scrolled');
    } else {
      navbar.classList.remove('navbar-scrolled');
    }
  });

  // Video play button
  const playButton = document.getElementById('play-video');
  const videoOverlay = document.querySelector('.video-overlay');
  if (playButton && videoOverlay) {
    playButton.addEventListener('click', function() {
      videoOverlay.style.opacity = '0';
      const iframe = document.querySelector('.video-container iframe');
      if (iframe) {
        // Add autoplay parameter to URL
        const src = iframe.src;
        if (src.indexOf('?') > -1) {
          iframe.src = src + '&autoplay=1';
        } else {
          iframe.src = src + '?autoplay=1';
        }
      }
    });
  }

  // Counter animation
  const counterElements = document.querySelectorAll('[data-counter="true"]');
  
  // Function to animate counter
  function animateCounter(el) {
    const target = parseInt(el.getAttribute('data-bs-target'));
    const duration = 2000; // 2 seconds
    const step = target / (duration / 16); // 60fps
    let current = 0;
    
    const timer = setInterval(() => {
      current += step;
      if (current >= target) {
        el.textContent = target.toLocaleString();
        clearInterval(timer);
      } else {
        el.textContent = Math.floor(current).toLocaleString();
      }
    }, 16);
  }
  
  // Intersection Observer for counters
  const observerOptions = {
    threshold: 0.5
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  counterElements.forEach(counter => {
    observer.observe(counter);
  });

  // Form submission
  const signupForm = document.getElementById('signup-form');
  if (signupForm) {
    signupForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Get form values
      const firstName = document.getElementById('firstName').value;
      const lastName = document.getElementById('lastName').value;
      const email = document.getElementById('email').value;
      
      // Show success message
      const formContainer = signupForm.parentElement;
      formContainer.innerHTML = `
        <div class="text-center py-4">
          <div class="mb-4">
            <i class="fas fa-check-circle text-success fa-5x"></i>
          </div>
          <h3>Thank You, ${firstName}!</h3>
          <p class="lead">Your account has been created successfully.</p>
          <p>We've sent a confirmation email to <strong>${email}</strong>.</p>
          <a href="#" class="btn btn-primary mt-3">Go to Dashboard</a>
        </div>
      `;
    });
  }

  // Timeline scroll reveal
  const revealElements = document.querySelectorAll('.reveal');
  
  function revealOnScroll() {
    for (let i = 0; i < revealElements.length; i++) {
      const windowHeight = window.innerHeight;
      const elementTop = revealElements[i].getBoundingClientRect().top;
      const elementVisible = 150;
      
      if (elementTop < windowHeight - elementVisible) {
        revealElements[i].classList.add('active');
      }
    }
  }
  
  window.addEventListener('scroll', revealOnScroll);
  revealOnScroll(); // Check on load

  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;
      
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 80, // Adjust for navbar height
          behavior: 'smooth'
        });
      }
    });
  });

  // Progress bar animation
  const progressBars = document.querySelectorAll('.progress-bar');
  
  const progressObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.style.width = entry.target.getAttribute('aria-valuenow') + '%';
        }, 200);
        progressObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });
  
  progressBars.forEach(bar => {
    bar.style.width = '0%';
    progressObserver.observe(bar);
  });

  // Testimonial slider (simple version)
  const testimonialCards = document.querySelectorAll('.testimonial-card');
  if (testimonialCards.length > 0) {
    let currentIndex = 0;
    
    // Only needed for mobile view
    if (window.innerWidth < 768) {
      function showTestimonial(index) {
        testimonialCards.forEach((card, i) => {
          if (i === index) {
            card.style.display = 'block';
          } else {
            card.style.display = 'none';
          }
        });
      }
      
      // Initialize
      showTestimonial(currentIndex);
      
      // Auto-rotate every 5 seconds
      setInterval(() => {
        currentIndex = (currentIndex + 1) % testimonialCards.length;
        showTestimonial(currentIndex);
      }, 5000);
    }
  }
});

// Create placeholder images for demo purposes
function createPlaceholderImage(selector, text, width, height, bgColor = '#3E61BC') {
  const elements = document.querySelectorAll(selector);
  elements.forEach(el => {
    if (!el.src || el.src.endsWith('#placeholder')) {
      const canvas = document.createElement('canvas');
      canvas.width = width || 800;
      canvas.height = height || 600;
      const ctx = canvas.getContext('2d');
      
      // Background
      ctx.fillStyle = bgColor;
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      
      // Text
      ctx.fillStyle = '#ffffff';
      ctx.font = 'bold 24px Arial';
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.fillText(text || 'Placeholder Image', canvas.width / 2, canvas.height / 2);
      
      el.src = canvas.toDataURL();
    }
  });
}

// Run after page load
window.addEventListener('load', function() {
  // Create placeholder images for missing assets
  createPlaceholderImage('img[src="assets/logo-white.png"]', 'MyMI Wallet', 200, 50);
  createPlaceholderImage('img[src="assets/define-goals.svg"]', 'Define Goals', 600, 400);
  createPlaceholderImage('img[src="assets/smart-goals.svg"]', 'SMART Goals', 600, 400);
  createPlaceholderImage('img[src="assets/monitor-goals.svg"]', 'Monitor Goals', 600, 400);
  createPlaceholderImage('img[src="assets/wallet-tools.svg"]', 'Wallet Tools', 600, 400);
  createPlaceholderImage('img[src="assets/budget-illustration.svg"]', 'Budget', 300, 300);
  createPlaceholderImage('img[src="assets/avatar-1.jpg"]', 'Avatar 1', 100, 100, '#6c757d');
  createPlaceholderImage('img[src="assets/avatar-2.jpg"]', 'Avatar 2', 100, 100, '#6c757d');
  createPlaceholderImage('img[src="assets/avatar-3.jpg"]', 'Avatar 3', 100, 100, '#6c757d');
  createPlaceholderImage('img[src="assets/app-store.png"]', 'App Store', 120, 40, '#000000');
  createPlaceholderImage('img[src="assets/google-play.png"]', 'Google Play', 120, 40, '#000000');
});
