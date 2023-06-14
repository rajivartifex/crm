@include('pages.customers.profile_section.bus_identity.bus_identity')
{{-- @include('pages.customers.profile_section.bus_location.bus_location_tbl') --}}
@if($customer)
@include('pages.customers.profile_section.bus_contact_info.bus_contact_info_tbl')
@endif
