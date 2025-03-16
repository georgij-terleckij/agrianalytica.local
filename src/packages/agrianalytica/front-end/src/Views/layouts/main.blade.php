<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Agrianalytica')</title>

    {{-- Подключение стилей --}}
    <link rel="stylesheet" href="{{ asset('assets/css/styleguide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layoutGeneral.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/utils.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/indexDesktop.1741708481148.css') }}">

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-CDM77BHZET');
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WVQ87T3V');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe height="0" src="https://www.googletagmanager.com/ns.html?id=GTM-WVQ87T3V" style="display:none;visibility:hidden" width="0">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '4035602489863070');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" src="https://www.facebook.com/tr?id=4035602489863070&amp;ev=PageView&amp;noscript=1" style="display:none" width="1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
    <style>
        .navbar-custom-link {
            padding: 10px 10px 25px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .navbar-custom-link-page {
            color: #929292;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            padding-top: 7px;
            padding-bottom: 7px;
        }
        .navbar-custom-link-page-selected {
            color: #64A30C;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            padding-top: 7px;
            padding-bottom: 7px;
        }
        .login-button {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 15px;
            top: 40px;
            background: #64A30C;
            border-radius: 8px;
        }
        .lds-spinner {
            color: official;
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-spinner div {
            transform-origin: 40px 40px;
            animation: lds-spinner 1.2s linear infinite;
        }
        .lds-spinner div:after {
            content: " ";
            display: block;
            position: absolute;
            top: 3px;
            left: 37px;
            width: 6px;
            height: 18px;
            border-radius: 20%;
            background: #CCCCCC;
        }
        .lds-spinner div:nth-child(1) {
            transform: rotate(0deg);
            animation-delay: -1.1s;
        }
        .lds-spinner div:nth-child(2) {
            transform: rotate(30deg);
            animation-delay: -1s;
        }
        .lds-spinner div:nth-child(3) {
            transform: rotate(60deg);
            animation-delay: -0.9s;
        }
        .lds-spinner div:nth-child(4) {
            transform: rotate(90deg);
            animation-delay: -0.8s;
        }
        .lds-spinner div:nth-child(5) {
            transform: rotate(120deg);
            animation-delay: -0.7s;
        }
        .lds-spinner div:nth-child(6) {
            transform: rotate(150deg);
            animation-delay: -0.6s;
        }
        .lds-spinner div:nth-child(7) {
            transform: rotate(180deg);
            animation-delay: -0.5s;
        }
        .lds-spinner div:nth-child(8) {
            transform: rotate(210deg);
            animation-delay: -0.4s;
        }
        .lds-spinner div:nth-child(9) {
            transform: rotate(240deg);
            animation-delay: -0.3s;
        }
        .lds-spinner div:nth-child(10) {
            transform: rotate(270deg);
            animation-delay: -0.2s;
        }
        .lds-spinner div:nth-child(11) {
            transform: rotate(300deg);
            animation-delay: -0.1s;
        }
        .lds-spinner div:nth-child(12) {
            transform: rotate(330deg);
            animation-delay: 0s;
        }
        @keyframes lds-spinner {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
        .btn-primary.focus, .btn-primary:focus {
            color: #64a30c;
            background: #fff;
            border: 1px solid #64a30c;
            transition: 0.2s all;
        }

        .btn-primary:not(:disabled):not(.disabled):active,
        .btn-primary:not(:disabled):not(.disabled).active,
        .show>.btn-primary.dropdown-toggle {
            transition: 0.2s all;
            background: #fff;
            color: #64a30c;
            border-color: #64a30c;
        }
        .navbar-custom-links {
            grid-gap: 40px
        }
        .w-auto {
            width: auto;
        }
    </style>
    <!-- Style for header -->
    <style>
        .container-header {
            max-width: 100%;
            margin: 0 auto;
            padding: 0 15px;
            height: 100px;
        }

        .backdrop-dark {
            background: rgba(51, 50, 50, 0.75);
            backdrop-filter: blur(50px);
            -webkit-backdrop-filter: blur(50px);
        }

        .dropdown-item-hover {
            transition: 0.3s;
            color: #000;
            cursor: pointer;
        }

        .dropdown-item-hover:hover {
            color: #64A30C;
        }

        .header-deprecated {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 7;
            width: 100%;
        }
        .header__bottom-info {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            min-height: 62px;
        }

        .header__bottom-info-flex {
            flex: 1;
            display: flex;
            gap: 50px;
        }

        .header__top-info {
            padding: 10px 0;
            display: flex;
            justify-content: flex-end;
        }
        .header__top-container {
            width: 80%;
            display: flex;
            justify-content: space-between;
        }
        .header__top-numbers {
            display: flex;
            gap: 24px;
        }
        .header__top-numbers-item {
            font-size: 14px;
            line-height: 16px;
            /*text-transform: uppercase;*/
            color: #fff;
        }
        .header__top-numbers-item span {
            color: #64A30C;
        }
        .header__top-numbers-item a {
            color: #FFFFFF;
            font-size: 14px;
        }
        .header__top-numbers-item a:hover {
            color: #FFFFFF;
        }

        .header__top-links {
            display: flex;
            gap: 24px;
        }

        .header__top-links a {
            font-size: 14px;
            line-height: 16px;
            color: #FFFFFF;
        }
        .header__top-links a:hover {
            color: #FFFFFF;
        }

        .header__logo {
            flex: 0 1 18%;
        }

        .dark-text {
            color: #212121;
        }

        .dark-text:hover {
            color: #212121;
        }

        .white-text {
            color: #F5F5F5;
        }

        .white-text:hover {
            color: #F5F5F5;
        }

        .header__menu {
            flex: 1;
        }

        .header__menu-list {
            height: 100%;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .header__menu-list-item {
            padding: 15px 10px 25px 10px;
            border-radius: 8px 8px 0 0;
            position: relative;
            height: calc(100% - 1px);
        }

        /*.header__menu-list-item.active .header-dropdown-menu {*/
        /*    !*opacity: 1;*!*/
        /*    !*visibility: visible;*!*/
        /*    display: none;*/
        /*}*/

        .header-dropdown-menu-active {
            display: none;
            transition: 0.3s
        }
        .header-dropdown-menu-active-products {
            display: none;
            transition: 0.3s
        }

        .header__menu-list-item.active .header__menu-list-item-icon {
            transform: rotate(180deg);
        }

        .header__menu-list-item a, .header__menu-list-item {
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            transition: 0.3s;
            text-transform: uppercase;
            display: flex;
            align-items: center;
        }

        .header__menu-list-item-active {
            background: #F8F8F8;
        }

        .header__menu-list-item-icon {
            transition: 0.3s;
            transform: rotate(0deg)
        }

        .header-dropdown-menu {
            position: absolute;
            top: 62px;
            left: 0;
            width: fit-content;
            z-index: 1;
            transition: 0.3s;
            /*opacity: 0;*/
            /*visibility: hidden;*/
        }

        .header-dropdown-menu__list {
            margin: 0;
            padding: 0;
            border-radius: 0 0 8px 8px;
            background: #F5F5F5;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }


        .header-dropdown-menu__list-item a {
            padding: 6px;
            display: block;
            white-space: nowrap;
        }

        .header-dropdown-menu__list-item:last-child a {
            border-radius: 0 0 8px 8px;
        }

        .header__controls {
            flex: 0 1 18%;
            justify-content: flex-end;
            display: flex;
            align-items: center;
        }

        .header__controls-wrapper {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }

        .header__translation-list {
            height: 16px;
            display: flex;
            gap: 6px;
            margin: 0;
            padding: 0;
        }

        .header__translation-list-item {
            font-size: 14px;
            line-height: 16px;
            color: #fff;
        }

        .header__translation-list-item:hover {
            color: #64a30c;
        }

        .header__translation-list-item-active {
            color: #64a30c;
        }

        .header__blind-button {
            position: relative;
            margin-top: -10px;
            top: 6px;
            fill: #fff;
            transition: 0.3s;
            cursor: pointer;
        }
        .header__blind-button:hover {
            fill: #64A30C;
        }

        .header-button {
            width: 228px;
            height: 48px;
            background: none;
            border: none;
            outline: none;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #66a30d;
            border-radius: 8px;
            transition: 0.2s all;
        }

        .header-button a {
            color: #fff;
            line-height: 1.3em;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            column-gap: 7px;
        }

        .header-button:hover {
            box-shadow: 0 10px 10px rgba(102, 163, 13, 0.35);
            background: #5D9410;
        }
        .header-button:hover a {
            color: #fff;
        }

        /* Blind mode */
        [data-color="blind"] .dropdown-item-hover:hover {
            color: #212121;
        }
        [data-color="blind"] .backdrop-dark {
            background: #7C7C7C;
        }
        [data-font="a1"] .header__top-links a {
            font-size: 16px;
            text-transform: uppercase;
        }
        [data-font="a2"] .header__top-links a {
            font-size: 18px;
            text-transform: uppercase;
        }
        [data-color="blind"] .header__translation-list-item:hover {
            color: #212121;
        }
        [data-color="blind"] .header__translation-list-item-active {
            color: #212121;
        }
        [data-color="blind"] .header__blind-button {
            fill: #212121;
        }
        [data-color="blind"] .header__blind-button:hover {
            fill: #212121;
        }
        [data-color="blind"] .header-button {
            background: #212121;
            fill: #000000;
        }
        [data-color="blind"] .header-button:hover {
            background: #212121;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        [data-color="blind"] .header__logo * {
            fill: #fff;
        }
        [data-color="blind"] .header__top-numbers-item a path  {
            stroke: #212121;
        }
        [data-font="a1"] .header__top-numbers-item a  {
            font-size: 16px;
        }
        [data-font="a2"] .header__top-numbers-item a  {
            font-size: 18px;
        }
        [data-font="a1"] .header__menu-list-item {
            font-size: 16px;
        }
        [data-font="a2"] .header__menu-list-item {
            font-size: 18px;
        }
        [data-font="a1"] .header__translation-list-item {
            font-size: 16px;
        }
        [data-font="a2"] .header__translation-list-item {
            font-size: 18px;
        }
        [data-font="a1"] .header-button a {
            font-size: 14px;
        }
        [data-font="a2"] .header-button a {
            font-size: 16px;
        }
    </style>
    <!-- Style for feedback -->
    <style>
        .lock {
            overflow: hidden !important;
        }
        .feedback {
            position: fixed;
            bottom: 50px;
            left: 20px;
            z-index: 10;
        }
        .feedback__icon {
            cursor: pointer;
            position: relative;
        }
        .feedback__icon:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border: 10px solid rgba(217, 214, 20, 0.3);
            border-radius: 50%;
            z-index: -1;
            animation: feedback-anim infinite 2s ease-in;
        }

        @keyframes feedback-anim {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2)
            }
            100% {
                transform: scale(1)
            }
        }

        .feedback-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(87, 85, 85, 0.5);
            z-index: 10;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
        }
        .feedback-modal.active {
            opacity: 1;
            visibility: visible;
        }
        .feedback-modal__content {
            width: 664px;
            height: 440px;
            background: white;
            border-radius: 12px;
            padding: 16px 32px;
            position: relative;
            display: flex;
            flex-direction: column;
        }
        .feedback-modal__header {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .feedback-modal__close {
            position: absolute;
            top: 5%;
            right: 5%;
            cursor: pointer;
        }
        .feedback-modal__title {
            font-weight: 500;
            font-size: 32px;
            line-height: 37px;
            text-align: center;
            color: #212121;
            margin-bottom: 8px;
            margin-top: 32px;
        }
        .feedback-modal__subtitle {
            font-size: 24px;
            line-height: 28px;
            text-align: center;
            color: #212121;
            margin-bottom: 16px;
        }
        .feedback-modal__wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        .feedback-modal__contact {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .feedback-modal__contact-block {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .feedback-modal__contact-title {
            font-weight: 500;
            font-size: 16px;
            line-height: 16px;
            color: #64A30C;
        }
        .feedback-modal__contact-subtitle {
            font-size: 18px;
            line-height: 16px;
            color: #212121;
        }
        .feedback-modal__input {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .feedback-modal__input-item {
            display: flex;
            flex-direction: column;
        }
        .feedback-modal__input-item label {
            font-size: 14px;
            line-height: 16px;
            color: rgba(0, 0, 0, 0.8);
        }
        .label-error {
            color: #dd3d3d !important;
        }
        .feedback-modal__content-wrapper {
            height: 100%;
        }
        .feedback-modal__message {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .feedback-modal__message p {
            font-size: 24px;
            line-height: 28px;
            text-align: center;
            color: #212121;
        }
        .input {
            display: flex;
            align-items: center;
            height: 48px;
            border-radius: 8px;
            border: 2px solid #b4b4b4;
            background: #fff;
            padding-left: 16px;
            padding-right: 16px;
            font-size: 14px;
            transition: .2s all;
        }
        .input:focus {
            outline: none
        }
        .input:disabled {
            pointer-events: none;
        }
        .input:hover {
            border-color: #66a30d;
            transition: .2s all;
            box-shadow: 0 7px 18px rgba(0, 0, 0, 0.06);
        }
        .input:focus {
            border-color: #66a30d;
            transition: .2s all;
            box-shadow: 0 7px 18px rgba(0, 0, 0, 0.06);
        }
        .input.error {
            border: 2px solid #dd3d3d
        }
        .input.error:hover {
            border: 2px solid #dd3d3d;
        }
        .input.error:active {
            border: 2px solid #dd3d3d;
        }
        .input.error:focus {
            border: 2px solid #dd3d3d;
        }
        .button {
            background: none;
            border: none;
            outline: none;
            width: 100%;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            background: #66a30d;
            border-radius: 8px;
            transition: 0.2s all;
        }
        .button:hover {
            box-shadow: 0 21px 20px -15px rgba(102, 163, 13, 0.35);
            background: #5D9410;
        }
        .button:disabled {
            background: #f1f1f1;
            color: #b4b4b4;
            pointer-events: none;
            box-shadow: none;
        }
    </style>
    <style>
        .feedback__icon-blind {
            display: none;
        }
        [data-color=blind] .feedback__icon-normal {
            display: none;
        }
        [data-color=blind] .feedback__icon-blind {
            display: block;
        }
        [data-color=blind] .feedback__icon:after {
            border: 10px solid rgba(0, 0, 0, 0.3);
        }
        [data-color=blind] .feedback-modal__logo *  {
            fill: #212121;
        }
        [data-color=blind] .feedback-modal__contact-title  {
            color: #212121;
        }
        [data-color=blind] .feedback-button:not(:disabled)  {
            background: #212121;
        }
        [data-color=blind] .input-feedback:focus, .input-feedback:hover  {
            border-color: #212121;
        }
        [data-color=blind] .label-error  {
            color: #212121 !important;
        }
    </style>
    <!-- for matrix -->
    <style>
        #header-matrix {
            /* display: inline-block; */
            position: relative;
            cursor: pointer;
        }

        #header-matrix .header-matrix-arrow  {
            transition: all 0.1s ease-in;
            rotate: 180deg;
        }

        #header-matrix .header-matrix-arrow-active  {
            rotate: 0deg;
        }

        #header-matrix .matrix-menu {
            opacity: 0;
            pointer-events: none;
            top: 25px;
            position: absolute;
            display: flex;
            width: 174px;
            padding: 6px;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 6px;
            z-index: 11;
            transition: all 0.1s ease-in;

            border-radius: 0px 0px 12px 12px;
            background: #FFF;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        }

        #header-matrix .matrix-menu-item {
            color:  #212121;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 120%; /* 16.8px */
            transition: all 0.2s ease-in;
        }

        #header-matrix .matrix-menu-item:hover {
            color: #66A30D;
        }

        #header-matrix .matrix-menu-active {
            opacity: 1;
            pointer-events: all;
        }
    </style>
</head>
<body>
@include('front::partials.header')

<main>
    @yield('content')
</main>

@include('front::partials.footer')

{{-- Подключение JS --}}
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/indexDesktop.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('assets/js/indexDesktop.1741708481148.js') }}"></script>
<script src="{{ asset('assets/js/vendor.1741708481148.js') }}"></script>
</body>
</html>
