<?php 
if ($uri->getSegment(1) === 'Memberships') {    
    echo '
    <a href="' . site_url('Memberships/Customize') . '">
        <img class="img img-responsive rounded" src="' . base_url('assets/images/Marketing/Services/MyMIWallet-Customize-Your-Membership-Landing.png') . '" alt="MyMI Wallet - Customize Your Membership" />
    </a>'; 
} elseif ($uri->getSegment(1) === 'Wallets') {
    if ($uri->getTotalSegments() >= 4) { 
        if ($uri->getSegment(4) === 'Customize') {
            echo '<img class="img img-responsive rounded" src="' . base_url('assets/images/Marketing/Services/MyMIWallet-Customize-Your-Membership-Landing.png') . '" alt="MyMI Wallet - Customize Your Membership" />'; 
        } else {
            echo '
            <a href="' . site_url('Wallets/Purchase/Memberships/Customize') . '">
                <img class="img img-responsive rounded" src="' . base_url('assets/images/Marketing/Services/MyMIWallet-Customize-Your-Membership-Landing.png') . '" alt="MyMI Wallet - Customize Your Membership" />
            </a>'; 
        }
    } else {        
        echo '
        <a href="' . site_url('Wallets/Purchase/Memberships/Customize') . '">
            <img class="img img-responsive rounded" src="' . base_url('assets/images/Marketing/Services/MyMIWallet-Customize-Your-Membership-Landing.png') . '" alt="MyMI Wallet - Customize Your Membership" />
        </a>'; 
    }
}
?>