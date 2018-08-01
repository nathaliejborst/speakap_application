<?php

// Assume auto-load is in place for the Speakap\SDK namespace

use Speakap\SDK as SpeakapSDK;

$signedRequest = new SpeakapSDK\SignedRequest('2900ee6345000aa8', '10bad4d0182940145fb2231c774c1817b45460c3d3f244b09e3baacd35306ae9');

if (!$validator->validateSignature($_POST)) {
    die('Invalid signature');
}

$encSignedReq = $signedRequest->getSignedRequest($_POST);

echo <<<HTML
<html>
    <head>
        <title>Hello World</title>
        <script type="text/javascript">
            var Speakap = { appId: "2900ee6345000aa8", signedRequest: "10bad4d0182940145fb2231c774c1817b45460c3d3f244b09e3baacd35306ae9" };
        </script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/speakap.js"></script>
    </head>

    <body>
        <p>Hello Speakap user!</p>
    </body>
</html>
HTML;

// <html>
//     <head>
//         <title>Hello World</title>
//         <script type="text/javascript">
//             var Speakap = { appId: "...", signedRequest: "..." };
//         </script>
//         <script type="text/javascript" src="js/jquery.min.js"></script>
//         <script type="text/javascript" src="js/speakap.js"></script>
//     </head>
//
//     <body>
//         <p>Hello Speakap user!</p>
//     </body>
// </html>
