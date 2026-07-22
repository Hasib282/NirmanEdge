<section id="project-details">
    <div class="page-margin">
        <h2>{{ $data->name }} at {{ $data->location }}</h2>
        <h2>(
                @if ($data->status == 1)
                    Proposed
                @elseif ($data->status == 2)
                    Under Construction
                @else
                    Completed Project
                @endif
            )
        </h2>

        <div class="project-details">
            <p><b>Project Name:</b> {{ $data->name }}</p>
            <p><b>Name of Client:</b> {{ $data->client }}</p>
            <p><b>Project Type:</b> {{ $data->type->title }}</p>
            <p><b>Project Location:</b> {{ $data->location }}</p>
            <p><b>Project Year:</b> {{ $data->year }}</p>
            <p><b>Project Details:</b> <br>{{ $data->details }}</p>
        </div>
        
        <div class="project-img">
            @foreach ($data->image as $image)
                <a href="{{ asset('projects/' . $image) }}">
                    <img src="{{ asset('projects/' . $image) }}" alt="{{$data->slug}}">
                </a>
            @endforeach
        </div>
    </div>
</section>