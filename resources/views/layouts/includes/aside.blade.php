<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-designation">{{ auth()->user()->user_name }}</p>
        </div>
    </div>
    <ul class="app-menu">

        {{-- home--}}
        <li>
            <a class="app-menu__item {{ request()->is('*home*') ? 'active' : '' }}" href="{{ route('site.home') }}">
                <i class="app-menu__icon fa fa-home"></i>
                <span class="app-menu__label">Home</span>
            </a>

        </li>


        <li>
            <a class="app-menu__item {{ request()->is('*user*') ? 'active' : '' }}"
               href=""><i class="fas fa-image">
                </i><span class="app-menu__label">User</span>
            </a>
        </li>
        {{--            //user--}}


    </ul>
</aside>


