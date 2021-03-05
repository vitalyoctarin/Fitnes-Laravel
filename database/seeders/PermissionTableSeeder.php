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
//           'role-list',
//           'role-create',
//           'role-edit',
//           'role-delete',
//           'employee-list',
//           'employee-create',
//           'employee-edit',
//           'employee-delete',
//           'user-list',
//           'user-create',
//           'user-edit',
//           'user-delete',
//           'trainer-list',
//           'trainer-create',
//           'trainer-edit',
//           'trainer-delete',
//           'group-list',
//           'group-create',
//           'group-edit',
//           'group-delete',
//            'timetable-list',
//            'timetable-create',
//            'timetable-edit',
//            'timetable-delete',
//            'application-list',
//            'application-create',
//            'application-edit',
//            'application-delete',
//            'client-list',
//            'client-create',
//            'client-edit',
//            'client-delete',
//            'service-list',
//            'service-create',
//            'service-edit',
//            'service-delete',
//            'subcategory-list',
//            'subcategory-create',
//            'subcategory-edit',
//            'subcategory-delete',
//            'level_preparations-list',
//            'level_preparations-create',
//            'level_preparations-edit',
//            'level_preparations-delete',
//            'subscription-list',
//            'subscription-create',
//            'subscription-edit',
//            'subscription-delete',
            'services_list-list',
            'services_list-create',
            'services_list-edit',
            'services_list-delete',

        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
