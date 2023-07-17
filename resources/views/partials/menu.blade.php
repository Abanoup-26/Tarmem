<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('organization_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.organizations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/organizations") || request()->is("admin/organizations/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-sitemap c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.organization.title') }}
                </a>
            </li>
        @endcan
        @can('contractor_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.contractors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contractors") || request()->is("admin/contractors/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-500px c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contractor.title') }}
                </a>
            </li>
        @endcan
        @can('supporter_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.supporters.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/supporters") || request()->is("admin/supporters/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.supporter.title') }}
                </a>
            </li>
        @endcan
        @can('beneficiary_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/beneficiaries*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-families*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-needs*") ? "c-show" : "" }} {{ request()->is("admin/buildings*") ? "c-show" : "" }} {{ request()->is("admin/building-contractors*") ? "c-show" : "" }} {{ request()->is("admin/building-supporters*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-male c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.beneficiaryManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('beneficiary_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiaries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiaries") || request()->is("admin/beneficiaries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-astronaut c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiary.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_family_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-families.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-families") || request()->is("admin/beneficiary-families/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-grin-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryFamily.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_need_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-needs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-needs") || request()->is("admin/beneficiary-needs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-university c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryNeed.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('building_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.buildings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/buildings") || request()->is("admin/buildings/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.building.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('building_contractor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.building-contractors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/building-contractors") || request()->is("admin/building-contractors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.buildingContractor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('building_supporter_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.building-supporters.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/building-supporters") || request()->is("admin/building-supporters/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-money-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.buildingSupporter.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('general_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/illnesstypes*") ? "c-show" : "" }} {{ request()->is("admin/units*") ? "c-show" : "" }} {{ request()->is("admin/contractor-types*") ? "c-show" : "" }} {{ request()->is("admin/contractor-serviece-types*") ? "c-show" : "" }} {{ request()->is("admin/organization-types*") ? "c-show" : "" }} {{ request()->is("admin/cities*") ? "c-show" : "" }} {{ request()->is("admin/districts*") ? "c-show" : "" }} {{ request()->is("admin/relatives*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.generalSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('illnesstype_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.illnesstypes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/illnesstypes") || request()->is("admin/illnesstypes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-h-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.illnesstype.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('unit_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.units.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/units") || request()->is("admin/units/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hotel c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.unit.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('contractor_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contractor-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contractor-types") || request()->is("admin/contractor-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contractorType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('contractor_serviece_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contractor-serviece-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contractor-serviece-types") || request()->is("admin/contractor-serviece-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-adn c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contractorServieceType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('organization_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.organization-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/organization-types") || request()->is("admin/organization-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sitemap c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.organizationType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('city_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-globe-africa c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.city.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('district_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.districts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/districts") || request()->is("admin/districts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.district.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('relative_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.relatives.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/relatives") || request()->is("admin/relatives/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-500px c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.relative.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>