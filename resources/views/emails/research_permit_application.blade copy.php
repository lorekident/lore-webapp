<div class="row">
	<div class="col-lg-12">
		<table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;" bgcolor="transparent">
			<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
				<td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
				<td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
					<div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
						<table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction"
							style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; background-color: transparent; margin: 0; box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px; border: none; border-radius:20px;" bgcolor="#fff">


							<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
								<td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
									<meta itemprop="name" content="Confirm Email" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
									<table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<tr>
											<td><a href="#">
                                                <div class="">
                                                    <img src="https://admin.rimsgov.cc/images/brands/LORE_LOGO.png" alt="" style="margin-left: auto; margin-right: auto; display:block; margin-bottom: 10px; height: 70px;"></a>
                                                </div>
                                                <div class="" style="text-align: center; color:#4CB4E1; font-weight:700; margint-top:10px; text-transform:uppercase;">Ministry of Comunications Knowledge and Technology</div>
                                            </td>
										</tr>
                                        <br>
										<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
											<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-weight:600; color: #1D4670; text-align: start; vertical-align: top; text-transform:capitalize; padding:2em" valign="top">
												<span>{{ $subject }}</span>
											</td>
										</tr>
										<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
											<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; color: #1D4670; text-align: start; vertical-align: top; text-transform:capitalize; line-height:2em; padding:0 2em 0 2em;" valign="top">
												Dear <span style="font-weight:bold;">{{ $user->first_name.' '.$user->last_name }}</span>, <span>{{ $content }}</span>
											</td>
										</tr>
                                        @if ($application->permit_status == 'waiting_payment')
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
											<td class="content-block" style="display:flex; margin-top:2em; justify-content:center;" valign="top">
                                                <a style="background-color:#4CB4E1; text-decoration:none; color:white; border-radius:8px; padding:.5em; text-decoration:none;" class="rounded-3" href="{{ env('FRONTEND_URL').'/research-permit-application/'.$application->permit_no }}">Make Payment</a>
                                                {{-- <a style="background-color:#4CB4E1; text-decoration:none; color:white; border-radius:8px; padding:.5em; text-decoration:none;" class="rounded-3" href="{{ 'http://localhost:8080/research-permit-application/'.$application->permit_no }}">Make Payment</a> --}}
											</td>
										</tr>
                                        @endif
										<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
											<td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 10px 10px;" valign="top">

											</td>
										</tr>
										<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
											<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; padding:0 2em 0 2em; vertical-align: top; margin: 0; text-align: left;" valign="top">
												<b>Best Regards</b><br><br>
											</td>
										</tr>
										<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
											<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; color: #4CB4E1 !important; font-weight: 700; box-sizing: border-box; font-size: 14px; padding-top: 5px; vertical-align: top; margin: 0; text-align: center;" valign="top">
                                                {{ env('APP_NAME') }} &copy;
                                                {{ date('Y') }}
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<!--end table-->
					</div>
					<!--end content-->
				</td>
				<td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
			</tr>
		</table>
		<!--end table-->
	</div>
	<!--end col-->
</div>
