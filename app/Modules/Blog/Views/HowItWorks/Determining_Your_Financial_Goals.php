<?php
$currentUserID         = $current_user->id ?? '';
$currentUserRoleID     = $current_user->role_id ?? '';
$cuID                  = $cuID ?? 0;
$beta                  = $beta ?? 0;
$registerType = $uri->getSegment(1);
$title = $registerType === 'Investor' ? 'Register An Investor Account' : 'Register An Investor Account Free!';
$btnURL = empty($cuID) ? ($beta === 0 ? site_url('/Free/register') : site_url('/Beta/register')) : site_url('/Dashboard');
$btnText = empty($cuID) ? 'Register Now' : 'Dashboard';
$pageURIA              = $pageURIA ?? '';

$totalActiveUsers      = $reporting['totalActiveUsers'];
$totalWalletsCreated   = $reporting['totalWalletsCreated'];
$totalTradesTracked    = $reporting['totalTradesTracked'];
$totalActivePartners   = $reporting['totalActivePartners'];
$totalApprovedAssets   = $reporting['totalApprovedAssets'];
?>

<style <?= $nonce['style'] ?? '' ?>>

.hero-section {
    background: url(<?= base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>) no-repeat center center fixed;
    background-size: cover;
}
</style>

<!-- Hero Section -->
<section class="hero-section pt-0 full-width">
    <!-- <div class="hero-overlay"></div> -->
    <div class="container-fluid p-5">
        <div class="row align-items-center">
            <div class="col-lg-2"></div>
            <div class="col-lg-4" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content text-white p-4">
                    <span class="badge bg-warning text-dark mb-3 animate-pulse">Introducing</span>
                    <h1 class="display-4 fw-bold mb-3">How It Works</h1>
                    <h2 class="h3 mb-4">Determining Your Financial Goals</h2>
                    <h3 class="lead mb-4">
                        MyMI Wallet empowers you to set and achieve your financial goals through structured planning and personalized tools. Whether you're saving for a home, planning for retirement, or building an emergency fund, our platform provides the resources to guide you every step of the way.
                    </h3>                        
                    <div class="video-container position-relative rounded-4 overflow-hidden shadow-lg">
                        <div class="ratio ratio-16x9">
                            <iframe src="<?= $socialMedia->promotional_yt_video ?>" title="Determining Your Financial Goals with MyMI Wallet" allowfullscreen></iframe>
                        </div>
                        <!-- <div class="video-overlay d-flex align-items-center justify-content-center">
                            <button class="btn-play" id="play-video">
                                <i class="fas fa-play"></i>
                            </button>
                        </div> -->
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="#journey" class="btn btn-warning btn-lg">
                            Start Your Journey
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <!-- <a href="#video" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-play me-2"></i>
                            Watch Video
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 pl-lg-5 d-block-lg" data-aos="fade-left" data-aos-duration="1000">  
                <div class="intro-banner-wrap">
                    <div class="intro-banner-inner">
                        <div class="intro-banner-desc pt-5">
                            <div class="card rounded p-3">
                                <div class="card-body">
                                    <?php 
                                        echo view('App/Views/Auth/register_form');
                                    ?>
                                </div>
                            </div>
                            <div id="features"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wave-divider">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5 bg-light full-width" id="journey">
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1000">
                <span class="badge bg-primary text-white mb-3">Financial Goal Setting Overview</span>
                <h2 class="display-5 fw-bold mb-3">Plan with Purpose</h2>
                <p class="lead mb-5">
                    Setting clear financial goals is the cornerstone of a successful financial plan. MyMI Wallet assists you in defining, tracking, and achieving your objectives, ensuring that your financial decisions align with your personal aspirations.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Process Steps Section -->
