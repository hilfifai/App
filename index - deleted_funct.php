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
        
        // Function to get main load data from IndexedDB or API
        

        // Function to print all object stores in the database

        // Function to print all data in an object store
       

        // Function to get data by key
        


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
        

        // Example Usage
        

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
        
    </script>
    <script>
       


        function getHargaSatuan(hargaList, jumlah) {
            for (let i = 0; i < hargaList.length; i++) {
                if (jumlah >= hargaList[i].min) {
                    return hargaList[i].harga;
                }
            }
            return 0; // Jika tidak ada harga yang sesuai
        }

       

        function change_tipe_page() {
            var tipe_page = $("#tipe_page").val()
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
        
        
    </script>
</body>

</html>