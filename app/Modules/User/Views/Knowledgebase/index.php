<?php
$subViewData = []; 
?>
<div class="bg-light mt-3 pt-5 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Knowledge Base</li>
                </ul>
                <h1>Knowledge Base</h1>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="content">
                <div class="intro-section-title">
                    <span class="overline-title intro-section-subtitle">Guides &amp; Tutorials</span>
                    <h2 class="intro-heading-lead">Suggested Tutorials</h2>
                    <div class="intro-section-desc">
                        <p class="lead"></p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="nk-block-content">
                            <?php echo view('UserModule\Views\Knowledgebase\Tutorials', $subViewData); ?>
                        </div>
                    </div>
                </div>

                <div class="intro-section-title">
                    <h6 class="intro-heading-lead">Promoted Articles</h6>
                    <div class="intro-section-desc">
                        <p class="lead"></p>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <div class="nk-block-content">
                            <?php echo view('UserModule\Views\Knowledgebase\Promoted_Articles', $subViewData); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include your navigation view -->
<?php echo view('UserModule\Views\Knowledgebase\includes\navigation', $subViewData); ?>