<section class="process-section py-5 bg-white">
    <div class="container-fluid">
        <!-- Step 1 -->
        <div class="row align-items-center mb-5 process-step" data-aos="fade-up">
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="process-content p-4">
                    <div class="process-number">1</div>
                    <h3 class="h2 mb-4">Define Your Financial Objectives</h3>
                    <div class="process-items">
                        <div class="process-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex">
                                <div class="process-icon bg-primary text-white">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-primary">Short-Term Goals</h4>
                                    <p>Identify goals achievable within a year, such as building an emergency fund or paying off minor debts.</p>
                                </div>
                            </div>
                        </div>
                        <div class="process-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="d-flex">
                                <div class="process-icon bg-primary text-white">
                                    <i class="fas fa-calendar-week"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-primary">Mid-Term Goals</h4>
                                    <p>Plan for objectives spanning one to five years, like saving for a car or a down payment on a home.</p>
                                </div>
                            </div>
                        </div>
                        <div class="process-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="d-flex">
                                <div class="process-icon bg-primary text-white">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-primary">Long-Term Goals</h4>
                                    <p>Set sights on goals beyond five years, including retirement planning or funding children's education.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary mt-4">Set Your Goals</a>
                </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0">
                <div class="process-image">
                    <img src="assets/define-goals.svg" alt="Define Financial Objectives" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="row align-items-center mb-5 process-step" data-aos="fade-up">
            <div class="col-lg-6 order-1">
                <div class="process-image">
                    <img src="assets/smart-goals.svg" alt="SMART Criteria" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
            <div class="col-lg-6 order-2">
                <div class="process-content p-4">
                    <div class="process-number">2</div>
                    <h3 class="h2 mb-4">Apply the SMART Criteria</h3>
                    <div class="process-items">
                        <div class="process-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex">
                                <div class="process-icon bg-success text-white">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-success">Specific</h4>
                                    <p>Clearly define each goal to provide direction.</p>
                                </div>
                            </div>
                        </div>
                        <div class="process-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="d-flex">
                                <div class="process-icon bg-success text-white">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-success">Measurable</h4>
                                    <p>Quantify your goals to track progress effectively.</p>
                                </div>
                            </div>
                        </div>
                        <div class="process-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="d-flex">
                                <div class="process-icon bg-success text-white">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-success">Achievable</h4>
                                    <p>Set realistic goals considering your financial situation.</p>
                                </div>
                            </div>
                        </div>
                        <div class="process-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="d-flex">
                                <div class="process-icon bg-success text-white">
                                    <i class="fas fa-link"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-success">Relevant</h4>
                                    <p>Ensure your goals align with your broader life plans.</p>
                                </div>
                            </div>
                        </div>
                        <div class="process-item" data-aos="fade-up" data-aos-delay="500">
                            <div class="d-flex">
                                <div class="process-icon bg-success text-white">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-success">Time-Bound</h4>
                                    <p>Assign deadlines to maintain motivation and focus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-success mt-4">Create SMART Goals</a>
                </div>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="row align-items-center mb-5 process-step" data-aos="fade-up">
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="process-content p-4">
                    <div class="process-number">3</div>
                    <h3 class="h2 mb-4">Monitor and Adjust Your Goals</h3>
                    <div class="process-items">
                        <div class="process-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex">
                                <div class="process-icon bg-info text-white">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-info">Regular Reviews</h4>
                                    <p>Periodically assess your progress and make necessary adjustments.</p>
                                </div>
                            </div>
                        </div>
                        <div class="process-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="d-flex">
                                <div class="process-icon bg-info text-white">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-info">Adapt to Life Changes</h4>
                                    <p>Update your goals in response to significant life events or financial shifts.</p>
                                </div>
                            </div>
                        </div>
                        <div class="process-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="d-flex">
                                <div class="process-icon bg-info text-white">
                                    <i class="fas fa-arrows-alt"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-info">Stay Flexible</h4>
                                    <p>Be prepared to re-prioritize goals as circumstances evolve.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-info text-white mt-4">Track Your Progress</a>
                </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0">
                <div class="process-image">
                    <img src="assets/monitor-goals.svg" alt="Monitor and Adjust Goals" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>

        <!-- Step 4 -->
        <div class="row align-items-center mb-5 process-step" data-aos="fade-up">
            <div class="col-lg-6 order-1">
                <div class="process-image">
                    <img src="assets/wallet-tools.svg" alt="MyMI Wallet Tools" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
            <div class="col-lg-6 order-2">
                <div class="process-content p-4">
                    <div class="process-number">4</div>
                    <h3 class="h2 mb-4">Utilize MyMI Wallet Tools</h3>
                    <div class="process-items">
                        <div class="process-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex">
                                <div class="process-icon bg-warning text-dark">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-warning">Budgeting Features</h4>
                                    <p>Allocate funds effectively to support your goals.</p>
                                </div>
                            </div>
                        </div>
                        <div class="process-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="d-flex">
                                <div class="process-icon bg-warning text-dark">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-warning">Goal Tracking</h4>
                                    <p>Visualize your progress and stay motivated.</p>
                                </div>
                            </div>
                        </div>
                        <div class="process-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="d-flex">
                                <div class="process-icon bg-warning text-dark">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="h5 text-warning">Financial Insights</h4>
                                    <p>Gain personalized recommendations to optimize your financial plan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-warning mt-4">Explore Tools</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Achievement Section -->
