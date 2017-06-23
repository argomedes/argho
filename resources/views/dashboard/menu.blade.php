<div class="white z-depth-1">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a class="tooltipped @if (URL::current() == URL::to('/'.$carRally->alias.'/panel')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/panel" target="_self" data-position="bottom" data-delay="50" data-tooltip="Statystyki zlotu"><i class="material-icons">dashboard</i></a></li>

                    <li class="tab"><a class="tooltipped @if ( substr(URL::current(), 0, strlen(URL::to('/'.$carRally->alias.'/panel/zlot')) ) === URL::to('/'.$carRally->alias.'/panel/zlot')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/panel/zlot" target="_self" data-position="bottom" data-delay="50" data-tooltip="Edytuj zlot"><i class="material-icons">edit</i></a></li>

                    <li class="tab"><a class="tooltipped @if ( substr(URL::current(), 0, strlen(URL::to('/'.$carRally->alias.'/panel/wpisy')) ) === URL::to('/'.$carRally->alias.'/panel/wpisy')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/panel/wpisy" target="_self" data-position="bottom" data-delay="50" data-tooltip="Aktualności"><i class="material-icons">subject</i></a></li>

                    <li class="tab"><a class="tooltipped @if ( URL::current() == URL::to('/'.$carRally->alias.'/panel/informacje') ) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/panel/informacje" target="_self" data-position="bottom" data-delay="50" data-tooltip="Informacje"><i class="material-icons">info</i></a></li>

                    <li class="tab"><a class="tooltipped @if ( URL::current() == URL::to('/'.$carRally->alias.'/panel/regulamin') ) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/panel/regulamin" target="_self" data-position="bottom" data-delay="50" data-tooltip="Regulamin"><i class="material-icons">description</i></a></li>

                    <li class="tab"><a class="tooltipped @if ( substr(URL::current(), 0, strlen(URL::to('/'.$carRally->alias.'/panel/zgloszenia')) ) === URL::to('/'.$carRally->alias.'/panel/zgloszenia')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/panel/zgloszenia" target="_self" data-position="bottom" data-delay="50" data-tooltip="Zgłoszenia na zlot"><i class="material-icons">person_add</i></a></li>

                    <li class="tab"><a class="tooltipped @if ( substr(URL::current(), 0, strlen(URL::to('/'.$carRally->alias.'/panel/zapytania')) ) === URL::to('/'.$carRally->alias.'/panel/zapytania')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/panel/zapytania" target="_self" data-position="bottom" data-delay="50" data-tooltip="Zapytania"><i class="material-icons">question_answer</i></a></li>

                    <li class="tab"><a class="tooltipped @if ( substr(URL::current(), 0, strlen(URL::to('/'.$carRally->alias.'/panel/notatki')) ) === URL::to('/'.$carRally->alias.'/panel/notatki')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/panel/notatki" target="_self" data-position="bottom" data-delay="50" data-tooltip="Notatki"><i class="material-icons">speaker_notes</i></a></li>

                    @if (Auth::user()->creator == 1)
                        <li class="tab"><a class="tooltipped @if ( substr(URL::current(), 0, strlen(URL::to('/'.$carRally->alias.'/panel/organizatorzy')) ) === URL::to('/'.$carRally->alias.'/panel/organizatorzy')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/panel/organizatorzy" target="_self" data-position="bottom" data-delay="50" data-tooltip="Organizatorzy"><i class="material-icons">people</i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
