<div class="white z-depth-1">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab col s3"><a class="@if (URL::current() == URL::to('/'.$carRally->alias.'')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}" target="_self"><i class="material-icons">subject</i>Aktualności</a></li>

                    <li class="tab col s3"><a class="@if (URL::current() == URL::to('/'.$carRally->alias.'/informacje')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/informacje" target="_self"><i class="material-icons">info</i>Informacje</a></li>

                    <li class="tab col s3"><a class="@if (URL::current() == URL::to('/'.$carRally->alias.'/regulamin')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/regulamin" target="_self"><i class="material-icons">description</i>Regulamin</a></li>

                    <li class="tab col s3"><a class="@if (URL::current() == URL::to('/'.$carRally->alias.'/rejestracja')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/rejestracja" target="_self"><i class="material-icons">person_add</i>Weź udział</a></li>

                    <li class="tab col s3"><a class="@if (URL::current() == URL::to('/'.$carRally->alias.'/pliki')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/pliki" target="_self"><i class="material-icons">file_download</i>Do pobrania</a></li>

                    <li class="tab col s3"><a class="@if (URL::current() == URL::to('/'.$carRally->alias.'/kontakt')) {{ 'active' }} @endif" href="/{{ $carRally->alias }}/kontakt"target="_self"><i class="material-icons">question_answer</i>Zadaj pytanie</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
