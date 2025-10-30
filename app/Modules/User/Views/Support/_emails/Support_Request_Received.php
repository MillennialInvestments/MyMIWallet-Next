<!-- Body -->
<h2>We received your support request</h2>
<p>Hi <?= esc($data['name']) ?>,</p>
<p>We have received your support request. One of our Customer Support Team members will get back to you within 24-48 hours. Below are the details of your request:</p>

<table class="details-table">
    <tr>
        <th>Date</th>
        <td><?= esc($data['date']) ?></td>
    </tr>
    <tr>
        <th>Time</th>
        <td><?= esc($data['time']) ?></td>
    </tr>
    <tr>
        <th>Subject</th>
        <td><?= esc($data['subject']) ?></td>
    </tr>
    <tr>
        <th>Details</th>
        <td><?= nl2br(esc($data['details'])) ?></td>
    </tr>
    <tr>
        <th>Priority</th>
        <td><?= esc($data['level']) ?></td>
    </tr>
</table>
<p>If this request was submitted by mistake or you have additional information, please reply to this email or visit our <a href="https://www.mymiwallet.com/index.php/Support" target="_blank">Support Center</a>.</p>
