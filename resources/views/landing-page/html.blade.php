<!DOCTYPE html>
<html lang="en">
        @section('header')
            @include('landing-page.header')
        @show
    <body>
        <!-- Navbar-->
        @section('navbar')
            @include('landing-page.navbar')
        @show
        <!-- Masthead-->
        @section('masthead')
            @include('landing-page.masthead')
        @show
        <!-- About Us-->
        @section('about')
            @include('landing-page.about')
        @show
        <!-- Mision - Vision-->
        @section('mision-vision')
            @include('landing-page.mision-vision')
        @show
         <!-- Advantages-->
         @section('advantage')
            @include('landing-page.advantage')
        @show
         <!-- Services-->
        @section('service')
            @include('landing-page.service')
        @show
        <!-- Footer-->
        @section('footer')
            @include('landing-page.footer')
        @show
        <!-- Scripts-->
        @section('scripts')
            @include('landing-page.scripts')
        @show
    </body>
</html>