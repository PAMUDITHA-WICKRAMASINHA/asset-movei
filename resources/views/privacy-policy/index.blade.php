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

        <p>Welcome to Asset Movies. We value your privacy and are committed to protecting your personal information.
            This Privacy Policy outlines how we collect, use, and safeguard your data in compliance with GDPR, CCPA, and
            LGPD regulations.</p>

        <h4>Information Collection</h4>

        <ul>
            <li>
                <p><strong>Personal Information</strong>: We may collect personal information such as your name and
                    email address when you register on our site, subscribe to our newsletter, or contact us.</p>
            </li>
            <li>
                <p><strong>Usage Data</strong>: We collect information about your interactions with our site, including
                    your IP address, browser type, operating system, and browsing behavior.</p>
            </li>
        </ul>

        <h4>Use of Information</h4>

        <ul>
            <li>
                <p><strong>Service Improvement</strong>: We use the collected data to improve our website's
                    functionality, content, and user experience.</p>
            </li>
            <li>
                <p><strong>Communication</strong>: We may use your email address to send you updates, newsletters, and
                    promotional materials.</p>
            </li>
            <li>
                <p><strong>Advertising</strong>: Third-party vendors, including Google, use cookies to serve ads based
                    on your prior visits to our site. You can opt out of personalized advertising by visiting <a
                        href="https://adssettings.google.com">Ads Settings</a>.</p>
            </li>
        </ul>

        <h4>Cookies</h4>

        <ul>
            <li>
                <p>Our site uses cookies to enhance your experience. Cookies are small text files stored on your device
                    to help us understand your preferences and improve our services.</p>
            </li>
        </ul>

        <h4>Data Protection</h4>

        <ul>
            <li>
                <p>We implement security measures to protect your personal information. However, please be aware that no
                    method of transmission over the internet or electronic storage is 100% secure.</p>
            </li>
        </ul>

        <h4>Third-Party Links</h4>

        <ul>
            <li>
                <p>Our website may contain links to third-party sites. We are not responsible for the privacy practices
                    or content of these sites.</p>
            </li>
        </ul>

        <h4>Your Consent</h4>

        <ul>
            <li>
                <p>By using our site, you consent to our Privacy Policy.</p>
            </li>
        </ul>

        <h4>Your Rights (GDPR, CCPA, LGPD)</h4>

        <h5>GDPR (for EU users):</h5>
        <ul>
            <li>
                <p><strong>Right to Access:</strong> You have the right to request access to your personal data.</p>
            </li>
            <li>
                <p><strong>Right to Rectification:</strong> You have the right to request correction of any inaccurate
                    personal data.</p>
            </li>
            <li>
                <p><strong>Right to Erasure:</strong> You have the right to request deletion of your personal data.</p>
            </li>
            <li>
                <p><strong>Right to Restrict Processing:</strong> You have the right to restrict processing of your
                    personal data.</p>
            </li>
            <li>
                <p><strong>Right to Data Portability:</strong> You have the right to request transfer of your personal
                    data.</p>
            </li>
            <li>
                <p><strong>Right to Object:</strong> You have the right to object to the processing of your personal
                    data.</p>
            </li>
        </ul>

        <h5>CCPA (for California residents):</h5>
        <ul>
            <li>
                <p><strong>Right to Know:</strong> You have the right to know what personal information is collected,
                    used, shared, or sold.</p>
            </li>
            <li>
                <p><strong>Right to Delete:</strong> You have the right to request the deletion of your personal
                    information.</p>
            </li>
            <li>
                <p><strong>Right to Opt-Out:</strong> You have the right to opt-out of the sale of your personal
                    information.</p>
            </li>
            <li>
                <p><strong>Right to Non-Discrimination:</strong> You have the right to not be discriminated against for
                    exercising your privacy rights.</p>
            </li>
        </ul>

        <h5>LGPD (for Brazilian users):</h5>
        <ul>
            <li>
                <p><strong>Right to Confirmation:</strong> You have the right to confirm the existence of processing.
                </p>
            </li>
            <li>
                <p><strong>Right to Access:</strong> You have the right to access your personal data.</p>
            </li>
            <li>
                <p><strong>Right to Correction:</strong> You have the right to request correction of incomplete,
                    inaccurate, or outdated data.</p>
            </li>
            <li>
                <p><strong>Right to Anonymization, Blocking, or Deletion:</strong> You have the right to request
                    anonymization, blocking, or deletion of unnecessary or excessive data or data processed in
                    non-compliance with the provisions of the LGPD.</p>
            </li>
            <li>
                <p><strong>Right to Data Portability:</strong> You have the right to data portability.</p>
            </li>
            <li>
                <p><strong>Right to Information:</strong> You have the right to information about public and private
                    entities with which the controller has shared data.</p>
            </li>
            <li>
                <p><strong>Right to Withdraw Consent:</strong> You have the right to withdraw consent at any time.</p>
            </li>
        </ul>

        <h4>Exercising Your Rights</h4>

        <ul>
            <li>
                <p>To exercise any of these rights, please contact us at:</p>
            </li>
            <li>
                <p>Email: <a
                        href="mailto:{{ env('SITE_EMAIL', 'assettec.gl@gmail.com') }}">{{ env('SITE_EMAIL', 'assettec.gl@gmail.com') }}</a>
                </p>
            </li>
        </ul>

        <h4>Changes to Our Privacy Policy</h4>

        <ul>
            <li>
                <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the
                    new Privacy Policy on this page.</p>
            </li>
        </ul>

        <h4>Contact Us</h4>

        <ul>
            <li>
                <p>If you have any questions about our Privacy Policy, please contact us at:</p>
            </li>
            <li>
                <p>Email: <a
                        href="mailto:{{ env('SITE_EMAIL', 'assettec.gl@gmail.com') }}">{{ env('SITE_EMAIL', 'assettec.gl@gmail.com') }}</a>
                </p>
            </li>
        </ul>
    </div>
</div>
@stop