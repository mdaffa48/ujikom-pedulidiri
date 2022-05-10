<!DOCTYPE html>
<html lang="en">

<head>
    @include('essentials.css')

    <title>@yield('title')</title>
</head>

<body>
    @include('essentials.navbar')
    @include('essentials.sidebar')

    <div id="app">
        <div class="main-wrapper">

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        @yield('halaman')
                    </div>

                    @yield('body')

                </section>
            </div>
        </div>
    </div>

    @include('essentials.js')
</body>

</html>
