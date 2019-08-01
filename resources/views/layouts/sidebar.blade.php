<div class="body-overlay"></div>
<div id="side-panel" class="dark" data-bg-img="{{ asset('images/bg/bg8.jpg') }}">
    <div class="side-panel-wrap">
        <div id="side-panel-trigger-close" class="side-panel-trigger">
            <a href="#"><i class="pe-7s-close font-36"></i>
            </a>
        </div>
        <a href="/"><img alt="LY" title="LY" src="{{ asset('images/logo-wide.png') }}"></a>
        <div class="side-panel-nav mt-30">
            <div class="widget no-border">
                <nav>
                    <ul class="nav nav-list">
                        @if(auth()->check())
                            <li><a href="{{ route('profile') }}">{{ __('personal/real.profile') }}</a></li>
                            <li><a href="{{ route('security') }}">{{ __('personal/security.security') }}</a></li>
                            <li><a href="{{ route('params') }}">{{ __('personal/real.real') }}</a></li>
                            <li><a href="{{ route('address.index') }}">{{ __('personal/address.address') }}</a></li>
                            <li><a href="{{ route('phone.index') }}">{{ __('validation.attributes.mobile') }}</a></li>
                            @can('token',\App\Token::class)
                                <li><a href="{{ route('token.index') }}">{{ __('personal/token.tokens') }}</a></li>
                            @endcan
                            @can('create',\App\Doctor::class)
                                <li><a href="{{ route('doctor.index') }}">{{ __('directory/doctor.doctors') }}</a></li>
                            @endcan

                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="side-panel-widget mt-30">
            <div class="widget no-border">
                <ul>
                    <li class="font-14 mb-5"><i class="fa fa-phone text-theme-colored"></i> <a href="#"
                                                                                               class="text-gray">123-456-789</a>
                    </li>
                    <li class="font-14 mb-5"><i class="fa fa-clock-o text-theme-colored"></i> Mon-Fri 8:00 to 2:00</li>
                    <li class="font-14 mb-5"><i class="fa fa-envelope-o text-theme-colored"></i> <a href="#"
                                                                                                    class="text-gray">contact@yourdomain.com</a>
                    </li>
                </ul>
            </div>
            <div class="widget">
                <ul class="styled-icons icon-dark icon-theme-colored icon-sm">
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
            <p class="text-center">Copyright LY &copy;2019 <br></p>
        </div>
    </div>
</div>