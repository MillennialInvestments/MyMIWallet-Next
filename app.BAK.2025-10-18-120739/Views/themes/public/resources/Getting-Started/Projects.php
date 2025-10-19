<?php 
$subViewData = [
    'debug'     => $debug,
    'uri'       => $uri,
]; 
?>
<style <?= $nonce['style'] ?? '' ?>>
    #projectsBanner {
        background-image: url('<?php echo base_url('assets/images/MyMI-Wallet-Projects-Background.jpeg'); ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100%;
        width: 100%;
    }

    .highlight-image {
        filter: sepia(1) saturate(5) hue-rotate(10deg) brightness(1.2);
        width: 10%; 
    }
</style>
<div class="bg-light mt-3 pt-3 pt-xl-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Getting Started with MyMI Projects</li>
                </ul>
                <h1>Getting Started with MyMI Projects</h1>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="content">
                <h2>Step 1: Create Your Project</h2>
                <p>To launch your first project on MyMI Projects:</p>
                <ol>
                    <li>Visit <a href="<?= site_url('/projects/create'); ?>">Create New Project</a>.</li>
                    <li>Provide a high-level overview of your project, including its purpose and objectives.</li>
                    <li>Add supporting details such as current financials, projected financials, and management strategies.</li>
                    <li>Submit your project for review and listing on the platform.</li>
                </ol>

                <h2>Step 2: Showcase Your Financial Details</h2>
                <p>Make your project stand out by including:</p>
                <ul>
                    <li>A summary of current financials (e.g., revenue, expenses, profitability).</li>
                    <li>Projected financial growth, including ROI estimates.</li>
                    <li>Plans for fund allocation and future milestones.</li>
                </ul>

                <h2>Step 3: Engage with the Community</h2>
                <p>Build trust and attract investors by:</p>
                <ol>
                    <li>Sharing updates on your project's progress.</li>
                    <li>Interacting with potential investors through comments and private messaging.</li>
                    <li>Utilizing community feedback to refine your project proposal.</li>
                </ol>

                <h2>Step 4: Secure Investments</h2>
                <p>Once your project is live:</p>
                <ol>
                    <li>Monitor investor interest and respond to inquiries.</li>
                    <li>Negotiate investment terms and finalize agreements.</li>
                    <li>Manage funds and track performance through the MyMI Wallet dashboard.</li>
                </ol>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="content">
                <div class="ratio ratio-16x9 mb-5">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/example_video_id" 
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
                            encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                    </iframe>
                </div>
                <h2>Need Help?</h2>
                <p>If you have any questions, visit our <a href="<?= site_url('/support'); ?>">Support Page</a> or join our <a href="https://discord.gg/YourDiscordLink">Discord Community</a>.</p>

                <h2>Join the Community</h2>
                <p>Connect with like-minded users, gain insights, and expand your project's reach. Join the conversation on <a href="https://discord.gg/YourDiscordLink">Discord</a>.</p>
            </div>
        </div>
    </div>
    <hr>
    <?php echo view('themes/public/resources/stayConnected', $subViewData); ?>
    <hr>
    <div class="row justify-content-center my-5">
        <div class="col-12 col-lg-12">   
            <?php // Add additional resources or content sections here ?>
        </div>
    </div>
</div>
