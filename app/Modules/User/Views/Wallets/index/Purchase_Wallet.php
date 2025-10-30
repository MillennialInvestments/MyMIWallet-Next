<?php
echo '
<div class="col-xxl-3 col-lg-4 col-sm-6 mt-3">
	<div class="card card-bordered dashed h-100">
		<div class="nk-wgw-add">
            <div class="nk-wgw-inner">     
                <h6 class="title pt-4">' . $elementTitle . '</h6>
                <span class="sub-text">
                    ' . $elementText . '
                </span>

            </div>
            <div class="nk-wgw-actions">
                <ul class="vertical-divider">';
                    if ($siteSettings->integrationOperations === 1) {
                        echo '
                    <li class="' . $btnSizing . '">
                        <button class="btn" id="link-button"><i class="icon ni ni-search"></i> <span style="padding-top: 2px; padding-left: 5px;">Search</span></button>
                    </li>
                        ';
                    }; 
                echo '
                    <li class="' . $btnSizing . '">
                        <button class="btn dynamicModalLoader" data-formtype="Add" data-endpoint="' . $btnID . '" data-cuid="' . $cuID . '"><i class="icon ni ni-plus"></i> <span style="padding-top: 2px; padding-left: 5px;">Manually Add</span></button>
                    </li>
                </ul>
            </div>
		</div>
	</div>
</div>
';
?>
