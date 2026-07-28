<header>
    <div class="page-margin head">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ Storage::url($setting->logo) }}" alt="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}" class="link">Home</a></li>
                <li><a href="{{ route('about') }}" class="link">About</a></li>
                <li><a href="{{ route('services') }}" class="link">Services</a></li>
                <li><a href="{{ route('projects') }}" class="link">Projects</a></li>
                <li><a href="{{ route('why-us') }}" class="link">Why Us</a></li>
                <li><a href="{{ route('contact-us') }}" class="link">Contact</a></li>
            </ul>
        </nav>
        <div class="resume resume1">
            <a href="{{ route('contact-us') }}">Lets Build </a>
        </div>
        <div class="togle" onclick="toggleNav()">
            &#9776;
        </div>
    </div>
</header>

@include('layouts.user.sidebar')
