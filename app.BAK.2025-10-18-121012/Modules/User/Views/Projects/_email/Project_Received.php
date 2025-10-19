<!-- Body -->
<h2>Thank You for Submitting Your Project</h2>
<p>Hi <?= esc($data['name']) ?>,</p>

<p>We have received your project submission, <strong>"<?= esc($data['name']) ?>"</strong>. Thank you for your interest in launching your project on the MyMI Wallet platform. Below are the details of your submission:</p>

<table class="details-table">
    <tr>
        <th>Submission Date</th>
        <td><?= esc($data['completion_date']) ?></td>
    </tr>
    <tr>
        <th>Project Name</th>
        <td><?= esc($data['name']) ?></td>
    </tr>
    <tr>
        <th>Target Amount</th>
        <td>$<?= number_format(esc($data['target_amount']), 2) ?></td>
    </tr>
    <tr>
        <th>Minimum Auction Amount</th>
        <td>$<?= number_format(esc($data['minimum_investment']), 2) ?></td>
    </tr>
    <tr>
        <th>Maximum Auction Amount</th>
        <td>$<?= number_format(esc($data['maximum_investment']), 2) ?></td>
    </tr>
    <tr>
        <th>Details</th>
        <td><?= nl2br(esc($data['description'])) ?></td>
    </tr>
</table>

<h3>What’s Next?</h3>
<p>Your project is now under review by the MyMI Management Team. This evaluation process involves an in-depth analysis of the project’s feasibility, financial projections, and overall value to the MyMI community. We may require additional documentation or information, such as detailed financial records or supporting business plans, to complete our review.</p>

<p>If we need further information, a member of our team will reach out to you directly. Upon approval, your project will be listed on the MyMI Wallet platform, where it can be accessed by potential investors.</p>

<h3>KYC Requirements</h3>
<p>Please note that before your project can be approved and listed on our platform, <strong>you must complete the KYC (Know Your Customer) verification process.</strong> This is mandatory to ensure compliance with our platform’s regulatory standards and to protect the integrity of our community.</p>
<p>If you haven’t completed your KYC yet, please visit the <a href="https://www.mymiwallet.com/kyc-verification" target="_blank">KYC Verification Page</a> and follow the steps provided.</p>

<h3>Need Assistance?</h3>
<p>If you have any questions or need assistance during this process, please reply to this email or visit our <a href="https://www.mymiwallet.com/support" target="_blank">Support Center</a>.</p>

<p>Thank you for choosing MyMI Wallet. We look forward to helping you bring your project to life!</p>

<p>Best regards,</p>
<p>The MyMI Wallet Team</p>
