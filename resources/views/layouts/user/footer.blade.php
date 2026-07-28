<section class="foot">
    <div class="page-margin">
        <footer class="footer-main">
            <aside>
                <img src="{{ Storage::url($setting->logo) }}" alt="logo">
                <p>
                Where vision meets foundation. Infrastructure, engineered with conviction.
                </p>
            </aside>
            <nav>
                <h6>Services</h6>
                <a>Branding</a>
                <a>Design</a>
                <a>Marketing</a>
                <a>Advertisement</a>
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

