<div class="row">
    <div class="col-lg-12">
        <table class="body-wrap mx-auto" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0 auto;">
            <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                <td style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                <td class="container" width="600" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                    <div class="content" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px; background-color: #EFF5FE; border-radius:12px; display: block; margin: 0 auto;">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; border: none; border-radius:20px;">
                            <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="content-wrap" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                                    <meta itemprop="name" content="Confirm Email" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <tr>
                                            <td style="text-align: center; align-items:center;">
                                                <a href="#"><img src="https://admin.rimsgov.cc/images/brands/LORE_LOGO.png" width="100" alt="" style="margin-left: auto; margin-right: auto; display:block; margin-bottom: 10px;"></a>
                                                <div class="text-uppercase"><span style="font-size:1rem; font-weight:700; color:#3C4043; text-transform:uppercase; font-family:'Oswald',sans-serif; text-align:center">Ministry of Comunications, Knowledge and Technology</span></div>
                                                {{-- <a href="#"><img src="{{ asset('/images/brands/LORE_LOGO.png') }}" alt="" style="margin-left: auto; margin-right: auto; display:block; margin-bottom: 10px; height: 70px;"></a> --}}
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 10px 10px;" valign="top">

                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td class="content-block" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 18px; font-weight: 700; text-align: left; vertical-align: top; margin: 0; padding: 0 0 10px;" valign="top">
                                                {{ $subject }}
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td class="content-block" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; color:#3C4043 !important; vertical-align: top; margin: 0; padding: 10px 10px;" valign="top">
                                                Dear <span style="font-weight:bold;">{{ $user->first_name.' '.$user->last_name }}</span>,
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td class="content-block" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; color:#3C4043 !important; font-size: 14px; vertical-align: top; margin: 0; padding: 10px 10px;" valign="top">
                                                <span>{{ $content }}</span>
                                            </td>
                                        </tr>
                                        @if ($application->permit_status == 'waiting_payment')
                                            <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; text-align: center;">
                                                <td class="content-block" style="text-align:center; margin-top: 2em;" valign="top">
                                                    <a style="background-color: #4CB4E1; text-decoration: none; color: white; border-radius: 8px; padding: .5em; text-decoration: none; display: inline-block;" class="rounded-3" href="{{ env('FRONTEND_URL').'/research-permit-application/'.$application->permit_no }}">Make Payment</a>
                                                </td>
                                            </tr>
                                        @endif

                                        <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 10px 10px;" valign="top">

                                            </td>
                                        </tr>

                                        <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; text-align:center; font-weight:700;">
                                            <td class="content-block" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color:#3C4043 !important; font-weight: 700; box-sizing: border-box; font-size: 14px; padding-top: 5px; vertical-align: top; margin: 0; text-align: center;" valign="top">
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
                <td style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
            </tr>
        </table>
        <!--end table-->
    </div>
    <!--end col-->
</div>
