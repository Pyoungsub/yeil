<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="keywords" content="보컬 | 댄스 | 연기 | 목동">
        <meta name="description" content="목동역 200평 규모 종합엔터 아카데미. #보컬 #댄스 #연기 한곳에 배우자. 무료체험 접수중">

        <meta name="thumbnail" content="https://www.yeilschool.co.kr/storage/company/present_img.jpg" alt="예일아카데미">
        <meta property="og:url" content="https://www.yeilschool.co.kr">
        <meta property="og:image" content="https://www.yeilschool.co.kr/storage/company/present_img.jpg">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Yeil Academy">
        <meta property="og:locale" content="ko">
        <meta property="og:title" content="예일아카데미 | #보컬 #댄스 #연기">
        <meta property="og:description" content="목동역 200평 규모 종합엔터 아카데미. #보컬 #댄스 #연기 한곳에 배우자. 무료체험 접수중">
        <meta property="og:country-name" content="ko">

        <meta itemprop="name" content="예일아카데미">
        <meta itemprop="image" content="https://www.yeilschool.co.kr/storage/company/present_img.jpg">
        <meta itemprop="url" content="https://www.yeilschool.co.kr">
        <meta itemprop="description" content="목동역 200평 규모 종합엔터 아카데미. #보컬 #댄스 #연기 한곳에 배우자. 무료체험 접수중">
        <meta itemprop="keywords" content="all-smartphones-new">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles -->
        @livewireStyles
        @stack('scripts')
    </head>
    <body 
        class="font-sans antialiased"
        x-data="{ scrolled: false }" 
        x-init="
            window.addEventListener('scroll', () => { scrolled = (window.scrollY > 50); });
        "
    >
        <x-banner />

        <div class="min-h-screen bg-white">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
