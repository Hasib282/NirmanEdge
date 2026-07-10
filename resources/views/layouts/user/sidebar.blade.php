<div id="sidenav-container" class="sidenav-container" onclick="closeNav()">
    <div id="mySidenav" class="sidenav">
        {{-- <a href="javascript:void(0)" class="closebtn" >&times;</a> --}}
        <a href="{{ route('home') }}" class="link">Home</a>
        <a href="{{ route('about') }}" class="link">About</a>
        <a href="{{ route('services') }}" class="link">Services</a>
        <a href="{{ route('projects') }}" class="link">Projects</a>
        <a href="{{ route('why-us') }}" class="link">Why Us</a>
        <a href="{{ route('contact-us') }}" class="link">Contact</a>
        <div class="resume">
            <a href="{{ route('contact-us') }}">Lets Build </a>
        </div>
    </div>
</div>