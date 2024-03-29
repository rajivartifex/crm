@can('business-identity-list')
    @include('pages.customers.profile_section.bus_identity.bus_identity')
@endcan
@if ($customer)
    @can('business-location-list')
        @include('pages.customers.profile_section.bus_location.bus_location_tbl')
    @endcan
    @can('business-contact-info-list')
        @include('pages.customers.profile_section.bus_contact_info.bus_contact_info_tbl')
    @endcan
@endif
