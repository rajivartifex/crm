@include('pages.customers.profile_section.bus_identity.bus_identity')
@if($customer)
@include('pages.customers.profile_section.bus_location.bus_location_tbl')
@include('pages.customers.profile_section.bus_contact_info.bus_contact_info_tbl')
@endif
