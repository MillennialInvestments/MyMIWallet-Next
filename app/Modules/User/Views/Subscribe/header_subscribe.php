<?php 
$cuID = (string)($cuID ?? '0');  // Cast to string
$beta = (string)($beta ?? '0');  // Cast to string
$date = $date ?? '0';
$hostTime = $hostTime ?? '0';
$time = $time ?? '0';
$redirectURL = previous_url();
$errorClass = empty($errorClass) ? ' error' : $errorClass;
$controlClass = empty($controlClass) ? 'span6' : $controlClass;

$fieldData = array(
    'errorClass' => $errorClass,
    'controlClass' => $controlClass,
);
?>

<?php
echo form_open('#', array('class' => 'form-horizontal', 'id' => 'email_subscribe_form', 'method' => 'POST'), 
    array(
        'category'  => $uriSegment1 ?? '',
        'subject'   => $uriSegment2 ?? '',
        'topic'     => $uriSegment3 ?? '',
        'beta'      => (string)$beta ?? '',
        'date'      => $date ?? '',
        'hostTime'  => $hostTime ?? '',
        'time'      => $time ?? '',
        'user_id'   => (string)$cuID,  // Ensure this is a string
        'user_ip'   => $userIP ?? ''   // Assuming $userIP is the user's IP address passed from the controller
    )
);
?>   
<fieldset>
    <?php
    echo view('UserModule\Views\Subscribe\form_fields', $fieldData);
    ?>
</fieldset>
<fieldset>
    <!-- Allow modules to render custom fields -->
</fieldset>
<fieldset>
    <div class="pricing-action mt-0">
        <p class="sub-text"></p>
        <input class="btn btn-primary" type="submit" name="register" id="subscribeSubmit" value="Subscribe!" />
    </div>
</fieldset>
<?php echo form_close(); ?>
<script <?= $nonce['script'] ?? '' ?>>
const subscribeForm = document.querySelector("#email_subscribe_form");
const subscribeSubmit = {};

if (subscribeForm) { 
    subscribeForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        const formData = new FormData(); 

        subscribeForm.querySelectorAll("input").forEach((inputField) => {
            formData.append(inputField.name, inputField.value);
            subscribeSubmit[inputField.name] = inputField.value;
        });  
        subscribeForm.querySelectorAll("select").forEach((inputField) => {
            formData.append(inputField.name, inputField.value);
            subscribeSubmit[inputField.name] = inputField.value;
        });  

        console.log(...formData);

        try {
            const result = await fetch("<?= site_url('Blog/Email/Subscription/Account-Manager'); ?>", {            
                method: "POST",
                body: JSON.stringify(subscribeSubmit),
                headers: { "Content-Type": "application/json" },
                credentials: "same-origin",
                redirect: "manual",
            });
            const data = await result;
            location.href = '<?= $redirectURL ?>';
            console.log(data);
        } catch (err) {
            console.log(err);
        }
    });
}
</script>
