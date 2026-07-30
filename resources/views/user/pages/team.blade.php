<section class="team"  id="team">
    <div class="page-margin">
        @include('user.pages.advisor')
        
        <br>
        <br>
        <div class="section-header">
            <h2>Our Team</h2>
        </div>

        @foreach ($teamcategory as $category)
            <div class="mangement-team">
                <h6>{{ $category->name }}</h6>
                
                <div class="members">
                    @foreach ($category->team as $member)
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('storage/'.$member->image) }}" alt="">
                            </div>
                            <div class="member-details">
                                <span class="member-name">{{ $member->name }}</span> <br>
                                <span class="member-designation">{{ $member->designation }}</span><br>
                                @if($member->management_post)
                                    <span class="ceo">{{ $member->management_post }}</span><br>
                                @endif<br>
                                
                                {{ $member->details }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>