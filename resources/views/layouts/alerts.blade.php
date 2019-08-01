@if (session('success'))
    <div class="alert alert-success alert-dismissible mt-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! session('success') !!}
    </div>
@endif
@if (session('danger'))
    <div class="alert alert-danger alert-dismissible mt-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! session('danger') !!}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning alert-dismissible mt-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! session('warning') !!}
    </div>
@endif
@if (session('info'))
    <div class="alert alert-info alert-dismissible mt-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! session('info') !!}
    </div>
@endif
@if (!session('locale'))
    <div class="alert alert-info alert-dismissible mt-5" role="alert">
        <div class="row lang-switcher">
            <span class="pl-5">Veuillez Choisir Votre Langue Préférée</span><br>
            <span class="pl-5 font-40">يرجى اختيار لغتك المفضلة</span>
            <div class="pull-right">
                <a href="#" data-lang="fr" class="text-left btn btn-border hvr-bounce-to-right btn-theme-colored">Français</a>
            </div>
            <br><br>
            <div class="pull-right">
                <a href="#" data-lang="ar" class="text-right btn btn-border hvr-bounce-to-right btn-theme-colored">عربي</a>
            </div>
        </div>

    </div>
@endif