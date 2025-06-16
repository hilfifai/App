<!DOCTYPE html>
<html lang="en">

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="robots" content="noindex,nofollow">
    <meta name="google-site-verification" content="<?= isset($page['meta']['google_seo']) ? $page['meta']['google_seo'] : '' ?>">

    <meta name="keywords" content="<?= $keywords = isset($page['meta']['keyword']) ? $page['meta']['keyword'] : '' ?>,<?= $_SERVER['HTTP_HOST'] ?>">
    <meta name="description" content="<?= $description = isset($page['meta']['description']) ? $page['meta']['description'] : '' ?>">
    <!-- Primary Meta Tags -->

    <meta name="title" content="<?= $title = isset($page['meta']['title']) ? $page['meta']['title'] : '' ?>">
    <link rel="icon" href="<?= $icon = isset($page['meta']['icon']) ? $page['meta']['icon'] : '' ?>" type="image/x-icon" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $page['load']['route_page'] ?>">
    <meta property="og:title" content="<?= $title ?>">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:image" content="<?= $icon ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= $page['load']['route_page'] ?>">
    <meta property="twitter:title" content="<?= $title ?>">
    <meta property="twitter:description" content="<?= $description ?>">
    <meta property="twitter:image" content="<?= $icon ?>">
    <!--images/logobgwhite.png-->
    <title><?= $title ?></title>
    <script src="<?= $fai->urlframework('dist', 'jquery-3.4.1.min.js') ?>"></script>
    <link href="<?= $fai->urlframework('tabler/base/dist/css', 'tabler.min.css') ?>">
    <link href="<?= $fai->urlframework('dist', 'style-basic.css') ?>">
    <link href="<?= $fai->urlframework('dist', 'style.css') ?>">
    <link href="<?= $fai->urlframework('assets/bootstrap/dist/css/', 'bootstrap.css') ?>">
    <script src="<?= $fai->urlframework('assets/bootstrap/dist/js/', 'bootstrap.js') ?>"></script>
    <link rel="stylesheet" href="<?= $fai->urlframework('codepen/job-search-platform-ui/dist/', 'style.css'); ?>">
    <link rel="stylesheet" href="<?= $fai->urlframework('assets\font-awesome-4.7.0\css', 'font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= $fai->urlframework('assets\datatable', 'css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= $fai->urlframework('assets\datatable', 'css/buttons.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= $fai->urlframework('assets\datatable', 'css/fixedColumns.bootstrap5.min.css'); ?>">
    <link href="<?= $fai->urlframework('hibe3', 'horizontal/assets/libs/bootstrap-icons/font/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= $fai->urlframework('hibe3', 'horizontal/assets/libs/%40mdi/font/css/materialdesignicons.min.css') ?>" rel="stylesheet">
    <link href="<?= $fai->urlframework('hibe3', 'horizontal/assets/libs/simplebar/dist/simplebar.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'>
    <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" integrity="sha512-xrbX64SIXOxo5cMQEDUQ3UyKsCreOEq1Im90z3B7KPoxLJ2ol/tCT0aBhuIzASfmBVdODioUdUPbt5EDEXmD9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <style>
        :root {
            --tblr-primary: #066fd1;
            --tblr-primary-rgb: 6, 111, 209;
            --tblr-primary-fg: var(--tblr-light);
            --tblr-primary-darken: #0564bc;
            --tblr-primary-darken: color-mix(in oklab, var(--tblr-primary), transparent 20%);
            --tblr-primary-lt: #e6f1fa;
            --tblr-primary-lt: color-mix(in oklab, var(--tblr-primary) 10%, transparent);
            --tblr-primary-200: color-mix(in oklab, var(--tblr-primary) 20%, transparent);
            --tblr-primary-lt-rgb: 230, 241, 250;
            --tblr-border-width: 1px;
            --tblr-border-color: #e5e7eb;
            --tblr-border-color-translucent: rgba(4, 32, 69, 0.1);
        }

        :root,
        [data-bs-theme=light] {
            --tblr-blue: #066fd1;
            --tblr-indigo: #4263eb;
            --tblr-purple: #ae3ec9;
            --tblr-pink: #d6336c;
            --tblr-red: #d63939;
            --tblr-orange: #f76707;
            --tblr-yellow: #f59f00;
            --tblr-green: #2fb344;
            --tblr-teal: #0ca678;
            --tblr-cyan: #17a2b8;
            --tblr-black: #000000;
            --tblr-white: #ffffff;
            --tblr-gray: #4b5563;
            --tblr-gray-dark: #1f2937;
            --tblr-gray-100: #f3f4f6;
            --tblr-gray-200: #e5e7eb;
            --tblr-gray-300: #d1d5db;
            --tblr-gray-400: #9ca3af;
            --tblr-gray-500: #6b7280;
            --tblr-gray-600: #4b5563;
            --tblr-gray-700: #374151;
            --tblr-gray-800: #1f2937;
            --tblr-gray-900: #111827;
            --tblr-primary: #066fd1;
            --tblr-secondary: #6b7280;
            --tblr-success: #2fb344;
            --tblr-info: #4299e1;
            --tblr-warning: #f59f00;
            --tblr-danger: #d63939;
            --tblr-light: #f9fafb;
            --tblr-dark: #1f2937;
            --tblr-muted: #6b7280;
            --tblr-blue: #066fd1;
            --tblr-azure: #4299e1;
            --tblr-indigo: #4263eb;
            --tblr-purple: #ae3ec9;
            --tblr-pink: #d6336c;
            --tblr-red: #d63939;
            --tblr-orange: #f76707;
            --tblr-yellow: #f59f00;
            --tblr-lime: #74b816;
            --tblr-green: #2fb344;
            --tblr-teal: #0ca678;
            --tblr-cyan: #17a2b8;
            --tblr-primary-rgb: 6, 111, 209;
            --tblr-secondary-rgb: 107, 114, 128;
            --tblr-success-rgb: 47, 179, 68;
            --tblr-info-rgb: 66, 153, 225;
            --tblr-warning-rgb: 245, 159, 0;
            --tblr-danger-rgb: 214, 57, 57;
            --tblr-light-rgb: 249, 250, 251;
            --tblr-dark-rgb: 31, 41, 55;
            --tblr-muted-rgb: 107, 114, 128;
            --tblr-blue-rgb: 6, 111, 209;
            --tblr-azure-rgb: 66, 153, 225;
            --tblr-indigo-rgb: 66, 99, 235;
            --tblr-purple-rgb: 174, 62, 201;
            --tblr-pink-rgb: 214, 51, 108;
            --tblr-red-rgb: 214, 57, 57;
            --tblr-orange-rgb: 247, 103, 7;
            --tblr-yellow-rgb: 245, 159, 0;
            --tblr-lime-rgb: 116, 184, 22;
            --tblr-green-rgb: 47, 179, 68;
            --tblr-teal-rgb: 12, 166, 120;
            --tblr-cyan-rgb: 23, 162, 184;
            --tblr-primary-text-emphasis: #022c54;
            --tblr-secondary-text-emphasis: #2b2e33;
            --tblr-success-text-emphasis: #13481b;
            --tblr-info-text-emphasis: #1a3d5a;
            --tblr-warning-text-emphasis: #624000;
            --tblr-danger-text-emphasis: #561717;
            --tblr-light-text-emphasis: #374151;
            --tblr-dark-text-emphasis: #374151;
            --tblr-primary-bg-subtle: #cde2f6;
            --tblr-secondary-bg-subtle: #e1e3e6;
            --tblr-success-bg-subtle: #d5f0da;
            --tblr-info-bg-subtle: #d9ebf9;
            --tblr-warning-bg-subtle: #fdeccc;
            --tblr-danger-bg-subtle: #f7d7d7;
            --tblr-light-bg-subtle: #f9fafb;
            --tblr-dark-bg-subtle: #9ca3af;
            --tblr-primary-border-subtle: #9bc5ed;
            --tblr-secondary-border-subtle: #c4c7cc;
            --tblr-success-border-subtle: #ace1b4;
            --tblr-info-border-subtle: #b3d6f3;
            --tblr-warning-border-subtle: #fbd999;
            --tblr-danger-border-subtle: #efb0b0;
            --tblr-light-border-subtle: #e5e7eb;
            --tblr-dark-border-subtle: #6b7280;
            --tblr-white-rgb: 255, 255, 255;
            --tblr-black-rgb: 0, 0, 0;
            --tblr-font-sans-serif: "Inter Var", Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            --tblr-font-monospace: Monaco, Consolas, Liberation Mono, Courier New, monospace;
            --tblr-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --tblr-body-font-family: var(--tblr-font-sans-serif);
            --tblr-body-font-size: 0.875rem;
            --tblr-body-font-weight: 400;
            --tblr-body-line-height: 1.4285714286;
            --tblr-body-color: #1f2937;
            --tblr-body-color-rgb: 31, 41, 55;
            --tblr-body-bg: #f9fafb;
            --tblr-body-bg-rgb: 249, 250, 251;
            --tblr-emphasis-color: #374151;
            --tblr-emphasis-color-rgb: 55, 65, 81;
            --tblr-secondary-color: rgba(31, 41, 55, 0.75);
            --tblr-secondary-color-rgb: 31, 41, 55;
            --tblr-secondary-bg: #e5e7eb;
            --tblr-secondary-bg-rgb: 229, 231, 235;
            --tblr-tertiary-color: rgba(31, 41, 55, 0.5);
            --tblr-tertiary-color-rgb: 31, 41, 55;
            --tblr-tertiary-bg: #f3f4f6;
            --tblr-tertiary-bg-rgb: 243, 244, 246;
            --tblr-heading-color: inherit;
            --tblr-link-color: #066fd1;
            --tblr-link-color-rgb: 6, 111, 209;
            --tblr-link-decoration: none;
            --tblr-link-hover-color: #0559a7;
            --tblr-link-hover-color-rgb: 5, 89, 167;
            --tblr-link-hover-decoration: underline;
            --tblr-code-color: var(--tblr-primary);
            --tblr-highlight-color: #1f2937;
            --tblr-highlight-bg: #fdeccc;
            --tblr-border-width: 1px;
            --tblr-border-style: solid;
            --tblr-border-color: #e5e7eb;
            --tblr-border-color-translucent: rgba(4, 32, 69, 0.1);
            --tblr-border-radius: 6px;
            --tblr-border-radius-sm: 4px;
            --tblr-border-radius-lg: 8px;
            --tblr-border-radius-xl: 1rem;
            --tblr-border-radius-xxl: 2rem;
            --tblr-border-radius-2xl: var(--tblr-border-radius-xxl);
            --tblr-border-radius-pill: 100rem;
            --tblr-box-shadow: rgba(var(--tblr-body-color-rgb), 0.04) 0 2px 4px 0;
            --tblr-box-shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --tblr-box-shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
            --tblr-box-shadow-inset: 0 0 transparent;
            --tblr-focus-ring-width: 0.25rem;
            --tblr-focus-ring-opacity: 0.25;
            --tblr-focus-ring-color: rgba(var(--tblr-primary-rgb), 0.25);
            --tblr-form-valid-color: #2fb344;
            --tblr-form-valid-border-color: #2fb344;
            --tblr-form-invalid-color: #d63939;
            --tblr-form-invalid-border-color: #d63939;
        }

        [data-bs-theme=dark],
        body[data-bs-theme=dark] [data-bs-theme=light] {
            color-scheme: dark;
            --tblr-body-color: #e5e7eb;
            --tblr-body-color-rgb: 229, 231, 235;
            --tblr-body-bg: #111827;
            --tblr-body-bg-rgb: 17, 24, 39;
            --tblr-emphasis-color: #ffffff;
            --tblr-emphasis-color-rgb: 255, 255, 255;
            --tblr-secondary-color: rgba(229, 231, 235, 0.75);
            --tblr-secondary-color-rgb: 229, 231, 235;
            --tblr-secondary-bg: #1f2937;
            --tblr-secondary-bg-rgb: 31, 41, 55;
            --tblr-tertiary-color: rgba(229, 231, 235, 0.5);
            --tblr-tertiary-color-rgb: 229, 231, 235;
            --tblr-tertiary-bg: #18212f;
            --tblr-tertiary-bg-rgb: 24, 33, 47;
            --tblr-primary-text-emphasis: #6aa9e3;
            --tblr-secondary-text-emphasis: #a6aab3;
            --tblr-success-text-emphasis: #82d18f;
            --tblr-info-text-emphasis: #8ec2ed;
            --tblr-warning-text-emphasis: #f9c566;
            --tblr-danger-text-emphasis: #e68888;
            --tblr-light-text-emphasis: #f3f4f6;
            --tblr-dark-text-emphasis: #d1d5db;
            --tblr-primary-bg-subtle: #01162a;
            --tblr-secondary-bg-subtle: #15171a;
            --tblr-success-bg-subtle: #09240e;
            --tblr-info-bg-subtle: #0d1f2d;
            --tblr-warning-bg-subtle: #312000;
            --tblr-danger-bg-subtle: #2b0b0b;
            --tblr-light-bg-subtle: #1f2937;
            --tblr-dark-bg-subtle: #10151c;
            --tblr-primary-border-subtle: #04437d;
            --tblr-secondary-border-subtle: #40444d;
            --tblr-success-border-subtle: #1c6b29;
            --tblr-info-border-subtle: #285c87;
            --tblr-warning-border-subtle: #935f00;
            --tblr-danger-border-subtle: #802222;
            --tblr-light-border-subtle: #374151;
            --tblr-dark-border-subtle: #1f2937;
            --tblr-heading-color: inherit;
            --tblr-link-color: #6aa9e3;
            --tblr-link-hover-color: #88bae9;
            --tblr-link-color-rgb: 106, 169, 227;
            --tblr-link-hover-color-rgb: 136, 186, 233;
            --tblr-code-color: var(--tblr-gray-300);
            --tblr-highlight-color: #e5e7eb;
            --tblr-highlight-bg: #624000;
            --tblr-border-color: #2e3c51;
            --tblr-border-color-translucent: rgba(72, 110, 149, 0.14);
            --tblr-form-valid-color: #82d18f;
            --tblr-form-valid-border-color: #82d18f;
            --tblr-form-invalid-color: #e68888;
            --tblr-form-invalid-border-color: #e68888;
        }

        .form-selectgroup {
            display: inline-flex;
            margin: 0 -0.5rem -0.5rem 0;
            flex-wrap: wrap;
        }

        .form-selectgroup .form-selectgroup-item {
            margin: 0 0.5rem 0.5rem 0;
        }

        .form-selectgroup-vertical {
            flex-direction: column;
        }

        .form-selectgroup-item {
            display: block;
            position: relative;
        }

        .form-selectgroup-input {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            opacity: 0;
        }

        .form-selectgroup-label {
            position: relative;
            display: block;
            min-width: calc(1.4285714286em + 0.875rem + calc(var(--tblr-border-width) * 2));
            margin: 0;
            padding: 0.4375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.4285714286;
            color: var(--tblr-secondary);
            background: var(--tblr-bg-forms);
            text-align: center;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            border: var(--tblr-border-width) var(--tblr-border-style) var(--tblr-border-color);
            border-radius: var(--tblr-border-radius);
            box-shadow: var(--tblr-shadow-input);
            transition: border-color 0.3s, background 0.3s, color 0.3s;
        }

        @media (prefers-reduced-motion: reduce) {
            .form-selectgroup-label {
                transition: none;
            }
        }

        .form-selectgroup-label .icon:only-child {
            margin: 0 -0.25rem;
        }

        .form-selectgroup-label:hover {
            color: var(--tblr-body-color);
        }

        .form-selectgroup-check {
            display: inline-block;
            width: 1.25rem;
            height: 1.25rem;
            border: var(--tblr-border-width) var(--tblr-border-style) var(--tblr-border-color-translucent);
            vertical-align: middle;
            box-shadow: var(--tblr-shadow-input);
        }

        .form-selectgroup-input[type=checkbox]+.form-selectgroup-label .form-selectgroup-check {
            border-radius: var(--tblr-border-radius);
        }

        .form-selectgroup-input[type=radio]+.form-selectgroup-label .form-selectgroup-check {
            border-radius: 50%;
        }

        .form-selectgroup-input:checked+.form-selectgroup-label .form-selectgroup-check {
            background-color: var(--tblr-primary);
            background-repeat: repeat;
            background-position: center;
            background-size: 1.25rem;
            border-color: var(--tblr-border-color-translucent);
        }

        .form-selectgroup-input[type=checkbox]:checked+.form-selectgroup-label .form-selectgroup-check {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='16' height='16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8.5l2.5 2.5l5.5 -5.5'/%3e%3c/svg%3e");
        }

        .form-selectgroup-input[type=radio]:checked+.form-selectgroup-label .form-selectgroup-check {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3ccircle r='3' fill='%23ffffff' cx='8' cy='8' /%3e%3c/svg%3e");
        }

        .form-selectgroup-check-floated {
            position: absolute;
            top: 0.4375rem;
            right: 0.4375rem;
        }

        .form-selectgroup-input:checked+.form-selectgroup-label {
            z-index: 1;
            color: var(--tblr-primary);
            background: rgba(var(--tblr-primary-rgb), 0.04);
            border-color: var(--tblr-primary);
        }

        .form-selectgroup-input:focus+.form-selectgroup-label {
            z-index: 2;
            color: var(--tblr-primary);
            border-color: var(--tblr-primary);
            box-shadow: 0 0 0 0.25rem rgba(var(--tblr-primary-rgb), 0.25);
        }

        /**
Alternate version of form select group
 */
        .form-selectgroup-boxes .form-selectgroup-label {
            text-align: left;
            padding: 1.25rem 1rem;
            color: inherit;
        }

        .form-selectgroup-boxes .form-selectgroup-input:checked+.form-selectgroup-label {
            color: inherit;
        }

        .form-selectgroup-boxes .form-selectgroup-input:checked+.form-selectgroup-label .form-selectgroup-title {
            color: var(--tblr-primary);
        }

        .form-selectgroup-boxes .form-selectgroup-input:checked+.form-selectgroup-label .form-selectgroup-label-content {
            opacity: 1;
        }

        /**
Select group
 */
        .form-selectgroup-pills {
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .form-selectgroup-pills .form-selectgroup-item {
            flex-grow: 0;
        }

        .form-selectgroup-pills .form-selectgroup-label {
            border-radius: 50px;
        }

        /**
Bootstrap color input
 */
        .form-control-color::-webkit-color-swatch {
            border: none;
        }

        /**
Remove the cancel buttons in Chrome and Safari on macOS.
 */
        [type=search]::-webkit-search-cancel-button {
            -webkit-appearance: none;
        }

        .body {
            background-color: #fafafa !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            /*padding: .5rem 3rem .5rem 1rem;*/
        }

        .select2 {
            width: 100% !important;
            font-size: 11px;
        }

        .select2-selection__rendered {
            line-height: 31px !important;
            font-size: 13px;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }

        .select2-container--default .select2-selection--single {
            border: var(--dashui-border-width) solid var(--dashui-input-border);
            border-radius: .375rem;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: rgba(28, 175, 55);
            color: white;
        }

        .text_editor {
            position: relative;
        }

        .text_editorAria {
            height: 100%;
            min-height: 400px;
            border: 1px solid #ddd;
            overflow-y: auto;
            padding: 1em;
            margin-top: -2px;
            outline: none;
        }

        .toolbar-text_editor {
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .toolbar-text_editor a,
        .fore-wrapper,
        .back-wrapper {
            border: 1px solid #ddd;
            background: #FFF;
            font-family: "Candal";
            color: #000;
            padding: 5px;
            margin: 2px 0px;
            width: 35px;
            height: 35px;
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }

        .toolbar-text_editor a:hover,
        .fore-wrapper:hover,
        .back-wrapper:hover {
            background: #0eacc6;
            color: #fff;
            border-color: #0eacc6;
        }

        a.palette-item {
            display: inline-block;
            height: 1.3em;
            width: 1.3em;
            margin: 0px 1px 1px;
            cursor: pointer;
        }

        a.palette-item[data-value="#FFFFFF"] {
            border: 1px solid #ddd !important;
        }

        a.palette-item:hover {
            transform: scale(1.1);
        }

        .fore-wrapper,
        .back-wrapper {
            position: relative;
            cursor: auto;
        }

        .fore-palette,
        .back-palette {
            display: none;
            cursor: auto;
        }

        .fore-wrapper:hover .fore-palette,
        .back-wrapper:hover .back-palette {
            display: block;
        }

        .fore-wrapper .fore-palette,
        .back-wrapper .back-palette {
            position: relative;
            display: inline-block;
            cursor: auto;
            display: block;
            left: 0;
            top: calc(100% + 5px);
            position: absolute;
            padding: 10px 5px;
            width: 160px;
            background: #FFF;
            box-shadow: 0 0 5px #CCC;
            display: none;
            text-align: left;
        }

        .fore-wrapper .fore-palette:after,
        .back-wrapper .back-palette:before {
            content: "";
            display: inline-block;
            position: absolute;
            top: -10px;
            left: 10px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #fff;
        }

        .fore-palette a,
        .back-palette a {
            background: #FFF;
            margin-bottom: 2px;
            border: none;
        }

        .text_editor img {
            max-width: 100%;
            object-fit: cover;
        }
    </style>
    <style>
        /* Popup Container */
        #popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            justify-content: center;
            align-items: center;
            z-index: 9999;
            flex-direction: column;
        }

        #popup-img {
            max-width: 90%;
            max-height: 90%;
            transition: transform 0.3s ease;
        }

        .popup-close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 30px;
            color: white;
            cursor: pointer;
            z-index: 10000;
        }

        .zoom-controls {
            position: absolute;
            top: 20px;
            right: 70px;
            /* agar tidak tumpuk dengan tombol close */
            display: flex;
            gap: 10px;
            z-index: 10001;
        }

        .zoom-btn {
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        body.no-scroll {
            overflow: hidden;
        }

        #popup {
            overflow: auto;
        }
    </style>
    <div id="styling"></div>
</head>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div id="popup" onclick="closePopup(event)" style="display: none;">
    <div class="zoom-controls">
        <button class="zoom-btn" type="button" onclick="zoomIn(event)">🔍＋</button>
        <button class="zoom-btn" type="button" onclick="zoomOut(event)">🔍－</button>
    </div>
    <span class="popup-close" onclick="closePopup()">×</span>
    <img id="popup-img" src="https://fashiongroup.ethica.id/images/design/AY.05.25.1266-1.17.png" alt="Popup Gambar" style="transform: scale(3.2) translate(0px); transform-origin: 60.6748% 58.3089% 0px;">

</div>

