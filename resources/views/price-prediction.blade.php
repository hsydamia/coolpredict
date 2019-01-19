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
                    	<div class='tableauPlaceholder' style='width: 100%'>
                    		<object class='tableauViz' width='100%' height='650' style='display:none;'>
                    			<param name='host_url' value='https%3A%2F%2Feu-west-1a.online.tableau.com%2F' /> 
                    			<param name='embed_code_version' value='3' /> 
                    			<param name='site_root' value='&#47;t&#47;coolpredict' />
                    			<param name='name' value='{{ $company }}&#47;Day' />
                    			<param name='tabs' value='yes' />
                    			<param name='toolbar' value='yes' />
                    			<param name='showAppBanner' value='false' />
                    			<param name='filter' value='iframeSizedToWindow=true' />
                    		</object>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='https://eu-west-1a.online.tableau.com/javascripts/api/viz_v1.js'></script>
    @include('layouts.footer')