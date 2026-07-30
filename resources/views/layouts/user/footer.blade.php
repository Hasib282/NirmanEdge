<section class="foot">
    <div class="page-margin">
        <footer class="footer-main">
            <aside>
                <a href="{{ route('home') }}"><img src="{{ Storage::url($setting->logo) }}" alt="logo"></a>
                <p>
                Where vision meets foundation. Infrastructure, engineered with conviction.
                </p>
            </aside>
            <nav>
                <h6>Important Links</h6>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('projects') }}">Projects</a>
                <a href="{{ route('why-us') }}">Why Us</a>
            </nav>
            <nav>
                <h6>Contact Info</h6>
                <div class="con-info">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>{{ $setting->address }}</p>
                </div>
                <div class="con-info">
                    <i class="fa-solid fa-phone"></i>
                    <p>{{ $setting->phone1 }} {{ $setting->phone2 ? ',' : '' }} {{ $setting->phone2 }}</p>
                </div>
                <div class="con-info">
                    <i class="fa-solid fa-envelope"></i>
                    <p>{{ $setting->email1 }} {{ $setting->email2 ? ',' : '' }} {{ $setting->email2 }}</p>
                </div>
            </nav>
        </footer>
        
        <footer class="footer-copy">
            <p>Copyright &copy; {{ date('Y') }} - All right reserved by <a href="{{env('APP_URL')}}">{{ $setting->name }}</a></p>
        </footer>
    </div>
</section>

