<?php

namespace App\Exports;

use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CustomerReport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        $domain_rec = DB::table('cust_domain_rec__tbl')
                ->select('cust_id','cust_domain_name as domain_name', 'cust_domain_renewal_date', 'cust_business_name', DB::raw("'Domain' as `service`"))
                ->leftJoin('cust_rec__tbl', 'cust_rec__tbl.id', '=', 'cust_domain_rec__tbl.cust_id')
                ->whereNull('cust_domain_rec__tbl.deleted_at')
                ->get();

            $subscription_rec = DB::table('cust_subscription_rec__tbl')
                ->select('cust_id', 'cust_sub_website_name as domain_name', 'cust_sub_renewal_date', 'type', 'cust_business_name',DB::raw("'Hosting' as `service`"))
                ->leftJoin('cust_rec__tbl', 'cust_rec__tbl.id', '=', 'cust_subscription_rec__tbl.cust_id')
                ->leftJoin('solution_rec__tbl', 'solution_rec__tbl.id', '=', 'cust_subscription_rec__tbl.cust_sub_solution_id')
                ->whereNull('cust_subscription_rec__tbl.deleted_at')
                ->get();

            $marketing_rec = DB::table('cust_marketing_rec__tbl')
                ->select('cust_id','cust_mark_domain_name as domain_name', 'cust_mark_renewal_date', 'type', 'cust_business_name',DB::raw("'Marketing' as `service`"))
                ->leftJoin('cust_rec__tbl', 'cust_rec__tbl.id', '=', 'cust_marketing_rec__tbl.cust_id')
                ->leftJoin('marketing_type_rec__tbl', 'marketing_type_rec__tbl.id', '=', 'cust_marketing_rec__tbl.cust_mark_type_id')
                ->whereNull('cust_marketing_rec__tbl.deleted_at')
                ->get();
            

            $support_rec = DB::table('cust_support_rec__tbl')
                ->select('cust_id','cust_sup_product_name as domain_name', 'cust_sup_renewal_date', 'type', 'cust_business_name',DB::raw("'Support' as `service`"))
                ->leftJoin('cust_rec__tbl', 'cust_rec__tbl.id', '=', 'cust_support_rec__tbl.cust_id')
                ->leftJoin('marketing_type_rec__tbl', 'marketing_type_rec__tbl.id', '=', 'cust_support_rec__tbl.cust_sup_type_id')
                ->whereNull('cust_support_rec__tbl.deleted_at')
                ->get();

            $combined_reports_rec = $domain_rec->concat($subscription_rec)->concat($marketing_rec)->concat($support_rec);

            return view('pages.customers.customer_export',['data' => $combined_reports_rec]);
    }
}
