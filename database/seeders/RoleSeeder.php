<?php

namespace Database\Seeders;

use App\Interfaces\Helpers\Guards\GuardInterface;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'register',
            'pays',
            'pays_view',
            'user_details',
            'user_details_views',
            'detail_parents_view',
            'detail_parents',
            'dental_histories',
            'dental_histories_view',
            'medical_histories',
            'medical_histories_view',
            'admins',
            'admins_view',
            'boss',
            'sectors',
            'sectors_view',
            'locations',
            'locations_view'
        ];
        $permissions = [
            'can_view_admins' => [
                'admins',
                'admins_views',
                'boss'
            ],
            'can_view_detail_parents'=>[
                'detail_parents_view',
                'detail_parents',
                'boss'

            ]
            ,
            'can_store_admins'=> [
                'admins',
                'boss'
            ],
            'can_delete_admins' => [
                'boss'
            ],
            'can_store_pays'=> [
                'pays',
                'boss'
            ],
            'can_view_pays'=> [
                'pays',
                'pays_view',
                'boss'
            ],
            'can_delete_pays'=> [
                'pays',
                'boss'
            ],
            'can_view_sectors'=> [
                'sectors',
                'boss',
                'sectors_view'
            ],
            'can_update_sectors'=> [
                'sectors',
                'boss'
            ],
            'can_delete_sectors'=> [
                'sectors',
                'boss',
            ],
            'can_locations_view'=> [
                'locations',
                'locations_view',
                'boss'
            ],
            'can_location_store' => [
                'boss',
                'locations'
            ],
            'can_delete_locations'=> [
                'locations',
                'boss',
            ],


        ];
        foreach ($roles as $name){
            $created_rol = Role::create(['name' => $name, 'guard_name' => GuardInterface::API_ADMIN]);

        }
        foreach($permissions as $permission => $roles) {
            $created_permission = Permission::create(['name' => $permission, 'guard_name' => GuardInterface::API_ADMIN]);
            foreach($roles as $rol) {
                $created_rol = Role::whereName($rol)->whereGuardName(GuardInterface::API_ADMIN)->first();
                $created_rol->givePermissionTo($created_permission);
                $created_permission->assignRole($created_rol);
            }

        }
    }
}
