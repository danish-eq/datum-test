<div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ Request::path() == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
              <p></p>
            </a>
          </li>
          <li class="{{ Request::path() == 'cms/listing' ? 'active' : '' }}">
            <a href="{{route('cmslisting')}}">
              <i class="nc-icon nc-credit-card"></i>
              <p>CMS</p>
            </a>
          </li>
          <li class="{{ Request::path() == 'services/listing' ? 'active' : '' }}">
            <a href="{{route('servicelisting')}}">
              <i class="nc-icon nc-briefcase-24"></i>
              <p>Services</p>
            </a>
          </li>
          <li class="{{ Request::path() == 'news/listing' ? 'active' : '' }}">
            <a href="{{route('newslisting')}}">
              <i class="nc-icon nc-paper"></i>
              <p>News</p>
            </a>
          </li>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              <i class="nc-icon nc-button-power"></i>
              <p>{{ __('Logout') }}</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </div>