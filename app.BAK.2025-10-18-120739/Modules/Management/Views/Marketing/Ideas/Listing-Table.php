<div class="card card-bordered h-100" id="active-ideas-overview">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Active Marketing Ideas</h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="row">
                        <span class="col">                            
                            <a class="btn dynamicModalLoader" data-formtype="Marketing" data-endpoint="addIdea" data-category="Add" data-accountid="<?= $cuID; ?>">
                                <i class="icon ni ni-plus-circle"></i>
                                <span class="pl-0" style="padding-top:3px;">Add Idea</span>
                            </a>
                        </span>
                        <span class="col">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger pt-3 full-width" data-bs-toggle="dropdown">
                                    <em class="icon ni ni-more-h"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-inner">
            <div class="nk-block">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped table-bordered" id="marketingIdeasOverview">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Assigned To</th>
                                    <th>Priority</th>
                                    <th>Platforms</th>
                                    <th>Additional Info</th>
                                    <th>Actions...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($getActiveIdeas as $idea) {
                                    echo '
                                    <tr>
                                        <td><a href="">' . $idea['title'] . '</a></td>
                                        <td><a href="">' . $idea['status'] . '</a></td>
                                        <td><a href="">' . $idea['created_by'] . '</a></td>
                                        <td><a href="">' . $idea['assigned_to'] . '</a></td>
                                        <td><a href="">' . ucfirst($idea['priority']) . '</a></td>
                                        <td><a href="">' . implode(', ', json_decode($idea['platforms'], true)) . '</a></td>
                                        <td><a href="">' . $idea['additional_info'] . '</a></td>
                                        <td>
                                            <a href="' . site_url('Management/Marketing/Ideas/Edit/' . $idea['id']) . '"><i class="icon myfs-md ni ni-edit"></i></a>
                                            <a href="' . site_url('Management/Marketing/Ideas/Copy/' . $idea['id']) . '"><i class="icon myfs-md ni ni-copy"></i></a>
                                            <a class="text-red" href="' . site_url('Management/Marketing/Ideas/Delete/' . $idea['id']) . '"><i class="icon myfs-md ni ni-trash"></i></a>
                                        </td>
                                    </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- .card -->
