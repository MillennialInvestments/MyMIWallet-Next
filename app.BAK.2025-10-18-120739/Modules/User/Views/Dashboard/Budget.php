
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Income</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-bs-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li>
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-filter-alt"></em><span><span class="d-none d-md-inline"></span>Filtered By</span></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><span>Last 7 Days</span></a></li>
                                        <li><a href="#"><span>Last 30 Days</span></a></li>
                                        <li><a href="#"><span>Last 6 Month</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="nk-block-tools-opt">
                            <a href="#addIncome" data-bs-toggle="modal" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Income</span></a>
                        </li>
                    </ul>
                </div>
            </div><!-- .toggle-wrap -->
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="row g-gs">
        <div class="col-xxl-3 col-sm-6">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Today's Income</h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount">$10,945</div>
                                <div class="nk-ecwg6-ck">
                                    <canvas class="ecommerce-line-chart-s3" id="toDay"></canvas>
                                </div>
                            </div>
                            <div class="info"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><span> vs. Yesterday</span></div>
                        </div>
                    </div><!-- .card-inner -->
                </div><!-- .nk-ecwg -->
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">This Week Income</h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount">$12,338</div>
                                <div class="nk-ecwg6-ck">
                                    <canvas class="ecommerce-line-chart-s3" id="thisWeek"></canvas>
                                </div>
                            </div>
                            <div class="info"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>2.34%</span><span> vs. last week</span></div>
                        </div>
                    </div><!-- .card-inner -->
                </div><!-- .nk-ecwg -->
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title ">
                                <h6 class="title">This Month Income</h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount">$20,847</div>
                                <div class="nk-ecwg6-ck">
                                    <canvas class="ecommerce-line-chart-s3" id="thisMonth"></canvas>
                                </div>
                            </div>
                            <div class="info"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><span> vs. last Month</span></div>
                        </div>
                    </div><!-- .card-inner -->
                </div><!-- .nk-ecwg -->
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">This Year Income</h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount">$23,485</div>
                                <div class="nk-ecwg6-ck">
                                    <canvas class="ecommerce-line-chart-s3" id="thisYear"></canvas>
                                </div>
                            </div>
                            <div class="info"><span class="change up text-primary"><em class="icon ni ni-arrow-long-up"></em>1.34%</span><span> vs. last Year</span></div>
                        </div>
                    </div><!-- .card-inner -->
                </div><!-- .nk-ecwg -->
            </div><!-- .card -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .nk-block -->
