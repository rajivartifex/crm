@if ($customer)
    @can('domain-list')
        @include('pages.customers.domain.bus_domain_tbl')
    @endcan
    @can('hosting-subscription-list')
        @include('pages.customers.subscription.bus_subscription_tbl')
    @endcan
    @can('marketing-list')
        @include('pages.customers.marketing.bus_marketing_tbl')
    @endcan
    @can('support-list')
        @include('pages.customers.support.bus_support_tbl')
    @endcan
@endif
