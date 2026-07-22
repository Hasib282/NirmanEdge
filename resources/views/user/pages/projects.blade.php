<section id="projects">
    <div class="page-margin">
        <div class="section-header">
            <h2>Our Projects</h2>
        </div>
        <div class="projects">
            @foreach ($projects as $project)
                <div class="project">
                    <div class="project-image">
                        <img src="{{ asset('projects/'.$project->image[0] ) }}" alt="{{$project->slug}}">
                    </div>

                    <div class="project-data">
                        <p>{{ $project->name }} at {{$project->location}}</p>

                        <a href="{{ route('project.details', $project->slug) }}">
                            <button class="btn-primary">More Details</button>
                        </a>
                    </div>
                </div>
            @endforeach
            {{-- <div class="project">
                <div class="project-image">
                    <img src="{{ asset('images/team/tofayel.png') }}" alt="image">
                </div>
                <div class="project-data">
                    <p>Abc ddsgss sfssffs sfgssfgg sssggs gdgd dghgd dggdggd</p>
                    <button class="btn-primary">More Details</button>
                </div>
            </div>
            <div class="project">
                <div class="project-image">
                    <img src="{{ asset('images/team/tofayel.png') }}" alt="image">
                </div>
                <div class="project-data">
                    <p>Abc ddsgss sfssffs sfgssfgg sssggs</p>
                    <button class="btn-primary">More Details</button>
                </div>
            </div>
            <div class="project">
                <div class="project-image">
                    <img src="{{ asset('images/team/tofayel.png') }}" alt="image">
                </div>
                <div class="project-data">
                    <p>Abc ddsgss sfssffs sfgssfgg sssggs</p>
                    <button class="btn-primary">More Details</button>
                </div>
            </div>
            <div class="project">
                <div class="project-image">
                    <img src="{{ asset('images/team/tofayel.png') }}" alt="image">
                </div>
                <div class="project-data">
                    <p>Abc ddsgss sfssffs sfgssfgg sssggs</p>
                    <button class="btn-primary">More Details</button>
                </div>
            </div> --}}
        </div>
    </div>
</section>