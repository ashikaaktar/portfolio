<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Message</title>
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #080B18; color: #FFFFFF; padding: 30px 15px; margin: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background-color: #111426; border: 1px solid rgba(139, 92, 246, 0.25); border-radius: 16px; overflow: hidden;">
        <tr>
            <td style="padding: 24px 30px; background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 100%);">
                <h1 style="color: #FFFFFF; margin: 0; font-size: 20px; font-weight: 800; letter-spacing: 1px;">ASHIKA PORTFOLIO</h1>
                <p style="color: rgba(255, 255, 255, 0.85); margin: 4px 0 0; font-size: 13px;">New Contact Message Received</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 30px;">
                <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 24px;">
                    <tr>
                        <td style="padding-bottom: 12px; color: #A1A1AA; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Sender Details</td>
                    </tr>
                    <tr>
                        <td style="background-color: #171B33; padding: 16px; border-radius: 10px; border: 1px solid rgba(255, 255, 255, 0.06);">
                            <p style="margin: 0 0 8px; font-size: 14px; color: #FFFFFF;"><strong>Name:</strong> {{ $contactMessage->name }}</p>
                            <p style="margin: 0 0 8px; font-size: 14px; color: #FFFFFF;"><strong>Email:</strong> <a href="mailto:{{ $contactMessage->email }}" style="color: #8B5CF6; text-decoration: none;">{{ $contactMessage->email }}</a></p>
                            <p style="margin: 0; font-size: 14px; color: #FFFFFF;"><strong>Subject:</strong> {{ $contactMessage->subject }}</p>
                        </td>
                    </tr>
                </table>

                <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 24px;">
                    <tr>
                        <td style="padding-bottom: 12px; color: #A1A1AA; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Message Content</td>
                    </tr>
                    <tr>
                        <td style="background-color: #171B33; padding: 18px; border-radius: 10px; border: 1px solid rgba(255, 255, 255, 0.06); font-size: 14px; line-height: 1.6; color: #E4E4E7; white-space: pre-wrap;">{{ $contactMessage->message }}</td>
                    </tr>
                </table>

                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="text-align: center; padding-top: 10px;">
                            <a href="mailto:{{ $contactMessage->email }}?subject={{ urlencode('Re: ' . $contactMessage->subject) }}" style="display: inline-block; background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 100%); color: #FFFFFF; font-size: 13px; font-weight: 700; padding: 12px 28px; border-radius: 8px; text-decoration: none;">Reply to {{ $contactMessage->name }}</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 16px 30px; background-color: #080B18; border-top: 1px solid rgba(255, 255, 255, 0.06); text-align: center; color: #71717A; font-size: 11px;">
                Received on {{ now()->format('F j, Y, g:i a') }} &bull; IP: {{ $contactMessage->ip_address }}
            </td>
        </tr>
    </table>
</body>
</html>
