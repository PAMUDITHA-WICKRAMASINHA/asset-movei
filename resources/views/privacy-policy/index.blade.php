@extends('layouts.secound')

@section('title', 'Privacy Policy - Asset Movies')

@section('styles')
@vite([
'resources/css/privacyPolicy.css'
])
@stop

@section('scripts')
@vite([])
@stop

@section('content')
<div class="main_tag">
    <div class="container">
        <h1>Privacy Policy</h1>

        <p>Welcome to Asset Movies. We value your privacy and are committed to protecting your personal
            information.
            This Privacy Policy outlines how we collect, use, and safeguard your data.</p>

        <h4>Information Collection</h4>

        <ul>
            <li>
                <p><strong>Personal Information</strong>: We may collect personal information such as your name and
                    email
                    address when you register on our site, subscribe to our newsletter, or contact us.</p>
            </li>

            <li>
                <p><strong>Usage Data</strong>: We collect information about your interactions with our site, including
                    your
                    IP
                    address, browser type, operating system, and browsing behavior.</p>
            </li>
        </ul>

        <h4>Use of Information</h4>

        <ul>
            <li>
                <p><strong>Service Improvement</strong>: We use the collected data to improve our website's
                    functionality,
                    content, and user experience. </p>
            </li>

            <li>
                <p><strong>Communication</strong>: We may use your email address to send you updates, newsletters, and
                    promotional materials.</p>
            </li>
        </ul>


        <ul>
            <li>
                <p><strong>Advertising</strong>: Third-party vendors, including Google, use cookies to serve ads based
                    on
                    your
                    prior visits to our site. You can opt out of personalized advertising by visiting <a
                        href="https://adssettings.google.com">Ads Settings</a>.</p>
            </li>
        </ul>


        <h4>Cookies</h4>

        <ul>
            <li>
                <p>Our site uses cookies to enhance your experience. Cookies are small text files stored on your device
                    to
                    help
                    us understand your preferences and improve our services.</p>
            </li>
        </ul>


        <h4>Data Protection</h4>

        <ul>
            <li>
                <p>We implement security measures to protect your personal information. However, please be aware that no
                    method
                    of transmission over the internet or electronic storage is 100% secure.</p>
            </li>
        </ul>


        <h4>Third-Party Links</h4>

        <ul>
            <li>
                <p>Our website may contain links to third-party sites. We are not responsible for the privacy practices
                    or
                    content of these sites. </p>
            </li>
        </ul>

        <h4>Your Consent</h4>

        <ul>
            <li>
                <p>By using our site, you consent to our Privacy Policy. </p>
            </li>
        </ul>

        <h4>Changes to Our Privacy Policy</h4>

        <ul>
            <li>
                <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the
                    new
                    Privacy Policy on this page.</p>
            </li>
        </ul>

        <h4>Contact Us</h4>

        <ul>
            <li>
                <p>If you have any questions about our Privacy Policy, please contact us at:</p>
            </li>

            <li>
                <p>Email: <a href="#">{{env('SITE_EMAIL', 'assettec.gl@gmail.com')}}</a>
                </p>
            </li>
        </ul>

    </div>
</div>
@stop