<body>
    <div id="app"></div>
    <div id="jsscript"></div>
    <div id="snackbar-container">
        <div id="snackbar">
            <div id="classType" class="" role="alert">
                <div class="d-flex">
                    <div id="svg_content">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <div id="pesan"></div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        </div>
    </div>
    <input type="hidden" id="base_url" value="<?= base_url(); ?>">
    <input type="hidden" id="base_url_non_index" value="<?= str_replace('index.php/', '', base_url()); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="<?= $fai->urlframework('7sayvd814', 'r92h3go49as1s98.js') ?>"></script>
    <script src="<?= $fai->urlframework('dist', 'fai.js') ?>"></script>
    <!-- <script src=""></script> -->
    <!-- <?= $fai->urlframework('dist', 'fai.js') ?> -->
    <script src="<?= $fai->urlframework('assets\datatable', 'js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/jszip.min.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/pdfmake.min.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/vfs_fonts.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/buttons.print.min.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/buttons.colVis.min.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets\datatable', 'js/dataTables.fixedColumns.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <script src="<?= $fai->urlframework('assets\ace', 'src-noconflict/ace.js'); ?>"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>

    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

    <link rel="stylesheet" href="<?= $fai->urlframework('assets/bootstrap-tagsinput-latest/dist/', 'bootstrap-tagsinput.css'); ?> ">
    <link rel="stylesheet" href="<?= $fai->urlframework('assets/bootstrap-tagsinput-latest/examples/assets/', 'app.css'); ?>">
    <link rel="stylesheet" href="<?= $fai->urlframework('assets/bootstrap-tagsinput-latest/dist/', 'style.css'); ?>">
    <script src="<?= $fai->urlframework('assets/bootstrap-tagsinput-latest/dist/', 'bootstrap-tagsinput.js'); ?>"></script>
    <script src="<?= $fai->urlframework('assets/bootstrap-tagsinput-latest/examples/assets/', 'app.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fingerprintjs/fingerprintjs@3/dist/fp.min.js"></script>

    <script>
        const getDeviceId = async () => (await (await FingerprintJS.load()).get()).visitorId;
        const base_url = document.getElementById('base_url').value;
        const base_url_non_index = document.getElementById('base_url_non_index').value;
        const transaksiDB = "FaiDB_Transaksi_<?= $page['database_name']; ?>";
        const configDB = "FaiDB_config_<?= $page['database_name']; ?>";

        async function visitorId() {
            const deviceId = await getDeviceId();
            return deviceId;
        }
        const getStableDeviceId = async () => {
            const localKey = 'myDeviceId';
            let deviceId = localStorage.getItem(localKey);
            if (!deviceId) {
                const fp = await FingerprintJS.load();
                const result = await fp.get();
                deviceId = result.visitorId;
                localStorage.setItem(localKey, deviceId);
            }
            return deviceId;
        };

        function containsPromise(obj) {
            if (obj instanceof Promise) return true;
            if (Array.isArray(obj)) return obj.some(containsPromise);
            if (typeof obj === 'object' && obj !== null) {
                return Object.values(obj).some(containsPromise);
            }
            return false;
        }
    </script>
    <script>
        class SmartEncryptorJS {
            constructor() {
                this.defaultShift = 15;
            }

            generateKey(text, mode = 'dinamis') {
                if (mode === 'statis-search') {
                    return this.hash(text).substr(0, text.length);
                }
                return this.hash(text + Date.now()).substr(0, text.length);
            }

            shiftChar(c, shift) {
                return String.fromCharCode((c.charCodeAt(0) + shift) % 256);
            }

            unshiftChar(c, shift) {
                return String.fromCharCode((c.charCodeAt(0) - shift + 256) % 256);
            }

            encrypt(text, mode = 'dinamis') {
                const shift = mode === 'statis-search' ? this.defaultShift : Math.floor(Math.random() * 25) + 1;
                const key = this.generateKey(text, mode);
                let result = '';

                for (let i = 0; i < text.length; i++) {
                    const c = text[i];
                    const k = key[i % key.length];
                    const xored = String.fromCharCode(c.charCodeAt(0) ^ k.charCodeAt(0));
                    result += this.shiftChar(xored, shift);
                }

                const encoded = btoa(result);
                return `${encoded}_${shift}`;
            }

            decrypt(cipher, originalText = '', mode = 'dinamis') {
                const [base64, shiftStr] = cipher.split('_');
                const shift = parseInt(shiftStr);
                const decoded = atob(base64);
                const key = this.generateKey(originalText || decoded, mode);
                let result = '';

                for (let i = 0; i < decoded.length; i++) {
                    const c = this.unshiftChar(decoded[i], shift);
                    const k = key[i % key.length];
                    result += String.fromCharCode(c.charCodeAt(0) ^ k.charCodeAt(0));
                }

                return result;
            }

            hash(str) {
                // Simple SHA256 alternative
                let hash = 0;
                for (let i = 0; i < str.length; i++) {
                    hash = (hash << 5) - hash + str.charCodeAt(i);
                    hash |= 0;
                }
                return btoa(String(hash));
            }
        }
        class IndexedDBQueryParser {
            constructor(dbName) {
                this.dbName = dbName;
            }

            async execute(query) {
                const tokens = this.tokenize(query);
                return await this.parseAndExecute(tokens);
            }

            // Tokenizer: Memecah string SQL menjadi array kata-kata
            tokenize(query) {
                return query.match(/[\w\*]+|\S/g);
            }

            // Parser: Menafsirkan token dan mengeksekusi IndexedDB
            async parseAndExecute(tokens) {
                const db = await this.openDB();
                const action = tokens[0].toUpperCase();

                if (action === "SELECT") {
                    return this.handleSelect(tokens, db);
                } else {
                    throw new Error("Hanya mendukung SELECT untuk saat ini.");
                }
            }

            // Membuka database IndexedDB
            openDB() {
                return new Promise((resolve, reject) => {
                    const request = indexedDB.open(this.dbName, 1);
                    request.onsuccess = () => resolve(request.result);
                    request.onerror = () => reject("Gagal membuka IndexedDB");
                });
            }

            // Menangani query SELECT
            async handleSelect(tokens, db) {
                const fromIndex = tokens.indexOf("FROM");
                const whereIndex = tokens.indexOf("WHERE");
                const joinIndex = tokens.indexOf("JOIN");

                if (fromIndex === -1) throw new Error("Query harus memiliki FROM");

                const tableName = tokens[fromIndex + 1];

                // Jika query JOIN
                if (joinIndex !== -1) {
                    return this.handleJoin(tokens, db);
                }

                return new Promise((resolve, reject) => {
                    const transaction = db.transaction(tableName, "readonly");
                    const store = transaction.objectStore(tableName);
                    let request;

                    // Jika ada kondisi WHERE
                    if (whereIndex !== -1) {
                        const field = tokens[whereIndex + 1];
                        const operator = tokens[whereIndex + 2];
                        const value = tokens[whereIndex + 3];

                        if (operator !== "=") {
                            return reject("Hanya mendukung operator '=' untuk sekarang.");
                        }

                        const index = store.index(field);
                        request = index.getAll(Number(value));
                    } else {
                        request = store.getAll();
                    }

                    request.onsuccess = () => resolve(request.result);
                    request.onerror = () => reject("Gagal mengeksekusi query SELECT");
                });
            }

            // Menangani query JOIN
            async handleJoin(tokens, db) {
                const fromTable = tokens[tokens.indexOf("FROM") + 1];
                const joinTable = tokens[tokens.indexOf("JOIN") + 1];
                const onField1 = tokens[tokens.indexOf("ON") + 1].split(".")[1];
                const onField2 = tokens[tokens.indexOf("=") + 1].split(".")[1];

                const transaction = db.transaction([fromTable, joinTable], "readonly");
                const fromStore = transaction.objectStore(fromTable);
                const joinStore = transaction.objectStore(joinTable);

                const fromData = await new Promise((resolve, reject) => {
                    const request = fromStore.getAll();
                    request.onsuccess = () => resolve(request.result);
                    request.onerror = () => reject("Gagal mengambil data dari " + fromTable);
                });

                const joinPromises = fromData.map(async (row) => {
                    return new Promise((resolve) => {
                        const request = joinStore.get(row[onField1]);
                        request.onsuccess = () => {
                            row[joinTable] = request.result;
                            resolve(row);
                        };
                    });
                });

                return Promise.all(joinPromises);
            }
        }

        // Contoh Penggunaan
        const parser = new IndexedDBQueryParser("MyDatabase");

        async function runQuery() {
            // Query SELECT sederhana
            // const result1 = await parser.execute("SELECT * FROM orders WHERE customer_id = 1;");
            // console.log("Query 1:", result1);

            // // Query JOIN
            // const result2 = await parser.execute("SELECT * FROM orders JOIN customers ON orders.customer_id = customers.id;");
            // console.log("Query 2 (JOIN):", result2);
        }

        runQuery();
    </script>
    <script>
        var getalldata = {};
        getalldata.myApp = {};
        // Function to open and return IndexedDB database
        function openDatabase(dbName, dbVersion, storeName) {
            return new Promise((resolve, reject) => {
                const request = indexedDB.open(dbName, dbVersion);

                request.onsuccess = (event) => resolve(event.target.result);
                request.onerror = (event) => reject(event.target.error);
                request.onupgradeneeded = (event) => {
                    const db = event.target.result;
                    // alert();
                    if (!db.objectStoreNames.contains(storeName)) {
                        db.createObjectStore(storeName, {
                            keyPath: 'key'
                        });
                    }
                };
            });
        }
        let itemsPerPage = [];

        getalldata.data_produk = getalldata.data_produk || [];
        getalldata.data_produk_real = getalldata.data_produk_real || [];

        getalldata.data = getalldata.data || {};
        getalldata.data.array = getalldata.data.array || {};
        getalldata.data.itemsPerPage = getalldata.data.itemsPerPage || [];
        getalldata.data.content = getalldata.data.content || [];
        getalldata.data.search_field = getalldata.data.search_field || [];
        getalldata.data.after_init = getalldata.data.after_init || [];
        console.log("HALLO getalldata", getalldata);
        // Function to fetch data from API
        async function fetchDataFromApi(apiEndpoint, method = 'GET', data = null) {
            try {
                const options = {
                    method,
                    headers: {
                        'Content-Type': 'application/json'
                    }
                };

                if (method === 'GET' && data) {
                    // 🔗 Ubah data object ke query string
                    const params = new URLSearchParams(data).toString();
                    apiEndpoint += (apiEndpoint.includes('?') ? '&' : '?') + params;
                } else if (data && method !== 'HEAD') {
                    // 📨 Untuk POST/PUT dsb, kirim lewat body
                    options.body = JSON.stringify(data);
                }
                const response = await fetch(apiEndpoint, options);
                if (!response.ok) throw new Error('Network response was not ok');

                return await response.json();
            } catch (error) {
                console.error('Error fetching data from API:', error);
                throw error;
            }
        }

        function getLatestDBVersion(dbName) {
            return new Promise((resolve, reject) => {
                const req = indexedDB.open(dbName);
                let wasBlocked = false;

                req.onsuccess = (event) => {
                    const db = event.target.result;
                    const version = db.version;
                    db.close();
                    resolve(version);
                    console.log("Version: " + version);
                };
                req.onerror = (event) => reject(event.target.error);
                req.onblocked = () => {
                    wasBlocked = true;
                    reject(new Error("Database open was blocked."));
                };
            });
        }
        // Function to get main load data from IndexedDB or API
        async function getMainLoadData() {
            try {
                const dbName = 'FaiBe3DB';
                const storeName = 'mainStore';
                const dbVersion = 1;
                let key = 'main_page';

                // 1️⃣ Tunggu delete selesai dulu
                // await new Promise((resolve, reject) => {
                //     const deleteRequest = indexedDB.deleteDatabase(dbName);
                //     deleteRequest.onsuccess = () => {
                //         console.log('Database deleted');
                //         resolve();
                //     };
                //     deleteRequest.onerror = (e) => reject(e.target.error);
                //     deleteRequest.onblocked = () => {
                //         console.warn('Delete blocked');
                //         reject(new Error('Delete blocked'));
                //     };
                // });
                const db = await new Promise((resolve, reject) => {
                    const request = indexedDB.open(dbName, dbVersion);
                    request.onupgradeneeded = function(event) {
                        const db = event.target.result;
                        if (!db.objectStoreNames.contains(storeName)) {
                            db.createObjectStore(storeName, {
                                keyPath: 'id'
                            });
                            console.log('Object store created');
                        }
                    };
                    request.onsuccess = () => resolve(request.result);
                    request.onerror = (e) => reject(e.target.error);
                });
                const transaction = db.transaction(storeName, 'readonly');
                const store = transaction.objectStore(storeName);

                const getRequest = store.get(key);
                const result = await new Promise((resolve, reject) => {
                    getRequest.onsuccess = () => resolve(getRequest.result);
                    getRequest.onerror = (event) => reject(event.target.error);
                });

                console.log('Result:', result);
                let apiEndpoint = base_url + "api/main_load_data"; // Replace with your API endpoint

                data = await getDataByKeyAndUpdateIfNotFound(dbName, dbVersion, storeName, key, apiEndpoint);

                key = 'main_web';
                apiEndpoint = base_url + "api/main_web"; // Replace with your API endpoint

                web = await getDataByKeyAndUpdateIfNotFound(dbName, dbVersion, storeName, key, apiEndpoint);
                key = 'main_menu';
                apiEndpoint = base_url + "api/main_load_menu"; // Replace with your API endpoint

                menu = await getDataByKeyAndUpdateIfNotFound(dbName, dbVersion, storeName, key, apiEndpoint);
                key = 'main_app';
                apiEndpoint = base_url + "api/main_load_app"; // Replace with your API endpoint

                app = await getDataByKeyAndUpdateIfNotFound(dbName, dbVersion, storeName, key, apiEndpoint);
                console.log('Data fetched from API and saved to IndexedDB:', web);
                const return_data = {
                    data: data,
                    web: web,
                    menu: menu,
                    app: app
                };
                return return_data;
                // return data;

                // if (result) {
                //     console.log('Data loaded from IndexedDB:', result.data);
                //     return result.data;
                // } else {
                //     // If no data found in IndexedDB, fetch from API and save it
                //    
                // }
            } catch (error) {
                console.error('Error getting data:', error);
                throw error;
            }
        }

        // Function to save data to IndexedDB
        async function saveDataToIndexedDB(db, data, dbName, dbVersion, storeName, key) {
            const transaction = db.transaction(storeName, 'readwrite');
            const store = transaction.objectStore(storeName);

            const dataToSave = {
                id: key,
                data: data,
                timestamp: Date.now()
            };
            console.log("dataToSave" + dataToSave);
            const request = store.put(dataToSave);
            await new Promise((resolve, reject) => {
                request.onsuccess = () => resolve();
                request.onerror = (event) => reject(event.target.error);
            });
        }

        // Function to print all object stores in the database
        async function printAllTables(dbName, dbVersion, storeName) {
            try {
                const db = await openDatabase(dbName, dbVersion, storeName);
                console.log(`Database: ${dbName}`);
                console.log('Tables (Object Stores):');

                // Iterasi melalui semua object store names
                for (let i = 0; i < db.objectStoreNames.length; i++) {
                    console.log(`- ${db.objectStoreNames[i]}`);
                }

                db.close();
            } catch (error) {
                console.error('Error opening database:', error);
            }
        }

        // Function to print all data in an object store
        async function printAllData(dbName, dbVersion, storeName) {
            try {
                const db = await openDatabase(dbName, dbVersion, storeName);
                const transaction = db.transaction(storeName, 'readonly');
                const store = transaction.objectStore(storeName);

                const getAllRequest = store.getAll();
                const allData = await new Promise((resolve, reject) => {
                    getAllRequest.onsuccess = () => resolve(getAllRequest.result);
                    getAllRequest.onerror = () => reject('Error fetching all data');
                });

                console.log(`Data in object store "${storeName}":`);
                console.table(allData);

                db.close();
            } catch (error) {
                console.error('Error fetching data from object store:', error);
            }
        }

        // Function to get data by key
        async function getDataByKey(dbName, dbVersion, storeName, key) {
            try {
                const db = await openDatabase(dbName, dbVersion);
                const transaction = db.transaction(storeName, 'readonly');
                const store = transaction.objectStore(storeName);

                const getRequest = store.get(key);
                const result = await new Promise((resolve, reject) => {
                    getRequest.onsuccess = () => resolve(getRequest.result);
                    getRequest.onerror = (event) => reject(event.target.error);
                });

                if (result) {
                    console.log(`Data found for key "${key}":`, result);
                    return result;
                } else {
                    console.log(`No data found for key "${key}"`);
                    return '';
                }

                db.close();
            } catch (error) {
                console.error('Error getting data by key:', error);
            }
        }

        function deleteStore(dbName, storeName) {
            return new Promise((resolve, reject) => {
                // Pertama buka DB untuk ambil versi saat ini
                const request = indexedDB.open(dbName);

                request.onsuccess = function(event) {
                    const currentVersion = event.target.result.version;
                    event.target.result.close();

                    // Buka lagi dengan versi lebih tinggi untuk trigger onupgradeneeded
                    const deleteRequest = indexedDB.open(dbName, currentVersion + 1);

                    deleteRequest.onupgradeneeded = function(e) {
                        const db = e.target.result;

                        if (db.objectStoreNames.contains(storeName)) {
                            db.deleteObjectStore(storeName);
                            console.log(`Object store '${storeName}' berhasil dihapus.`);
                        } else {
                            console.warn(`Object store '${storeName}' tidak ditemukan.`);
                        }
                    };

                    deleteRequest.onsuccess = () => resolve();
                    deleteRequest.onerror = () => reject(deleteRequest.error);
                };

                request.onerror = function() {
                    reject(request.error);
                };
            });
        }

        // Function to delete data by key
        async function deleteData(dbName, dbVersion, storeName, key) {
            try {
                const db = await openDatabase(dbName, dbVersion);
                const transaction = db.transaction(storeName, 'readwrite');
                const store = transaction.objectStore(storeName);
                console.log(`Data with key "${key}" deleted.`);
                const deleteRequest = store.delete(key);
                await new Promise((resolve, reject) => {
                    deleteRequest.onsuccess = () => {
                        console.log(`Data with key "${key}" deleted.`);
                        resolve();
                    };
                    deleteRequest.onerror = (event) => reject(event.target.error);
                });

                db.close();
            } catch (error) {
                console.error('Error deleting data:', error);
            }
        }
        async function getDataByKeyAndUpdateIfNotFoundData(dbName, dbVersion, storeName, key, apiData) {
            try {
                // Membuka database dan mencari data
                const db = await openDatabase(dbName, dbVersion);
                const transaction = db.transaction(storeName, 'readonly');
                const store = transaction.objectStore(storeName);

                const getRequest = store.get(key);
                const result = await new Promise((resolve, reject) => {
                    getRequest.onsuccess = () => resolve(getRequest.result);
                    getRequest.onerror = (event) => reject(event.target.error);
                });

                if (0) {
                    // Jika data ditemukan di IndexedDB, cek apakah ada 'form_content'
                    console.log('Data loaded from IndexedDB:', result.data);
                    if (!result.data[row]) {
                        console.log('No form_content found. Fetching from API...');
                        // Jika form_content tidak ada, ambil data dari API

                        data = result.data;
                        data[row] = apiData; // Tambahkan form_content
                        // Perbarui data di IndexedDB
                        await updateDataInIndexedDB(dbName, dbVersion, storeName, key, data);
                        console.log('Data updated with form_content:', apiData);
                        return data;
                    } else {
                        console.log('form_content found:', result.data);
                        return result.data; // Kembalikan data yang ada
                    }
                } else {
                    // Jika tidak ada data di IndexedDB, ambil dari API
                    // console.log('Data not found in IndexedDB. Fetching from API...');

                    let data = {};

                    data = apiData; // Tambahkan form_content
                    // Simpan data ke IndexedDB
                    await saveDataToIndexedDB(db, data, dbName, dbVersion, storeName, key);
                    // console.log('Data fetched from API and saved to IndexedDB:', data);
                    return data;
                }
            } catch (error) {
                console.error('Error getting or saving data:', error);
                throw error;
            }
        }
        async function getDataByKeyAndUpdateIfNotFound(dbName, dbVersion, storeName, key, endpoint) {
            try {
                const db = await openDatabase(dbName, dbVersion);
                const transaction = db.transaction(storeName, 'readonly');
                const store = transaction.objectStore(storeName);

                const getRequest = store.get(key);
                const result = await new Promise((resolve, reject) => {
                    getRequest.onsuccess = () => resolve(getRequest.result);
                    getRequest.onerror = (event) => reject(event.target.error);
                });

                if (!isOnline()) {
                    // Jika data ditemukan di IndexedDB, cek apakah ada 'form_content'
                    console.log('Data loaded from IndexedDB:', result.data);
                    // if (result.data[key]) {
                    if (!result.data[key] && !isOnline()) {
                        alert("Anda tidak terhubung dengan internet");
                    } else
                    if (!result.data[key] && isOnline()) {
                        console.log('No form_content found. Fetching from API...');
                        // Jika form_content tidak ada, ambil data dari API
                        const apiData = await fetchDataFromApi(endpoint);
                        let data = result.data;
                        data[key] = apiData; // Tambahkan form_content
                        // Perbarui data di IndexedDB
                        await updateDataInIndexedDB(dbName, dbVersion, storeName, key, data);
                        console.log('Data updated with form_content:', apiData);
                        return data;
                    } else if (result.data[key]) {

                        console.log('form_content found:', result.data);
                        return result.data[key]; // Kembalikan data yang ada
                    }
                } else {
                    // Jika tidak ada data di IndexedDB, ambil dari API
                    console.log('Data not found in IndexedDB. Fetching from API...');
                    const apiData = await fetchDataFromApi(endpoint);
                    console.log("Key" + key);
                    console.log(apiData);
                    // Siapkan data untuk disimpan
                    let data = {};
                    data = apiData;
                    // data[row] = apiData;

                    // Simpan data ke IndexedDB

                    await saveDataToIndexedDB(db, data, dbName, dbVersion, storeName, key);
                    console.log('Data fetched from API and saved to IndexedDB:', data);
                    return data;
                }

                // Membuka database dan mencari data
                // const db = await openDatabase(dbName, dbVersion);
                // const transaction = db.transaction(storeName, 'readonly');
                // const store = transaction.objectStore(storeName);

                // const getRequest = store.get(key);
                // const result = await new Promise((resolve, reject) => {
                //     getRequest.onsuccess = () => resolve(getRequest.result);
                //     getRequest.onerror = (event) => reject(event.target.error);
                // });

                // if (0) {
                //     // Jika data ditemukan di IndexedDB, cek apakah ada 'form_content'
                //     console.log('Data loaded from IndexedDB:', result.data);
                //     if (!result.data[row]) {
                //         console.log('No form_content found. Fetching from API...');
                //         // Jika form_content tidak ada, ambil data dari API
                //         const apiData = await fetchDataFromApi(endpoint);
                //         data = result.data;
                //         data[row] = apiData; // Tambahkan form_content
                //         // Perbarui data di IndexedDB
                //         await updateDataInIndexedDB(dbName, dbVersion, storeName, key, data);
                //         console.log('Data updated with form_content:', apiData);
                //         return data;
                //     } else {
                //         console.log('form_content found:', result.data);
                //         return result.data; // Kembalikan data yang ada
                //     }
                // } else {
                //     // Jika tidak ada data di IndexedDB, ambil dari API
                //     // console.log('Data not found in IndexedDB. Fetching from API...');
                //     const apiData = await fetchDataFromApi(endpoint);
                //     let data = {};

                //     data = apiData; // Tambahkan form_content
                //     // Simpan data ke IndexedDB
                //     await saveDataToIndexedDB(db, data, dbName, dbVersion, storeName, key);
                //     // console.log('Data fetched from API and saved to IndexedDB:', data);
                //     return data;
                // }
            } catch (error) {
                console.error('Error getting or saving data:', error);
                throw error;
            }
        }


        // async function updateDataInIndexedDB(dbName, dbVersion, storeName, keyPath, newValue) {
        //     return new Promise((resolve, reject) => {
        //         const request = indexedDB.open(dbName, dbVersion);

        //         request.onsuccess = (event) => {
        //             const db = event.target.result;
        //             const transaction = db.transaction([storeName], 'readwrite'); // ✅ HARUS 'readwrite'
        //             const store = transaction.objectStore(storeName);

        //             const putRequest = store.put(newValue); // ⬅️ Lakukan update

        //             putRequest.onsuccess = () => {
        //                 resolve(true);
        //             };

        //             putRequest.onerror = (e) => {
        //                 console.error("Put failed:", e);
        //                 reject(e);
        //             };
        //         };

        //         request.onerror = (event) => {
        //             reject(event.target.error);
        //         };
        //     });
        // }
        async function updateDataInIndexedDB(dbName, version, storeName, key, value) {
            const request = indexedDB.open(dbName, version);

            request.onsuccess = (event) => {
                const db = event.target.result;
                const tx = db.transaction([storeName], "readwrite");
                const store = tx.objectStore(storeName);

                const dataToPut = {
                    id: key, // <-- wajib ada 'id' kalau keyPath adalah 'id'
                    data: value
                };

                const putRequest = store.put(dataToPut);

                putRequest.onsuccess = () => {
                    console.log('Data berhasil diupdate!');
                };

                putRequest.onerror = (err) => {
                    console.error('Error saat update data:', err.target.error);
                };
            };
        }

        // Example Usage
        async function databaseConverter(content, page) {
            let row = {
                query: 0,
                is_json: 0,
                num_rows: 0,
                row: []
            };

            if (!content.database) {
                // default row jika tidak ada data
                row.row = [{
                    object: 'foreach_1_row'
                }];
                row.num_rows = 1;
                return row;
            }

            const storeName = content.database.utama;

            const db = await openDB(transaksiDB, storeName);

            const allData = await getAllFromStore(db, content.database, storeName);
            Object.entries(allData).forEach(([key, obj]) => {
                obj.primary_key = key;
            });
            row.row = allData;
            row.num_rows = Object.keys(allData).length;
            row.query = 1;

            // handle pagination JSON flag
            if (content.pagination?.page === 'json') {
                row.is_json = 1;
            }

            return row;
        }

        // function openDB(databaseName, storeName) {
        //     return new Promise((resolve, reject) => {
        //         const request = indexedDB.open(databaseName, 1);

        //         request.onupgradeneeded = (event) => {
        //             const db = event.target.result;
        //             // Buat object store kalau belum ada
        //             if (!db.objectStoreNames.contains(storeName)) {
        //                 db.createObjectStore(storeName, {
        //                     keyPath: "id",
        //                     autoIncrement: true
        //                 });
        //             }
        //         };

        //         request.onsuccess = () => resolve(request.result);
        //         request.onerror = () => reject("Gagal membuka IndexedDB");
        //     });
        // }
        function openDB(databaseName, storeName) {
            return new Promise((resolve, reject) => {
                let request = indexedDB.open(databaseName);

                request.onsuccess = () => {
                    const db = request.result;

                    // Jika storeName sudah ada, langsung resolve
                    if (db.objectStoreNames.contains(storeName)) {
                        resolve(db);
                    } else {
                        // Kalau belum ada, tutup DB dan buka lagi dengan versi +1 untuk buat store baru
                        const newVersion = db.version + 1;
                        db.close();

                        const upgradeRequest = indexedDB.open(databaseName, newVersion);
                        upgradeRequest.onupgradeneeded = (event) => {
                            const upgradeDB = event.target.result;
                            if (!upgradeDB.objectStoreNames.contains(storeName)) {
                                upgradeDB.createObjectStore(storeName, {
                                    keyPath: "id",
                                    autoIncrement: true
                                });
                            }
                        };
                        upgradeRequest.onsuccess = () => resolve(upgradeRequest.result);
                        upgradeRequest.onerror = () => reject("Gagal upgrade DB untuk buat store");
                    }
                };

                request.onerror = () => reject("Gagal membuka IndexedDB");
            });
        }
        async function deleteByIndex(db, storeName, indexName, indexValue) {
            try {
                // Membuka transaksi dengan mode readwrite
                const tx = db.transaction(storeName, "readwrite");
                const store = tx.objectStore(storeName);

                // Menggunakan index untuk mencari data
                const index = store.index(indexName); // Menentukan index yang akan digunakan
                const request = index.get(indexValue); // Mencari data berdasarkan nilai index

                request.onsuccess = () => {
                    const item = request.result;
                    if (item) {
                        // Menghapus data berdasarkan key dari hasil pencarian
                        store.delete(item.id); // Pastikan id adalah key atau ganti dengan key yang sesuai
                        console.log(`Data dengan index ${indexName} dan value ${indexValue} berhasil dihapus.`);
                    } else {
                        console.log(`Tidak ada data yang ditemukan dengan ${indexName}: ${indexValue}`);
                    }
                };

                request.onerror = (err) => {
                    console.error("Terjadi kesalahan saat mencari data:", err);
                };

                // Menunggu transaksi selesai
                tx.oncomplete = () => {
                    console.log("Transaksi selesai.");
                };

                tx.onerror = (err) => {
                    console.error("Gagal melakukan transaksi:", err);
                };
            } catch (err) {
                console.error("Gagal menghapus data berdasarkan index:", err);
            }
        }

        async function getApiData(db, storeName, search = {}) {
            const apiUrl = base_url + "api/get_db_json";

            try {
                const deviceId = await getDeviceId();
                const response = await fetch(apiUrl, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        db: storeName,
                        search: search,
                        deviceId: deviceId
                    }) // kirim storeName sebagai payload
                });
                if (!response.ok) throw new Error("Gagal fetch dari API");

                const dataFromAPI = await response.json();
                console.log("Data dari API:", dataFromAPI);
                console.log("search:", search.live);

                if (parseInt(search.live) == 1) {
                    console.log("search:", dataFromAPI);
                    return (dataFromAPI);;
                } else {
                    // alert(2);
                    // Transaksi IndexedDB
                    const writeTx = db.transaction(storeName, "readwrite");
                    const writeStore = writeTx.objectStore(storeName);

                    // Fungsi untuk memproses data
                    const processData = async () => {
                        if (Array.isArray(dataFromAPI)) {
                            // Menggunakan for-loop untuk async/await
                            for (let item of dataFromAPI) {
                                const key = item.id + item.nama_db + item.row_awal + item.row_akhir;
                                const existingItem = await getItemFromIndexedDB(writeStore, key);

                                if (existingItem) {
                                    console.log("Existing");
                                    // Update json_data dan kapan_update_terakhir
                                    existingItem.json_data = item.json_data;
                                    existingItem.kapan_update_terakhir = item.kapan_update_terakhir;
                                    writeStore.put(existingItem); // Update data yang ada
                                } else {
                                    console.log("Input");
                                    // Simpan data baru
                                    if (item.id) {
                                        writeStore.put(item);
                                    } else {
                                        console.warn("Objek tanpa id ditemukan, dilewati:", item);
                                    }
                                }
                            }
                        } else if (typeof dataFromAPI === 'object' && dataFromAPI.id) {
                            const key = dataFromAPI.id + dataFromAPI.nama_db + dataFromAPI.row_awal + dataFromAPI.row_akhir;
                            const existingItem = await getItemFromIndexedDB(writeStore, key);

                            if (existingItem) {
                                // Update json_data dan kapan_update_terakhir
                                console.log("Existing");
                                existingItem.json_data = dataFromAPI.json_data;
                                existingItem.kapan_update_terakhir = dataFromAPI.kapan_update_terakhir;
                                writeStore.put(existingItem); // Update data yang ada
                            } else {
                                console.log("Input");
                                // Simpan data baru
                                writeStore.put(dataFromAPI);
                            }
                        } else {
                            console.error("Format data tidak valid:", dataFromAPI);
                            throw new Error("Format data tidak valid");
                        }
                    };

                    // Jalankan proses data


                    await processData();

                    // Event selesai transaksi
                    writeTx.oncomplete = () => console.log("Data berhasil disimpan ke IndexedDB");
                    writeTx.onerror = (err) => {
                        console.error("Gagal menyimpan data ke IndexedDB", err);
                    };
                }

            } catch (err) {
                console.error("Fetch atau simpan gagal:" + storeName, err);
                throw err;
            }
        }

        // Fungsi untuk mengambil item dari IndexedDB
        async function getItemFromIndexedDB(store, key) {
            return new Promise((resolve, reject) => {
                const request = store.get(key);
                request.onsuccess = () => resolve(request.result);
                request.onerror = (err) => reject(err);
            });
        }
        async function prosesJoin(item, database, db) {
            // ...kode di atas
            for (const [table, field, table_in] of database.join) {
                const search = {
                    id_search: item[field]
                };
                const joinData = await getAllFromStore(db, {
                    utama: table
                }, table, search);

                // alert();
                console.log("Join Data:", joinData);
                // Append data bukan replace
                if (!item[table_in]) item[table_in] = [];
                item[table_in].push(...joinData);

                console.log("Row item:", item);
                console.log("Table:", table);
                console.log("Field:", field);
                console.log("ID join-in:", table_in);

            }

        }
        async function ParseAllData(allData, database, search = {}) {
            let row = {};
            console.log("ParseAllData", allData);
            if (Array.isArray(allData)) {
                allData.forEach(data => {
                    if (typeof data.json_data) {

                        console.log("data.json_data" + (typeof data.json_data) + " ", data.json_data);
                        if (typeof data.json_data === 'string') {
                            try {
                                const parsed = JSON.parse(data.json_data);
                                // console.log(parsed);
                                if (search.id_search) {
                                    key = search.id_search;
                                    row[key] = parsed[key].current;
                                } else {

                                    for (const key in parsed) {

                                        // console.log(parsed[key].current);
                                        if (parsed[key]?.current) {
                                            item = row[key] = parsed[key].current;
                                            // if (database.join) {
                                            //     //prosesJoin(item, database, db);

                                            // }
                                        }
                                    }
                                }
                            } catch (err) {
                                console.warn("Gagal parse JSON:", err, data.json_data);
                            }
                        }
                    }

                });
            }
            return row;
        }
        async function getAllFromStore(db, database, storeName, search = {}) {
            try {
                console.log('Nama database:', db.name);
                console.log('Versi database:', db.version);
                console.log('List object store:', Array.from(db.objectStoreNames));
                let row = {};

                if (storeName) {

                    // alert("1"+storeName);
                    getApiData(db, storeName, search);
                    const tx = db.transaction(storeName, "readwrite");
                    const store = tx.objectStore(storeName);
                    const getAllRequest = store.getAll();
                    let allData = await new Promise((resolve, reject) => {
                        getAllRequest.onsuccess = async () => {
                            if (getAllRequest.result) {

                                resolve(getAllRequest.result);
                            } else {
                                reject('Error fetching all data')

                            }
                        };

                        getAllRequest.onerror = () => reject('Error fetching all data');
                    });

                    console.log(`Data in object store "${storeName}":`);
                    // console.table(allData);
                    if (search.id_search) {
                        const id_search = parseInt(search.id_search);

                        // Filter berdasarkan row_awal <= id_search <= row_akhir
                        const filtered = allData.filter(item => {
                            const rowAwal = parseInt(item.row_awal || 0);
                            const rowAkhir = parseInt(item.row_akhir || 0);
                            return id_search >= rowAwal && id_search <= rowAkhir;
                        });

                        allData = filtered;
                        // console.table("filtered", allData);
                    }

                    // Proses data dan masukkan ke dalam row


                    row = await ParseAllData(allData, search);






                    //     request.onerror = () => reject("Gagal membaca IndexedDB");
                    // });
                }
                console.log("row:", row);
                return row;
            } catch (err) {
                alert("Gagal getAllFromStore: " + err.message);
            }

        }

        function checkLoginStatus() {
            return new Promise((resolve, reject) => {
                const request = indexedDB.open("myAppDB", 1);

                request.onerror = () => reject("Database gagal dibuka");
                request.onsuccess = () => {
                    const db = request.result;
                    const tx = db.transaction("session", "readonly");
                    const store = tx.objectStore("session");
                    const getRequest = store.get("current");
                    getRequest.onsuccess = () => {
                        const session = getRequest.result;
                        console.log("LOGIN", session);
                        if (session && session.isLoggedIn) {
                            resolve(session); // Sudah login
                        } else {
                            resolve(false); // Belum login
                        }
                    };

                    getRequest.onerror = () => reject("Gagal membaca data session");
                };

                request.onupgradeneeded = (event) => {
                    const db = event.target.result;
                    if (!db.objectStoreNames.contains("session")) {
                        db.createObjectStore("session", {
                            keyPath: "id"
                        });
                    }
                };
            });
        }

        async function saveSession(data) {
            return new Promise((resolve, reject) => {
                const request = indexedDB.open("myAppDB", 1);

                request.onerror = () => reject("Gagal buka database");
                request.onsuccess = () => {
                    const db = request.result;
                    const tx = db.transaction("session", "readwrite");
                    const store = tx.objectStore("session");

                    const data2 = {
                        id: "current",
                        isLoggedIn: data.isLoggedIn,
                        userId: data.userId,
                        waktuLogin: Date.now()
                    };

                    const putReq = store.put(data2);
                    putReq.onsuccess = () => resolve(true);
                    putReq.onerror = () => reject("Gagal simpan session");
                };

                request.onupgradeneeded = (event) => {
                    const db = event.target.result;
                    if (!db.objectStoreNames.contains("session")) {
                        db.createObjectStore("session", {
                            keyPath: "id"
                        });
                    }
                };
            });

        }
        async function login() {
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            try {
                const response = await fetch("https://api-kamu.com/login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        username,
                        password
                    })
                });

                if (!response.ok) throw new Error("Login gagal");
                const data = await response.json();

                // Misal dari API: { userId: "abc123", token: "xyz456" }
                await saveSession(data);
                alert("Login berhasil!");
            } catch (err) {
                alert("Gagal login: " + err.message);
            }
        }

        // Auto-check login saat load
        window.onload = async () => {
            const isLoggedIn = await checkLoginStatus();
            if (isLoggedIn) {
                console.log("Sudah login");
                // redirect ke dashboard misalnya
            } else {
                console.log("Belum login");
            }
        };

        async function renderContentWithData(content, page, dataRows, templateString, pagination = {
            type: "load_more",
            limit: 50,
            page: 1
        }) {
            //renderContentWithData(content, page, rowData, htmlResult);
            var all_result_get = {
                html: "",
                css: "",
                js: ""
            };


            console.log("all_result_get before3(awal render HARUSNYA KOSONG)", all_result_get);
            const tagNamebe3temp = "BE3-LINK-TEMPLATE";
            const patternbe3template = new RegExp(`<${tagNamebe3temp}></${tagNamebe3temp}>`, 'gi');
            const templateUrl = base_url_non_index + "FaiFramework/Pages/_template/";
            console.log("all_result_get before3(awal render)", all_result_get);


            // Replace placeholders in templateString
            for (const type of ['css', 'html', 'js']) {
                templateString[type] = templateString[type]?.replace(patternbe3template, templateUrl)
                    .replace(/{HTTPS}/gi, "https")
                    .replace(new RegExp(base_url + "FaiFramework/Pages/_template/", 'gi'), templateUrl) || "";
            }
            // let tagNamebe3temp = "BE3-LINK-TEMPLATE";
            // let patternbe3template = new RegExp(`<${tagNamebe3temp}></${tagNamebe3temp}>`, 'gi');
            // // http://localhost/FrameworkServer/FaiFramework/Pages/_template
            // console.log("BEFORE TEMPLATESTRING", templateString);
            // templateString.css = templateString.css.replace(patternbe3template, base_url_non_index + "FaiFramework/Pages/_template/");
            // templateString.html = templateString.html.replace(patternbe3template, base_url_non_index + "FaiFramework/Pages/_template/");
            // templateString.js = templateString.js.replace(patternbe3template, base_url_non_index + "FaiFramework/Pages/_template/");


            // patternbe3template = new RegExp(`{HTTPS}`, 'gi');
            // // http://localhost/FrameworkServer/FaiFramework/Pages/_template
            // console.log("BEFORE TEMPLATESTRING", templateString);
            // templateString.css = templateString.css.replace(patternbe3template, "https");
            // templateString.html = templateString.html.replace(patternbe3template, "https");
            // templateString.js = templateString.js.replace(patternbe3template, "https");

            // let patterntemplate = new RegExp(base_url + "FaiFramework/Pages/_template/", 'gi');
            // templateString.js = templateString.js.replace(patterntemplate, base_url_non_index + "FaiFramework/Pages/_template/");
            console.log("TEMPLATESTRING", templateString);
            // https://localhost/frameworkServer_v1/index.php/FaiFramework/Pages/_template/
            console.log("dataRows:", dataRows);
            // console.log("dataRows.row:", dataRows.row);
            console.log("all_result_get before3(whit_content_array)", all_result_get);

            const rows = dataRows?.row || {};
            const allKeys = Object.keys(rows);
            const totalRows = allKeys.length;
            let start = 0,
                end = totalRows;
            if (pagination.type === "load_more" || pagination.type === "page") {
                const limit = pagination.limit || 50;
                const pageNum = pagination.page || 1;
                start = (pageNum - 1) * limit;
                end = start + limit;
            }
            console.log("all_result_get before2(whit_content_array)", all_result_get);

            const paginatedKeys = allKeys.slice(start, end);
            console.log("dataRows.paginatedKeys:", paginatedKeys);
            for (const key of paginatedKeys) {
                const row = rows[key];
                // for (const [key, row] of Object.entries(dataRows.row)) {
                console.log("Key:", key, "Value:", row);

                let returnTemp = [];
                if (templateString.css)
                    returnTemp.css = templateString.css;
                else
                    returnTemp.css = "";
                if (templateString.js)
                    returnTemp.js = templateString.js;
                else
                    returnTemp.js = "";

                if (templateString.html)
                    returnTemp.html = templateString.html;
                else
                    returnTemp.html = "";
                console.log("rendercontentwithdata returnTemp", returnTemp);
                if (content.array) {

                    console.log("all_result_get before2(whit_content_array)", all_result_get);

                    for (let keyArray in content.array) {
                        const value = content.array[keyArray];
                        console.log("rendercontentwithdata key_array", content.array);
                        let array = [
                            []
                        ];

                        for (let key2 in value) {
                            let fixedKey = isNaN(key2) ? key2 : parseInt(key2) - 1;
                            array[0][fixedKey] = value[key2];
                        }

                        const rendered = await executeContentLogic(page, array, 0, row); // <-- pakai await
                        const tagName = content.array[keyArray][0];
                        const pattern = new RegExp(`<${tagName}></${tagName}>`, 'gi');
                        console.log("rendercontentwithdata rendered(" + tagName + ")", rendered);
                        returnTemp.css = returnTemp.css.replace(pattern, rendered.css);
                        returnTemp.html = returnTemp.html.replace(pattern, rendered.html);
                        returnTemp.js = returnTemp.js.replace(pattern, rendered.js);

                        console.log("rendercontentwithdata rendered", rendered);
                    }
                    console.log("all_result_get before(whit_content_array)", all_result_get);
                    console.log("returnTemp after(whit_content_array)", returnTemp);
                    all_result_get.js += returnTemp.js;
                    all_result_get.html += returnTemp.html;
                    all_result_get.css += returnTemp.css;
                    console.log("all_result_get after(whit_content_array)", all_result_get);
                    // $('#jsscript').append("<br><textarea>" + all_result_get + "</textarea><br><Br>");
                } else {
                    console.log("returnTemp after(not_content_array)", returnTemp);
                    all_result_get.js += returnTemp.js;
                    all_result_get.html += returnTemp.html;
                    all_result_get.css += returnTemp.css;
                    console.log("all_result_get after(not_content_array)", all_result_get);
                }
                console.log("all_result_get" + key, all_result_get);
            }
            console.log("all_result_get last", all_result_get);

            return all_result_get;
        }

        function upgradeIndexedDB(dbName, dbVersion, newStoreName) {
            return new Promise((resolve, reject) => {
                const request = indexedDB.open(dbName, Date.now()); // pakai versi baru agar trigger upgrade

                request.onupgradeneeded = event => {
                    const db = event.target.result;
                    if (!db.objectStoreNames.contains(newStoreName)) {
                        db.createObjectStore(newStoreName, {
                            keyPath: 'id'
                        });
                    }
                };

                request.onsuccess = () => resolve(request.result);
                request.onerror = () => reject(request.error);
            });
        }
        async function saveToIndexedDBWithCheck(tableName, data) {
            const db = await openDatabase("MyAppDB", Date.now(), tableName);
            console.log(data);
            // Cek apakah object store tersedia
            if (!db.objectStoreNames.contains(tableName)) {
                console.warn(`Tabel ${tableName} belum ada di IndexedDB. Membuat...`);

                // Tutup & upgrade DB agar bisa buat store baru
                db.close();
                const upgradedDB = await upgradeIndexedDB("MyAppDB", Date.now(), tableName);
                return saveToIndexedDBWithCheck(tableName, data); // ulangi simpan setelah upgrade
            }
            // return new Promise((resolve, reject) => {
            const tx = db.transaction(tableName, 'readwrite');
            const store = tx.objectStore(tableName);

            const request = store.get(data.id);

            request.onsuccess = () => {
                const existing = request.result;

                if (existing) {
                    const updated = {
                        ...existing,
                        ...data
                    };
                    store.put(updated);
                    console.log(`[${tableName}] Updated existing ID: ${data.id}`);
                } else {
                    store.put(data);
                    console.log(`[${tableName}] Added new ID: ${data.id}`);
                }
            };

            request.onerror = (err) => {
                console.error(`[${tableName}] Gagal membaca data ID: ${data.id}`, err);
            };

            tx.onerror = (err) => {
                console.error(`[${tableName}] Transaction gagal:`, err);
            };

            tx.oncomplete = () => {
                console.log(`[${tableName}] Transaksi selesai.`);
            };
        }
        async function saveToIndexedDBWithCheckOnTable(tableName, data) {
            const db = await openDatabase("MyAppDB", Date.now(), tableName);
            console.log(data);
            // Cek apakah object store tersedia
            if (!db.objectStoreNames.contains(tableName)) {
                console.warn(`Tabel ${tableName} belum ada di IndexedDB. Membuat...`);

                // Tutup & upgrade DB agar bisa buat store baru
                db.close();
                const upgradedDB = await upgradeIndexedDB("MyAppDB", Date.now(), tableName);
                return saveToIndexedDBWithCheckOnTable(tableName, data); // ulangi simpan setelah upgrade
            }
            // return new Promise((resolve, reject) => {
            const tx = db.transaction(tableName, 'readwrite');
            const store = tx.objectStore(tableName);

            const request = store.get(data.id);

            request.onsuccess = () => {
                const existing = request.result;

                if (existing) {
                    const updated = {
                        ...existing,
                        ...data
                    };
                    store.put(updated);
                    console.log(`[${tableName}] Updated existing ID: ${data.id}`);
                } else {
                    store.put(data);
                    console.log(`[${tableName}] Added new ID: ${data.id}`);
                }
            };

            request.onerror = (err) => {
                console.error(`[${tableName}] Gagal membaca data ID: ${data.id}`, err);
            };

            tx.onerror = (err) => {
                console.error(`[${tableName}] Transaction gagal:`, err);
            };

            tx.oncomplete = () => {
                console.log(`[${tableName}] Transaksi selesai.`);
            };
        }
        async function handleIncomingData(tableName, transaksi, visitorId) {
            try {
                transaksi = (transaksi);
                console.log("transaksi" + transaksi);
                const tipe = transaksi.tipe_transaksi;
                const dataAwal = JSON.parse(transaksi.data_awal);
                const rowId = transaksi.primary_id;

                const json = {};
                json[transaksi.waktu_perubahan] = dataAwal.array_utama;
                const rowData = {
                    id: rowId,
                    key: rowId,

                    json: json,
                };
                if (tipe === 'Pembuatan') {
                    await saveToIndexedDBWithCheck(tableName, rowData);
                    console.log(`[${tipe}] Data baru dimasukkan ke ${tableName}`);
                } else if (tipe === 'Perubahan') {
                    const db = await openIndexedDB();

                    // Kalau store belum ada, upgrade DB
                    if (!db.objectStoreNames.contains(tableName)) {
                        db.close();
                        const upgradedDB = await upgradeIndexedDB(tableName);
                        return saveToIndexedDBWithCheck(tableName, rowData);
                    }

                    const tx = db.transaction(tableName, 'readwrite');
                    const store = tx.objectStore(tableName);

                    const existing = await new Promise((resolve, reject) => {
                        const req = store.get(rowId);
                        req.onsuccess = () => resolve(req.result);
                        req.onerror = err => reject(err);
                    });

                    if (existing) {
                        const updated = {
                            ...existing,
                            ...rowData
                        };
                        store.put(updated);
                        console.log(`[${tipe}] Data ID ${rowId} di-update di ${tableName}`);

                    } else {
                        store.put(rowData);
                        console.log(`[${tipe}] Data ID ${rowId} belum ada, jadi ditambahkan ke ${tableName}`);

                    }


                    return transaksi.primary_key;

                } else {
                    console.warn(`Transaksi tipe tidak dikenal: ${tipe}`);
                }
            } catch (err) {
                console.error("Gagal handleIncomingData:", err);
                // Bisa retry atau hentikan
            }
        }
        async function handleIncomingDataOneTable(tableName, transaksi, visitorId) {
            try {
                const tipe = transaksi.tipe_transaksi;
                const dataAwal = (transaksi.data_awal);
                const rowId = transaksi.primary_id;

                const json = {};
                json[rowId] = {};
                json[rowId][transaksi.waktu_perubahan] = dataAwal.array_utama;
                const rowData = {
                    id: tableName,
                    key: tableName,

                    json: json,
                };
                if (tipe === 'Pembuatan') {
                    await saveToIndexedDBWithCheckOnTable(tableName, rowData);
                    console.log(`[${tipe}] Data baru dimasukkan ke ${tableName}`);
                } else if (tipe === 'Perubahan') {
                    const db = await openIndexedDB();

                    // Kalau store belum ada, upgrade DB
                    if (!db.objectStoreNames.contains(tableName)) {
                        db.close();
                        const upgradedDB = await upgradeIndexedDB(tableName);
                        return saveToIndexedDBWithCheckOnTable(tableName, rowData);
                    }

                    const tx = db.transaction(tableName, 'readwrite');
                    const store = tx.objectStore(tableName);

                    const existing = await new Promise((resolve, reject) => {
                        const req = store.get(tableName);
                        req.onsuccess = () => resolve(req.result);
                        req.onerror = err => reject(err);
                    });
                    console.log("existing" + existing);
                    if (existing) {
                        console.log("existing" + existing);
                        updated = existing;
                        if (updated.json[rowId]) {

                            updated.json[rowId] = {};
                        }
                        if (updated.json[rowId][transaksi.waktu_perubahan]) {
                            updated.json[rowId][transaksi.waktu_perubahan] = dataAwal.array_utama;
                        }

                        store.put(updated);
                        console.log(`[${tipe}] Data ID ${rowId} di-update di ${tableName}`);

                    } else {
                        store.put(rowData);
                        console.log(`[${tipe}] Data ID ${rowId} belum ada, jadi ditambahkan ke ${tableName}`);

                    }


                    return transaksi.primary_key;

                } else {
                    console.warn(`Transaksi tipe tidak dikenal: ${tipe}`);
                }
            } catch (err) {
                console.error("Gagal handleIncomingData:", err);
                // Bisa retry atau hentikan
            }
        }
        let intervalId;
        async function syncUntilDone(apiEndpoint, visitorId, db, lase_device__id, delay = 3000) {
            try {
                const apiData = await fetchDataFromApi(apiEndpoint, "GET", {
                    device_id: visitorId,
                    db: db,
                    lase_device__id: lase_device__id,
                    timestamp: new Date().toISOString()
                });

                console.log("API Data:", apiData);



                const primary_key = await handleAllTransaksi(apiData.transaksi, visitorId, db, lase_device__id);
                // alert(apiData.totaltransaksi);
                if (!apiData.totaltransaksi || apiData.totaltransaksi === 0) {
                    console.log("Sinkronisasi selesai. Tidak ada transaksi baru.");
                    return; // keluar dari loop
                }

                // Tunggu delay, lalu panggil ulang
                setTimeout(() => {
                    syncUntilDone(apiEndpoint, visitorId, db, lase_device__id, delay);
                }, delay);

            } catch (err) {
                console.error("Gagal sinkronisasi:", err);
                // Bisa retry atau hentikan
            }
        }

        function startSyncUntilDone(apiEndpoint, visitorId, db, lase_device__id, delay = 3000) {
            intervalId = setInterval(async () => {
                try {
                    const apiData = await fetchDataFromApi(apiEndpoint, "GET", {
                        device_id: visitorId,
                        db: db,
                        lase_device__id: lase_device__id,
                        timestamp: new Date().toISOString()
                    });

                    console.log("API Data:", apiData);

                    // Cetak data lokal (optional)
                    printAllData("MyAppDB", Date.now(), db);

                    // Proses transaksi
                    const primary_key = await handleAllTransaksi(apiData.transaksi, visitorId, db, lase_device__id);

                    // Jika tidak ada transaksi lagi, hentikan interval
                    if (!apiData.totaltransaksi || apiData.totaltransaksi === 0) {
                        console.log("Sinkronisasi selesai. Tidak ada transaksi baru.");
                        clearInterval(intervalId);
                    }
                } catch (err) {
                    console.error("Gagal sinkronisasi:", err);
                    clearInterval(intervalId); // stop kalau error besar
                }
            }, delay);
        }

        // async function intergrasi_db(visitorId, db, lase_device__id=0) {
        //     let apiEndpoint = "<?= base_url(); ?>api/integrasi_db"; // Replace with your API endpoint

        //     // ada_id = false;
        //     // if (apps_device_id[db]) {
        //     //     ada_id = true;
        //     // } else {
        //     //     apps_device_id[db] = [];
        //     //     lase_device__id = 0;
        //     // }
        //     syncUntilDone(
        //         apiEndpoint,
        //         visitorId,
        //         db,
        //         lase_device__id,
        //         2000 // (optional) interval per 2 detik
        //     );
        //     // apiData = await fetchDataFromApi(apiEndpoint, "GET", {
        //     //     device_id: visitorId,
        //     //     db: db,
        //     //     lase_device__id: lase_device__id,
        //     //     timestamp: new Date().toISOString()
        //     // });
        //     // console.log(apiData);
        //     // printAllData("MyAppDB", Date.now(), db);
        //     // primary_key = await handleAllTransaksi(apiData.transaksi, visitorId, db, lase_device__id);

        //     // data = result.data;
        //     // data[row] = apiData; // Tambahkan form_content
        //     // // Perbarui data di IndexedDB
        //     // apps_device_id[db].push(apiData.apps_id[db]);
        //     // console.log(apps_device_id);
        //     // getDataByKeyAndUpdateIfNotFoundData('mainDatabase', 2, 'mainStore', 'main_id', apps_device_id);
        //     // // if(ada_id){

        //     // //     await updateDataInIndexedDB('mainDatabase', 2, 'mainStore', 'main_id', apps_device_id);
        //     // // }else{
        //     // //      await saveDataToIndexedDB(db, data, dbName, dbVersion, storeName, key); 
        //     // // }
        //     // getDataByKey('mainDatabase', 2, 'mainStore', 'apps_device_id');

        //     return apiData;
        // }
        function intergrasi_db(db) {

            const visitorId = getDeviceId();
            let apiEndpoint = "<?= base_url(); ?>api/get_db_json"; // Replace with your API endpoint
            var ajaxTime = new Date().getTime();
            $.ajax({
                type: 'get',
                data: {
                    device_id: visitorId,
                    db: db,
                    lase_device__id: 0,
                    timestamp: new Date().toISOString()
                },
                url: apiEndpoint,
                dataType: 'json',
                success: function(data) {

                    data = (data);
                    handleIncomingData(db, data.transaksi, visitorId);
                    // done_intergrasi(data.transaksi.primary_key, data.totaltransaksi, db);
                    printAllData("MyAppDB", Date.now(), db);

                    console.log(data);
                },
                error: function(error) {
                    console.log('error; ' + eval(error));
                    //alert(2);
                }
            });

        }

        function done_intergrasi(primary_key, totaltransaksi, db) {
            apiEndpoint = "<?= base_url(); ?>api/done_integrasi_db"; // Replace with your API endpoint

            const visitorId = getDeviceId();

            var ajaxTime = new Date().getTime();
            $.ajax({
                type: 'get',
                data: {
                    device_id: visitorId,

                    primary_key: primary_key,
                    timestamp: new Date().toISOString()
                },
                url: apiEndpoint,
                dataType: 'json',
                success: function(data) {
                    if (totaltransaksi) {
                        // intergrasi_db( db);
                    }
                    console.log(data);
                },
                error: function(error) {
                    console.log('error; ' + eval(error));
                    //alert(2);
                }
            });

        }
        async function handleAllTransaksi(data, visitorId, db, lase_device__id) {
            try {


                transaksi = data[0];

                await handleIncomingData(transaksi, visitorId);

                apiEndpoint = "<?= base_url(); ?>api/done_integrasi_db"; // Replace with your API endpoint
                await fetchDataFromApi(apiEndpoint, "GET", {
                    device_id: visitorId,

                    primary_key: transaksi.primary_key,
                    timestamp: new Date().toISOString()
                });

                return transaksi.primary_key;
            } catch (err) {
                console.error('Gagal memproses transaksi:', transaksi, err);
            }
        }
        // } catch (e) {
        //     console.error("handleAllTransaksi error:", e);
        // }
        // }
        async function syncDataFromServer() {
            try {
                const response = await fetch("https://example.com/api/users");
                const data = await response.json();

                const db = await openDB("MyAppDB", "users");
                await saveToStore(db, "users", data);

                console.log("✅ Data berhasil disinkron dari server ke IndexedDB");
            } catch (error) {
                console.error("❌ Gagal sinkron:", error);
            }
        }
        class Bundlecontent {
            static router(page, type, array_website, code = '') {
                const array = [
                    'BE3-EC-D1',
                    'BE3-EC-D2',
                    'BE3-EC-D3',
                    'BE3-W-VB1',
                    'BE3-W-VB2',
                    'BE3-E-BOX',
                    'BE3-LIST-PANEL-WORKSPACE',
                    'BE3-LIST-ROLE-WORKSPACE',
                    'BE3-LOGO',
                    'BE3-NAMAWEBAPPS',
                    'BE3-ASHION-HOME-PRODUK_GROUP_KLASIFIKASI',
                    'BE3-ASHION-CONTACT_US',
                    'BE3-ASHION-HOME-DISKON',
                    'BE3-ASHION-HOME-PROFILE-TOKO',
                    'BE3-LINK-LOGOUT',
                    'BE3-LINK-LOGIN',
                    'BE3-LINK-REGISTER',
                    'BE3-LINK-CART'
                ];

                if (type === 'content') {
                    switch (code) {
                        case 'BE3-LINK-LOGOUT':
                            return "INI LINK LOGOUT";
                        case 'BE3-LOGO':
                            return this.logo(page, array_website);
                        case 'BE3-LINK-CART':
                            return this.link_cart(page, array_website);
                        case 'BE3-LINK-LOGIN':
                            return this.login(page, array_website);
                        case 'BE3-LINK-REGISTER':
                            return this.daftar(page, array_website);
                        case 'BE3-BASE-URL':
                            return this.base_url(page, array_website);
                        case 'BE3-LIST-PANEL-WORKSPACE':
                            return this.list_panel_workspace(page, array_website);
                        case 'BE3-LIST-ROLE-WORKSPACE':
                            return this.list_role_workspace(page, array_website);
                        case 'BE3-E-BOX':
                            return this.ecommerce_dasboard_box(page, array_website);
                        case 'BE3-EC-D1':
                            return this.ecommerce_dasboard_bundles_1(page, array_website);
                        case 'BE3-EC-D2':
                            return this.ecommerce_dasboard_bundles_2(page, array_website);
                        case 'BE3-EC-D3':
                            return this.ecommerce_dasboard_bundles_3(page, array_website);
                        case 'BE3-W-VB1':
                            return this.visitor_bundles_1(page, array_website);
                        case 'BE3-W-VB2':
                            return this.visitor_bundles_2(page, array_website);
                        case 'BE3-ASHION-HOME-PRODUK_GROUP_KLASIFIKASI':
                            return this.ashion_home_produk_group_klasifikasi(page, array_website);
                        case 'BE3-ASHION-HOME-DISKON':
                            return ""; // or implement later: this.ashion_home_diskon(page, array_website);
                        case 'BE3-ASHION-CONTACT_US':
                            return this.ashion_contact_us(page, array_website);
                        case 'BE3-ASHION-HOME-PROFILE-TOKO':
                            return this.ashion_home_profil(page, array_website);
                        default:
                            return "";
                    }
                } else if (type === 'array') {
                    return array;
                }

                return null;
            }

            // Stub implementations — real logic should be filled here
            static logo(page, data) {
                return "<div>Logo</div>";
            }
            static link_cart(page, data) {
                return "<div>Cart</div>";
            }
            static login(page, data) {
                return "<div>Login</div>";
            }
            static daftar(page, data) {
                return "<div>Register</div>";
            }
            static base_url(page, data) {
                return "<div>Base URL</div>";
            }
            static list_panel_workspace(page, data) {
                return "<div>Panel Workspace</div>";
            }
            static list_role_workspace(page, data) {
                return "<div>Role Workspace</div>";
            }
            static ecommerce_dasboard_box(page, data) {
                return "<div>Ecommerce Box</div>";
            }
            static ecommerce_dasboard_bundles_1(page, data) {
                return "<div>Bundle 1</div>";
            }
            static ecommerce_dasboard_bundles_2(page, data) {
                return "<div>Bundle 2</div>";
            }
            static ecommerce_dasboard_bundles_3(page, data) {
                return "<div>Bundle 3</div>";
            }
            static visitor_bundles_1(page, data) {
                return "<div>Visitor 1</div>";
            }
            static visitor_bundles_2(page, data) {
                return "<div>Visitor 2</div>";
            }
            static ashion_home_produk_group_klasifikasi(page, data) {
                return "<div>Produk Group</div>";
            }
            static ashion_home_diskon(page, data) {
                return "<div>Diskon</div>";
            }
            static ashion_contact_us(page, data) {
                return "<div>Contact Us</div>";
            }
            static ashion_home_profil(page, data) {
                return "<div>Profil Toko</div>";
            }
        };

        class Partial {
            async html_decode(page, view, id, str) {
                const textarea = document.createElement('textarea');
                textarea.innerHTML = str;
                const decoded1 = textarea.value;

                const decoded2 = decoded1
                    .replace(/&#039;/g, "'")
                    .replace(/{HTTPS}/g, "https")
                    .replace(/{HTTP}/g, "http");

                return decoded2;
            }

            static html_encode(page, view, id, str) {
                const encoded = str
                    .replace(/'/g, '&#039;')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;');

                return encoded;
            }
            async content_source(page, template_array) {
                console.log("template_array", template_array);
                let partial = new Partial();
                if (template_array.source && !template_array.content_source) {
                    template_array.content_source = template_array.source;
                }

                if (template_array.source_list && !template_array.content_source) {
                    template_array.content_source = template_array.source_list;
                }

                if (!template_array.content_source && template_array.template_name) {
                    template_array.content_source = "template";
                } else if (!template_array.content_source && template_array.template_content) {
                    template_array.content_source = "template_database";
                } else if (!template_array.content_source) {
                    if (template_array.template_name) {
                        template_array.content_source = "template";
                    } else if (template_array.template_content) {
                        template_array.content_source = "template_database";
                    }
                }
                let result;
                switch (template_array.content_source) {
                    case "template_content": {

                        const array = [{}];

                        for (const [key2, value2] of Object.entries(template_array)) {
                            let key = isNaN(parseInt(key2)) ? key2 : parseInt(key2) - 1;
                            array[0][key] = value2;
                        }

                        array[0][0] = template_array.template_class;
                        array[0][1] = template_array.template_function;


                        console.log("array", array);
                        // const result = await executeContentLogic(data, array, 0, data);
                        result = await executeContentLogic(page, array, 0);
                        console.log(result);
                        break;
                    }

                    case "text":
                        result = {
                            html: template_array.content
                        };

                        break;
                    case "function":
                        result = {
                            html: ""
                        };

                        break;

                    case "template_database":
                        result = await partial.html_decode(page, '', '', template_array.template_content);
                        break;

                    case "html":

                        result = {
                            html: await partial.html_decode(page, '', '', template_array.html)
                        };
                        break;

                    case "file_bundles_database": {
                        //  versions = getalldata.myApp.page.app.versions[apps][page_view];
                        // last_version = versions.last_version;
                        // view = versions.versions[last_version];
                        console.log("content_search:file_bundles_database");
                        const funcName = getalldata.myApp.page['web'][getalldata.myApp.page.load.domain].template_utama;
                        const array = [{
                                0: funcName,
                                1: template_array.template_code,
                                return: "html_content"
                            },

                        ];


                        result = await executeContentLogic(getalldata.myApp.page, array, 0, {});
                        console.log("file_bundles_database result", result);

                        // if (template?.[template_array.template_code]?.content) {

                        // } else {
                        //     const sql = `
                        //         SELECT * FROM website__template__master__kategori 
                        //         LEFT JOIN website__template__file ON website__template__file.id_kategori = website__template__master__kategori.id
                        //         LEFT JOIN website__template__list ON website__template__file.id_template = website__template__list.id
                        //         WHERE kode_kategori = '${template_array.template_code}' 
                        //         AND website__template__list.nama_template = '${page.template}'
                        //     `;

                        //     // await DB.queryRaw(page, sql);
                        //     // const get = DB.get('all');

                        //     if (get.num_rows) {
                        //         result = html_decode(page, '', '', get.row[0].kontent_file);
                        //     } else {
                        //         result = '';
                        //     }
                        // }
                        break;
                    }

                    default: {
                        console.log(template_array);
                        const url = await this.urlFramework(template_array.template_name, `${template_array.template_file}.php`);
                        console.log(url);
                        const response = await fetch(url, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'text/html'
                            },
                        });
                        result = await response.text();
                    }
                }
                console.log("view_source", result);
                return result;
            }
            async urlFramework(template, url) {
                let protocol = location.protocol + "//"; // otomatis 'http://' atau 'https://'
                let host = location.hostname; // sama dengan $_SERVER['SERVER_NAME']
                let suffix = "";

                if (host === "localhost") {
                    suffix = "/FrameworkServer_v1";
                }

                return `${protocol}${host}${suffix}/FaiFramework/Pages/_template/${template}/${url}`;
            }

            async proses_array_website_database_list_array(page, getDatabaseListOnList, dbRow, array, dl, databaseListTemplate,
                databaseListTemplateOnList,
                databaseListTemplateOnListOnList,
                databaseListTemplateOnListOnListOnList) {
                console.log("keyArrayOnArray", keyArrayOnArray);
                console.log("valueArray", valueArray);
                contentArrayTempOnList = await this.array_website(
                    page,
                    contentArrayTempOnList,
                    valueArray,
                    keyArrayOnArray,
                    dl,
                    dbRow,
                    databaseListTemplate,
                    databaseListTemplateOnList,
                    databaseListTemplateOnListOnList,
                    databaseListTemplateOnListOnListOnList
                );
            }
            async array_website_datatbase_list(page, array, keyArray, i, database,
                databaseListTemplate = {},
                databaseListTemplateOnList = {},
                databaseListTemplateOnListOnList = {},
                databaseListTemplateOnListOnListOnList = {}) {
                array.content_source ??= 'template';
                console.log("database_list.->>>>>>>>>>>>>>array", array);
                let getDatabaseListOnList = await this.content_source(page, array);
                console.log("getDatabaseListOnList", getDatabaseListOnList);
                const dbRefer = array.database_refer;
                let contentArrayTempTo = {
                    html: '',
                    js: '',
                    css: ''
                };
                let dl = 0;

                if (dbRefer <= -1) {
                    const dbConf = array.database;

                    // if (Array.isArray(dbConf?.where_get_array)) {
                    //     dbConf.where = [];

                    //     dbConf.where_get_array.forEach(entry => {
                    //         const {
                    //             get_row,
                    //             array_row,
                    //             row
                    //         } = entry;
                    //         const value = (globalThis[array_row] ?? {})[get_row];
                    //         dbConf.where.push(value ? [row, '=', value] : [1, '=', 0]);
                    //     });
                    // }
                    console.log("dbConf", dbConf);
                    let storeName = "config_database-" + page.view.load.apps + "-" + page.view.load.page_view + "-" + keyArray;
                    search = {
                        tipe: 'config_database_db_refer-1',
                        dbConf: dbConf,
                        database: database,
                        databaseListTemplate: databaseListTemplate,
                        databaseListTemplateOnList: databaseListTemplateOnList,
                        databaseListTemplateOnListOnList: databaseListTemplateOnListOnList,
                        live: 1
                    };
                    if (!page.row_section) {
                        page.row_section = [];
                    }
                    console.log("search dbRefer-1", search);
                    const db = await openDB(transaksiDB, storeName);
                    // allData =  await getApiData(db, storeName, search);
                    page.row_section[dbRefer] = await getApiData(db, storeName, search);
                    // page.row_section[dbRefer] = await databaseConverter(page, dbConf, [], 'all');
                }

                let varGetDatabase = 'database';
                if (!Object.keys(databaseListTemplate).length) {
                    varGetDatabase = 'database_list_template';
                } else if (!Object.keys(databaseListTemplateOnList).length) {
                    varGetDatabase = 'database_list_template_on_list';
                } else if (!Object.keys(databaseListTemplateOnListOnList).length) {
                    varGetDatabase = 'database_list_template_on_list_on_list';
                } else if (!Object.keys(databaseListTemplateOnListOnListOnList).length) {
                    varGetDatabase = 'database_list_template_on_list_on_list_on_list';
                }
                var contentArrayTempOnList;

                let getDatabaseListOnList_out = {};
                let getDatabaseListOnList_temp = {};
                if (typeof getDatabaseListOnList == 'object') {

                    getDatabaseListOnList_temp = getDatabaseListOnList;
                } else {
                    getDatabaseListOnList_temp.html = getDatabaseListOnList;
                    getDatabaseListOnList_temp.css = "";
                    getDatabaseListOnList_temp.js = "";
                }
                console.log("getDatabaseListOnList_temp", getDatabaseListOnList_temp);
                const rows = page.row_section[dbRefer]?.row || [];
                if (page.row_section[dbRefer]?.num_rows) {
                    for (const dbRow of rows) {
                        dl++;
                        getDatabaseListOnList_out[dl] = {
                            html: "",
                            css: "",
                            js: ""
                        };
                        getDatabaseListOnList_out[dl].html = getDatabaseListOnList_temp.html;
                        getDatabaseListOnList_out[dl].css = getDatabaseListOnList_temp.css;
                        getDatabaseListOnList_out[dl].js = getDatabaseListOnList_temp.js;
                        contentArrayTempOnList = await this.proses_array_website_database_list(page, getDatabaseListOnList_out[dl], dbRow, array, dl, databaseListTemplate,
                            databaseListTemplateOnList,
                            databaseListTemplateOnListOnList,
                            databaseListTemplateOnListOnListOnList);
                        if (typeof contentArrayTempOnList == 'object') {
                            contentArrayTempTo.html += contentArrayTempOnList.html;
                            contentArrayTempTo.css += contentArrayTempOnList.css;
                        } else {

                            contentArrayTempTo.html += contentArrayTempOnList;
                        }
                        console.log("contentArrayTempTo", contentArrayTempTo);

                    }

                }

                return contentArrayTempTo;
            }
            async proses_array_website_database_list(page, getDatabaseListOnList_in, dbRow, array, dl, databaseListTemplate,
                databaseListTemplateOnList,
                databaseListTemplateOnListOnList,
                databaseListTemplateOnListOnListOnList) {
                let contentArrayTempOnList_in = {

                };
                contentArrayTempOnList_in = {
                    html: "",
                    css: "",
                    js: ""
                };
                contentArrayTempOnList_in.html = getDatabaseListOnList_in.html;
                contentArrayTempOnList_in.css = getDatabaseListOnList_in.css;
                contentArrayTempOnList_in.js = getDatabaseListOnList_in.js;
                console.log("-------------------row------------");
                console.log("dbRow", dbRow);
                console.log("contentArrayTempOnList", contentArrayTempOnList_in);
                console.log("getDatabaseListOnList", getDatabaseListOnList_in);
                console.log("array-Array", Object.entries(array.array));
                let content_result_array;
                for (const [keyArrayOnArray, valueArray] of Object.entries(array.array)) {
                    console.log("keyArrayOnArray", keyArrayOnArray);
                    console.log("valueArray", valueArray);
                    content_result_array = await this.array_website(
                        page,
                        contentArrayTempOnList_in,
                        valueArray,
                        keyArrayOnArray,
                        dl,
                        dbRow,
                        databaseListTemplate,
                        databaseListTemplateOnList,
                        databaseListTemplateOnListOnList,
                        databaseListTemplateOnListOnListOnList
                    );
                    if (typeof content_result_array == 'object') {
                        if (content_result_array.html)
                            contentArrayTempOnList_in.html = content_result_array.html;
                        if (content_result_array.css)
                            contentArrayTempOnList_in.css = content_result_array.css;
                        if (content_result_array.js)
                            contentArrayTempOnList_in.js = content_result_array.js;
                    } else if (typeof content_result_array == 'string') {
                        contentArrayTempOnList_in.html = content_result_array;
                    }
                }
                return contentArrayTempOnList_in;
            }

            async array_website(page, contentReturn, array, keyArray, i, database,
                databaseListTemplate = {},
                databaseListTemplateOnList = {},
                databaseListTemplateOnListOnList = {},
                databaseListTemplateOnListOnListOnList = {}) {
                console.log("contentReturn before - array_website", contentReturn);
                console.log("contentReturn before - array", array.refer);
                let all_db = [];
                all_db['database'] = database;
                all_db['databaseListTemplate'] = databaseListTemplate;
                all_db['databaseListTemplateOnList'] = databaseListTemplateOnList;
                all_db['databaseListTemplateOnListOnList'] = databaseListTemplateOnListOnList;
                all_db['databaseListTemplateOnListOnListOnList'] = databaseListTemplateOnListOnListOnList;
                if (array.refer === 'database') {
                    const rowKey = array.row?.trim?.();
                    let toDatabase = database;

                    if (!(rowKey in toDatabase) && Object.keys(databaseListTemplate).length)
                        toDatabase = databaseListTemplate;
                    if (!(rowKey in toDatabase) && Object.keys(databaseListTemplateOnList).length)
                        toDatabase = databaseListTemplateOnList;
                    if (!(rowKey in toDatabase) && Object.keys(databaseListTemplateOnListOnList).length)
                        toDatabase = databaseListTemplateOnListOnList;
                    console.log("toDatabase", toDatabase);
                    console.log("array", array);
                    console.log("keyArray", keyArray);
                    const value = toDatabase[rowKey] || '';
                    if (typeof contentReturn == 'object') {

                        for (const type of ['css', 'html', 'js']) {
                            const tagPattern = new RegExp(`<${keyArray}>\\s*<\/${keyArray}>`, 'g');
                            contentReturn[type] = await contentReturn[type]?.replace(tagPattern, value)

                        }
                    } else {

                        const tagPattern = new RegExp(`<${keyArray}>\\s*<\/${keyArray}>`, 'g');
                        contentReturn = await contentReturn.replace(tagPattern, value);
                    }
                } else if (array.refer === 'function') {
                    //   if (typeof contentReturn == 'object') {
                    //       contentReturn.html = contentReturn.html ;
                    //       contentReturn.css =  contentReturn.css;
                    //       contentReturn.js = "";
                    //     }else{
                    //       contentReturn = "";

                    //   }
                } else if (array.refer === 'if_database_to_text') {
                    const source = array.source_database;
                    const rowGetIf = array.row;
                    const ifGetValue = all_db[source]?.[rowGetIf]; // diasumsikan data globalThis.data atau lainnya
                    let returnIf = "";


                    const ifValue = array.if_value || {};

                    for (const [keyIf, valueIf] of Object.entries(ifValue)) {
                        if (keyIf) {
                            if (ifGetValue === keyIf) {
                                returnIf = valueIf;
                                break;
                            }
                        }
                    }

                    if (!returnIf && array.if_else !== undefined) {
                        returnIf = array.if_else;
                    }
                    if (typeof contentReturn == 'object') {

                        for (const type of ['css', 'html', 'js']) {
                            const tagPattern = new RegExp(`<${keyArray}>\\s*<\/${keyArray}>`, 'g');
                            contentReturn[type] = await contentReturn[type]?.replace(tagPattern, returnIf)

                        }
                    } else {

                        const tagPattern = new RegExp(`<${keyArray}>\\s*<\/${keyArray}>`, 'g');
                        contentReturn = await contentReturn.replace(tagPattern, returnIf);
                    }
                    // contentReturn = contentReturn.replaceAll(`<${keyArray}></${keyArray}>`, );

                } else if (array.refer === 'database_list') {
                    let contentArrayTempToreturn = await this.array_website_datatbase_list(page, array, keyArray, i, database,
                        databaseListTemplate = {},
                        databaseListTemplateOnList = {},
                        databaseListTemplateOnListOnList = {},
                        databaseListTemplateOnListOnListOnList = {});;
                    console.log("contentArrayTempToreturn", contentArrayTempToreturn);
                    console.log("contentReturn before", contentReturn);
                    if (!contentReturn) {

                    } else
                    if (typeof contentReturn == 'object') {

                        for (const type of ['css', 'html', 'js']) {
                            const tagPattern = new RegExp(`<${keyArray}>\\s*<\/${keyArray}>`, 'g');
                            contentReturn[type] = await contentReturn[type]?.replace(tagPattern, contentArrayTempToreturn[type])

                        }
                    } else {
                        let contentReturn_temp = contentReturn;
                        contentReturn = {
                            css: "",
                            html: "",
                            js: "",

                        };
                        contentReturn.html = contentReturn_temp;
                        const tagPattern = new RegExp(`<${keyArray}>\\s*<\/${keyArray}>`, 'g');
                        if (contentArrayTempToreturn.html)
                            contentReturn.html = await contentReturn.html.replace(tagPattern, contentArrayTempToreturn.html);
                        else
                            contentReturn.html = await contentReturn.html.replace(tagPattern, contentArrayTempToreturn);
                        if (contentArrayTempToreturn.css)
                            contentReturn.css += await contentArrayTempToreturn.css;
                        if (contentArrayTempTo.js)
                            contentReturn.js += await contentArrayTempToreturn.js;

                    }
                    // contentReturn = contentReturn.replaceAll(`<${keyArray}></${keyArray}>`, contentArrayTempTo);
                }

                console.log("contentReturn after array", array);
                console.log("contentReturn after", contentReturn);
                return contentReturn;
            }

            async array_website2(input) {

                console.log("array_website", input);
                const {
                    data = {},
                        template = {},
                        value = {},
                        view = {},
                        refer = "",
                        page = {},
                        site = {},
                        url = {},
                } = input;

                const result = {
                    output: "",
                    content: "",
                    include: [],
                    script: [],
                };

                function get_template(name) {
                    return template[name] || "";
                }

                function find_data(name) {
                    return data[name] || {};
                }

                function eval_data(templateString, vars) {
                    return templateString.replace(/{{(\w+)}}/g, (_, key) => vars[key] || "");
                }

                function inject_content(str) {
                    result.content += str;
                }

                function inject_output(str) {
                    result.output += str;
                }

                function handle_text() {
                    const key = value.key || "";
                    const val = value.value || "";
                    const tpl = get_template("text");
                    inject_output(eval_data(tpl, {
                        key,
                        value: val
                    }));
                }

                function handle_crud() {
                    const crud_data = find_data(value.crud);
                    const tpl = get_template("crud");
                    inject_output(eval_data(tpl, crud_data));
                }

                function handle_database() {
                    const db_data = find_data(value.database);
                    const tpl = get_template("database");
                    inject_output(eval_data(tpl, db_data));
                }

                function handle_include() {
                    const files = Array.isArray(value.include) ? value.include : [value.include];
                    result.include.push(...files);
                }

                function handle_script() {
                    const scripts = Array.isArray(value.script) ? value.script : [value.script];
                    result.script.push(...scripts);
                }

                function handle_view() {
                    const view_data = view[value.view] || {};
                    const tpl = get_template("view");
                    inject_output(eval_data(tpl, view_data));
                }

                function handle_default() {
                    const tpl = get_template(refer);
                    inject_output(eval_data(tpl, value));
                }

                switch (refer) {
                    case "text":
                        handle_text();
                        break;
                    case "crud":
                        handle_crud();
                        break;
                    case "database":
                        handle_database();
                        break;
                    case "include":
                        handle_include();
                        break;
                    case "script":
                        handle_script();
                        break;
                    case "view":
                        handle_view();
                        break;
                    default:
                        handle_default();
                        break;
                }

                return result;
            }

        };
        class Packages {

            static htmlspecialchars(str) {
                return str
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            // Simulasi `htmlentities` di JavaScript
            static htmlentities(str) {
                return str
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;')
                    .replace(/ /g, '&nbsp;') // Menambahkan pengganti untuk spasi
                    .replace(/\t/g, '&emsp;') // Menambahkan pengganti untuk tab
                    .replace(/\n/g, '<br>'); // Menambahkan pengganti untuk newline
            }
            async view_website(page, content_template = {
                html: "",
                css: "",
                js: ""
            }) {

                if (page.view.config?.database) {
                    console.log("config database", page.view.config?.database);
                    const entries = Object.entries(page.view.config?.database);
                    console.log("page.view", page.view);
                    for (const [key, value] of entries) {
                        let storeName = "config_database-" + page.view.load.apps + "-" + page.view.load.page_view + "-" + key;
                        search = {
                            tipe: 'config_database',
                            apps: page.view.load.apps,
                            page_view: page.view.load.page_view,
                            key: key,
                            live: 1
                        };
                        if (!page.row_section) {
                            page.row_section = [];
                        }

                        const db = await openDB(transaksiDB, storeName);
                        // allData =  await getApiData(db, storeName, search);
                        page.row_section[key] = await getApiData(db, storeName, search);
                        console.log("page.row_section", page.row_section);
                        console.log(`Key: ${key}, Value: ${value},page${page.view.load.apps} ${page.view.load.page_view}`);
                        //page.row_section
                    }


                    //     if (isset($page['config']['database'][$key])) {
                    //         $page['row_section'][$key] = Database::database_coverter($page, $page['config']['database'][$key], array(), 'all');
                    //     } else {
                    //         $page['row_section'][$key] = (object)['object' => 'foreach_1_row'];
                    //     }
                    // }
                }

                const partial = new Partial();
                const contentList = page.website.content;
                console.log("contentList", contentList);

                if (typeof content_template !== 'object' || content_template === null) {
                    content_template = {
                        html: "",
                        css: "",
                        js: ""
                    };
                }


                let content_template_temp = content_template;
                let result;
                for (let i = 0; i < contentList.length; i++) {
                    console.log("proses contentList", contentList[i]);
                    const temp_first = {
                        ...contentList[i]
                    };
                    const key_array = contentList[i].tag || "";
                    let content = "";

                    if (Bundlecontent.router(page, 'array', temp_first).includes(key_array)) {
                        content = Bundlecontent.router(page, 'content', contentList[i], key_array);
                        // await executeContentLogic(page, array, i, data = {})
                        if (contentList[i].col_row) {
                            content = `<div class="${contentList[i].col_row}">${content}</div>`;
                        }
                    } else if (contentList[i].content_source) {
                        // alert("content_source");
                        content = await partial.content_source(page, contentList[i]);
                        console.log("content after  content_source", content);
                        // alert(content);
                    }

                    if (contentList[i].row) {
                        content.html = `<div class="${contentList[i].row}">${content.html}</div>`;
                    } else if (contentList[i].col_row) {
                        content.html = `<div class="${contentList[i].col_row}">${content.html}</div>`;
                    } else {
                        content.html = `<div class="col-md-12">${content.html}</div>`;
                    }

                    // Handle template_array
                    if (Array.isArray(contentList[i].template_array)) {
                        for (let j = 0; j < contentList[i].template_array.length; j++) {
                            let array = {
                                ...contentList[i].template_array[j]
                            };
                            console.log("proses template_array", array);
                            const tag = array.tag;
                            let content_array = "";
                            const temp = contentList[i];

                            if (!array.refer) {
                                array.refer = "text";
                                array.text = "";
                            }

                            if (array.refer === "database" && !array.database_refer) {
                                console.error(`${tag} harus disertai database_refer`);
                                return `<div class="alert alert-danger">${tag} harus disertai database_refer</div>`;
                            }

                            if (Bundlecontent.router(page, 'array', array).includes(tag)) {
                                content_array += Bundlecontent.router(page, 'content', array, tag);
                            } else {
                                if (array.refer === "text" && array.value) {
                                    array.text = array.value;
                                }

                                if (array.refer === "database" && array.database_row) {
                                    array.row = array.database_row;
                                }

                                if (array.database_refer !== undefined) {
                                    const db_refer = array.database_refer;

                                    if (db_refer <= -1) {
                                        let database_db = array.database;

                                        if (database_db.where_get_array) {
                                            for (let wga = 0; wga < database_db.where_get_array.length; wga++) {
                                                const var_get_data = database_db.where_get_array[wga].get_row;
                                                const array_row = database_db.where_get_array[wga].array_row;

                                                if (page[array_row] && page[array_row][var_get_data] !== undefined) {
                                                    database_db.where = database_db.where || [];
                                                    database_db.where.push([
                                                        database_db.where_get_array[wga].row,
                                                        '=',
                                                        page[array_row][var_get_data]
                                                    ]);
                                                }
                                            }
                                        }

                                        if (!page.row_section[db_refer]) {
                                            page.row_section[db_refer] = {
                                                row: [{
                                                    object: 'foreach_1_row'
                                                }],
                                                num_rows: 1
                                            };
                                        }

                                        page.row_section[db_refer] = await Database.database_coverter(page, database_db, [], 'all');
                                    }

                                    if (page.row_section[db_refer].num_rows) {
                                        // partial = new Partial();
                                        console.log('Ada num_rows', {
                                            1: content,
                                            2: array,
                                            3: array.tag,
                                            4: page.row_section[db_refer].row[0]
                                        });
                                        content = await partial.array_website(
                                            page, content, array, array.tag, j, page.row_section[db_refer].row[0]
                                        );
                                        // if()
                                        console.log("selesai", content);
                                    }
                                } else {

                                    const row = {
                                        object: 'foreach_1_row'
                                    };
                                    console.log('Tidak db_refer', {
                                        1: content,
                                        2: array,
                                        3: array.tag,
                                        4: row
                                    });
                                    content = await partial.array_website(page, content, array, array.tag, j, row);
                                }
                            }
                        }
                    } else if (Bundlecontent.router(page, 'array', contentList[i]).includes(key_array)) {
                        // alert("masuk bundles");
                        content = Bundlecontent.router(page, 'content', contentList[i], key_array);

                        if (contentList[i].col_row) {
                            content = `<div class="${contentList[i].col_row}">${content}</div>`;
                        }
                    }

                    page.website.content[i] = temp_first;

                    const tag = contentList[i].tag || "-99999999999";
                    console.log("tag", tag);
                    if (content_template.html.includes(`<${tag}></${tag}>`) && contentList[i].tag) {
                        console.log("masuk2");
                        alert("masuk2");
                        // content_template = content_template.replace(`<${tag}></${tag}>`, content);
                    } else {


                        console.log("masuk contentList content_template", content_template);
                        content_template.html += content.html || "";
                        content_template.css += content.css || "";
                        content_template.js += content.js || "";


                        console.log("masukafter contentList content_template", content_template);
                        console.log("masuk contentList content_template", content);
                        // alert("masuk");

                    }
                    console.log("after contentList content_template", content_template);
                }
                console.log("content_template", content_template);
                result = {
                    css: content_template.css,
                    js: content_template.js,
                    html: `<div class="row">${content_template.html}</div>`
                };

                return result;


            }
            async viewLayout(page, type, id, section_menu) {
                const pkg = new Packages();

                let content_view_layout_return = {
                    html: "",
                    css: "",
                    js: ""
                };
                let result;
                if (type === 'load_data') {
                    const i_card = Partial.input('i_card') ?? 0;

                    page.section = "card";
                    page.view_layout_number = i_card;

                    return await Packages.card(
                        page,
                        type,
                        id,
                        section_menu,
                        page.view.view_layout[i_card][2]
                    );
                } else {
                    const layoutList = page.view.view_layout;

                    for (let i = 0; i < layoutList.length; i++) {
                        page.view_layout_number = i;
                        console.log("layoutList", layoutList[i]);
                        const layoutType = layoutList[i][0];
                        const layoutData = layoutList[i][2];

                        if (layoutType === 'card') {
                            page.section = "card";
                            content_view_layout_return += await Packages.card(
                                page,
                                type,
                                id,
                                section_menu,
                                layoutData
                            );
                        } else if (layoutType === 'website') {


                            page.website = layoutData;
                            result = await pkg.view_website(page, "");;
                            console.log("result website", result);
                            content_view_layout_return.html += result.html || "";
                            content_view_layout_return.css += result.css || "";
                            content_view_layout_return.js += result.js || "";
                        } else if (layoutType === 'step') {
                            await DB.connection(page);
                            const step = layoutData;

                            page.wizard = step.wizard;

                            let database = null;
                            if (step.parameter_check.get_data === 'refer') {
                                database = page.config.database[step.parameter_check.database_refer];
                            }

                            const row_base = await Database.database_coverter(page, database, null, 'all');

                            let step_id;
                            if (row_base.num_rows) {
                                const row_step = step.parameter_check.row_data;
                                const id_done = row_base.row[0][row_step];

                                step_id = (id_done === 0) ? 1 : page.wizard.step[id_done].next;
                            } else {
                                step_id = 1;
                            }

                            page.load = {
                                step: step_id,
                                next_step: page.wizard.step[step_id].next
                            };

                            const step_content = step.content;
                            const step_config = step.wizard.step[step_id];

                            content_view_layout_return += await Packages.step(
                                page,
                                step_id,
                                step_config,
                                step_content,
                                database,
                                ""
                            );
                        }
                    }
                    console.log("content_view_layout_return viewLayout", content_view_layout_return);
                    return content_view_layout_return;
                }
            }
        };
        class Pages {

            async Page(page, type, id, section_menu = '-1') {
                const pkg = new Packages();

                page.section = page.section || 'page';
                page.database_provider = page.database_provider || 'mysql';
                page.app_framework = page.app_framework || 'ci';
                const login = page.require_login;

                if (type === 'delete_privilage') {
                    type = 'hapus';
                }

                if (type === 'enskripsi') {
                    return de(Partial.input('text', '_POST'));
                }

                const crudTypes = [
                    'unique_value', 'diferent_value', 'wizard_form'
                ];

                const loginTypes = ['get_login', 'check_login'];
                const layoutTypes = ['view_layout', 'load_data'];
                const ajaxTypes = ['js_ajax'];
                const crudFullTypes = [
                    'setting', 'save_setting', 'list_datatable', 'tambah', 'edit', 'edit_approval',
                    'update_approval', 'view', 'list', 'hapus', 'save', 'appr', 'update',
                    'tree_sub_kategori', 'field_value_automatic_sub_kategori', 'ajax_sub_kategori',
                    'decline_appr', 'setujui_appr', 'PDFPage', 'pdf', 'import_excel', 'export_existing',
                    'export_empty', 'field_value_automatic', 'result_array_website',
                    'field_value_automatic_select_target', 'field_view_sub_kategori',
                    'insert_number_code', 'modalform_sub_kategori_add', 'import', 'template_import',
                    'execution_import', 'select2'
                ];
                const daftarTypes = ['daftar', 'save_daftar'];
                const arrayWebsiteTypes = ['datatable_array_website'];
                const privilageTypes = ['delete_privilage', 'info_privilage'];
                const datatableTypes = ['datatable'];
                const syncTypes = ['sync', 'cari_sync', 'produk_sync'];
                const searchTypes = ['search_load'];
                const habitTypes = ['habittable', 'save_lapor_habits'];
                const ecommerceTypes = [
                    'list_alamat_user', 'jadikan_default_pengiriman', 'list_cart', 'save_pengiriman_ke',
                    'gunakan_voucher', 'add_cart', 'excel_produk', 'select_varian', 'select_varian_cart',
                    'cek_harga_cart_get_checkout', 'delete_cart', 'update_pemesanan', 'get_all_ongkir',
                    'get_change_ongkir', 'print_pesanan'
                ];
                const erpTypes = ['select_order'];
                const chatTypes = [
                    'chat', 'kirim_pesan', 'list_pesan', 'list_chat_room', 'list_buat_chat_room',
                    'to_chat_room', 'content_message', 'tambah_chat_personal', 'tambah_chat_grup'
                ];

                if (crudTypes.includes(type)) {
                    return await CRUDFunc[type](fai, page, type, id);
                    // } else if (!login || loginTypes.includes(type)) {
                    //     return await Packages.login(page, type, id);
                } else if (layoutTypes.includes(type)) {

                    // content = await pkg.viewLayout(page, load_type, load_page_id, menu);
                    const getviewLayout = await pkg.viewLayout(page, type, id, section_menu);
                    console.log("getviewLayout", getviewLayout);
                    return getviewLayout;
                } else if (ajaxTypes.includes(type)) {
                    return await Packages.js_ajax(page, type, id, section_menu);
                } else if (crudFullTypes.includes(type)) {
                    return await Packages.crud(page, type, id);
                } else if (daftarTypes.includes(type)) {
                    return await Packages.login(page, type, id);
                } else if (arrayWebsiteTypes.includes(type)) {
                    return await Packages.datatable_array_website(page, type, id);
                } else if (privilageTypes.includes(type)) {
                    return await PrivilageFunc[type](page, type, id);
                } else if (datatableTypes.includes(type)) {
                    return await Packages.datatable(page, type, id);
                } else if (syncTypes.includes(type)) {
                    return await Packages.sync(page, type, id);
                } else if (searchTypes.includes(type)) {
                    return await Packages.search_load(page, type, id);
                } else if (habitTypes.includes(type)) {
                    return await HabitsApp[type](page, type, id);
                } else if (ecommerceTypes.includes(type)) {
                    console.log(await EcommerceApp[type](page, type, id));
                    return;
                } else if (erpTypes.includes(type)) {
                    console.log(await ErpPosApp[type](page, type, id));
                    return;
                } else if (chatTypes.includes(type)) {
                    return await Packages.chat(page, type, id);
                }
            }

        }

        function encodeDataForHref(obj) {
            const json = JSON.stringify(obj);
            const utf8 = encodeURIComponent(json); // ubah jadi UTF-8 safe
            return btoa(utf8);
        }

        function decodeDataFromHref(encoded) {
            const json = decodeURIComponent(atob(encoded));
            return JSON.parse(json);
        }

        async function link_direct(enpage, encoded) {
            try {
                console.clear();

                // Base64 decode dan parse JSON
                console.log(getalldata.myApp.page.load.domain)
                const viewpage = decodeDataFromHref(enpage);

                const decodedString = atob(encoded); // base64 decode
                const data = JSON.parse(decodedString);

                // console.log("Data decoded page:", page.load.domain);
                console.log("Data decoded page:", viewpage);
                console.log("Data decoded:", data);
                page = getalldata.myApp.page;
                apps = data[0];
                page_view = data[1];
                load_type = data[2];
                load_page_id = data[3];
                menu = data[4] ?? '-1';
                nav = data[5] ?? '-1';
                board = data[6] ?? '-1';
                getalldata.myApp.page.load['apps'] = apps;
                getalldata.myApp.page.load['page_view'] = page_view;
                getalldata.myApp.page.load['load_type'] = load_type;
                getalldata.myApp.page.load['load_page_id'] = load_page_id;
                getalldata.myApp.page.load['menu'] = menu;
                getalldata.myApp.page.load['nav'] = nav;
                getalldata.myApp.page.load['board'] = board;
                load_type_temp = load_type;
                if (load_type == 'view-layout') {
                    load_type = "view_layout";
                }
                if (load_type_temp == 'view_layout') {
                    load_type_temp = "view-layout";
                }
                window.location.hash = apps + "_" + page_view + "_" + load_type_temp + "_" + load_page_id + "_" + menu + "_" + nav;
                versions = getalldata.myApp.page.app.versions[apps][page_view];
                last_version = versions.last_version;
                view = versions.versions[last_version];

                view.page["load"] = {
                    apps: apps,
                    page_view: page_view,
                    load_type: load_type,
                    load_page_id: load_page_id
                };
                console.log("view", view);
                page["view"] = view.page;
                let pages = new Pages();
                content = await pages.Page(page, load_type, load_page_id, menu);
                console.log("content linkdirect", content);

                $('#pages_content').html(content.css + " " + content.html + " " + content.js);
                // allcontent = await renderContentWithData(content, page, rowData, htmlResult);
                // console.log("allcontent linkdirect",allcontent);

                // return "THIS IS LINK";
                // akses data.id, data.abc, data.level, dll;
                const container = document.createElement('div');
                container.innerHTML = content.css + " " + content.html + " " + content.js;

                // ambil semua <script> dalam container
                const scripts = container.querySelectorAll('script');
                scripts.forEach(script => {
                    const newScript = document.createElement('script');

                    // Jika pakai src, tambahkan atribut src
                    if (script.src) {
                        newScript.src = script.src;
                    } else {
                        // Kalau script inline, ambil isinya
                        newScript.textContent = script.textContent;
                    }

                    document.body.appendChild(newScript);
                });
            } catch (e) {
                console.error("Invalid parameter", e);
            }
        }

        async function pages_content(item, page) {
            try {

                let content = {
                    html: "INI KONTENT",
                    css: "",
                    js: ""
                };
                //cari first loginnya
                domain = (page.load.domain);
                first_page = page.web[domain].id_first_menu;
                // alert(first_page);
                const db = await openDB(configDB, "web__list_apps_menu");
                const allData = await getAllFromStore(db, {
                        "utama": "web__list_apps_menu"
                    },
                    "web__list_apps_menu", {
                        "id_search": first_page
                    });
                console.log("pages_content,data", allData);
                apps = allData[first_page].load_apps;
                page_view = allData[first_page].load_page_view;
                load_type = allData[first_page].load_type;
                load_page_id = allData[first_page].load_page_id;
                menu = allData[first_page].menu;
                nav = allData[first_page].nav;
                board = allData[first_page].board;

                versions = page.app.versions[apps][page_view];
                last_version = versions.last_version;
                view = versions.versions[last_version];
                console.log("view", view);

                page["view"] = view.page;
                let pages = new Pages();
                content = await pages.Page(page, load_type, load_page_id, menu);
                // console.log("page.view",page.view);
                // intergrasi_db = intergrasi_db(deviceId, "web__list_apps_menu");
                // page['id'] = intergrasi_db.apps_id;
                //check login

                //ketika belum login keluar login

                //ketika sesudah login maka first page nya 
                console.log("content page_content", content);
                return content;
            } catch (error) {
                // document.getElementById('app').innerHTML = 'Error loading data.';
                console.error('Terjadi error:', error); // tampilkan pesan error dan stack
                console.log('Pesan:', error.message); // hanya pesan
                console.log('Stack trace:\n' + error.stack); // hanya trace
            }
        }
        async function executeContentLogic(page, array, i, data = {}) {
            const item = array[i];
            console.log('proses item:', item);
            const func = item[0];
            const type = item[1];
            if (!func && !type) return "";

            let content = {
                content: {
                    html: "",
                    css: "",
                    js: ""
                }
            };
            console.log("func", func);
            console.log("type", type);
            switch (func) {
                case 'bundle':

                    if (item[-1] == 'BE3-LINK-DAFTAR') {
                        content.content.html = "javascript:open_login()";
                    } else if (item[-1] == 'BE3-LINK-LOGOUT') {

                        content.content.html = "javascript:jsLogout()";
                    }
                    break;
                case 'text':
                    content.content.html = type;
                    break;

                case 'database':
                    content.content.html = data[type] || "";
                    break;

                case 'get_data_harga':
                    content.content.html = "";
                    break
                case 'drive_file_db':
                    content.content.html = "";
                    break
                case 'user_info':
                    // const user = await getDataFromDB('content', 'user_info');
                    content.content.html = '';
                    break;

                case 'pages_content':
                    let result_pages_content;
                    getalldata.pages_content = {};
                    getalldata.pages_content.item = {};
                    getalldata.pages_content.page = {};
                    getalldata.pages_content.item = btoa(unescape(encodeURIComponent(JSON.stringify(item))));
                    getalldata.pages_content.page = btoa(unescape(encodeURIComponent(JSON.stringify(page))));
                    // getalldata.data.after_init.push(
                    //     "proses_pages_content( '" +
                    //     btoa(unescape(encodeURIComponent(JSON.stringify(item)))) +
                    //     "', '" +
                    //     btoa(unescape(encodeURIComponent(JSON.stringify(page)))) +
                    //     "');"
                    // );
                    // result_pages_content = await pages_content(item, page);
                    // content.content = result_pages_content;;
                    content.content.html = "<span id='pages_content'></span>";
                    // console.log("pages_content", result_pages_content);
                    break;

                case 'link':
                    console.log("LINK DIRECT", type);
                    console.log("LINK DIRECT data", data);
                    const encoded = btoa(JSON.stringify(type));
                    const enPage = encodeDataForHref(data);;;
                    content.content.html = "javascript:void(link_direct('" + enPage + "','" + encoded + "'))";
                    break;
                case 'produk':
                    console.log("ARRAY PRODUK", array[i]);
                    storeName = array[i].refer_db;
                    // storeName = "store__produk__varian";
                    // storeName = "inventaris__asset__list";
                    // storeName = "inventaris__asset__list__varian";
                    // storeName = "inventaris__master__tipe_varian";
                    // storeName = "inventaris__master__tipe_varian__list";
                    const db = await openDB(transaksiDB, storeName);
                    data = await getApiData(db, storeName, {});
                    const array_template = [{
                            0: array[i].func_content,
                            1: array[i].content,
                            return: "html_content"
                        },

                    ];


                    result_template = await executeContentLogic(page, array_template, 0);
                    console.log("result_template", result_template);
                    const className = array[i]?.include_in_id?.class || '';

                    const after = array[i]?.include_in_id?.after || '';
                    content.content.html = `<div id="content-` + array[i].variable + `"  class="` + className + `" onload="appendData('` + array[i].variable + `', 1);"></div>
                    <button id="loadMoreButton" class="btn btn-primary" onclick="load_more(\'` + array[i].variable + `\')" type="button">Load More</button>
                    <div class="text-center " id="loading">
                            <div class="spinner"></div>
                    </div>
                    
                    `;

                    let allData = await getAllFromStore(db, {
                        utama: storeName
                    }, storeName);
                    if (allData && typeof allData === 'object') {
                        const sorted = Object.values(allData).sort((a, b) => {
                            return new Date(b.create_date) - new Date(a.create_date);
                        });

                        console.log(sorted);
                    } else {
                        console.warn("Data 'row' kosong atau tidak berbentuk object.");
                    }
                    // allData.sort((a, b) => new Date(b.create_date) - new Date(a.create_date));
                    console.log("getalldata", getalldata);

                    getalldata.data_produk[array[i].variable] = allData;
                    getalldata.data_produk_real[array[i].variable] = allData;
                    getalldata.data.array[array[i].variable] = array[i].array;
                    getalldata.data.itemsPerPage[array[i].variable] = array[i].pagination.limit;
                    getalldata.data.content[array[i].variable] = result_template.html;
                    getalldata.data.search_field[array[i].variable] = array[i].search.field;
                    // getalldata.data.after_init[array[i].variable] = [];
                    getalldata.data.after_init.push("appendData('" + array[i].variable + "', 0);");

                    let array_header = array[i].search?.header;
                    console.log("array_header", array[i].search);
                    console.log("array_header", array_header);
                    if (array_header && typeof array_header === 'object' && Object.keys(array_header).length > 0) {
                        getalldata.data.after_init.push(
                            "proses_search_produk('header','" + array[i].variable + "', '" +
                            btoa(unescape(encodeURIComponent(JSON.stringify(array_header)))) +
                            "');"
                        );
                    }

                    let array_sidebar = array[i].search?.sidebar;
                    if (array_sidebar && typeof array_sidebar === 'object' && Object.keys(array_sidebar).length > 0) {
                        getalldata.data.after_init.push(
                            "proses_search_produk('sidebar','" + array[i].variable + "', '" +
                            btoa(unescape(encodeURIComponent(JSON.stringify(array_sidebar)))) +
                            "');"
                        );
                    } else {
                        getalldata.data.after_init.push(
                            "no_search_produk('sidebar');"
                        );

                    }
                    console.log("getalldata.data.after_init", getalldata.data.after_init);
                    console.log("dataproduk", getalldata.data_produk);

                    console.log("getalldata.data", getalldata.data);
                    break;
                case 'row_web_apps':
                    content.content.html = "";
                    break;
                case 'menu':
                    content.content.html = "";
                    break;
                case 'bundle':
                    content.content.html = "";
                    break;
                case 'base_url':
                    content.content.html = "";
                    break;


                case 'crud':
                    content.content.html = await renderCrudComponent(item, page);
                    break;

                case 'view_to_js':
                    return renderDynamicJSView(item, page, array, i);
                case 'menu_content':
                    set_type = item[2];
                    console.log("Type :" + type);
                    last_version = page.menu.versions[type].last_version;

                    content = await page.menu.versions[type].versions[last_version][set_type];
                    break;
                default:

                    last_version = page.data.versions[func].last_version;
                    // console.log(page.data.versions[func].versions);
                    if (page.data.versions[func].versions[last_version][type]) {

                        console.log(page.data.versions[func].versions[last_version][type]);
                        content = await page.data.versions[func].versions[last_version][type];
                    } else {

                        content.content.html = '';
                    }
                    //$content = self::$function($page, $type, $array[$i], $data)[$type];

                    break;
            }
            if (!content?.content) {
                content = {
                    content: {
                        html: "",
                        css: "",
                        js: ""
                    }
                };
            }
            // if (item.return === "just_template") {
            //     return content;
            // }

            let htmlResult = [];
            let allcontent = "";
            if (content.content.css)
                htmlResult['css'] = content.content.css || "";
            else
                htmlResult['css'] = "";

            if (content.content.html)
                htmlResult['html'] = content.content.html || "";
            else
                htmlResult['html'] = "";
            if (content.content.js)
                htmlResult['js'] = content.content.js || "";
            else
                htmlResult['js'] = "";


            const rowData = await databaseConverter(content);
            console.log("Hasil IndexedDB:", rowData);


            // rowData.row.forEach(item => {
            console.log("Render item:", item);
            // alert(rowData.num_rows);
            let pagination;
            if (rowData.num_rows > 100) {

                pagination = {
                    type: "load_more",
                    limit: 50,
                    page: 1
                };
            } else {
                pagination = {
                    type: "all",
                    limit: 50,
                    page: 1
                };
            }
            console.log("htmlresult before render", htmlResult);
            console.log("content before render", content);

            allcontent = await renderContentWithData(content, page, rowData, htmlResult);
            console.log("Result Render item(" + func + "-" + type + ") :", allcontent);
            // });

            // if (allcontent.css == 'undefined') {
            //     allcontent.css = "";
            // }
            // if (allcontent.js == 'undefined') {
            //     allcontent.js = "";
            // }
            // if (allcontent.html == 'undefined') {
            //     allcontent.html = "";
            // }
            // You can also include content.content.css and .js if needed.

            console.log("Rendered :", allcontent);
            return allcontent;
        }

        async function initializeApp(domain) {
            try {
                const data = await getMainLoadData(domain);

                template_utama = (data['web'][domain].template_utama);
                // data.load.domain = domain;
                data["load"] = {
                    domain: domain
                };
                getalldata.myApp.page = data;
                // content = data.data.versions[template_utama].versions[last_version];
                console.log(data);
                const array = [{
                        0: template_utama,
                        1: "base",
                        return: "html_content"
                    },

                ];


                const result = await executeContentLogic(data, array, 0, data);
                console.log(result);
                document.getElementById('styling').innerHTML = (result.css);
                document.getElementById('app').innerHTML = (result.html);
                // document.getElementById('jsscript').innerHTML = eval(result.js);
                const container = document.createElement('div');
                container.innerHTML = result.js;

                // ambil semua <script> dalam container
                const scripts = container.querySelectorAll('script');
                scripts.forEach(script => {
                    const newScript = document.createElement('script');

                    // Jika pakai src, tambahkan atribut src
                    if (script.src) {
                        newScript.src = script.src;
                    } else {
                        // Kalau script inline, ambil isinya
                        newScript.textContent = script.textContent;
                    }

                    document.body.appendChild(newScript);
                });

                checkLoginStatus().then((isLoggedIn) => {
                    if (isLoggedIn) {
                        $('.is_login').show();
                        $('.not_login').hide();
                        // Arahkan ke dashboard atau homepage
                    } else {
                        $('.is_login').hide();
                        $('.not_login').show();
                        console.log("User belum login");
                        // Arahkan ke halaman login
                    }
                });
                const hash = window.location.hash.substring(1); // "link_same_page1"
                if (!hash)
                    window.location.hash = "home";
                hash_view();
            } catch (error) {
                // document.getElementById('app').innerHTML = 'Error loading data.';
                console.error('Terjadi error:', error); // tampilkan pesan error dan stack
                console.log('Pesan:', error.message); // hanya pesan
                console.log('Stack trace:\n' + error.stack); // hanya trace
            }
        }

        async function hash_view() {

            const hash = window.location.hash.substring(1); // "link_same_page1"
            const parts = (hash || "").split("_");

            const section = parts[0] || null;
            const page = parts[1] || null;
            const id = parts[2] || null;
            if (section === "home") {
                console.log(getalldata.pages_content);
                await proses_pages_content(getalldata.pages_content.item, getalldata.pages_content.page);

            } else
            if (section === "cart") {
                const encoded = btoa(JSON.stringify(["Ecommerce", "cart", "view_layout", -1]));
                const enPage = encodeDataForHref([{
                    object: 'foreach_1_row'
                }]);;;
                await link_direct(enPage, encoded);
                // content.content.html = "javascript:void(link_direct('" + enPage + "','" + encoded + "'))";
            }
            const dividto = (page || "").split("-");
            page_section = dividto[0] || null;
            page_div = dividto[1] || null;
            if (page_section == 'produk') {


                const db = await openDB(transaksiDB, "web__list_apps_menu");
                console.log("ini page_div", page_div);
                const allData = await getAllFromStore(db, {
                        "utama": "all_produk"
                    },
                    "all_produk", {
                        "id_search": id
                    });
                item = allData[id];
                console.log("ini item", item);
                json = btoa(unescape(encodeURIComponent(JSON.stringify(item))));
                setTimeout(function() {
                    const el = document.querySelector('.job-card[data-id="' + id + '"]');
                    show_produk(el, json);
                }, 1000);

            } else {
                const data = [{
                    object: 'foreach_1_row'
                }];
                if (parts[3] == 'view-layout') {
                    parts[3] = "view_layout";
                }
                const type = {
                    0: parts[0],
                    1: parts[1],
                    2: parts[2],
                    3: parts[3],
                };
                console.log(type);
                const encoded = btoa(JSON.stringify(type));
                const enPage = encodeDataForHref(data);;;
                link_direct(enPage, encoded);
            }
        }

        async function after_init() {
            console.log("after_init", getalldata.data.after_init);
            afterInitArray = getalldata.data.after_init;
            for (const code of afterInitArray) {

                try {
                    await eval(code); // hati-hati gunakan ini hanya jika source code aman
                } catch (e) {
                    console.error("Error saat mengeksekusi:", code, e);
                }
            };
            getalldata.data.after_init = [];
        }

        async function no_search_produk(tipe) {
            if (tipe == 'sidebar') {

                document.querySelectorAll('.search-type').forEach(el => {
                    el.classList.remove('search-type');
                });
            }
        }

        async function proses_pages_content(item_j, page_j) {
            // console.clear();
            const raw = decodeURIComponent(escape(atob(item_j)));
            const item = JSON.parse(raw);
            console.log(item);
            const rawpage = decodeURIComponent(escape(atob(page_j)));
            const page = JSON.parse(rawpage);
            console.log("ini page pages", page);
            alert();
            let content = {
                content: {
                    html: "",
                    js: "",
                    css: "",
                }
            }
            result_pages_content = await pages_content(item, page);
            content.content = result_pages_content;;
            console.log("pages_content", result_pages_content);
            await $('#pages_content').html(content.content.css + " " + content.content.html + " " + content.content.js);

            after_init();
        }

        async function proses_search_produk(tipe, variable, json) {
            const raw = decodeURIComponent(escape(atob(json)));
            const parsed = JSON.parse(raw);
            html_id = parsed.key;
            html_content = "";

            for (const row of parsed.data) {
                if (row.type == 'checkbox') {
                    html_content += `
                    <div class="job-time">
                        <div class="job-time-title">${row.name}</div>
                        <div class="job-wrapper">`;
                    storeName = row.db;
                    const db = await openDB(transaksiDB, storeName);
                    let allData = await getAllFromStore(db, {
                        utama: storeName
                    }, storeName);
                    console.log("r", allData);
                    Object.values(allData).forEach(element => {
                        html_content += `<div class="type-container">
                            <input type="checkbox" id="job1" class="job-style" value="${element[row.option_key]}" class="searchdata-${variable}" data-type="${row.type}" data-key="${row.key_search}" onclick="searchdata('` + variable + `')">
                            <label for="job1">${element[row.option_value]}</label>
                            <span class="job-number">56</span>
                        </div> `;

                    });


                    html_content += `</div>
                        </div>
                        `;
                } else
                if (row.type == 'range') {
                    html_content += `<div class="job-time">
                        <div class="job-time-title"> ${row.name}</div>
                        <div class="job-wrapper">
                            `;
                    const option_literasi = parseInt(row.option_literasi);
                    const option_akhir = parseInt(row.option_akhir);

                    let ranges = [];
                    let start = 0;
                    let end = option_literasi;

                    while (start < option_akhir) {
                        html_content += `<div class="type-container">
                                <input type="checkbox" id="job1" class="job-style"  onclick="searchdata('` + variable + `')" class="searchdata-${variable}" data-type="${row.type}" data-key="${row.key_search}">
                                <label for="job1">${start.toLocaleString()} - ${end.toLocaleString()}</label>
                               
                            </div>`;
                        //  <span class="job-number">49</span>
                        ranges.push(`${start.toLocaleString()} - ${end.toLocaleString()}`);
                        start = end + 1;
                        end += option_literasi;
                        if (end > option_akhir) end = option_akhir;
                    }

                    console.log(ranges);

                    html_content += `
                        </div>
                    </div>`;
                } else
                if (row.type == 'select') {
                    console.log("row.html_id", html_id);
                    html_content += `
                    <div class="search-job">
                    <select class="form-control searchdata-${variable} select2" data-key="${row.key_search}"  data-type="${row.type}"  onchange="searchdata('` + variable + `')" >
                    <option value="">- Pilih ${row.name} -</option>`;
                    storeName = row.db;
                    const db = await openDB(transaksiDB, storeName);
                    data = await getApiData(db, storeName, {});
                    let allData = await getAllFromStore(db, {
                        utama: storeName
                    }, storeName);
                    console.log("r", allData);
                    Object.values(allData).forEach(element => {
                        html_content += `<option value="${element[row.option_key]}">${element[row.option_value]}</option>`;
                    });

                    html_content += `</select></div>`;

                }
                console.log("row.type", html_content);
            };
            console.log("row.html_id", html_id);

            if (html_content) {

                if (parsed.method == 'append') {
                    $('#' + html_id + "-" + variable).append(html_content);

                } else {

                    $('#' + html_id + "-" + variable).html(html_content);
                }
            }
        }

        function select2_function(storeName, id) {
            $('#mySelect2').select2({
                ajax: {
                    transport: function(params, success, failure) {
                        (async () => {
                            const db = await openDB(transaksiDB, storeName);
                            const allData = await getApiData(db, storeName, {});

                            const filtered = allData.filter(item =>
                                item.label.toLowerCase().includes(params.data.q.toLowerCase())
                            );

                            // Format Select2 data
                            const results = filtered.map(item => ({
                                id: item.value,
                                text: item.label
                            }));

                            success({
                                results
                            });
                        })().catch(failure);
                    },
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term || ""
                        };
                    },
                    processResults: function(data) {
                        return data;
                    }
                },
                placeholder: 'Cari data...',
                minimumInputLength: 1,
            });

        }

        function isOnline() {
            return navigator.onLine;
        }
        if (isOnline()) {
            console.log("✅ Online");
        } else {
            console.log("❌ Offline");
        }

        // Print all tables (object stores) in the database

        // getDataByKeyAndUpdateIfNotFound(dbName, dbVersion, storeName, 'v1.0.0', 'main_page', "<?= base_url(); ?>FaiServer/api/main_load_data");
        // intergrasi_db("web__list_apps_menu");
        // intergrasi_db("store__produk");
        // intergrasi_db("store__produk__varian");
        // intergrasi_db("inventaris__asset__list");
        // intergrasi_db("inventaris__asset__list__varian");
        // intergrasi_db("inventaris__master__tipe_varian");
        // intergrasi_db("inventaris__master__tipe_varian__list");
        async function get_data() {
            storeName = "web__list_apps_menu";
            storeName = "store__produk";
            // storeName = "store__produk__varian";
            // storeName = "inventaris__asset__list";
            // storeName = "inventaris__asset__list__varian";
            // storeName = "inventaris__master__tipe_varian";
            // storeName = "inventaris__master__tipe_varian__list";
            const db = await openDB(transaksiDB, storeName);
            getApiData(db, storeName, {});


        }
        async function get_produk() {

            let row = {
                query: 0,
                is_json: 0,
                num_rows: 0,
                row: []
            };
            database = {
                utama: "store__produk",
                join: [

                    ["inventaris__asset__list", "id_asset", "id"]
                ]
            };
            const storeName = database.utama;
            const db = await openDB(transaksiDB, storeName);
            const allData = await getAllFromStore(db, database, storeName);
            Object.entries(allData).forEach(([key, obj]) => {
                obj.primary_key = key;
            });
            row.row = allData;
            row.num_rows = Object.keys(allData).length;
            row.query = 1;
            console.log("row", row);
        }
        // get_produk();
        // get_data();
        initializeApp('moesneeds.id');
        // printAllTables('mainDatabase', Date.now(), 'mainStore');

        // // Print all data from the "mainStore" object store
        // printAllData('mainDatabase', Date.now(), 'mainStore');

        // // Example of getting data by key

        // getDataByKey('mainDatabase', Date.now(), 'mainStore', 'main_page');
        // getDataByKey('mainDatabase', Date.now(), 'mainStore', 'main_web');
        // Example of deleting data by key
        // deleteData('v1.0.0');
        //$(document).ready(function() {
        //$('.search-box').focus();
        //});
    </script>
    <script>
        const wrapper = document.querySelector(".wrapper-job");
        const header = document.querySelector(".header");
        const sizeOrder = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', '4XL', '5XL', '6XL'];

        // Fungsi untuk menyortir array berdasarkan urutan ukuran
        function sortSizes(arr) {
            return arr.sort((a, b) => {
                // Urutan yang benar untuk ukuran
                return sizeOrder.indexOf(a) - sizeOrder.indexOf(b);
            });
        }

        // Fungsi untuk menyortir angka
        function sortNumbers(arr) {
            return arr.sort((a, b) => a - b);
        }

        // Gabungkan keduanya dalam satu array jika diperlukan
        function sortData(arr) {
            return arr.sort((a, b) => {

                const sizeIndexA = sizeOrder.indexOf(a.nama_varian);
                const sizeIndexB = sizeOrder.indexOf(b.nama_varian);

                return sizeIndexA - sizeIndexB;
                // Cek apakah keduanya adalah ukuran atau angka
                if (sizeIndexA !== -1 && sizeIndexB !== -1) {
                    return sizeIndexA - sizeIndexB; // Kedua ukuran, diurutkan berdasarkan urutan ukuran
                } else if (typeof a.nama_varian === 'number' && typeof b.nama_varian === 'number') {
                    return a.nama_varian - b.nama_varian; // Kedua angka, diurutkan berdasarkan nilai angka
                } else if (sizeIndexA !== -1) {
                    return -1; // Ukuran lebih prioritas daripada angka
                } else {
                    return 1; // Angka lebih rendah dari ukuran
                }
            });
        }
        wrapper.addEventListener("scroll", (e) => {
            e.target.scrollTop > 30 ?
                header.classList.add("header-shadow") :
                header.classList.remove("header-shadow");
        });

        const toggleButton = document.querySelector(".dark-light");

        toggleButton.addEventListener("click", () => {
            document.body.classList.toggle("dark-mode");
        });

        function varian_list(parsed, tipe, variasi, json) {
            let html = "";
            original = (parsed.list_varian[tipe].detail);
            const uniqueArray = Object.values(original).filter((item, index, self) =>
                index === self.findIndex(obj => obj.nama_varian === item.nama_varian)
            );


            // Jika kamu ingin hasil akhirnya kembali jadi object dengan index baru:
            let uniqueObject = Object.fromEntries(uniqueArray.map((item, i) => [i, item]));
            let sortedArray = sortData(Object.values(uniqueObject));

            // Langkah ketiga: Jika perlu mengonversi kembali ke objek, bisa lakukan:
            let sortedObject = Object.fromEntries(sortedArray.map((item, i) => [i, item]));

            console.log(sortedObject);
            console.log(uniqueObject);
            dis = "";
            if (variasi == 2) {
                dis = "disabled";
            }
            if (variasi == 3) {
                dis = "disabled";
            }

            html += '<div class="col-4"> <label>' + parsed.nama_variasi[variasi] + '</label></div>';
            html += '<div class="col-8" id="variasi-content-' + variasi + '">';
            html += '<div class="form-selectgroup  mt-3">';
            Object.values(sortedObject).forEach(item => {
                html += `
                    <label class="form-selectgroup-item">
                    <input type="radio" ${dis}  name="varian` + variasi + `[]" id="varian` + variasi + `" value="${item.id_varian}" 
                        class="form-selectgroup-input" onclick="change_variasi(${variasi},'${item.id_varian}','${json}');">
                    <span class="form-selectgroup-label">${item.nama_varian}</span>
                    </label>
                `;
            });
            html += '</div>';
            html += '</div>';
            return html;
        }

        function change_variasi(variasi, nama_variasi, json) {
            const raw = decodeURIComponent(escape(atob(json)));
            const parsed = JSON.parse(raw);
            console.log("max_variasi", parsed.max_variasi);
            console.log("variasi", variasi);
            if (parseInt(parsed.max_variasi) == parseInt(variasi)) {
                id_variasi = parsed.list_varian_detail.all[nama_variasi];

                detail = parsed.varian[id_variasi];
                console.log("detail", detail);
                document.querySelector(".job-subtitle-wrapper").innerHTML = formatRupiah(detail.harga_pokok_varian);
                document.querySelector(".job-logos").innerHTML = "<img src='" + detail.gambar_produk_varian + "' onclick='showPopup(this)' >";

                document.querySelector("#stok-content").innerHTML = detail.stok;
                $('#id_produk_varian').val(id_variasi);
                $('#id_asset_varian').val(detail.id_barang_varian);
            } else {
                document.querySelector(".job-subtitle-wrapper").innerHTML = parsed.harga_detail[nama_variasi].harga_full;
                document.querySelector(".job-logos").innerHTML = "<img src='" + parsed.foto_detail[nama_variasi] + "' onclick='showPopup(this)' >";
                document.querySelector("#stok-content").innerHTML = parsed.stok_detail[nama_variasi];
                dis = "";
                for (i = (variasi + 1); i <= 3; i++) {

                    $('#variasi-content-' + (i)).html('');
                    tipe = "tipe_" + (variasi + 1);
                    original = (parsed.list_varian[tipe].breakdown[i][nama_variasi]);
                    const uniqueArray = Object.values(original).filter((item, index, self) =>
                        index === self.findIndex(obj => obj.nama_varian === item.nama_varian)
                    );


                    // Jika kamu ingin hasil akhirnya kembali jadi object dengan index baru:
                    const uniqueObject = Object.fromEntries(uniqueArray.map((item, i) => [i, item]));
                    let sortedArray = sortData(Object.values(uniqueObject));

                    // Langkah ketiga: Jika perlu mengonversi kembali ke objek, bisa lakukan:
                    let sortedObject = Object.fromEntries(sortedArray.map((item, i) => [i, item]));

                    console.log(sortedObject);
                    console.log("uniqueObject", uniqueObject);
                    html = '';

                    html += '<div class="form-selectgroup mt-3">';
                    Object.values(sortedObject).forEach(item => {
                        html += `
                    <label class="form-selectgroup-item">
                    <input type="radio" ` + dis + ` id="varian` + i + `" name="varian` + i + `[]" 
                    value="${item.id_varian}" class="form-selectgroup-input" onclick="change_variasi(${i},'${item.id_varian}','${json}');">
                    <span class="form-selectgroup-label">${item.nama_varian}</span>
                    </label>
                `;
                    });
                    html += '</div>';
                    $('#variasi-content-' + (i)).html(html);
                    dis = "disabled";
                }
            }

        }

        function closeproduk() {

            // document.querySelectorAll('.job-overview#job-produk').forEach(el => {
            //     el.className = 'job';
            // });
            // document.querySelectorAll('.job-overview-cards').forEach(el => {
            //     el.className = 'job-cards';
            // });
            // document.querySelectorAll('.job-overview-card job-card overview-card').forEach(el => {
            //     el.className = 'job-card';
            // });
            // $('.job-explain').hide();
        }

        function show_produk(jobCard, json) {

            const wrapper = document.querySelector(".wrapper-job");
            const number = Math.floor(Math.random() * 10);
            const url = `https://unsplash.it/640/425?image=${number}`;

            $('.job-explain').show();
            const logo = jobCard.querySelector("img");
            const desc = jobCard.querySelector("#desc");
            const bg = logo.src;
            console.log(bg);
            if (!bg) {
                bg = base_url_non_index + "/image_placeholder.jpg";
            }
            const price = jobCard.querySelector(".job-card-price");
            const title = jobCard.querySelector(".job-card-title");
            console.log(title.textContent);
            document.querySelector(
                ".job-explain-content .job-card-title"
            ).textContent = title.textContent;
            document.querySelector(".job-logos").innerHTML = "<img src='" + bg + "'  onclick='showPopup(this)'>";
            document.querySelector(".overview-desc").innerHTML = desc.innerHTML;
            document.querySelector(".job-subtitle-wrapper").innerHTML = price.innerHTML;
            wrapper.classList.add("detail-page");
            wrapper.scrollTop = 0;
            document.querySelectorAll('.job#job-produk').forEach(el => {
                el.className = 'job-overview';
            });
            document.querySelectorAll('.job-cards').forEach(el => {
                el.className = 'job-overview-cards';
            });
            document.querySelectorAll('.job-card').forEach(el => {
                el.className = 'job-overview-card job-card overview-card';
            });
            const raw = decodeURIComponent(escape(atob(json)));
            const parsed = JSON.parse(raw);
            console.log("parsed" + JSON.stringify(parsed));
            let html = '';
            html += '<div class="row">';
            html += '<input type="hidden" id="max_variasi" value="' + parseInt(parsed.max_variasi) + '"> ';
            if (parseInt(parsed.max_variasi) >= 1)
                html += varian_list(parsed, "tipe_1", 1, json);
            if (parseInt(parsed.max_variasi) >= 2)
                html += varian_list(parsed, "tipe_2", 2, json);
            if (parseInt(parsed.max_variasi) >= 3)
                html += varian_list(parsed, "tipe_3", 3, json);
            html += '</div>';

            html += '<input type="hidden" id="id_asset" value="' + parsed.id_asset + '">';
            html += '<input type="hidden" id="id_produk" value="' + parsed.id + '">';
            html += '<input type="hidden" id="id_asset_varian" value="">';
            html += '<input type="hidden" id="id_produk_varian" value="">';


            document.querySelector(".job-varian").innerHTML = html;
            document.querySelector("#stok-content").innerHTML = parsed.stok;



        }

        logo.addEventListener("click", () => {
            wrapper.classList.remove("detail-page");
            wrapper.scrollTop = 0;
            jobBg.style.background = bg;
        });
    </script>
    <script>
        function list_shipping_alamat() {
            id_user = $("#user_id").val();
            if (id_user) {
                $.ajax({

                    type: "get",
                    dataType: "html",
                    data: {
                        "first": link_route,
                        "link_route": $("#load_link_route").val(),
                        "frameworksubdomain": $("#load_domain").val(),
                        "apps": "Ecommerce",
                        "page_view": "list_alamat_user",
                        "type": "list_alamat_user",
                        "id": $("#load_id").val(),
                        "id_user": id_user,


                        "contentfaiframework": "get_pages",
                        "MainAll": 2
                    },
                    url: link_route,
                    dataType: "html",
                    success: function(responseData) {
                        $("#content_list_cart").html(responseData);


                    }
                });
            }
        }

        function list_cart() {
            id_user = $("#user_id").val()
            if (id_user) {
                $.ajax({

                    type: "get",
                    dataType: "html",
                    data: {
                        "first": link_route,
                        "link_route": $("#load_link_route").val(),
                        "frameworksubdomain": $("#load_domain").val(),
                        "apps": "Ecommerce",
                        "page_view": "list_cart",
                        "type": "list_cart",
                        "id": $("#load_id").val(),
                        "id_user": id_user,


                        "contentfaiframework": "get_pages",
                        "MainAll": 2
                    },
                    url: link_route,
                    dataType: "html",
                    success: function(responseData) {
                        $("#content_list_cart").html(responseData);


                    }
                });
            }
        }



        function add_cart_by_id(id_asset, id_produk, id_asset_varian, id_produk_varian, id_varian1, id_varian2, id_varian3) {
            if ($("#is_login").val() == 0) {
                swal("Gagal!", "Login Terlebih Dahulu", "error");

            } else if (!$("#user_id").val()) {
                swal("Gagal!", "Anda belum memilih custumer", "error");

            } else if (parseInt($("#set_qty").val()) > parseInt($("#set_qty").attr("max"))) {
                swal("Gagal!", "QTY Melebihi Stok", "error");

            } else {
                id_user = $("#user_id").val()
                $.ajax({

                    type: "get",
                    dataType: "html",
                    data: {
                        "first": link_route,
                        "link_route": $("#load_link_route").val(),
                        "frameworksubdomain": $("#load_domain").val(),
                        "apps": "Ecommerce",
                        "page_view": "add_cart",
                        "type": "add_cart",
                        "id": $("#load_id").val(),
                        "id_user": id_user,
                        "id_asset": id_asset,
                        "id_produk": id_produk,
                        "level": $("#level").val(),
                        "id_varian_3": id_varian3,
                        "id_varian_2": id_varian2,
                        "id_varian_1": id_varian1,
                        // "add_qty": 1,
                        "id_produk_varian": id_produk_varian,
                        "id_asset_varian": id_asset_varian,
                        "contentfaiframework": "get_pages",
                        "MainAll": 2
                    },
                    url: link_route,
                    dataType: "json",
                    success: function(responseData) {

                        if (responseData.status) {

                            swal("Sukses!", "Produk sudah masuk kedalam cart!", "success");
                            list_cart();
                            // if($("#stok_barang").length > 0){
                            //   now_stok = $("#stok_barang").val();
                            //   now_stok = parseInt(now_stok);
                            //   now_stok = now_stok-1;
                            //   $("#stok_barang").val(now_stok);
                            // }	
                        } else
                            swal("Gagal!", "Terdapat Kesalahan Teknis Silahkan Hubungi Costumer Service!", "error");


                    }
                });
            }

        }


        function getHargaSatuan(hargaList, jumlah) {
            for (let i = 0; i < hargaList.length; i++) {
                if (jumlah >= hargaList[i].min) {
                    return hargaList[i].harga;
                }
            }
            return 0; // Jika tidak ada harga yang sesuai
        }

        function tambah_produk_indexed_db(id_asset, id_produk, id_asset_varian, id_produk_varian, id_varian1, id_varian2, id_varian3, nama, nama_varian, img, harga = 0, hargaList, berat) {
            qtyorder = $("#quantity-" + id_asset + "-" + id_produk + "-" + id_asset_varian + "-" + id_produk_varian + "-" + id_varian1 + "-" + id_varian2 + "-" + id_varian3).val();
            alert("#quantity" + id_asset + "-" + id_produk + "-" + id_asset_varian + "-" + id_produk_varian + "-" + id_varian1 + "-" + id_varian2 + "-" + id_varian3);
            hargaList = [{
                    min: 5,
                    harga: 12000
                },
                {
                    min: 3,
                    harga: 15000
                },
                {
                    min: 1,
                    harga: 20000
                }
            ];
            // alert(qtyorder);
            //   tambahProdukOrder(' . $page['load']['id'] . ', {
            //         id_asset: id_asset,
            //         id_produk: id_produk,
            //         id_asset_varian: id_asset_varian,
            //         id_produk_varian: id_produk_varian,
            //         id_varian1: id_varian1,
            //         id_varian2: id_varian2,
            //         id_varian3: id_varian3,
            //         qty:qtyorder,
            //         nama_barang: nama,
            //         nama_varian:nama_varian,
            //         img:img,
            //         harga:harga,
            //         hargaList:hargaList,
            //         berat:berat,
            //         checked:1

            //     });
        }

        function change_tipe_page() {
            var tipe_page = $("#tipe_page").val()
        }

        let currentPage = [];

        function load_more(index) {
            if (!currentPage[index]) {
                currentPage[index] = 1;
            }
            currentPage[index]++;

            appendData(index, currentPage[index]);
        }

        function paginate(array, page, limit) {
            const startIndex = (page - 1) * limit;
            const endIndex = page * limit;
            return array.slice(startIndex, endIndex);
        }
        // var data' . $function . '_' . $type . ' = 
        function renderPage(page, index) {
            const paginateddata = paginate(getalldata.data_produk[index], page, getalldata.data.itemsPerPage[index]);
            const listContainer = document.getElementById("content-" + index);
            listContainer.innerHTML = "";

            // paginateddata' . $function . '_' . $type . '.forEach(item => {
            //     const listItem = document.createElement("li");
            //     listItem.textContent = \'${item.artikel}\';
            //     listContainer.appendChild(listItem);
            // });

            // document.getElementById("pageNumber").textContent = \'Page ${page}\';
        }

        function setupPagination(index, totalItems, itemsPerPage) {
            const totalPages = Math.ceil(totalItems / getalldata.data.itemsPerPage[index]);
            const paginationContainer = document.getElementById("pagination");

            paginationContainer.innerHTML = "";
            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement("button");
                button.textContent = i;
                button.onclick = () => {
                    currentPage[index] = i;
                    renderPage(currentPage, index);
                };
                paginationContainer.appendChild(button);
            }
        }

        function loadMoredata(index, page) {
            if (!page) {
                page = 1;
            }
            console.log(getalldata);
            if (!getalldata.data.itemsPerPage[index]) {
                getalldata.data.itemsPerPage[index] = 1;
            }
            // alert(page);
            const startIndex = (page - 1) * getalldata.data.itemsPerPage[index];
            const endIndex = page * getalldata.data.itemsPerPage[index];

            console.log("getalldata.data.itemsPerPage", getalldata.data.itemsPerPage);
            let data = (getalldata.data_produk[index]);
            const arrayProduk = Object.values(data); // jadi array
            console.log("arrayProduk", arrayProduk);
            console.log("startIndex", startIndex);
            console.log("endIndex", endIndex);
            return arrayProduk.slice(startIndex, endIndex);
        }

        function formatRupiah(angka, prefix = 'Rp ') {

            if (!angka)
                angka = 0;
            angka = angka.toString();
            var numberString = angka.toString().replace(/[^\d.]/g, '');

            // Split the string into integer and decimal parts
            var parts = numberString.split('.');
            console.log(parts);
            var integerPart = parts[0];
            var decimalPart = parts.length > 1 ? parts[1] : '';
            console.log("decimalPart" + decimalPart);
            decimalPart = decimalPart.length > 1 ? decimalPart.toString().substring(0, 2) : '';
            console.log("decimalPart" + decimalPart);
            decimalPart = decimalPart.length > 1 ? ',' + decimalPart : '';
            console.log("decimalPart" + decimalPart);

            // Add thousand separators to the integer part
            integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Combine integer and decimal parts

            var formattedAmount = prefix + integerPart + decimalPart;

            return formattedAmount;

        }

        function formatRupiah2(input, prefix = "Rp") {
            if (isNaN(input)) {
                return '${prefix} 0';
            }
            number = parseInt(input.replace(/[^,\d]/g, ""), 10)
            // Menggunakan toLocaleString untuk format angka
            return `${prefix} ${number.toLocaleString("id-ID")}`;
        }

        function toPlainNumber(rupiah) {
            return parseInt(rupiah.replace(/[^,\d]/g, ""), 10) || 0; // Hapus "Rp" dan tanda titik
        }



        function appendData(index, page) {


            const paginateddata = loadMoredata(index, page);
            const listContainer = document.getElementById("content-" + index);

            nomor = 0;
            contentHtml = getalldata.data.content[index];

            console.log("paginateddata", paginateddata);
            paginateddata.forEach(item => {
                nomor++;
                listItem = contentHtml;

                if (Object.keys(getalldata.data.array[index]).length) {

                    Object.entries(getalldata.data.array[index]).forEach(([key, obj]) => {
                        // Pastikan obj adalah array dengan isi [key_array, type_array, value_array]
                        if (Array.isArray(obj)) {
                            console.log(obj);
                            let [type_array, value_array] = obj;


                            if (type_array === 'data') {
                                listItem = listItem.replace(`<${key}></${key}>`, item[value_array]);
                            }
                        } else {
                            console.warn(`Lewati key '${key}' karena tidak iterable`, obj);
                        }
                    });

                }
                listItem = listItem.replace(`<JSON></JSON>`, btoa(unescape(encodeURIComponent(JSON.stringify(item)))));
                $("#content-" + index).append(listItem);

                // owlfunction(nomor, nomor2);


            });
            // Periksa apakah data habis
            $("#loading").html("");
            counter = 0;
            if (currentPage[index] * getalldata.data.itemsPerPage[index] >= getalldata.data_produk[index].length) {
                document.getElementById("loadMoreButton").style.display = "none";
            }
        }

        function searchdata(index) {
            let query = document.getElementById("search-" + index).value.toLowerCase();
            document.getElementById("content-" + index).innerHTML = "";
            const realData = getalldata.data_produk_real[index];
            const realArray = Array.isArray(realData) ?
                realData :
                Object.values(realData); // kalau dia object dengan key numerik, dll
            if (query.trim() === "") {
                getalldata.data_produk[index] = realArray; // Kembalikan ke data' . $function . '_' . $type . ' asli jika input kosong
            } else {
                let data_produk;
                data_produk = realArray.filter(item => {
                    let fields = getalldata.data.search_field[index];

                    return fields.some(field => {
                        const value = item[field];
                        return value && value.toString().toLowerCase().includes(query.toLowerCase());
                    });

                });
                data_produk = data_produk.filter(item => {
                    let isMatch = true;

                    document.querySelectorAll('.searchdata-' + index).forEach(el => {
                        const key = el.dataset.key;
                        const type = el.dataset.type;
                        const inputVal = el.value;
                        if (inputVal) {
                            if (!key || !type) return;

                            if (type === 'select') {
                                if (inputVal && item[key] != inputVal) {
                                    isMatch = false;
                                }
                            } else if (type === 'range') {
                                // Misal input range disimpan di format: min-max (contoh: "100000-200000")
                                const [min, max] = inputVal.split('-').map(v => parseFloat(v.trim()));
                                const itemVal = parseFloat(item[key]);
                                if (inputVal && (isNaN(itemVal) || itemVal < min || itemVal > max)) {
                                    isMatch = false;
                                }
                            } else if (type === 'checkbox') {
                                // Ambil semua checkbox dengan key dan index yang sama
                                const selected = [...document.querySelectorAll(`.searchdata-${index}[data-key="${key}"][data-type="checkbox"]:checked`)]
                                    .map(cb => cb.value);
                                if (selected.length > 0 && !selected.includes(String(item[key]))) {
                                    isMatch = false;
                                }
                            }
                        }
                    });

                    return isMatch;
                });
                getalldata.data_produk[index] = data_produk;
            }

            currentPage[index] = 1; // Reset ke halaman pertama
            appendData(index, currentPage[index]); // Render ulang dengan data yang difilter
        }

        let zoomLevel = 1;

        function showPopup(img) {
            const popup = document.getElementById('popup');
            const popupImg = document.getElementById('popup-img');
            popupImg.src = img.src;
            popup.style.display = 'flex';
            zoomLevel = 1;
            offsetX = 0;
            offsetY = 0;
            popupImg.style.transform = 'scale(1)';
            popupImg.style.transformOrigin = 'center center'; // default
            document.body.classList.add('no-scroll');
        }
        const popupImg = document.getElementById('popup-img');
        popupImg.addEventListener('click', function(e) {
            if (zoomLevel >= 3) return; // batasi zoom maksimal

            const rect = popupImg.getBoundingClientRect();
            const clickX = e.clientX - rect.left;
            const clickY = e.clientY - rect.top;
            const percentX = (clickX / rect.width) * 100;
            const percentY = (clickY / rect.height) * 100;

            zoomLevel += 0.5;
            popupImg.style.transformOrigin = `${percentX}% ${percentY}%`;
            applyZoom();
        });

        function zoomIn(event) {
            event.stopPropagation();
            zoomLevel += 0.2;
            applyZoom();
        }

        function zoomOut(event) {
            event.stopPropagation();
            zoomLevel = Math.max(0.2, zoomLevel - 0.2);
            applyZoom();
        }

        function applyZoom() {
            popupImg.style.transform = `scale(${zoomLevel}) translate(${offsetX / zoomLevel}px, ${offsetY / zoomLevel}px)`;
        }

        function applyZoom2() {
            document.getElementById('popup-img').style.transform = `scale(${zoomLevel})`;
        }

        function closePopup(event) {
            if (!event || event.target.id === 'popup') {
                document.getElementById('popup').style.display = 'none';
                document.body.classList.remove('no-scroll');
            }
        }

        ;
    </script>


    <style>
        /* Container untuk form login */
        .login-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            width: 90%;
            max-width: 400px;
            max-height: 90vh;
            background-color: white;
            border-radius: 8px;
            overflow: auto;
            pointer-events: auto;
            z-index: 999999;
        }

        /* Header Login */
        .login-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .login-title {
            font-size: 1.25rem;
            font-weight: bold;
            text-transform: capitalize;
        }

        .close-icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
        }

        /* Form input */
        .form-label {
            margin: 16px 0;
        }

        .form-label-text {
            font-size: 0.875rem;
            color: #4B4B4B;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            color: #000;
            border: none;
            outline: none;
            border-bottom: 1px solid #D8D8D8;
        }

        .divider {
            width: 100%;
            height: 1px;
            background-color: #D8D8D8;
        }

        /* Password Container */
        .password-container {
            position: relative;
        }

        .password-icon {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            width: 24px;
            height: 24px;
        }

        /* Tombol Login */
        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #000;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 16px;
        }

        .login-btn:hover {
            background-color: #4B4B4B;
        }

        .login-btn:disabled {
            background-color: #A3A3A3;
            cursor: not-allowed;
        }

        /* Tombol Continue as Guest */
        .guest-btn {
            width: 100%;
            padding: 12px;
            background-color: white;
            color: #000;
            font-weight: bold;
            text-transform: uppercase;
            border: 1px solid #000;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 16px;
        }

        .guest-btn:hover {
            background-color: #D3D3D3;
        }

        /* Section "OR" */
        .or-container {
            position: relative;
            margin: 24px 0;
            text-align: center;
        }

        .or-text {
            background-color: white;
            padding: 0 8px;
            font-size: 13px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }

        .or-line {
            width: 100%;
            height: 1px;
            background-color: #6D6D6D;
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
        }

        /* Forgot Password & Register Now Link */
        .forgot-password {
            font-size: 0.875rem;
            font-weight: bold;
            cursor: pointer;
            margin-top: 12px;
        }

        .register-link {
            text-align: center;
            margin-top: 16px;
        }

        .register-now {
            font-size: 0.875rem;
            font-weight: bold;
            text-decoration: underline;
            cursor: pointer;
        }

        .form-label {
            margin: 16px 0;
            margin-top: 16px;
            margin-bottom: 16px;
            width: 100%;
        }

        .otp-form {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }



        /* OTP input styles */
        .otp-container,
        .email-otp-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .otp-input,
        .email-otp-input {
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 18px;
            margin: 0 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            transition: border-color 0.3s;
        }

        .otp-input:focus,
        .email-otp-input:focus {
            border-color: #007bff;
        }

        #verificationCode,
        #emailverificationCode {
            width: 100%;
            margin-top: 15px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            transition: border-color 0.3s;
        }

        #verificationCode:focus,
        #emailverificationCode:focus {
            border-color: #007bff;
        }

        .email-otp {
            margin-top: 25px;
        }

        /* Button styles */
        button {
            margin-top: 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        body.blurred>*:not(.login-container) {
            filter: blur(5px);
            pointer-events: none;
        }
    </style>
    <section class="login-container" id="login-container" style="display: none;">
        <div class="login-header">
            <h1 class="login-title" style="text-align: center;width: 100%;">Welcome back </h1>

            <svg aria-hidden="true" class="close-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" onclick="close_login();">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </div>


        <div class="text-bold text-center">
            <p>
                <center>Login to speed up the checkout process, save your favorite item and view your order status</center>
            </p>
        </div>
        <div class="login-form">
            <label class="form-label mb-0 mt-0">
                <span class="form-label-text">Email*</span>
                <input type="text" name="email" id="emailLGN" class="form-input" placeholder="Enter your email">
            </label>

            <label class="form-label">
                <span class="form-label-text">Password*</span>
                <div class="password-container">
                    <input type="password" name="password" id="passwordLGN" class="form-input" placeholder="Enter password">
                </div>

                <span class="forgot-password" style="text-align: right;width: 100%;display: block;">Forgot your password?</span>
                <button class="login-btn" type="button" onclick="get_login()">LOG IN</button>

                <div class="or-container">
                    <div class="or-text" style="font-size: 11px;">Checkout without register ?</div>
                    <div class="or-line"></div>
                </div>

                <button class="guest-btn" type="button" onclick="open_guest()">Continue as guest</button>

                <div style="display: flex;text-align: center;width: 100%;justify-content: center;" class="register-link ">
                    <p>Doesn’t have an account? </p>
                    <span class="register-now" onclick="open_register()" style="padding-left: 10px;">Register now</span>
                </div>
        </div>
        </form>
    </section>
    <section class="login-container" id="asgouest-form-container" style="display: none;">
        <div class="login-header">
            <h1 class="login-title">As Guest</h1>
            <svg aria-hidden="true" class="close-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </div>


        <div class="login-form">
            <label class="form-label mb-0 mt-0">
                <span class="form-label-text">No Whatsapp*</span>
                <input type="text" name="nowa" id="nowa" class="form-input" placeholder="Enter your No Whatsapp">
            </label>



            <!-- <span class="forgot-password">Forgot your password?</span> -->
            <button class="login-btn" type="button" onclick="get_guest()">SEND</button>


        </div>
    </section>
    <section class="login-container" id="asgouest-verifikasi-container" style="display: none;">
        <div class="login-header">
            <h1 class="login-title">As Guest</h1>
            <svg aria-hidden="true" class="close-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </div>


        <div class="login-form">
            We have sent an OTP code to the number you have registered

            <div id="number_verifikasi">+628987423444</div>
            <button style="">Resend</button>
            <div class="otp-container">

                <!-- Six input fields for OTP digits -->
                <input type="text" class="otp-input" pattern="\d" maxlength="1">
                <input type="text" class="otp-input" pattern="\d" maxlength="1" disabled>
                <input type="text" class="otp-input" pattern="\d" maxlength="1" disabled>
                <input type="text" class="otp-input" pattern="\d" maxlength="1" disabled>
                <input type="text" class="otp-input" pattern="\d" maxlength="1" disabled>
                <input type="text" class="otp-input" pattern="\d" maxlength="1" disabled>
            </div>


            <input type="hidden" name="verificationCode" id="verificationCode" placeholder="Enter verification code" readonly>
            <!-- <span class="forgot-password">Forgot your password?</span> -->
            <button class="login-btn" type="button" onclick="verifikasi_code()">SEND</button>


        </div>
    </section>
    <section class="login-container" id="asgouest-thank-container" style="display: none;">
        <div class="login-header">
            <h1 class="login-title"> Berhasil</h1>
            <svg aria-hidden="true" class="close-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </div>


        <div class="login-form text-center">
            Successful, Thank You.
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function success_login() {
            $('#login-container').hide();

            $('#asgouest-thank-container').show();
            $('.is_login').show();
            $('.not_login').hide();
            setTimeout(function() {
                document.body.classList.remove("blurred");

                $('#asgouest-thank-container').hide()

            }, 2000)
        }

        function jsLogout() {
            $.ajax({
                type: 'POST',
                url: base_url + "api/get_logout",

                cache: false,

                dataType: 'json',
                success: function(msg) {
                    if (msg.status) {
                        const data = {
                            id: "current",
                            isLoggedIn: false,
                            userId: null, // misal nama, id, dsb
                            waktuLogin: Date.now(),
                            waktuLogout: Date.now()
                        };
                        saveSession(data);
                        success_login();
                        checkLoginStatus().then((isLoggedIn) => {
                            if (isLoggedIn) {
                                $('.is_login').show();
                                $('.not_login').hide();
                                // Arahkan ke dashboard atau homepage
                            } else {
                                $('.is_login').hide();
                                $('.not_login').show();
                                console.log("User belum login");
                                // Arahkan ke halaman login
                            }
                        });
                    } else {
                        alert(msg.keterangan);
                    }
                },
                error: function(data) {
                    alert("Logout Gagal");
                    console.log('error:', data)
                },
            })
        }

        function verifikasi_code() {
            $.ajax({
                type: 'POST',
                url: base_url + "api/verifikasi_wa",
                data: {

                    kode: $('#verificationCode').val()
                },
                cache: false,

                dataType: 'json',
                success: function(msg) {
                    if (msg.status) {
                        $('#asgouest-form-container').hide();
                        $('#asgouest-verifikasi-container').hide();
                        success_login();
                    } else {
                        alert('Kode Verifikasi Salah');
                    }
                },
                error: function(data) {
                    console.log('error:', data)
                },
            })
        }

        function get_guest() {
            $.ajax({
                type: 'POST',
                url: base_url + "api/register_guest",
                data: {


                    phone: $('#nowa').val()
                },
                cache: false,

                dataType: 'json',
                success: function(msg) {
                    if (msg.status) {
                        const data = {
                            id: "current",
                            isLoggedIn: true,
                            userId: msg.id_apps_user, // misal nama, id, dsb
                            waktuLogin: Date.now()
                        };
                        saveSession(data);
                        success_login();
                        $('#asgouest-verifikasi-container').show();
                    } else {
                        alert(msg.keterangan);
                    }
                },
                error: function(data) {
                    alert("Login Gagal");
                    console.log('error:', data)
                },
            })
        }

        async function get_login() {
            $.ajax({
                type: 'POST',
                url: base_url + "api/get_login",
                data: {


                    email: $('#emailLGN').val(),
                    password: $('#passwordLGN').val()
                },
                cache: false,

                dataType: 'json',
                success: function(msg) {
                    if (msg.status) {
                        const data = {
                            id: "current",
                            isLoggedIn: true,
                            userId: msg.id_apps_user, // misal nama, id, dsb
                            waktuLogin: Date.now()
                        };
                        saveSession(data);
                        success_login();
                    } else {
                        alert(msg.keterangan);
                    }
                },
                error: function(data) {
                    alert("Login Gagal");
                    console.log('error:', data)
                },
            })
        }
    </script>
    <section class="login-container" id="register-modal" style="display:none">
        <div class="login-header">
            <h1 class="login-title">Register</h1>
            <span class="close-btn" onclick="close_all()">&times;</span>
        </div>
        <div class="login-form">
            <form autocomplete="off" action="{{route('register.create')}}" method="post">
                @csrf
                <label class="form-label mb-0 mt-0">
                    <span class="form-label-text">Your Name*</span>
                    <input type="text" name="name" placeholder="Enter your name" class="form-input" required />
                </label>
                <label class="form-label mb-0 mt-0">
                    <span class="form-label-text">Email*</span>
                    <input type="email" name="email" placeholder="Enter your email" class="form-input" required />
                </label>
                <label class="form-label mb-0 mt-0">
                    <span class="form-label-text">Phone*</span>
                    <div class="phone-input">
                        <span>+62</span>
                        <input type="number" name="phone" placeholder="Enter your phone" class="form-input" required />
                    </div>
                </label>
                <label class="form-label mb-0 mt-0">
                    <span class="form-label-text">Password*</span>
                    <input type="password" name="password" placeholder="Enter your password" class="form-input" required />
                    <p class="password-hint" style="font-size: 11px;color: gray;">
                        <small>More than 8 characters</small>,<small>1 number</small>,<small>1 uppercase</small>,<small>1 lowercase</small>
                    </p>
                </label>
                <label class="form-label mb-0 mt-0">
                    <span class="form-label-text">Confirm Password*</span>
                    <input type="password" name="re-password" placeholder="Confirm your password" class="form-input" required />
                </label>
                <label class="form-label mb-0 mt-0">
                    <span class="form-label-text">Gender</span>
                    <select name="gender" class="form-input">
                        <option hidden>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </label>
                <label class="form-label mb-0 mt-0">
                    <span class="form-label-text">Birth Date*</span>
                    <input type="date" name="date" min="1965-01-01" required class="form-input" />
                </label>
                <label class="form-label mb-0 mt-0 checkbox d-flex">
                    <input type="checkbox" name="agree" required class="form-input" style="width: 15px;margin: 5px;" />
                    <span>I agree to receive information and offers.</span>
                </label>
                <button type="submit" class="login-btn">Register</button>
            </form>
            <div class="or-container">
                <div class="or-text">OR</div>
                <div class="or-line"></div>
            </div>



            <div class="register-link">
                <p>Doesn’t have an account? </p>
                <span class="register-now" onclick="open_login()">Login now</span>
            </div>
        </div>
    </section>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            //    open_verifikasi();

            var otpInputs = document.querySelectorAll(".otp-input");
            var emailOtpInputs = document.querySelectorAll(".email-otp-input");

            function setupOtpInputListeners(inputs) {
                inputs.forEach(function(input, index) {
                    input.addEventListener("paste", function(ev) {
                        var clip = ev.clipboardData.getData("text").trim();
                        if (!/^\d{6}$/.test(clip)) {
                            ev.preventDefault();
                            return;
                        }

                        var characters = clip.split("");
                        inputs.forEach(function(otpInput, i) {
                            otpInput.value = characters[i] || "";
                        });

                        enableNextBox(inputs[0], 0);
                        inputs[5].removeAttribute("disabled");
                        inputs[5].focus();
                        updateOTPValue(inputs);
                    });

                    input.addEventListener("input", function() {
                        var currentIndex = Array.from(inputs).indexOf(this);
                        var inputValue = this.value.trim();

                        if (!/^\d$/.test(inputValue)) {
                            this.value = "";
                            return;
                        }

                        if (inputValue && currentIndex < 5) {
                            inputs[currentIndex + 1].removeAttribute("disabled");
                            inputs[currentIndex + 1].focus();
                        }

                        if (currentIndex === 4 && inputValue) {
                            inputs[5].removeAttribute("disabled");
                            inputs[5].focus();
                        }

                        updateOTPValue(inputs);
                    });

                    input.addEventListener("keydown", function(ev) {
                        var currentIndex = Array.from(inputs).indexOf(this);

                        if (!this.value && ev.key === "Backspace" && currentIndex > 0) {
                            inputs[currentIndex - 1].focus();
                        }
                    });
                });
            }

            function updateOTPValue(inputs) {
                var otpValue = "";
                inputs.forEach(function(input) {
                    otpValue += input.value;
                });

                if (inputs === otpInputs) {
                    document.getElementById("verificationCode").value = otpValue;
                } else if (inputs === emailOtpInputs) {
                    document.getElementById("emailverificationCode").value = otpValue;
                }
            }

            // Setup listeners for OTP inputs
            setupOtpInputListeners(otpInputs);
            setupOtpInputListeners(emailOtpInputs);

            // Add event listener for verify button
            document.getElementById("verifyMobileOTP").addEventListener("click", function() {
                var otpValue = document.getElementById("verificationCode").value;

                // Add your submit logic here (e.g., AJAX request or form submission)
            });

            document.getElementById("verifyEmailOTP").addEventListener("click", function() {
                var otpValue = document.getElementById("emailverificationCode").value;

                // Add your submit logic here
            });

            // Initial focus on first OTP input field
            otpInputs[0].focus();
            emailOtpInputs[0].focus();
        });

        function open_register() {
            $("#login-container").hide();
            $("#asgouest-form-container").hide();
            $("#register-modal").show();
        }

        function open_login() {
            document.body.classList.add("blurred");
            $("#register-modal").hide();
            $("#login-container").show();
            $("#asgouest-form-container").hide();
        }

        function close_login() {
            document.body.classList.remove("blurred");
            $("#register-modal").hide();
            $("#login-container").hide();
            $("#asgouest-form-container").hide();
        }

        function open_guest() {
            $("#register-modal").hide();
            $("#asgouest-form-container").show();
            $("#login-container").hide();
        }

        function open_verifikasi() {

            $("#register-modal").hide();
            $("#asgouest-form-container").hide();
            $("#login-container").hide();

            $("#asgouest-verifikasi-container").show();
        }
        async function add_cart() {
            const isLoggedIn = await checkLoginStatus();
            if (isLoggedIn) {
                get_id_varian = $('#max_variasi').val();
                id_produk = $('#id_produk').val();
                id_produk_varian = $('#id_produk_varian').val();
                id_produk_varian = $('#id_produk_varian').val();
                id_asset = $('#id_asset').val();
                id_asset_varian = $('#id_asset_varian').val();
                // last_id_varian = $('#varian' + get_id_varian).val();
                hasil = [null, null, null];
                selected = document.querySelector('input[name="varian' + get_id_varian + '[]"]:checked');
                is_produk = false;
                if (parseInt(get_id_varian) == 0) {
                    is_produk = true;
                } else {

                    if (selected) {
                        is_produk = true;
                        last_id_varian = selected.value;
                        hasil = last_id_varian.split("-");
                        console.log("Yang dipilih:", selected.value);
                    }
                }

                set_qty = $('#set_qty').val();


                if (!is_produk) {
                    swal("Gagal!", "Pilih Varian terlebih dahulu", "error");

                } else {

                    $.ajax({

                        type: "get",
                        dataType: "html",
                        data: {
                            "first": link_route,
                            "link_route": $("#load_link_route").val(),
                            "frameworksubdomain": $("#load_domain").val(),
                            "apps": "Ecommerce",
                            "page_view": "add_cart",
                            "type": "add_cart",
                            "id": $("#load_id").val(),
                            "id_user": isLoggedIn.userId,
                            "id_asset": id_asset,
                            "id_produk": id_produk,
                            "level": $("#level").val(),
                            "id_varian_3": hasil[2],
                            "id_varian_2": hasil[1],
                            "id_varian_1": hasil[0],
                            "set_qty": set_qty,
                            "id_produk_varian": id_produk_varian,
                            "id_asset_varian": id_asset_varian,

                        },
                        url: base_url + "api/add_cart",
                        dataType: "json",
                        beforeSend: function() {

                            Swal.fire({
                                title: 'Sedang memproses...',
                                text: 'Mohon tunggu sebentar.',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                        },
                        success: function(responseData) {
                            Swal.close();

                            if (responseData.status == 1) {

                                swal("Sukses!", "Produk sudah masuk kedalam cart!", "success");
                            } else if (responseData.status == 0) {
                                swal("Gagal!", responseData.keterangan, "error");
                                // }	
                            } else
                                swal("Gagal!", "Terdapat Kesalahan Teknis Silahkan Hubungi Costumer Service!", "error");


                        }
                    });
                }
                // redirect ke dashboard misalnya
            } else {
                console.log("Belum login");
                open_login();
            }
        }
        async function proses_checkout_temp(id_cart) {
            $.ajax({

                type: "post",
                dataType: "html",
                data: {

                    "id_user": isLoggedIn.userId,
                    'id_cart': id_cart,
                    'varian_1': varian_1,
                    'varian_2': varian_2,
                    'varian_3': varian_3,
                    'set_qty': qty,
                    'checked': $('#bismillah_beli-' + id_cart).is(':checked')

                },
                url: base_url + "api/proses_checkout",
                dataType: "json",
                beforeSend: function() {
                    $("#summary").html("Tunggu Sebentar"); // Menampilkan indikator loading
                    Swal.fire({
                        title: 'Sedang memproses...',
                        text: 'Mohon tunggu sebentar.',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(responseData) {
                    Swal.close();
                    if (responseData.status == 1) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: 'Sukses menambahkan produk kedalam pesanan!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else if (responseData.status == 0) {
                        swal("Gagal!", responseData.keterangan, "error");
                        // }	
                    } else
                        swal("Gagal!", "Terdapat Kesalahan Teknis Silahkan Hubungi Costumer Service!", "error");


                }
            });

        }

        async function initialize_checkout() {
            console.clear();
            console.log(getalldata.myApp.page.load);
            storeName = "checkout";
            const search = {
                id_search: getalldata.myApp.page.load.load_page_id
            };
            const db = await openDB(transaksiDB, storeName);
            // data = await getApiData(db, storeName, search);
            const allData = await getAllFromStore(db, {
                    "utama": storeName
                },
                storeName, search);
            console.log("DAta Checkout", allData[29]);
            list_bangunan = JSON.parse(allData[29].list_bangunan);
            console.log("list_bangunan", list_bangunan);
            temp_bangunan = `
            
            <address class="">
                         <h4><NAMA></NAMA></h4>
                         <p class="mt-2 mb-2"><NAMA-UNIT></NAMA-UNIT><Br><ALAMAT></ALAMAT> <NOMOR></NOMOR> RT <RT></RT>/<RW></RW><br>

                    KEL: <KELURAHAN></KELURAHAN>, KEC: <KECAMATAN></KECAMATAN>,<br>

                    <KOTA-TYPE></KOTA-TYPE> <KOTA></KOTA> <KODE-POS></KODE-POS>,<br>

                    <PROVINSI></PROVINSI>
                    </p>
                    <span><NOMOR-HP></NOMOR-HP></span><br>
                    <span class="fw-semi-bold"><EMAIL></EMAIL></span>
                        </address>
                    `;
            let content_bangunan;
            content_bangunan = "";
            selected_bangunan = "";
            const tagnama_unit = "NAMA-UNIT";
            const tagalamat = "ALAMAT";
            const tagnomor = "NOMOR";
            const tagrt = "RT";
            const tagrw = "RW";
            const tagkelurahan = "KELURAHAN";
            const tagkecamatan = "KECAMATAN";
            const tagprovinsi = "PROVINSI";
            const tagkota = "KOTA";
            const tagkota_type = "KOTA-TYPE";
            const tagkodepos = "KODE-POS";
            list_bangunan.forEach(data_bangunan => {
                get_bangunan = temp_bangunan;

                console.log("data_bangunan", data_bangunan);
                get_bangunan = get_bangunan.replace(new RegExp(`<${tagnama_unit}></${tagnama_unit}>`, 'gi'), data_bangunan.nama_unit_bangunan || '')
                    .replace(new RegExp(`<${tagalamat}></${tagalamat}>`, 'gi'), data_bangunan.alamat || '')
                    .replace(new RegExp(`<${tagrt}></${tagrt}>`, 'gi'), data_bangunan.rt || '')
                    .replace(new RegExp(`<${tagrw}></${tagrw}>`, 'gi'), data_bangunan.rw || '')
                    .replace(new RegExp(`<${tagrw}></${tagrw}>`, 'gi'), data_bangunan.rw || '')
                    .replace(new RegExp(`<${tagkecamatan}></${tagkecamatan}>`, 'gi'), data_bangunan.subdistrict_name || '')
                    .replace(new RegExp(`<${tagkota}></${tagkota}>`, 'gi'), data_bangunan.city || '')
                    .replace(new RegExp(`<${tagkota_type}></${tagkota_type}>`, 'gi'), data_bangunan.type || '')
                    .replace(new RegExp(`<${tagkelurahan}></${tagkelurahan}>`, 'gi'), data_bangunan.urban || '')
                    .replace(new RegExp(`<${tagnomor}></${tagnomor}>`, 'gi'), data_bangunan.nomor_bangunan || '')
                    .replace(new RegExp(`<${tagkodepos}></${tagkodepos}>`, 'gi'), data_bangunan.postal_code || '')
                    .replace(new RegExp(`<${tagprovinsi}></${tagprovinsi}>`, 'gi'), data_bangunan.provinsi || '');
                if (selected_bangunan) {

                } else
                if (allData[29].utama.id_kirim_ke) {
                    if (data_bangunan.id_kirim == allData[29].utama.id_kirim_ke) {
                        selected_bangunan = get_bangunan;
                    }
                } else if (data_bangunan.default_pembelian_barang == 1) {
                    selected_bangunan = get_bangunan;
                }
                // console.log("get_bangunan after",get_bangunan);      
                content_bangunan += `<button class="list-group-item text-left billingProfile" onclick="add_selected_bangunan(this)">` + get_bangunan + `</button>`;
            });
            $('#billingProfileSection').html(`<h5 class="mb-4">Pilih Alamat Penerima<span class="float-right">
                <button class="btn btn-sm btn-light" id="tambahAlamatPenerima" onclick="tambah_alamat_penerima()"><i class="fa fa-chevron-left mr-2"></i>Tambah</button>
                <button class="btn btn-sm btn-light" id="cancelChangeBilling" onclick="kembali_alamat_penerima_selected()"><i class="fa fa-chevron-left mr-2"></i>Cancel</button>
                </span></h5>
                    
                    <div class="list-group">` + content_bangunan + `</div>
                    
                </div>`);

            $('#selectedBilling').html(`<div class="float-right">
                                    <button class="btn btn-light btn-sm" id="changeBilling" onclick="kembali_alamat_penerima_cari()">Change</button>
                                </div>` + selected_bangunan);
            list_toko = JSON.parse(allData[29].list_toko);
            list_produk = JSON.parse(allData[29].list_produk);
            console.log("list_toko", list_toko);
            content_toko ="";
            total_qty = 0;
            total_grand = 0;
            list_toko.forEach(data_toko => {
                console.log("data_toko", data_toko);
                get_toko = `<div class="card mb-3">
                <div class="card-body">
                    <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column" style="padding-right: 30px;">
                        <h4 class="mb-1">
                        ${data_toko.nama_toko}
                        </h4>
                        <span class="mb-3">
                            Pengirimin dari   </span>
                    `;
                list_produk.forEach(data_produk => {
                    if(data_produk.id_toko = data_toko.id_toko){
                        console.log("data_produk",data_produk);
                        get_toko +=`
                        <div class="col-md-12 mt-3 m-3 card" id="store_cart-9">
                            <div class="row m-3">
                                <div class="col-1 cart__product__item">
                                    <div style="margin: 10px 0;border-radius: 100%;" id="image_cart-9">
                                        <img src="https://api.ethica.id//uploads/SEPLY/KASEO/BESAR/KASEO 241 SUMMER BLUE.jpg">
                                    </div>
                                </div>
                                <div class=" col-7 cart__product__item p-2">

                                    <input type="hidden" id="is_varian-9" value="1">
                                    <input type="hidden" id="max_varian-9" value="<MAX_VARIAN></MAX_VARIAN>">


                                    <div class="cart__product__item__title">
                                        <h6>${data_produk.nama_barang}</h6>
                                        Varian : ${data_produk.nama_varian}
                                        
                                        <input class="cart__price" id="stok-val9" value="1" type="hidden">

                                    </div>
                                    <div class="cart__quantity">
                                       Qty : ${data_produk.qty_pesanan}
                                    </div>
                                    <div class="cart__total"><span id="view-harga-9">
                                       Total:     ${formatRupiah(data_produk.grand_total)}
                                        </span></div>

                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                           
                        </div>
                        `;
            total_qty += data_produk.qty_pesanan;
            total_grand += data_produk.grand_total;
                    }
                });
                get_toko +=`</div></div>
                <div style="padding:20px;background:#fafafa;font-size: 18px;font-weight: bold;color: black;">
                Pilih Ongkir 
                <span class="float-right">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                </span>
                </div>

                </div>`;
                content_toko+=get_toko;
            });
            $('#deliveries').html(` <h4 class="mb-4 mt-4">Detail Pemesanan Barang</h4>`+content_toko);
            // let allData = await getAllFromStore(db, {
            //     utama: storeName
            // }, storeName,search);
             summary = `<h4 class="mb-4 mt-3">Rincian Pesanan</h4>
             <div class="card mt-3">
             <div class="card-body">
             
             <div id="detail-order">
                
                <ul class="list-unstyled mb-0">
                <li class="d-flex justify-content-between mb-3 " style="border-bottom:1px dotted black">
                <span> QTY Produk </span>
                <span>${formatRupiah(total_qty,'')} pcs </span>
                
                </li>
                <li class="d-flex justify-content-between mb-3 " style="border-bottom:1px dotted black">
                <span> Grand Total</span>
                <span>${formatRupiah(total_grand)}</span>
                
                </li>
                </div>
                <button class="btn-primary btn" onclick="proses_payment()" type="button">Pembayaran</button>
                </div>
                </div>`;
                $('.sticky-top').html(summary);

        }






        async function kembali_alamat_penerima_selected() {

            $('#billingProfileSection').hide();
            $('#selectedBilling').show();
        }
        async function kembali_alamat_penerima_cari() {

            $('#billingProfileSection').show();
            $('#selectedBilling').hide();
        }
        async function add_selected_bangunan(e) {
            $('#selectedBilling').html(`<div class="float-right">
                                    <button class="btn btn-light btn-sm" id="changeBilling" onclick="kembali_alamat_penerima_cari()">Change</button>
                                </div>` + $(e).html());
            $('#billingProfileSection').hide();
            $('#selectedBilling').show();
        }
        async function proses_checkout() {
            await proses_checkout_cek_stok();
        }
        async function proses_checkout_cek_stok(confirm = 0) {

            const isLoggedIn = await checkLoginStatus();
            if (isLoggedIn) {
                let send_cart_proses = [];
                $('.cart-produk').each(function() {
                    if ($(this).is(':checked')) {
                        harga = parseFloat($('#satuan-harga-val' + this.value).val());
                        qty = parseFloat($('#set_qty-' + this.value).val());
                        stok = parseFloat($('#stok-val' + this.value).val());
                        send_cart_proses.push({
                            id_cart: this.value,
                            qty: qty
                        });

                    }

                });
                console.log("send_cart_proses", send_cart_proses);
                $.ajax({

                    type: "post",
                    dataType: "html",
                    data: {

                        "id_user": isLoggedIn.userId,

                        'send_cart_proses': send_cart_proses,
                        'confirm': confirm

                    },
                    url: base_url + "api/proses_checkout",
                    dataType: "json",
                    beforeSend: function() {
                        // $("#summary").html("Tunggu Sebentar"); // Menampilkan indikator loading
                        Swal.fire({
                            title: 'Sedang memproses...',
                            text: 'Mohon tunggu sebentar. s',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(responseData) {
                        Swal.close();
                        if (responseData.status == 1) {

                            const data = [{
                                object: 'foreach_1_row'
                            }];
                            const type = {
                                0: "Ecommerce",
                                1: "checkout",
                                2: "view_layout",
                                3: responseData.id,
                            };
                            console.log(type);
                            const encoded = btoa(JSON.stringify(type));
                            const enPage = encodeDataForHref(data);;;
                            // content.content.html = "javascript:void(link_direct('" + enPage + "','" + encoded + "'))";
                            link_direct(enPage, encoded);

                        } else if (responseData.status == 0) {
                            swal("Gagal!", responseData.keterangan, "error");
                            // }	
                        } else
                            swal("Gagal!", "Terdapat Kesalahan Teknis Silahkan Hubungi Costumer Service!", "error");


                    }
                });
            } else {
                console.log("Belum login");
                open_login();
            }

        }

        async function js_cek_harga(id_cart) {
            // 
            let subtotal_cart = 0;
            let qty_cart = 0;
            let cartTotal = 0;
            $('.cart-produk').each(function() {
                if ($(this).is(':checked')) {
                    harga = parseFloat($('#satuan-harga-val' + this.value).val());
                    qty = parseFloat($('#set_qty-' + this.value).val());
                    stok = parseFloat($('#stok-val' + this.value).val());
                    console.log(this.value);
                    console.log(harga);
                    console.log(qty);
                    if (qty > stok) {
                        qty = stok;
                        $('#set_qty-' + this.value).val(qty);
                        Swal.fire({
                            icon: 'success',
                            title: 'Gagal!',
                            text: 'Qty tidak boleh melebihi stok!',
                            showConfirmButton: false,
                            timer: 700
                        });
                    }
                    cartTotal = qty * harga;
                    $('#view-harga-' + this.value).html(formatRupiah(cartTotal, 'Rp. '))
                    qty_cart += qty;
                    subtotal_cart += cartTotal;
                }

            });
            if (qty_cart) {

                summary = `<div id="detail-order">
                
                <ul class="list-unstyled mb-0">
                <li class="d-flex justify-content-between mb-3 " style="border-bottom:1px dotted black">
                <span> QTY Produk </span>
                <span>${formatRupiah(qty_cart,'')} pcs </span>
                
                </li>
                <li class="d-flex justify-content-between mb-3 " style="border-bottom:1px dotted black">
                <span> Sub Total</span>
                <span>${formatRupiah(subtotal_cart)}</span>
                
                </li>
                </div>
                <button class="btn-primary btn" onclick="proses_checkout()" type="button">Checkout</button>`;
                $('#summary').html(summary);

            } else {
                $('#summary').html("");

            }
        }
        async function send_cart_checked(id_cart) {
            const isLoggedIn = await checkLoginStatus();
            if (isLoggedIn) {
                var varian_1 = 0;
                var varian_2 = 0;
                var varian_3 = 0;
                var qty = 0;
                if (typeof $('#varian-1-' + id_cart).val() !== 'undefined') {
                    // the variable is defined
                    varian_1 = $('#varian-1-' + id_cart).val();
                }
                if (typeof($('#varian-2-' + id_cart).val()) !== 'undefined') {
                    // the variable is defined
                    varian_2 = $('#varian-2-' + id_cart).val();
                }

                if (typeof($('#varian-3-' + id_cart).val()) !== 'undefined') {
                    // the variable is defined
                    varian_3 = $('#varian-3-' + id_cart).val();
                }
                if (typeof($('#set_qty-' + id_cart).val()) !== 'undefined') {
                    // the variable is defined
                    qty = $('#set_qty-' + id_cart).val();
                }
                visible = false;
                max_varian = $('#max_varian-' + id_cart).val();
                if ($('#is_varian-' + id_cart).val() == 1) {
                    if (max_varian == 1 && varian_1) {
                        visible = true;
                    } else if (max_varian == 1 && !varian_1) {
                        alert("Silahkan untuk memilih varian terlebih dahulu");
                        $('#bismillah_beli-' + id_cart).prop('checked', false);
                    } else if (max_varian == 2 && varian_2) {
                        visible = true;
                    } else if (max_varian == 2 && !varian_2) {
                        alert("Silahkan untuk memilih varian terlebih dahulu");
                        $('#bismillah_beli-' + id_cart).prop('checked', false);
                    } else if (max_varian == 3 && varian_3) {
                        visible = true;
                    } else if (max_varian == 3 && !varian_3) {
                        alert("Silahkan untuk memilih varian terlebih dahulu");
                        $('#bismillah_beli-' + id_cart).prop('checked', false);
                    }
                } else {
                    visible = true;
                }
                is_produk = 1;

                if (!is_produk) {
                    swal("Gagal!", "Pilih Varian terlebih dahulu", "error");

                } else {

                    $.ajax({

                        type: "post",
                        dataType: "html",
                        data: {

                            "id_user": isLoggedIn.userId,
                            'id_cart': id_cart,
                            'varian_1': varian_1,
                            'varian_2': varian_2,
                            'varian_3': varian_3,
                            'set_qty': qty,
                            'checked': $('#bismillah_beli-' + id_cart).is(':checked')

                        },
                        url: base_url + "api/cheked_cart",
                        dataType: "json",
                        beforeSend: function() {
                            $("#summary").html("Tunggu Sebentar"); // Menampilkan indikator loading
                            Swal.fire({
                                title: 'Sedang memproses...',
                                text: 'Mohon tunggu sebentar.',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                        },
                        success: function(responseData) {
                            Swal.close();
                            if (responseData.status == 1) {
                                $('#satuan-harga-' + id_cart).html(responseData.harga_satuan_print);
                                $('#view-harga-' + id_cart).html(responseData.harga_jual_akhir_print);
                                // $('#image_cart-' + id_cart).html(responseData.img_src);
                                $('#summary').html(responseData.print_summary);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses!',
                                    text: 'Sukses menambahkan produk kedalam pesanan!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } else if (responseData.status == 0) {
                                swal("Gagal!", responseData.keterangan, "error");
                                // }	
                            } else
                                swal("Gagal!", "Terdapat Kesalahan Teknis Silahkan Hubungi Costumer Service!", "error");


                        }
                    });
                }
                // redirect ke dashboard misalnya
            } else {
                console.log("Belum login");
                open_login();
            }
        }
    </script>
</body>

</html>