<html>
	<body>
		<style>
			body {
				font-family: "Verdana";
			}

			* {
				box-sizing: border-box;
				-moz-box-sizing: border-box;
				-webkit-box-sizing: border-box;
			}

			
			.container {
				width: 100%;
			}

			.header-details {
				width: 100%;
				display: block;
			}

			.contacts {
				width: 100%;
				text-align: center;
				display: block;
			}

			.contents {
				width: 100%;
				display: block;
			}

			.row {
				margin-left: -15px;
				margin-right: -15px;
			}

			.row::before {
				display: table;
				content: " ";
			}

			.header-title {
				text-transform: uppercase;
				font-weight: bold;
				font-size: 25px;
				width: 65%;
				float: left;
				text-align: left;
				position: relative;
				padding: 0 15px;
			}

			.header-image {
				width: 30%;
				float: left;
				position: relative;
				padding: 0 15px;
				margin-bottom: 40px;
			}

			.company-details {
				float: left;
				width: 65%;
				padding: 0 15px;
			}

			.extra-details {
				float: left;
				width: 35%;
				padding: 0 15px;
			}

			.currency {
				float: left;
				padding-left: 10px;
			}

			.amount {
				float: right;
				padding-right: 10px;
			}

			.clearfix {
				clear: both;
			}

			.text-right {
				text-align: right;
			}

			.pr-5 {
				padding-right: 5px;
			}

			.pl-5 {
				padding-left: 5px;
			}

			.pr-15 {
				padding-right: 15px;
			}

			.pr-50 {
				padding-right: 50px;
			}

			.mt-15 {
				margin-top: 15px;
			}

			.page-break {
				page-break-after: always;
			}

			table.phone td {
				border-bottom: none;
			}

			table {
				width: 100%;
				border-collapse: collapse;
			}

			table.phone {
				width: 200px;
			}

			table.has-border {
				border: 2px solid black;
			}

			th {
				text-align: center;
			}

			.with-bg {
				background-color: #b4c5e7;
			}

			table.has-border td, table.has-border th {
				border-bottom: 1px solid black;
				border-right: 1px solid black;
				padding: 5px;
			}

			tfoot td {
				border-bottom: 0px solid transparent;
			}

			tfoot td.has-border {
				border: 2px solid black;
			}

			.title, .text-center {
				text-align: center;
			}

			tfoot {
				padding-top:300px;
			}


		</style>
		@yield('style')
		
		@if(!isset($showHeader) || $showHeader)
			<div class="container">
				<div class="header">
					<div class="row">
						<div class="header-title">
							@yield('title')
						</div>
						<div class="header-image">
							<img src="{{ URL::to('/images/kalt-pdf.png') }}" width="200px" />
						</div>
					</div>
					<div class="clearfix" style="height: 15px;"></div>
					<div class="row">
						<div class="company-details">
							Kalt Air Conditioning Enterprise <span style="font-size:10px">(PG0461118-A)</span><br>
			                7 & 9, Lebuh Nangka 2, Taman Desa Damai,<br>  
							14000 Bukit Mertajam,<br>
			                Pulau Pinang<br>
			                <br>
			                <table class="phone">
			                	<tbody>
			                		<tr>
			                			<td>
			                				Phone:
			                			</td>
			                			<td>
			                				+60124920969
			                			</td>
			                		</tr>
			                		<tr>
			                			<td>
			                				Fax:
			                			</td>
			                			<td>
			                				+604-5399577
			                			</td>
			                		</tr>
			                	</tbody>
			                </table>
			                @yield('to')
						</div>
						<div class="extra-details">
							@yield('extra')
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<br>
		@endif
		<div class="content">

			@yield('content')

		</div>


	</body>
</html>