<section class="py-5 bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-4">Achieve Your Financial Aspirations</h2>
                <p class="lead mb-5">
                    <strong>MyMI Wallet</strong> is your partner in turning financial dreams into reality. By setting clear goals, applying strategic planning, and leveraging our comprehensive tools, you can navigate your financial journey with confidence and clarity.
                </p>
                <a href="#" class="btn btn-primary btn-lg px-5 py-3">Get Started!</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5 bg-white">
    <div class="container-fluid">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8" data-aos="fade-up">
                <span class="badge bg-primary text-white mb-3">Start with Your Why</span>
                <h2 class="display-5 fw-bold mb-3">Determine Your Financial Goals</h2>
                <p class="lead">
                    Before you start investing or budgeting, it's important to define your "why". Whether it's saving for retirement, buying a home, paying off debt, or building generational wealth — having clear goals sets your financial direction.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Feature 1 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-4">
                        <div class="icon-circle bg-primary-soft">
                            <i class="fas fa-piggy-bank text-primary fa-2x"></i>
                        </div>
                    </div>
                    <h3 class="h4 mb-3">Build an Emergency Fund</h3>
                    <p>Set aside 3–6 months of living expenses. It protects you during job loss or emergencies.</p>
                    <div class="progress mt-4" style="height: 8px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <small>Current: $4,500</small>
                        <small>Goal: $6,000</small>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-4">
                        <div class="icon-circle bg-danger-soft">
                            <i class="fas fa-credit-card text-danger fa-2x"></i>
                        </div>
                    </div>
                    <h3 class="h4 mb-3">Eliminate High-Interest Debt</h3>
                    <p>Pay down credit cards and loans. Free up your future income and improve your credit score.</p>
                    <div class="progress mt-4" style="height: 8px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <small>Paid: $3,200</small>
                        <small>Total: $8,000</small>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-4">
                        <div class="icon-circle bg-success-soft">
                            <i class="fas fa-chart-line text-success fa-2x"></i>
                        </div>
                    </div>
                    <h3 class="h4 mb-3">Invest to Build Wealth</h3>
                    <p>Use MyMI Wallet's tools to automate investing and grow long-term net worth.</p>
                    <div class="progress mt-4" style="height: 8px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <small>Current: $12,000</small>
                        <small>Goal: $20,000</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <p class="lead">Your goals drive your plan. Ready to create a personalized financial strategy?</p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                    <a href="#" class="btn btn-primary btn-lg">Customize Your Plan</a>
                    <a href="#" class="btn btn-outline-primary btn-lg">Explore Budgeting Tools</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Step-by-Step Guide -->
<section class="guide-section py-5 bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">🎯 Determining Your Financial Future</h2>
                <p class="lead">Setting goals helps you prioritize your spending, reduce debt, and invest toward your future.</p>
            </div>
        </div>

        <div class="timeline" data-aos="fade-up">
            <!-- Step 1 -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content" data-aos="fade-right">
                    <div class="timeline-number">1</div>
                    <h3>Define Your Objectives</h3>
                    <p>Identify what you want to achieve—retire early, buy a home, start a business, or reduce debt.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content" data-aos="fade-left">
                    <div class="timeline-number">2</div>
                    <h3>Set Specific Goals</h3>
                    <p>Make your goals concrete and measurable. E.g., "Save $5,000 for a car by next year."</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content" data-aos="fade-right">
                    <div class="timeline-number">3</div>
                    <h3>Create a Plan</h3>
                    <p>Use MyMI Wallet to build a budget and reduce unnecessary spending.</p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content" data-aos="fade-left">
                    <div class="timeline-number">4</div>
                    <h3>Track Your Progress</h3>
                    <p>Your dashboard helps monitor progress across all goals.</p>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content" data-aos="fade-right">
                    <div class="timeline-number">5</div>
                    <h3>Re-evaluate Regularly</h3>
                    <p>Review goals every quarter. Adjust as your life and finances evolve.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Budget CTA -->
