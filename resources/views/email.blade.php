

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>


</head>
<body style="margin: 10px; padding: 10px;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 20px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 20px;">
                                        <b>{{ $name}}</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td style=" color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 16px;">

                                    </td>
                                </tr>
                                <!-- <button style="width:20px;height:10px">Login To Your Account</button> -->

                                 <tr>
                                    <td style=" color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 16px;">
                                        Best Regards,
                                    </td>
                                </tr>
                                 <tr>
                                    <td style=" color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 16px;">
                                    Csaba Kissi
                                    Elerion ltd., CEO and Founder
                                   {{ $link }}
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
