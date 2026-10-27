<?php
$cuFirst = esc($cuFirstName ?? '');
$cuLast = esc($cuLastName ?? '');
$cuDisplay = esc($cuDisplayName ?? '');
$cuPhoneVal = esc($cuPhone ?? '');
$cuDOBVal = esc($cuDOB ?? '');
$cuAddr = esc($cuAddress ?? '');
$cuCityVal = esc($cuCity ?? '');
$cuStateVal = esc($cuState ?? '');
$cuZip = esc($cuZipCode ?? '');
$cuCountryVal = esc($cuCountry ?? 'United States');
$cuMail = esc($cuMailingAddress ?? '');
?>
<div class="modal fade" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personal">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#address">Address</a>
                    </li>
                </ul>
                <form id="profileEditForm" action="<?= site_url('Account') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="personal">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input type="text" class="form-control form-control-lg" id="first_name" name="first_name" value="<?= $cuFirst ?>" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input type="text" class="form-control form-control-lg" id="last_name" name="last_name" value="<?= $cuLast ?>" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="display_name">Display Name</label>
                                        <input type="text" class="form-control form-control-lg" id="display_name" name="display_name" value="<?= $cuDisplay ?>" placeholder="Display name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone">Phone Number</label>
                                        <input type="text" class="form-control form-control-lg" id="phone" name="phone" value="<?= $cuPhoneVal ?>" placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="dob">Date of Birth</label>
                                        <input type="text" class="form-control form-control-lg" id="dob" name="dob" value="<?= $cuDOBVal ?>" placeholder="YYYY-MM-DD">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="address">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="address">Street Address</label>
                                        <input type="text" class="form-control form-control-lg" id="address" name="address" value="<?= $cuAddr ?>" placeholder="123 Main St">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="city">City</label>
                                        <input type="text" class="form-control form-control-lg" id="city" name="city" value="<?= $cuCityVal ?>" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="state">State / Province</label>
                                        <input type="text" class="form-control form-control-lg" id="state" name="state" value="<?= $cuStateVal ?>" placeholder="State">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="zipcode">Zip / Postal Code</label>
                                        <input type="text" class="form-control form-control-lg" id="zipcode" name="zipcode" value="<?= $cuZip ?>" placeholder="Zip code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="country">Country</label>
                                        <input type="text" class="form-control form-control-lg" id="country" name="country" value="<?= $cuCountryVal ?>" placeholder="Country">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="mailing_address">Mailing Address (if different)</label>
                                        <input type="text" class="form-control form-control-lg" id="mailing_address" name="mailing_address" value="<?= $cuMail ?>" placeholder="Mailing Address">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="btnSaveProfile">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('profileEditForm');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        var btn = document.getElementById('btnSaveProfile');
        if (btn) btn.disabled = true;

        var formData = new FormData(form);
        fetch('<?= site_url('api/account/update-profile') ?>', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(function (res) { return res.json(); })
        .then(function (data) {
            if (data.success) {
                location.reload();
            } else {
                alert(data.message || 'Error updating profile. Please check inputs.');
                if (btn) btn.disabled = false;
            }
        })
        .catch(function () {
            form.submit();
        });
    });
});
</script>
