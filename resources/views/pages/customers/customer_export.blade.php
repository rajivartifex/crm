<table>
    <thead>
        <tr>
            <th><b>#</b></th>
            <th><b>Customer Name</b></th>
            <th><b>Service</b></th>
            <th><b>Name</b></th>
            <th><b>Type</b></th>
            <th><b>Renewal Date</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $list)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $list->cust_business_name ?? '' }}</td>
                <td>{{ $list->service ?? '' }}</td>
                <td>{{ $list->domain_name ?? '' }}</td>
                <td>{{ $list->type ?? '' }}</td>
                <td>{{ \Carbon\Carbon::parse($list->cust_domain_renewal_date ?? ($list->cust_sub_renewal_date ?? ($list->cust_mark_renewal_date ?? ($list->cust_sup_renewal_date ?? ''))))->format('d-m-Y') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
