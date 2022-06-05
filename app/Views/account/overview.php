<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
	<!--begin::Container-->
	<div class="container" id="kt_content_container">
		<!--begin::Layout - Overview-->
		<div class="d-flex flex-column flex-xl-row">
			<!--begin::Sidebar-->
			<div class="flex-column flex-lg-row-auto w-100 w-xl-325px mb-10">
				<!--begin::Card-->
				<div class="card card-flush" data-kt-sticky="true" data-kt-sticky-name="account-navbar" data-kt-sticky-offset="{default: false, xl: '80px'}" data-kt-sticky-width="{lg: '250px', xl: '325px'}" data-kt-sticky-left="auto" data-kt-sticky-top="90px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
					<!--begin::Card header-->
					<div class="card-header justify-content-end">
						<!--begin::Toolbar-->
						<div class="card-toolbar">
							<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
								<i class="bi bi-three-dots fs-3"></i>
							</button>
							<!--begin::Menu 3-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
								<!--begin::Heading-->
								<div class="menu-item px-3">
									<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
								</div>
								<!--end::Heading-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link px-3">Create Invoice</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link flex-stack px-3">Create Payment
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link px-3">Generate Bill</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
									<a href="#" class="menu-link px-3">
										<span class="menu-title">Subscription</span>
										<span class="menu-arrow"></span>
									</a>
									<!--begin::Menu sub-->
									<div class="menu-sub menu-sub-dropdown w-175px py-4">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3">Plans</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3">Billing</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3">Statements</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<div class="menu-content px-3">
												<!--begin::Switch-->
												<label class="form-check form-switch form-check-custom form-check-solid">
													<!--begin::Input-->
													<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
													<!--end::Input-->
													<!--end::Label-->
													<span class="form-check-label text-muted fs-6">Recuring</span>
													<!--end::Label-->
												</label>
												<!--end::Switch-->
											</div>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu sub-->
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3 my-1">
									<a href="#" class="menu-link px-3">Settings</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::Menu 3-->
						</div>
						<!--end::Toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0 p-10">
						<!--begin::Summary-->
						<div class="d-flex flex-center flex-column mb-10">
							<!--begin::Avatar-->
							<div class="symbol mb-3 symbol-100px symbol-circle">
								<img alt="Pic" src="assets/media/avatars/150-1.jpg" />
							</div>
							<!--end::Avatar-->
							<!--begin::Name-->
							<a href="#" class="fs-2 text-gray-800 text-hover-primary fw-bolder mb-1">Emma Smith</a>
							<!--end::Name-->
							<!--begin::Position-->
							<div class="fs-6 fw-bold text-gray-400 mb-2">Art Director</div>
							<!--end::Position-->
							<!--begin::Actions-->
							<div class="d-flex flex-center">
								<a href="#" class="btn btn-sm btn-light-primary py-2 px-4 fw-bolder me-2" data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_chat">Send Message</a>
							</div>
							<!--end::Actions-->
						</div>
						<!--end::Summary-->
						<!--begin::Menu-->
						<ul class="menu menu-column menu-pill menu-title-gray-700 menu-bullet-gray-300 menu-state-bg menu-state-bullet-primary fw-bolder fs-5 mb-10">
							<!--begin::Menu item-->
							<li class="menu-item mb-1">
								<!--begin::Menu link-->
								<a class="menu-link px-6 py-4 active" href="account/overview.html">
									<span class="menu-bullet">
										<span class="bullet"></span>
									</span>
									<span class="menu-title">Overview</span>
								</a>
								<!--end::Menu link-->
							</li>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<li class="menu-item mb-1">
								<!--begin::Menu link-->
								<a class="menu-link px-6 py-4" href="#">
									<span class="menu-bullet">
										<span class="bullet"></span>
									</span>
									<span class="menu-title">Settings</span>
								</a>
								<!--end::Menu link-->
							</li>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<li class="menu-item mb-1">
								<!--begin::Menu link-->
								<a class="menu-link px-6 py-4" href="#">
									<span class="menu-bullet">
										<span class="bullet"></span>
									</span>
									<span class="menu-title">Security</span>
								</a>
								<!--end::Menu link-->
							</li>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<li class="menu-item mb-1">
								<!--begin::Menu link-->
								<a class="menu-link px-6 py-4" href="#">
									<span class="menu-bullet">
										<span class="bullet"></span>
									</span>
									<span class="menu-title">Audit Logs</span>
								</a>
								<!--end::Menu link-->
							</li>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<li class="menu-item mb-1">
								<!--begin::Menu link-->
								<a class="menu-link px-6 py-4" href="#">
									<span class="menu-bullet">
										<span class="bullet"></span>
									</span>
									<span class="menu-title">Activity</span>
								</a>
								<!--end::Menu link-->
							</li>
							<!--end::Menu item-->
						</ul>
						<!--end::Menu-->
						<!--begin::Account info-->
						<div class="border border-dashed border-gray-300 bg-lighten card-rounded p-6">
							<!--begin::Title-->
							<h5 class="mb-4">Account Status</h5>
							<!--end::Title-->
							<!--begin::Package-->
							<div class="mb-3">
								<!--begin::Plan-->
								<span class="badge bg-success me-2 card-rounded">Basic Bundle</span>
								<!--end::Plan-->
								<!--begin::Price-->
								<span class="fw-bold text-gray-600">$149.99 / Year</span>
								<!--end::Price-->
							</div>
							<!--end::Package-->
							<a href="#" class="text-link fs-7 fw-bolder" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade to Pro</a>
						</div>
						<!--end::Account info-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Sidebar-->
			<!--begin::Content-->
			<div class="flex-lg-row-fluid ms-lg-10">
				<!--begin::details View-->
				<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
					<!--begin::Card header-->
					<div class="card-header cursor-pointer">
						<!--begin::Card title-->
						<div class="card-title m-0">
							<h3 class="fw-bolder m-0">Profile Details</h3>
						</div>
						<!--end::Card title-->
						<!--begin::Action-->
						<a href="#" class="btn btn-primary align-self-center">Edit Profile</a>
						<!--end::Action-->
					</div>
					<!--begin::Card header-->
					<!--begin::Card body-->
					<div class="card-body p-9">
						<!--begin::Row-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-bold text-muted">Full Name</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8">
								<span class="fw-bolder fs-6 text-dark">Max Smith</span>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
						<!--begin::Input group-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-bold text-muted">Company</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
								<span class="fw-bold fs-6">Keenthemes</span>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-bold text-muted">Contact Phone
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 d-flex align-items-center">
								<span class="fw-bolder fs-6 me-2">044 3276 454 935</span>
								<span class="badge badge-success">Verified</span>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-bold text-muted">Company Site</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8">
								<a href="#" class="fw-bold fs-6 text-dark text-hover-primary">keenthemes.com</a>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-bold text-muted">Country
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i></label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8">
								<span class="fw-bolder fs-6 text-dark">Germany</span>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-bold text-muted">Communication</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8">
								<span class="fw-bolder fs-6 text-dark">Email, Phone</span>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-10">
							<!--begin::Label-->
							<label class="col-lg-4 fw-bold text-muted">Allow Changes</label>
							<!--begin::Label-->
							<!--begin::Label-->
							<div class="col-lg-8">
								<span class="fw-bold fs-6">Yes</span>
							</div>
							<!--begin::Label-->
						</div>
						<!--end::Input group-->
						<!--begin::Notice-->
						<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
							<!--begin::Icon-->
							<!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
							<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
								<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
									<rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
									<rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
								</svg>
							</span>
							<!--end::Svg Icon-->
							<!--end::Icon-->
							<!--begin::Wrapper-->
							<div class="d-flex flex-stack flex-grow-1">
								<!--begin::Content-->
								<div class="fw-bold">
									<h4 class="text-gray-800 fw-bolder">We need your attention!</h4>
									<div class="fs-6 text-gray-600">Your payment was declined. To start using tools, please
										<a class="fw-bolder" href="account/billing.html">Add Payment Method</a>.
									</div>
								</div>
								<!--end::Content-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Notice-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::details View-->
				<!--begin::Chart widget 2-->
				<div class="card mb-5 mb-xl-10">
					<!--begin::Body-->
					<div class="card-body pb-0 px-0">
						<!--begin::Header-->
						<div class="d-flex flex-stack px-9">
							<!--begin::Info-->
							<div class="d-flex flex-column">
								<h2 class="text-dark mb-1 fs-2 fw-boldest">Sales Summary</h2>
								<span class="text-gray-400 fw-bold fs-6">27 New Deals</span>
							</div>
							<!--end::Info-->
							<!--begin::Tabs-->
							<ul class="nav nav-pills nav-line-pills border rounded p-1">
								<li class="nav-item me-2">
									<a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-bold active" data-bs-toggle="tab" href="#kt_charts_widget_3_tab_pane_1" id="kt_charts_widget_3_tab_1">Day</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-bold" data-bs-toggle="tab" href="#kt_charts_widget_3_tab_pane_2" id="kt_charts_widget_3_tab_2">Month</a>
								</li>
							</ul>
							<!--end::Tabs-->
						</div>
						<!--end::Header-->
						<!--begin::Tab content-->
						<div class="tab-content pt-8">
							<!--begin::Tab pane-->
							<div class="tab-pane fade active show" id="kt_charts_widget_3_tab_pane_1">
								<!--begin::Chart-->
								<div id="kt_charts_widget_3_chart_1" style="height: 350px"></div>
								<!--end::Chart-->
							</div>
							<!--end::Tab pane-->
							<!--begin::Tab pane-->
							<div class="tab-pane fade" id="kt_charts_widget_3_tab_pane_2">
								<!--begin::Chart-->
								<div id="kt_charts_widget_3_chart_2" style="height: 350px"></div>
								<!--end::Chart-->
							</div>
							<!--end::Tab pane-->
						</div>
						<!--end::Tab content-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Chart widget 2-->
				<!--begin::Table Widget 1-->
				<div class="card mb-5 mb-xl-10">
					<!--begin::Header-->
					<div class="card-header border-0 pt-5 pb-3">
						<!--begin::Card title-->
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-boldest text-gray-800 fs-2">Teams Progress</span>
							<span class="text-gray-400 fw-bold mt-2 fs-6">890,344 Sales</span>
						</h3>
						<!--end::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<!--begin::Search-->
							<div class="position-relative pe-6 my-1">
								<!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
								<span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg>
								</span>
								<!--end::Svg Icon-->
								<input type="text" class="w-150px form-control form-control-sm form-control-solid ps-10" name="search" value="" placeholder="Search" />
							</div>
							<!--end::Search-->
							<div class="my-1">
								<!--begin::Select-->
								<select class="form-select form-select-sm form-select-solid fw-bolder w-125px" data-control="select2" data-placeholder="All Users" data-hide-search="true">
									<option value="1" selected="selected">All Users</option>
									<option value="2">Active users</option>
									<option value="3">Pending users</option>
								</select>
								<!--end::Select-->
							</div>
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body py-0">
						<!--begin::Table-->
						<div class="table-responsive">
							<table class="table align-middle table-row-bordered table-row-dashed gy-5" id="kt_table_widget_1">
								<!--begin::Table body-->
								<tbody>
									<!--begin::Table row-->
									<tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
										<th class="w-20px ps-0">
											<div class="form-check form-check-sm form-check-custom form-check-solid me-5">
												<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_widget_1 .form-check-input" value="1" />
											</div>
										</th>
										<th class="min-w-200px px-0">Authors</th>
										<th class="min-w-125px">Company</th>
										<th class="min-w-125px">Progress</th>
										<th class="text-end pe-2 min-w-70px">Action</th>
									</tr>
									<!--end::Table row-->
									<!--begin::Table row-->
									<tr>
										<!--begin::Checkbox-->
										<td class="p-0">
											<div class="form-check form-check-sm form-check-custom form-check-solid">
												<input class="form-check-input" type="checkbox" value="1" />
											</div>
										</td>
										<!--end::Checkbox-->
										<!--begin::Author=-->
										<td class="p-0">
											<div class="d-flex align-items-center">
												<!--begin::Logo-->
												<div class="symbol symbol-circle symbol-50px me-2">
													<span class="symbol-label">
														<img alt="" class="w-25px" src="assets/media/svg/brand-logos/aven.svg" />
													</span>
												</div>
												<!--end::Logo-->
												<div class="ps-3">
													<a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Brad Simmons</a>
													<span class="text-gray-400 fw-bold d-block">HTML, JS, ReactJS</span>
												</div>
											</div>
										</td>
										<!--end::Author=-->
										<!--begin::Company=-->
										<td>
											<span class="text-gray-800 fw-boldest fs-5 d-block">Intertico</span>
											<span class="text-gray-400 fw-bold">Web, UI/UX Design</span>
										</td>
										<!--end::Company=-->
										<!--begin::Progress=-->
										<td>
											<div class="d-flex flex-column w-100 me-2 mt-2">
												<span class="text-gray-400 me-2 fw-boldest mb-2">65%</span>
												<div class="progress bg-light-danger w-100 h-5px">
													<div class="progress-bar bg-danger" role="progressbar" style="width: 65%"></div>
												</div>
											</div>
										</td>
										<!--end::Company=-->
										<!--begin::Action=-->
										<td class="pe-0 text-end">
											<a href="#" class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
										</td>
										<!--end::Action=-->
									</tr>
									<!--end::Table row-->
									<!--begin::Table row-->
									<tr>
										<!--begin::Checkbox-->
										<td class="p-0">
											<div class="form-check form-check-sm form-check-custom form-check-solid">
												<input class="form-check-input" type="checkbox" value="1" />
											</div>
										</td>
										<!--end::Checkbox-->
										<!--begin::Author=-->
										<td class="p-0">
											<div class="d-flex align-items-center">
												<!--begin::Logo-->
												<div class="symbol symbol-circle symbol-50px me-2">
													<span class="symbol-label">
														<img alt="" class="w-25px" src="assets/media/svg/brand-logos/leaf.svg" />
													</span>
												</div>
												<!--end::Logo-->
												<div class="ps-3">
													<a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Jessie Clarcson</a>
													<span class="text-gray-400 fw-bold d-block">C#, ASP.NET, MS SQL</span>
												</div>
											</div>
										</td>
										<!--end::Author=-->
										<!--begin::Company=-->
										<td>
											<span class="text-gray-800 fw-boldest fs-5 d-block">Agoda</span>
											<span class="text-gray-400 fw-bold">Houses &amp; Hotels</span>
										</td>
										<!--end::Company=-->
										<!--begin::Progress=-->
										<td>
											<div class="d-flex flex-column w-100 me-2 mt-2">
												<span class="text-gray-400 me-2 fw-boldest mb-2">85%</span>
												<div class="progress bg-light-danger w-100 h-5px">
													<div class="progress-bar bg-primary" role="progressbar" style="width: 85%"></div>
												</div>
											</div>
										</td>
										<!--end::Company=-->
										<!--begin::Action=-->
										<td class="pe-0 text-end">
											<a href="#" class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
										</td>
										<!--end::Action=-->
									</tr>
									<!--end::Table row-->
									<!--begin::Table row-->
									<tr>
										<!--begin::Checkbox-->
										<td class="p-0">
											<div class="form-check form-check-sm form-check-custom form-check-solid">
												<input class="form-check-input" type="checkbox" value="1" />
											</div>
										</td>
										<!--end::Checkbox-->
										<!--begin::Author=-->
										<td class="p-0">
											<div class="d-flex align-items-center">
												<!--begin::Logo-->
												<div class="symbol symbol-circle symbol-50px me-2">
													<span class="symbol-label">
														<img alt="" class="w-25px" src="assets/media/svg/brand-logos/atica.svg" />
													</span>
												</div>
												<!--end::Logo-->
												<div class="ps-3">
													<a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Lebron Wayde</a>
													<span class="text-gray-400 fw-bold d-block">PHP, Laravel, VueJS</span>
												</div>
											</div>
										</td>
										<!--end::Author=-->
										<!--begin::Company=-->
										<td>
											<span class="text-gray-800 fw-boldest fs-5 d-block">RoadGee</span>
											<span class="text-gray-400 fw-bold">Transportation</span>
										</td>
										<!--end::Company=-->
										<!--begin::Progress=-->
										<td>
											<div class="d-flex flex-column w-100 me-2 mt-2">
												<span class="text-gray-400 me-2 fw-boldest mb-2">40%</span>
												<div class="progress bg-light-danger w-100 h-5px">
													<div class="progress-bar bg-success" role="progressbar" style="width: 40%"></div>
												</div>
											</div>
										</td>
										<!--end::Company=-->
										<!--begin::Action=-->
										<td class="pe-0 text-end">
											<a href="#" class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
										</td>
										<!--end::Action=-->
									</tr>
									<!--end::Table row-->
									<!--begin::Table row-->
									<tr>
										<!--begin::Checkbox-->
										<td class="p-0">
											<div class="form-check form-check-sm form-check-custom form-check-solid">
												<input class="form-check-input" type="checkbox" value="1" />
											</div>
										</td>
										<!--end::Checkbox-->
										<!--begin::Author=-->
										<td class="p-0">
											<div class="d-flex align-items-center">
												<!--begin::Logo-->
												<div class="symbol symbol-circle symbol-50px me-2">
													<span class="symbol-label">
														<img alt="" class="w-25px" src="assets/media/svg/brand-logos/volicity-9.svg" />
													</span>
												</div>
												<!--end::Logo-->
												<div class="ps-3">
													<a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Natali Trump</a>
													<span class="text-gray-400 fw-bold d-block">Python, ReactJS</span>
												</div>
											</div>
										</td>
										<!--end::Author=-->
										<!--begin::Company=-->
										<td>
											<span class="text-gray-800 fw-boldest fs-5 d-block">The Hill</span>
											<span class="text-gray-400 fw-bold">Insurance</span>
										</td>
										<!--end::Company=-->
										<!--begin::Progress=-->
										<td>
											<div class="d-flex flex-column w-100 me-2 mt-2">
												<span class="text-gray-400 me-2 fw-boldest mb-2">71%</span>
												<div class="progress bg-light-danger w-100 h-5px">
													<div class="progress-bar bg-info" role="progressbar" style="width: 71%"></div>
												</div>
											</div>
										</td>
										<!--end::Company=-->
										<!--begin::Action=-->
										<td class="pe-0 text-end">
											<a href="#" class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
										</td>
										<!--end::Action=-->
									</tr>
									<!--end::Table row-->
									<!--begin::Table row-->
									<tr>
										<!--begin::Checkbox-->
										<td class="p-0">
											<div class="form-check form-check-sm form-check-custom form-check-solid">
												<input class="form-check-input" type="checkbox" value="1" />
											</div>
										</td>
										<!--end::Checkbox-->
										<!--begin::Author=-->
										<td class="p-0">
											<div class="d-flex align-items-center">
												<!--begin::Logo-->
												<div class="symbol symbol-circle symbol-50px me-2">
													<span class="symbol-label">
														<img alt="" class="w-25px" src="assets/media/svg/brand-logos/aven.svg" />
													</span>
												</div>
												<!--end::Logo-->
												<div class="ps-3">
													<a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Brad Simmons</a>
													<span class="text-gray-400 fw-bold d-block">HTML, JS, ReactJS</span>
												</div>
											</div>
										</td>
										<!--end::Author=-->
										<!--begin::Company=-->
										<td>
											<span class="text-gray-800 fw-boldest fs-5 d-block">Intertico</span>
											<span class="text-gray-400 fw-bold">Web, UI/UX Design</span>
										</td>
										<!--end::Company=-->
										<!--begin::Progress=-->
										<td>
											<div class="d-flex flex-column w-100 me-2 mt-2">
												<span class="text-gray-400 me-2 fw-boldest mb-2">65%</span>
												<div class="progress bg-light-danger w-100 h-5px">
													<div class="progress-bar bg-danger" role="progressbar" style="width: 65%"></div>
												</div>
											</div>
										</td>
										<!--end::Company=-->
										<!--begin::Action=-->
										<td class="pe-0 text-end">
											<a href="#" class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
										</td>
										<!--end::Action=-->
									</tr>
									<!--end::Table row-->
								</tbody>
								<!--end::Table body-->
							</table>
						</div>
						<!--end::Table-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Table Widget 1-->
				<!--begin::List Widget 4-->
				<div class="card mb-5 mb-xl-10">
					<!--begin::Header-->
					<div class="card-header align-items-center border-0 mt-5">
						<h3 class="card-title align-items-start flex-column">
							<span class="fw-boldest text-dark fs-2">Folders</span>
							<span class="text-gray-400 mt-2 fw-bold fs-6">32 Active Folders</span>
						</h3>
						<div class="card-toolbar">
							<!--begin::Menu-->
							<button type="button" class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
								<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
								<span class="svg-icon svg-icon-2">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
											<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
											<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
											<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										</g>
									</svg>
								</span>
								<!--end::Svg Icon-->
							</button>
							<!--begin::Menu 3-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
								<!--begin::Heading-->
								<div class="menu-item px-3">
									<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
								</div>
								<!--end::Heading-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link px-3">Create Invoice</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link flex-stack px-3">Create Payment
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link px-3">Generate Bill</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
									<a href="#" class="menu-link px-3">
										<span class="menu-title">Subscription</span>
										<span class="menu-arrow"></span>
									</a>
									<!--begin::Menu sub-->
									<div class="menu-sub menu-sub-dropdown w-175px py-4">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3">Plans</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3">Billing</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3">Statements</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<div class="menu-content px-3">
												<!--begin::Switch-->
												<label class="form-check form-switch form-check-custom form-check-solid">
													<!--begin::Input-->
													<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
													<!--end::Input-->
													<!--end::Label-->
													<span class="form-check-label text-muted fs-6">Recuring</span>
													<!--end::Label-->
												</label>
												<!--end::Switch-->
											</div>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu sub-->
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3 my-1">
									<a href="#" class="menu-link px-3">Settings</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::Menu 3-->
							<!--end::Menu-->
						</div>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pt-1">
						<!--begin::Item-->
						<div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<!--begin::Symbol-->
								<div class="symbol symbol-40px symbol-circle me-4">
									<span class="symbol-label bg-light-primary">
										<!--begin::Svg Icon | path: icons/duotone/Clothes/Crown.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<path d="M11.2600599,5.81393408 L2,16 L22,16 L12.7399401,5.81393408 C12.3684331,5.40527646 11.7359848,5.37515988 11.3273272,5.7466668 C11.3038503,5.7680094 11.2814025,5.79045722 11.2600599,5.81393408 Z" fill="#000000" opacity="0.3" />
												<path d="M12.0056789,15.7116802 L20.2805786,6.85290308 C20.6575758,6.44930487 21.2903735,6.42774054 21.6939717,6.8047378 C21.8964274,6.9938498 22.0113578,7.25847607 22.0113578,7.535517 L22.0113578,20 L16.0113578,20 L2,20 L2,7.535517 C2,7.25847607 2.11493033,6.9938498 2.31738608,6.8047378 C2.72098429,6.42774054 3.35378194,6.44930487 3.7307792,6.85290308 L12.0056789,15.7116802 Z" fill="#000000" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="ps-1 mb-1">
									<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Project Alice</a>
									<div class="text-gray-400 fw-bold">Phase 1 development</div>
								</div>
								<!--end::Title-->
							</div>
							<!--end::Section-->
							<!--begin::Label-->
							<span class="badge badge-light rounded-pill fs-7 fw-boldest">43 files</span>
							<!--end::Label-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<!--begin::Symbol-->
								<div class="symbol symbol-40px symbol-circle me-4">
									<span class="symbol-label bg-light-danger">
										<!--begin::Svg Icon | path: icons/duotone/Code/Warning-2.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-danger">
											<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<path d="M11.1669899,4.49941818 L2.82535718,19.5143571 C2.557144,19.9971408 2.7310878,20.6059441 3.21387153,20.8741573 C3.36242953,20.9566895 3.52957021,21 3.69951446,21 L21.2169432,21 C21.7692279,21 22.2169432,20.5522847 22.2169432,20 C22.2169432,19.8159952 22.1661743,19.6355579 22.070225,19.47855 L12.894429,4.4636111 C12.6064401,3.99235656 11.9909517,3.84379039 11.5196972,4.13177928 C11.3723594,4.22181902 11.2508468,4.34847583 11.1669899,4.49941818 Z" fill="#000000" opacity="0.3" />
												<rect fill="#000000" x="11" y="9" width="2" height="7" rx="1" />
												<rect fill="#000000" x="11" y="17" width="2" height="2" rx="1" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="ps-1 mb-1">
									<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">HR Confidential</a>
									<div class="text-gray-400 fw-bold">Confidential staff documents</div>
								</div>
								<!--end::Title-->
							</div>
							<!--end::Section-->
							<!--begin::Label-->
							<span class="badge badge-light rounded-pill fs-7 fw-boldest">24 files</span>
							<!--end::Label-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<!--begin::Symbol-->
								<div class="symbol symbol-40px symbol-circle me-4">
									<span class="symbol-label bg-light-success">
										<!--begin::Svg Icon | path: icons/duotone/General/Thunder.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-success">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M12.3740377,19.9389434 L18.2226499,11.1660251 C18.4524142,10.8213786 18.3592838,10.3557266 18.0146373,10.1259623 C17.8914367,10.0438285 17.7466809,10 17.5986122,10 L13,10 L13,4.47708173 C13,4.06286817 12.6642136,3.72708173 12.25,3.72708173 C11.9992351,3.72708173 11.7650616,3.85240758 11.6259623,4.06105658 L5.7773501,12.8339749 C5.54758575,13.1786214 5.64071616,13.6442734 5.98536267,13.8740377 C6.10856331,13.9561715 6.25331908,14 6.40138782,14 L11,14 L11,19.5229183 C11,19.9371318 11.3357864,20.2729183 11.75,20.2729183 C12.0007649,20.2729183 12.2349384,20.1475924 12.3740377,19.9389434 Z" fill="#000000" />
												</g>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="ps-1 mb-1">
									<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Project Rider</a>
									<div class="text-gray-400 fw-bold">New frontend admin theme</div>
								</div>
								<!--end::Title-->
							</div>
							<!--end::Section-->
							<!--begin::Label-->
							<span class="badge badge-light rounded-pill fs-7 fw-boldest">75 files</span>
							<!--end::Label-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<!--begin::Symbol-->
								<div class="symbol symbol-40px symbol-circle me-4">
									<span class="symbol-label bg-light-info">
										<!--begin::Svg Icon | path: icons/duotone/Design/Image.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-info">
											<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z" fill="#000000" />
												</g>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="ps-1 mb-1">
									<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Banner Assets</a>
									<div class="text-gray-400 fw-bold">Collection of banner images</div>
								</div>
								<!--end::Title-->
							</div>
							<!--end::Section-->
							<!--begin::Label-->
							<span class="badge badge-light rounded-pill fs-7 fw-boldest">16 files</span>
							<!--end::Label-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-6">
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<!--begin::Symbol-->
								<div class="symbol symbol-40px symbol-circle me-4">
									<span class="symbol-label bg-light-warning">
										<!--begin::Svg Icon | path: icons/duotone/Design/Component.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-warning">
											<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<path d="M12.7442084,3.27882877 L19.2473374,6.9949025 C19.7146999,7.26196679 20.003129,7.75898194 20.003129,8.29726722 L20.003129,15.7027328 C20.003129,16.2410181 19.7146999,16.7380332 19.2473374,17.0050975 L12.7442084,20.7211712 C12.2830594,20.9846849 11.7169406,20.9846849 11.2557916,20.7211712 L4.75266256,17.0050975 C4.28530007,16.7380332 3.99687097,16.2410181 3.99687097,15.7027328 L3.99687097,8.29726722 C3.99687097,7.75898194 4.28530007,7.26196679 4.75266256,6.9949025 L11.2557916,3.27882877 C11.7169406,3.01531506 12.2830594,3.01531506 12.7442084,3.27882877 Z M12,14.5 C13.3807119,14.5 14.5,13.3807119 14.5,12 C14.5,10.6192881 13.3807119,9.5 12,9.5 C10.6192881,9.5 9.5,10.6192881 9.5,12 C9.5,13.3807119 10.6192881,14.5 12,14.5 Z" fill="#000000" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="ps-1 mb-1">
									<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Icon Assets</a>
									<div class="text-gray-400 fw-bold">Collection of SVG icons</div>
								</div>
								<!--end::Title-->
							</div>
							<!--end::Section-->
							<!--begin::Label-->
							<span class="badge badge-light rounded-pill fs-7 fw-boldest">64 files</span>
							<!--end::Label-->
						</div>
						<!--end::Item-->
						<!--begin::Alert-->
						<div class="rounded border border-primary bg-light-primary border-dashed px-6 py-5">
							<a href="#" class="link-primary fw-bolder fs-6 me-1">Intive New .NET Collaborators</a>
							<span class="text-gray-800 fw-bold fs-6">to creating great outstanding business to business .jsp modular class outstanding scripts</span>
						</div>
						<!--end::Alert-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::List Widget 4-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Layout - Overview-->
	</div>
	<!--end::Container-->
</div>
<!--end::Content-->
<?= $this->endSection() ?>