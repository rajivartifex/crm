@can('business-about-list')
    @include('pages.customers.about_section.bus_emp.bus_emp_tbl')
@endcan
@can('business-category-list')
    @include('pages.customers.about_section.bus_category.bus_category_tbl')
@endcan
{{-- @include('pages.customers.about_section.working_hours.working_hours') --}}
@can('description-list')
    @include('pages.customers.about_section.description.description_tbl')
@endcan
@can('comments-list')
    @include('pages.customers.about_section.bus_comment.comment_tbl')
@endcan