<div class="nk-block">
    <div class="card card-bordered card-stretch">
        <div class="card-inner-group">
            <div class="card-inner position-relative card-tools-toggle">
                <div class="card-title-group">
                    <div class="card-title">
                        <h5 class="title">Income List</h5>
                    </div>
                    <div class="card-tools me-n1">
                        <ul class="btn-toolbar gx-1">
                            <li>
                                <a href="#" class="btn btn-icon search-toggle toggle-search" data-bs-target="search"><em class="icon ni ni-search"></em></a>
                            </li><!-- li -->
                            <li class="btn-toolbar-sep"></li><!-- li -->
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-setting"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                        <ul class="link-check">
                                            <li><span>Show</span></li>
                                            <li class="active"><a href="#">10</a></li>
                                            <li><a href="#">20</a></li>
                                            <li><a href="#">50</a></li>
                                        </ul>
                                        <ul class="link-check">
                                            <li><span>Order</span></li>
                                            <li class="active"><a href="#">DESC</a></li>
                                            <li><a href="#">ASC</a></li>
                                        </ul>
                                        <ul class="link-check">
                                            <li><span>Density</span></li>
                                            <li class="active"><a href="#">Regular</a></li>
                                            <li><a href="#">Compact</a></li>
                                        </ul>
                                    </div>
                                </div><!-- .dropdown -->
                            </li><!-- li -->
                        </ul><!-- .btn-toolbar -->
                    </div><!-- .card-tools -->
                </div><!-- .card-title-group -->
                <div class="card-search search-wrap" data-search="search">
                    <div class="card-body">
                        <div class="search-content">
                            <a href="#" class="search-back btn btn-icon toggle-search" data-bs-target="search"><em class="icon ni ni-arrow-left"></em></a>
                            <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by income head">
                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                        </div>
                    </div>
                </div><!-- .card-search -->
            </div><!-- .card-inner -->
            <div class="card-inner p-0">
                <div class="nk-tb-list nk-tb-ulist is-compact">
                    <div class="nk-tb-item nk-tb-head bg-primary-dim">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid">
                                <label class="custom-control-label" for="uid"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col"><span class="sub-text">Category</span></div>
                        <div class="nk-tb-col tb-col-mb"><span class="sub-text">Invoice ID</span></div>
                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Date</span></div>
                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Income Head</span></div>
                        <div class="nk-tb-col"><span class="sub-text">Amount</span></div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid1">
                                <label class="custom-control-label" for="uid1"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span>Tablet</span>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <span class="fw-medium"><a href="html/pharmacy/invoice-details.html">#746F5K2</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span>23 Jan 2019</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span>Sales Rate</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">$2300.00</span>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid2">
                                <label class="custom-control-label" for="uid2"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span>Parking</span>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <span class="fw-medium"><a href="html/pharmacy/invoice-details.html">#546H74W</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span>12 Jan 2020</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span>Parking charges</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">$120.00</span>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid3">
                                <label class="custom-control-label" for="uid3"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span>Syrup</span>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <span class="fw-medium"><a href="html/pharmacy/invoice-details.html">#87X6A44</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span>26 Dec 2019</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span>Sales Rate</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">$560.00</span>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid4">
                                <label class="custom-control-label" for="uid4"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span>Parking</span>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <span class="fw-medium"><a href="html/pharmacy/invoice-details.html">#986G531</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span>21 Jan 2019</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span>Parking charges</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">$540.00</span>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid5">
                                <label class="custom-control-label" for="uid5"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span>Vitamin</span>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <span class="fw-medium"><a href="html/pharmacy/invoice-details.html">#326T4M9</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span>21 Jan 2019</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span>Sales Rate</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">$200.00</span>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid6">
                                <label class="custom-control-label" for="uid6"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span>Canteen Rent</span>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <span class="fw-medium"><a href="html/pharmacy/invoice-details.html">#746F5K2</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span>23 Jan 2019</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span>Canteen Rent</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">$1350.99</span>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid7">
                                <label class="custom-control-label" for="uid7"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span>Inhealer</span>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <span class="fw-medium"><a href="html/pharmacy/invoice-details.html">#546H74W</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span>24 Jan 2019</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span>Sales rate</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">$2550.00</span>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid8">
                                <label class="custom-control-label" for="uid8"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span>CC Camera Rent</span>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <span class="fw-medium"><a href="html/pharmacy/invoice-details.html">#87X6A44</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span>25 Jan 2019</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span>Pharmacy charges</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">$9550.00</span>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid9">
                                <label class="custom-control-label" for="uid9"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span>Mask</span>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <span class="fw-medium"><a href="html/pharmacy/invoice-details.html">#69X6445</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span>26 Jan 2019</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span>Sales rate</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">$8550.00</span>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid10">
                                <label class="custom-control-label" for="uid10"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span>Parkingt</span>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <span class="fw-medium"><a href="html/pharmacy/invoice-details.html">#4206469</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span>27 Jan 2019</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span>Parking charges</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-amount">$4200.00</span>
                        </div>
                    </div><!-- .nk-tb-item -->
                </div><!-- .nk-tb-list -->
            </div><!-- .card-inner -->
            <div class="card-inner">
                <div class="nk-block-between-md g-3">
                    <div class="g">
                        <ul class="pagination justify-content-center justify-content-md-start">
                            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul><!-- .pagination -->
                    </div>
                    <div class="g">
                        <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                            <div>Page</div>
                            <div>
                                <select class="form-select form-select-sm js-select2" data-search="on" data-dropdown="xs center">
                                    <option value="page-1">1</option>
                                    <option value="page-2">2</option>
                                    <option value="page-4">4</option>
                                    <option value="page-5">5</option>
                                    <option value="page-6">6</option>
                                    <option value="page-7">7</option>
                                    <option value="page-8">8</option>
                                    <option value="page-9">9</option>
                                    <option value="page-10">10</option>
                                    <option value="page-11">11</option>
                                    <option value="page-12">12</option>
                                    <option value="page-13">13</option>
                                    <option value="page-14">14</option>
                                    <option value="page-15">15</option>
                                    <option value="page-16">16</option>
                                    <option value="page-17">17</option>
                                    <option value="page-18">18</option>
                                    <option value="page-19">19</option>
                                    <option value="page-20">20</option>
                                </select>
                            </div>
                            <div>OF 102</div>
                        </div>
                    </div><!-- .pagination-goto -->
                </div><!-- .nk-block-between -->
            </div><!-- .card-inner -->
        </div><!-- .card-inner-group -->
    </div><!-- .card -->
</div><!-- .nk-block -->