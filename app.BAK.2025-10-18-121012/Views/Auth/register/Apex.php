<?php 
$subViewData = [
  'socialMedia' => $socialMedia,
  'uri' => $uri,
]; 
?>

<style <?= $nonce['style'] ?? '' ?>>
  #apexRegistrationBanner {
    /* background-image: url('<?php echo base_url("assets/images/Partners/TBI-Solutions-Background1.png"); ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat; */
    width: 100%;
    min-height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    padding: 50px 2rem;
    margin-bottom: 2rem;
  }
  .section-divider {
    border-top: 2px solid #eee;
    margin: 3rem 0;
  }
</style>

<?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
<div class="container">
    <div class="row text-center mb-4">
        <div class="col-12">
        <h2 class="text-primary">� Ready to Join Us?</h2>
        <p class="lead">Register now and begin building your first funded account using the MyMI Wallet system.</p>
        <a href="<?php echo site_url('/Apex/register'); ?>" class="btn btn-lg btn-success mt-3 mb-4">
            � Register Today
        </a>
        </div>
    </div>

    <div class="row justify-content-center text-center">
        <div class="col-md-10">
        <h3>� When You Register, You'll Gain Access To:</h3>
        <ul class="list-unstyled fs-5">
            <li>✅ Step-by-step onboarding into the MyMI x Apex strategy</li>
            <li>✅ Discounted evaluation links for Apex Trader Funding</li>
            <li>✅ Early access to available MyMI Feeder Account assignments</li>
            <li>✅ Invitation to our private Discord trading server</li>
        </ul>
        </div>
    </div>

    <div class="section-divider"></div>

    <div class="row text-center mt-5">
        <div class="col-12">
        <h4>� Already a Member?</h4>
        <p>Make sure you've joined our community channels:</p>
        <p>
            <a href="https://facebook.com/MyMIWallet" target="_blank" class="me-3">Facebook</a> |
            <a href="https://facebook.com/groups/InvestorsTalk" target="_blank" class="mx-3">Investor’s Talk Group</a> |
            <a href="https://discord.gg/mymiwallet" target="_blank" class="mx-3">Discord</a> |
            <a href="https://twitter.com/MyMIWallet" target="_blank" class="mx-3">Twitter</a>
        </p>
        </div>
    </div>

</div>
