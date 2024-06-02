<?php

namespace App\Services;

class CurlService
{
    public function getWebpImage($image, $imageName)
    {
        $imageName = $imageName . '.' . $image->getClientOriginalExtension();
        $fileContent = file_get_contents($image);

        // Construct the request body
        $boundary = '------WebKitFormBoundary4oRZBHVkIdNYLh8o';
        $formData = "--$boundary\r\n";
        $formData .= "Content-Disposition: form-data; name=\"file\"; filename=\"$imageName\"\r\n";
        $formData .= "Content-Type: image/jpeg\r\n\r\n";
        $formData .= $fileContent . "\r\n";
        $formData .= "--$boundary--";
        
        $headers = [
            "Cache-Control: no-cache, private",
            "Cf-Cache-Status: DYNAMIC",
            "Cf-Ray: 88d8d8aca96f9c86-SIN",
            "Content-Encoding: gzip",
            'Content-Type: multipart/form-data; boundary=' . $boundary,
            "Nel: {\"success_fraction\":0,\"report_to\":\"cf-nel\",\"max_age\":604800}",
            "Report-To: {\"endpoints\":[{\"url\":\"https:\/\/a.nel.cloudflare.com\/report\/v4?s=OHayauNFuMKtA0QUVmqEFaVQl3eBchA%2BGkeoNIux2m4Elo5VtP6%2FCzTVavHD86hz%2BpwTt8AfWT7jiKv61xJuMScbdEIMCyPtKjOs6g8rMTHpsmHCtG2lmXxKvKdhtnDXpPTF4mw4VgA1sA%3D%3D\"}],\"group\":\"cf-nel\",\"max_age\":604800}",
            "Server: cloudflare",
            "Set-Cookie: XSRF-TOKEN=eyJpdiI6ImxTb283cS9YckNiVmttMjF5eW9iNUE9PSIsInZhbHVlIjoiOFFpYit5UXpmS1RIRHZJTWVkYS9WalY2S094MVhDN0ZiT05oVFA1ZG94MlZaL3NxL2VNVUtITkEvN0ZmSVJzYXVsNnl6NDV6TCt2WU01a2xCNHptU3BINUt2aWVGTW1LTkN2TGN4R0ZhUUVPMS9XZi9oS3RaTUxvTllab1pvL20iLCJtYWMiOiJkNDE2M2RjYWIwY2ZiOWM0ZDU4Zjc0MzdjOGZkYjYyMTA2MmUxNDJhYTFlODYxOTcxYTI5MjE3MTcxMDdlNDY1IiwidGFnIjoiIn0%3D; expires=Sun, 02-Jun-2024 18:33:39 GMT; Max-Age=7200; path=/; samesite=lax",
            "Set-Cookie: tinyimg_session=eyJpdiI6IkRYVzFPWWxsNjlEVGlBaDRjbk9qMkE9PSIsInZhbHVlIjoibTVNVzRvNWM3VDhzdlJPaEhlaHhQaEM5R2FUT0xaYkw3Vk1wRzBHc2lpYVVlZGRHZk1ldGNoWFdPQnkyNlgrZ3BFQ0x5RENScjNWbTI1ZldxWmYrTlRscy8wS3JtcVVYOHc0NHh2UUJvaWp2Zll2VmpHUEpKSWJIM2c1WGQ3TmwiLCJtYWMiOiI0ZDAyMzE3YmZiMDhiMzA5YjdmMDEwNWU1MDVkN2Y5YzJiMzMyNjRlYmI0MWEzZTgwYzM2ZTQ0MTBiNmJiZDJjIiwidGFnIjoiIn0%3D; expires=Sun, 02-Jun-2024 18:33:39 GMT; Max-Age=7200; path=/; httponly; samesite=lax",
            "Strict-Transport-Security: max-age=31536000; includeSubDomains; preload",
            "Vary: Accept-Encoding",
            "X-Ratelimit-Limit: 60",
            "X-Ratelimit-Remaining: 59"
        ];

        $ch = curl_init('https://tiny-img.com/app/webp-files/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $formData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}