<section class="py-5 bg-white">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="cta-card bg-success text-white p-5 rounded-4 shadow-lg" data-aos="zoom-in">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="display-6 fw-bold mb-3">🧮 Build a Budget Around Your Goals</h2>
                            <p class="lead mb-4">Start your free MyMI Budget today and discover what's possible.</p>
                            <a href="#" class="btn btn-light btn-lg text-success px-5">Start Budgeting</a>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block">
                            <img src="assets/budget-illustration.svg" alt="Budget Illustration" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5 bg-primary text-white">
    <div class="container-fluid">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Join Our Growing Community</h2>
                <p class="lead">See how MyMI Wallet is helping people achieve their financial goals.</p>
            </div>
        </div>

        <div class="row g-4 text-center">
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card p-3">
                    <div class="stat-number display-4 fw-bold" data-counter="true" data-bs-target="25000">0</div>
                    <p class="stat-label mb-0">Active Users</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card p-3">
                    <div class="stat-number display-4 fw-bold" data-counter="true" data-bs-target="18500">0</div>
                    <p class="stat-label mb-0">Wallets Created</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card p-3">
                    <div class="stat-number display-4 fw-bold" data-counter="true" data-bs-target="1250000">0</div>
                    <p class="stat-label mb-0">Trades Tracked</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-card p-3">
                    <div class="stat-number display-4 fw-bold" data-counter="true" data-bs-target="350">0</div>
                    <p class="stat-label mb-0">Active Partners</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials-section py-5 bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Success Stories</h2>
                <p class="lead">Hear from users who have achieved their financial goals with MyMI Wallet.</p>
            </div>
        </div>

        <div class="testimonial-slider" data-aos="fade-up">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card bg-white p-4 rounded-4 shadow-sm h-100">
                        <div class="testimonial-rating text-warning mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text mb-4">"MyMI Wallet helped me pay off $15,000 in credit card debt in just 18 months. The goal tracking feature kept me motivated throughout the journey."</p>
                        <div class="testimonial-author d-flex align-items-center">
                            <div class="testimonial-avatar me-3">
                                <img src="assets/avatar-1.jpg" alt="Sarah J." class="rounded-circle" width="50" height="50">
                            </div>
                            <div>
                                <h5 class="mb-0">Sarah J.</h5>
                                <small class="text-muted">Debt-Free Since 2024</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card bg-white p-4 rounded-4 shadow-sm h-100">
                        <div class="testimonial-rating text-warning mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text mb-4">"I saved enough for a down payment on my first home in just 2 years using MyMI Wallet's budgeting tools. The visual progress charts kept me on track."</p>
                        <div class="testimonial-author d-flex align-items-center">
                            <div class="testimonial-avatar me-3">
                                <img src="assets/avatar-2.jpg" alt="Michael T." class="rounded-circle" width="50" height="50">
                            </div>
                            <div>
                                <h5 class="mb-0">Michael T.</h5>
                                <small class="text-muted">First-Time Homeowner</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card bg-white p-4 rounded-4 shadow-sm h-100">
                        <div class="testimonial-rating text-warning mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="testimonial-text mb-4">"The retirement planning feature helped me understand exactly how much I needed to save each month. I'm now on track to retire 5 years earlier than planned!"</p>
                        <div class="testimonial-author d-flex align-items-center">
                            <div class="testimonial-avatar me-3">
                                <img src="assets/avatar-3.jpg" alt="Lisa R." class="rounded-circle" width="50" height="50">
                            </div>
                            <div>
                                <h5 class="mb-0">Lisa R.</h5>
                                <small class="text-muted">Early Retirement Planner</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-5 bg-white">
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-4">Ready to Start Your Financial Journey?</h2>
                <p class="lead mb-5">Create your free account today and take the first step toward achieving your financial goals.</p>
                <a href="#" class="btn btn-primary btn-lg px-5 py-3 mb-3">Create Free Account</a>
                <p class="mt-3"><small>No credit card required. Cancel anytime.</small></p>
            </div>
        </div>
    </div>
</section>
<script <?= $nonce['script'] ?? '' ?>>
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
</script>