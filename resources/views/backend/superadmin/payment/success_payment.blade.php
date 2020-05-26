@php
    if($get_pay->currency == 'NGN')
        $currency = '₦';
    else if($get_pay->currency == 'USD')
        $currency = '$';
    else if($get_pay->currency == 'GHS')
        $currency = 'GH¢';
@endphp

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<!--[if gte mso 9]>
	<xml>
		<o:OfficeDocumentSettings>
		<o:AllowPNG/>
		<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="format-detection" content="date=no" />
	<meta name="format-detection" content="address=no" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="x-apple-disable-message-reformatting" />
	<!--[if !mso]><!-->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet" />
	<!--<![endif]-->
	<title>{{ translate('payment_successful')}}</title>
	<!--[if gte mso 9]>
	<style type="text/css" media="all">
		sup { font-size: 100% !important; }
	</style>
	<![endif]-->
	<!-- body, html, table, thead, tbody, tr, td, div, a, span { font-family: Arial, sans-serif !important; } -->
	

	<style type="text/css" media="screen">
		body { padding:0 !important; margin:0 auto !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4ecfa; -webkit-text-size-adjust:none }
		a { color:#f3189e; text-decoration:none }
		p { padding:0 !important; margin:0 !important } 
		img { margin: 0 !important; -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }

		a[x-apple-data-detectors] { color: inherit !important; text-decoration: inherit !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important; }
		
		.btn-16 a { display: block; padding: 15px 35px; text-decoration: none; }
		.btn-20 a { display: block; padding: 15px 35px; text-decoration: none; }

		.l-white a { color: #ffffff; }
		.l-black a { color: #282828; }
		.l-pink a { color: #f3189e; }
		.l-grey a { color: #6e6e6e; }
		.l-purple a { color: #9128df; }

		.gradient { background: linear-gradient(to right, #9028df 0%,#f3189e 100%); }

		.btn-secondary { border-radius: 10px; background: linear-gradient(to right, #9028df 0%,#f3189e 100%); }

				
		/* Mobile styles */
		@media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
			.mpx-10 { padding-left: 10px !important; padding-right: 10px !important; }

			.mpx-15 { padding-left: 15px !important; padding-right: 15px !important; }

			.mpb-15 { padding-bottom: 15px !important; }

			u + .body .gwfw { width:100% !important; width:100vw !important; }

			.td,
			.m-shell { width: 100% !important; min-width: 100% !important; }
			
			.mt-left { text-align: left !important; }
			.mt-center { text-align: center !important; }
			.mt-right { text-align: right !important; }
			
			.me-left { margin-right: auto !important; }
			.me-center { margin: 0 auto !important; }
			.me-right { margin-left: auto !important; }

			.mh-auto { height: auto !important; }
			.mw-auto { width: auto !important; }

			.fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }

			.column,
			.column-top,
			.column-dir-top { float: left !important; width: 100% !important; display: block !important; }

			.m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }
			.m-block { display: block !important; }

			.mw-15 { width: 15px !important; }

			.mw-2p { width: 2% !important; }
			.mw-32p { width: 32% !important; }
			.mw-49p { width: 49% !important; }
			.mw-50p { width: 50% !important; }
			.mw-100p { width: 100% !important; }

			.mmt-0 { margin-top: 0 !important; }
		}

			</style>
</head>
<body class="body" style="padding:0 !important; margin:0 auto !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4ecfa; -webkit-text-size-adjust:none;">
	<center>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0; padding: 0; width: 100%; height: 100%;" bgcolor="#f4ecfa" class="gwfw">
	<tr>
		<td style="margin: 0; padding: 0; width: 100%; height: 100%;" align="center" valign="top">
			<table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">
				<tr>
					<td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="mpx-10">
			<!-- Top -->
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="text-12 c-grey l-grey a-right py-20" style="font-size:12px; line-height:16px; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; color:#6e6e6e; text-align:right; padding-top: 20px; padding-bottom: 20px;">
							<a href="{{ route('payment.settings') }}" class="link c-grey" style="text-decoration:none; color:#6e6e6e;"><span class="link c-grey" style="text-decoration:none; color:#6e6e6e;">Go back</span></a>
						</td>
					</tr>
				</table>											<!-- END Top -->
											
<!-- Container -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="gradient pt-10" style="border-radius: 10px 10px 0 0; padding-top: 10px;" bgcolor="#f3189e">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td style="border-radius: 10px 10px 0 0;" bgcolor="#ffffff">
						<!-- Logo -->
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="img-center p-30 px-15" style="font-size:0pt; line-height:0pt; text-align:center; padding: 30px; padding-left: 15px; padding-right: 15px;">
									<a href="#" target="_blank"><img src="{{asset('backend/images/logo-dark.png')}}" width="350" height="175" border="0" alt="" /></a>
								</td>
							</tr>
						</table>
						<!-- Logo -->
											
<!-- Main -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="px-50 mpx-15" style="padding-left: 50px; padding-right: 50px;">
<!-- Section - Intro -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="pb-50" style="padding-bottom: 50px;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="fluid-img img-center pb-50" style="font-size:0pt; line-height:0pt; text-align:center; padding-bottom: 50px;">
						<img src="https://www.psd2newsletters.com/templates/purple/images/img_intro_13.png" width="300" height="252" border="0" alt="" />
					</td>
				</tr>
				<tr>
					<td class="title-36 a-center pb-15" style="font-size:36px; line-height:40px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; text-align:center; padding-bottom: 15px;">
						<strong>{{ translate('thank_you_for_your_payment')}}</strong>
					</td>
				</tr>
				
			</table>
		</td>
	</tr>
</table>
<!-- END Section - Intro -->
											
<!-- Section - Order Details -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="pb-50" style="padding-bottom: 50px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="pb-30" style="padding-bottom: 30px;">
			<!-- Button -->
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="btn-20 btn-secondary c-white l-white" bgcolor="#f3189e" style="font-size:20px; line-height:24px; mso-padding-alt:15px 35px; font-family:'PT Sans', Arial, sans-serif; text-align:center; font-weight:bold; text-transform:uppercase; min-width:auto !important; border-radius:10px; background:linear-gradient(to right, #9028df 0%,#f3189e 100%); color:#ffffff;">
						<a href="#" target="_blank" class="link c-white" style="display: block; padding: 15px 35px; text-decoration:none; color:#ffffff;">
							<span class="link c-white" style="text-decoration:none; color:#ffffff;">{{ translate('transaction_ID')}}: #{{$get_pay->tx_id}}</span>
						</a>
					</td>
				</tr>
			</table>
			<!-- END Button -->
		</td>
	</tr>
	<tr>
		<td class="pb-30" style="padding-bottom: 30px;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th class="column-top" valign="top" width="230" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="title-20 pb-10" style="font-size:20px; line-height:24px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; padding-bottom: 10px;">
									<strong>{{ translate('payment_details')}} </strong>
								</td>
							</tr>
							<tr>
								<td class="text-16" style="font-size:16px; line-height:20px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important;">
									This is NOT an invoice. 
									<br />
									An invoice will be send to your Email
									<br />
									You can get an invoice at the payment page
								</td>
							</tr>
						</table>
					</th>
					<th class="column-top mpb-15" valign="top" width="30" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;"></th>
					<th class="column-top" valign="top" width="230" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="title-20 pb-10" style="font-size:20px; line-height:24px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; padding-bottom: 10px;">
									<strong>{{ translate('date_and_Time')}}</strong>
								</td>
							</tr>
							<tr>
								<td class="text-16" style="font-size:16px; line-height:20px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important;">
									{{ date('D d/m/Y G:ia'), $get_pay->time_stamp}}
								</td>
							</tr>
						</table>
					</th>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="pb-40" style="padding-bottom: 40px;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="img" height="1" bgcolor="#ebebeb" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="pb-30" style="padding-bottom: 30px;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th class="column-top" valign="top" width="230" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
						<div class="fluid-img" style="font-size:0pt; line-height:0pt; text-align:left;"><a href="#" target="_blank"><img src="https://www.psd2newsletters.com/templates/purple/images/img_product.jpg" border="0" width="230" height="180" alt="" /></a></div>
					</th>
					<th class="column-top mpb-15" valign="top" width="30" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;"></th>
					<th class="column-top" valign="top" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="title-20 pb-10" style="font-size:20px; line-height:24px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; padding-bottom: 10px;">
									<strong> {{ translate('details')}}</strong>
								</td>
							</tr>
							<tr>
								<td class="text-16 lh-26 pb-15" style="font-size:16px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 26px; padding-bottom: 15px;">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit.
								</td>
							</tr>
							<tr>
								<td class="text-16 lh-26 c-black" style="font-size:16px; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 26px; color:#282828;">
									<strong>{{ translate('transaction_ID')}}:</strong> {{$get_pay->tranx_id}}
									<br />
									<strong>{{ translate('number_of_students')}}:</strong> {{$get_pay->amount / 250}}
									<br />
									<strong>{{ translate('amount_to_pay')}}:</strong> {{$currency}}{{$get_pay->amount}}
								</td>
							</tr>
						</table>
					</th>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="pt-10 pb-40" style="padding-top: 10px; padding-bottom: 40px;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="img" height="1" bgcolor="#ebebeb" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="pb-30" style="padding-bottom: 30px;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th class="column-top" valign="top" width="230" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="title-20 pb-10" style="font-size:20px; line-height:24px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; padding-bottom: 10px;">
									<strong>Payment method</strong>
								</td>
							</tr>
							<tr>
								<td class="text-16" style="font-size:16px; line-height:20px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important;">
									{{$get_pay->card_type}} ending in {{$get_pay->last_digits}}
								</td>
							</tr>
						</table>
					</th>
					<th class="column-top mpb-15" valign="top" width="30" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;"></th>
					<th class="column-top" valign="top" width="230" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="right" class="pb-15" style="padding-bottom: 15px;">
									<table border="0" cellspacing="0" cellpadding="0" class="mw-100p">						
<tr>
<td class="title-20 lh-30 a-right mt-left mw-auto" width="100" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 30px; text-align:right;">																																																																																			<strong>Subtotal:</strong>																																																																												</td>																																		<td class="img mw-15" width="20" style="font-size:0pt; line-height:0pt; text-align:left;"></td>																																		<td class="title-20 lh-30 mt-right" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 30px;">
{{$currency}}{{$get_pay->amount}}	
</td>
</tr>
<tr>
<td class="title-20 lh-30 a-right mt-left" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 30px; text-align:right;">
<strong>VAT:</strong>
</td>
<td class="img mw-15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
<td class="title-20 lh-30 mt-right" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 30px;">
{{$currency}}0.00
</td>
</tr>
<tr>
<td class="title-20 lh-30 a-right mt-left" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 30px; text-align:right;">
<strong>{{ translate('stamp_duty')}}:</strong>
</td>
<td class="img mw-15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
<td class="title-20 lh-30 mt-right" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 30px;">
{{$currency}}0.00
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="right">
<!-- Button -->
<table border="0" cellspacing="0" cellpadding="0" class="mw-100p" style="min-width: 200px;">
<tr>
<td class="btn-20 btn-secondary c-white l-white" bgcolor="#f3189e" style="font-size:20px; line-height:24px; mso-padding-alt:15px 35px; font-family:'PT Sans', Arial, sans-serif; text-align:center; font-weight:bold; text-transform:uppercase; min-width:auto !important; border-radius:10px; background:linear-gradient(to right, #9028df 0%,#f3189e 100%); color:#ffffff;">
<a href="#" target="_blank" class="link c-white" style="display: block; padding: 15px 35px; text-decoration:none; color:#ffffff;">
<span class="link c-white" style="text-decoration:none; color:#ffffff;">AMOUNT PAID: {{$currency}}{{$get_pay->amount}}</span>
</a>
</td>
</tr>
</table>
<!-- END Button -->
</td>
</tr>
</table>
</th>
</tr>
</table>
</td>
</tr>
<tr>
<td class="pb-30" style="padding-bottom: 30px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="img" height="1" bgcolor="#ebebeb" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center">
<!-- Button -->
<table border="0" cellspacing="0" cellpadding="0" style="min-width: 200px;">
<tr>
<td class="btn-16 c-white l-white" bgcolor="#f3189e" style="font-size:16px; line-height:20px; mso-padding-alt:15px 35px; font-family:'PT Sans', Arial, sans-serif; text-align:center; font-weight:bold; text-transform:uppercase; border-radius:25px; min-width:auto !important; color:#ffffff;">
<a href="{{ route('payment.settings') }}"  class="link c-white" style="display: block; padding: 15px 35px; text-decoration:none; color:#ffffff;">
<span class="link c-white" style="text-decoration:none; color:#ffffff;">BACK TO PAYMENTS</span>
</a>
</td>
</tr>
</table>
<!-- END Button -->
</td>
</tr>
</table>
</td>
</tr>
</table>
<!-- END Section - Order Details -->
</td>
</tr>
</table>
<!-- END Main -->
</td>
</tr>
</table>
</td>
</tr>
</table>
<!-- END Container -->

<!-- Footer -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="p-50 mpx-15" bgcolor="#949196" style="border-radius: 0 0 10px 10px; padding: 50px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="center" class="pb-20" style="padding-bottom: 20px;">
</td>
</tr>
<tr>
<td class="text-14 lh-24 a-center c-white l-white pb-20" style="font-size:14px; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 24px; text-align:center; color:#ffffff; padding-bottom: 20px;">
<a href="mailto:support@iyogera.com" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">support@iyogera.com</span></a> - <a href="www.iyogera.com" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">www.iyogera.com</span></a>
</td>
</tr>
<tr>
<td align="center">
</td>
</tr>
</table>
</td>
</tr>
</table>											
<!-- END Footer -->
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</center>
</body>
</html>
