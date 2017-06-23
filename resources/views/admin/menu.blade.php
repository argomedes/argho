<div class="white z-depth-1">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a class="@if (URL::current() == URL::to('/administrator')) {{ 'active' }} @endif" href="/administrator" target="_self" data-position="bottom" data-delay="50" data-tooltip="Zloty"><i class="material-icons">dashboard</i></a></li>

                    <li class="tab"><a class="@if ( substr(URL::current(), 0, strlen(URL::to('/administrator/zloty')) ) === URL::to('/administrator/zloty')) {{ 'active' }} @endif" href="/administrator/zloty" target="_self"><i class="material-icons">directions_car</i> Zloty</a></li>

                    <li class="tab"><a class="@if ( substr(URL::current(), 0, strlen(URL::to('/administrator/wpisy')) ) === URL::to('/administrator/wpisy')) {{ 'active' }} @endif" href="/administrator/wpisy" target="_self"><i class="material-icons">edit</i> Aktualności</a></li>

                    <li class="tab"><a class="@if ( substr(URL::current(), 0, strlen(URL::to('/administrator/zgloszenia')) ) === URL::to('/administrator/zgloszenia')) {{ 'active' }} @endif" href="/administrator/zgloszenia" target="_self"><i class="material-icons">person_add</i> Zgłoszenia</a></li>

                    <li class="tab"><a class="@if ( substr(URL::current(), 0, strlen(URL::to('/administrator/za[ytania]')) ) === URL::to('/administrator/zapytania')) {{ 'active' }} @endif" href="/administrator/zapytania" target="_self"><i class="material-icons">question_answer</i> Zapytania</a></li>

                    <li class="tab"><a class="@if ( substr(URL::current(), 0, strlen(URL::to('/administrator/notatki')) ) === URL::to('/administrator/notatki')) {{ 'active' }} @endif" href="/administrator/notatki" target="_self"><i class="material-icons">speaker_notes</i> Notatki</a></li>

                    <li class="tab"><a class="@if ( substr(URL::current(), 0, strlen(URL::to('/administrator/uzytkownicy')) ) === URL::to('/administrator/uzytkownicy')) {{ 'active' }} @endif" href="/administrator/uzytkownicy" target="_self"><i class="material-icons">people</i> Użytkownicy</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
