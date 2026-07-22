<section class="services" id="services">
    <div class="page-margin">
        <div class="section-header">
            <span class="sub-title">Our Services</span>
            <h2>Complete Engineering Solutions </h2>
        </div>

        <div class="service-grid">
            @foreach ($services as $key => $service)
                <div class="service-card">
                    <span class="service-no"><i class="{{$service->icon}}"></i></span>
                    <h3>{{ $service->title }}</h3>
                    <p>
                        {{ $service->details }}
                    </p>
                </div>    
            @endforeach
        </div>
    </div>
</section>