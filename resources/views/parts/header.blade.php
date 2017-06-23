<div class="cover valign-wrapper">
    <div class="container">
        <div class="row">
            {{-- <div class="col s3">
                <img src="{{ asset('storage/'.$carRally->cover) }}" />
            </div> --}}
            <div class="col s8 offset-s2 center-align">
                <div class="cover-photo">
                    <img src="{{ asset('storage/'.$carRally->cover) }}" />
                </div>
                <h2>{{ $carRally->name }}</h2>
                <div class="divider red lighten-2"></div>
                <p>{{ $carRally->starts_at }} {{ $carRally->starts_at_hour }}, {{ $carRally->place }}</p>
                <p>
                    {{ $carRally->description }}
                </p>
            </div>
        </div>
    </div>
</div>
