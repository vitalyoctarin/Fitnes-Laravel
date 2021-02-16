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
//            'application-client',
//            'application-delete',
            'client-list',
            'client-create',
            'client-client',
            'client-delete',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
