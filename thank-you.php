<?php
require_once __DIR__ . '/includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you | YourLandlady NG</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', 'YOUR_META_PIXEL_ID');
        fbq('track', 'PageView');
        fbq('track', 'Lead');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=YOUR_META_PIXEL_ID&ev=PageView&noscript=1"/>
    </noscript>
</head>
<body>
    <main class="thank-you-page">
        <div class="wrapper thank-you-panel">
            <a href="/" class="brand" aria-label="YourLandlady NG home">
                <img src="assets/images/yourlandlady-logo.svg" alt="YourLandlady NG">
            </a>
            <h1>Thank you. Your inquiry is received.</h1>
            <p>A YourLandlady NG specialist will review your details and contact you shortly about the relevant Paradiso managed farmland option for your goals.</p>
            <p>In the meantime, we will only use your information to follow up on this enquiry.</p>
            <a href="/" class="button">Return to homepage</a>
        </div>
    </main>
</body>
</html>
