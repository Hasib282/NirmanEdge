<section class="contactus" id="contact-us">
    <div class="page-margin">
        <div class="contact-motivation">
            <p class="getin"> <span class="dash"></span> &nbsp; Get in Touch</p>
    
            <h1>Ready To <span class="logo-color"> Build Project? </span> </h1>
    
            <p class="contact-text">Have a project in mind or need expert engineering consultation? 
                Our team is here to help you with reliable, safe, and cost-effective solutions. 
                Feel free to reach out to us anytime.
            </p>
        </div>
        <div class="contact-details">
            <div class="office-address">
                <img src="{{ asset('images/skyline.png') }}" alt="office">
                <h4>Office Address</h4>
                <p>{{ $setting->address }}</p>
            </div>

            <div class="office-contact">
                <img src="{{ asset('images/phone.png') }}" alt="phone">
                <h4>Call Us</h4>
                <p>{{ $setting->phone1 }} <br> {{ $setting->phone2 }}</p>
            </div>

            <div class="office-mail">
                <img src="{{ asset('images/mail-2.png') }}" alt="mail">
                <h4>Email Us</h4>
                <p>{{ $setting->email1 }} <br> {{ $setting->email2 }}</p>
            </div>
        </div>
        <div>
            <a href="mailto:nirmanedge@gmail.com">Start a Conversation &#10140;</a>
        </div>
    </div>
</section>