<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i
            class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('events') }}"><i
            class="la la-angle-up nav-icon"></i> {{ trans('admin.events') }}</a>
</li><li class="nav-item"><a class="nav-link" href="{{ backpack_url('flows') }}"><i
            class="la la-flag-o nav-icon"></i> {{ trans('admin.flows') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('lists') }}'>
        <i class='nav-icon la la-newspaper'></i> {{ trans('admin.lists') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('customers') }}'>
        <i class='nav-icon la la-user'></i> {{ trans('admin.customers') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('companies') }}'>
        <i class='nav-icon la la-compress'></i> {{ trans('admin.companies') }}</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'>
        <i class='nav-icon la la-file-o'></i> <span> {{ trans('admin.pages') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('templates') }}'>
        <i class='nav-icon la la-pager'></i> {{ trans('admin.templates') }}</a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i> Translations</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language') }}">
                <i class="nav-icon la la-flag-checkered"></i> Languages</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language/texts') }}">
                <i class="nav-icon la la-language"></i> Site texts</a></li>
    </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'>
        <i class='nav-icon la la-cog'></i> <span> {{ trans('admin.settings') }}</span></a></li>
