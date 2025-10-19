<?php
/** @var array $nonce */
?>

<template id="support-ticket-row-template">
    <tr data-support-ticket="row">
        <td>
            <div class="fw-semibold" data-field="subject">Ticket subject</div>
            <div class="small text-secondary" data-field="meta">#0000 · Category</div>
        </td>
        <td data-field="updatedAt">Just now</td>
        <td>
            <span class="badge text-bg-secondary" data-field="priority">Normal</span>
        </td>
        <td>
            <span class="badge text-bg-light text-uppercase" data-field="status">Open</span>
        </td>
        <td class="text-end">
            <div class="support-ticket-actions">
                <button type="button" class="btn btn-sm btn-outline-primary" data-action="view">View</button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="followup">Follow Up</button>
            </div>
        </td>
    </tr>
</template>