@include('layouts.header')

<body class="animsition">
	<div class="page-wrapper">

		@include('layouts.sidebar')

		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- MAIN CONTENT-->
			<div class="main-content-no-padding">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row justify-content-center">
							<div class="col-lg-8">
								<div class="au-card">
									<div class="au-card-inner">
										<h3 class="title-2 m-b-40">{{ $label }} Words Cloud</h3>
										<image src='{{ asset("/images/cloud/$label/$company.png") }}'/>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('layouts.footer')