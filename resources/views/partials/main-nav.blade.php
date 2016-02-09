<div class="main-nav-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">

        <nav class="main-nav">

          <ul class="main-nav__items">
            <li class="main-nav__item">
              <a href="{{ action('WorkplaceController@index') }}" class="main-nav__item-link"><?php include(base_path() . '/public/images/portfolio.svg'); ?><span>Företag</span></a>
            </li>
            <li class="main-nav__item">
              <a href="#" class="main-nav__item-link"><?php include(base_path() . '/public/images/handshake-1-noun_153518.svg'); ?><span>Yrken</span></a>
            </li>
            <li class="main-nav__item ">
              <a href="{{ action('OpportunityController@index') }}" class="main-nav__item-link"><?php include(base_path() . '/public/images/speech-bubbles-1-noun_70008.svg'); ?><span>Mötestider</span></a>
            </li>
            @if(Auth::check() or $token_guard->check())
              <li><a href="{{ route('dashboard') }}" class="main-nav__item-link">Dashboard</a></li>
            @endif
          </ul>

          @include('user.partials.login_info')

        </nav>

      </div>
    </div>
  </div>
</div>