<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'business-location-list',
            'business-location-create',
            'business-location-edit',
            'business-location-delete',
            'business-identity-list',
            'customer-create',
            'business-identity-edit',
            'customer-delete',
            'business-contact-info-list',
            'business-contact-info-create',
            'business-contact-info-edit',
            'business-contact-info-delete',
            'business-about-list',
            'business-about-create',
            'business-about-edit',
            'business-about-delete',
            'business-category-list',
            'business-category-create',
            'business-category-edit',
            'business-category-delete',
            'description-list',
            'description-create',
            'description-edit',
            'description-delete',
            'comments-list',
            'comments-create',
            'comments-edit',
            'comments-delete',
            'working-hours-list',
            'working-hours-edit',
            'payment-accepted-list',
            'payment-accepted-create',
            'payment-accepted-edit',
            'payment-accepted-delete',
            'social-media-list',
            'social-media-edit',
            'domain-list',
            'domain-create',
            'domain-edit',
            'domain-delete',
            'hosting-subscription-list',
            'hosting-subscription-create',
            'hosting-subscription-edit',
            'hosting-subscription-delete',
            'marketing-list',
            'marketing-create',
            'marketing-edit',
            'marketing-delete',
            'support-list',
            'support-create',
            'support-edit',
            'support-delete',
            'log-list'
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
