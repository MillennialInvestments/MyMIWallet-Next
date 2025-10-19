<!-- app/Views/emails/layout.php -->
<?php 
$subViewData = [
    'siteSettings' => $siteSettings, 
    'socialMedia' => $socialMedia, 
];
?>
<!DOCTYPE html>
<html lang="en" style='--blue: #007bff; --indigo: #6610f2; --purple: #6f42c1; --pink: #e83e8c; --red: #dc3545; --orange: #fd7e14; --yellow: #ffc107; --green: #28a745; --teal: #20c997; --cyan: #17a2b8; --white: #fff; --gray: #6c757d; --gray-dark: #343a40; --primary: #007bff; --secondary: #6c757d; --success: #28a745; --info: #17a2b8; --warning: #ffc107; --danger: #dc3545; --light: #f8f9fa; --dark: #343a40; --breakpoint-xs: 0; --breakpoint-sm: 576px; --breakpoint-md: 768px; --breakpoint-lg: 992px; --breakpoint-xl: 1200px; --font-family-sans-serif: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"; --font-family-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace; box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji"; line-height: 1.15; -webkit-text-size-adjust: 100%; -webkit-tap-highlight-color: transparent; text-shadow: none !important; box-shadow: none !important; --bs-blue: #559bfb; --bs-indigo: #2c3782; --bs-purple: #816bff; --bs-pink: #ff63a5; --bs-red: #e85347; --bs-orange: #ffa353; --bs-yellow: #f4bd0e; --bs-green: #1ee0ac; --bs-teal: #20c997; --bs-cyan: #09c2de; --bs-white: #fff; --bs-gray: #8091a7; --bs-gray-dark: #2b3748; --bs-gray-100: #ebeef2; --bs-gray-200: #e5e9f2; --bs-gray-300: #dbdfea; --bs-gray-400: #b7c2d0; --bs-gray-500: #8091a7; --bs-gray-600: #3c4d62; --bs-gray-700: #344357; --bs-gray-800: #2b3748; --bs-gray-900: #1f2b3a; --bs-primary: #3E61BC; --bs-secondary: #364a63; --bs-success: #1ee0ac; --bs-info: #09c2de; --bs-warning: #f4bd0e; --bs-danger: #e85347; --bs-light: #e5e9f2; --bs-dark: #1f2b3a; --bs-lighter: #f5f6fa; --bs-primary-rgb: 101, 118, 255; --bs-secondary-rgb: 54, 74, 99; --bs-success-rgb: 30, 224, 172; --bs-info-rgb: 9, 194, 222; --bs-warning-rgb: 244, 189, 14; --bs-danger-rgb: 232, 83, 71; --bs-light-rgb: 229, 233, 242; --bs-dark-rgb: 31, 43, 58; --bs-gray-rgb: 128, 145, 167; --bs-lighter-rgb: 245, 246, 250; --bs-white-rgb: 255, 255, 255; --bs-black-rgb: 0, 0, 0; --bs-body-color-rgb: 82, 100, 132; --bs-body-bg-rgb: 255, 255, 255; --bs-font-sans-serif: Roboto, sans-serif; --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0)); --bs-body-font-family: Roboto, sans-serif; --bs-body-font-size: 0.875rem; --bs-body-font-weight: 400; --bs-body-line-height: 1.65; --bs-body-color: #3E61BC; --bs-body-bg: #fff; font-size: 16px; --fc-daygrid-event-dot-width: 8px; --fc-list-event-dot-width: 10px; --fc-list-event-hover-bg-color: #f5f5f5; scroll-behavior: smooth; transition: background-color 300ms ease, color 300ms ease; color: rgba(33, 37, 41, 1); -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; text-rendering: optimizeLegibility; margin: 0; padding: 0;'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'MyMI Wallet Notification') ?></title>
    <style <?= $nonce['style'] ?? '' ?>>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
        }
        .email-header {
            background-color: #0056b3;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            line-height: 1.6;
            font-size: 16px;
        }
        .email-footer {
            background-color: #f5f6fa;
            padding: 15px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .email-footer a {
            color: #0056b3;
            text-decoration: none;
        }
        .details-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .details-table th, .details-table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .details-table th {
            background-color: #f4f5f7;
            color: #555;
        }
    </style>
    
    <?php // echo view('emails/style', $subViewData) ?>
</head>
<body>
    <div class="email-wrapper">
        <!-- Include Header -->
        <?= view('emails/header', $subViewData) ?>

        <!-- Include Content -->
        <div class="email-body">
            <?= $content ?? '' ?>
        </div>

        <!-- Include Footer -->
        <div class="col-2"></div>
        <div class="col-8" style>
            <?= view('emails/stayConnected', $subViewData) ?>
        </div>
        <?= view('emails/footer', $subViewData) ?>
    </div>
</body>
</html>
