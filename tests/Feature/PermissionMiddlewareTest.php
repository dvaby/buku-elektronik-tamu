<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PermissionMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_without_permission_cannot_access_group_management(): void
    {
        $user = User::factory()->create();
        $group = Group::create([
            'nama' => 'Viewer',
            'deskripsi' => 'Hanya melihat',
            'akses_penuh' => false,
        ]);

        $user->group_id = $group->id;
        $user->save();

        $response = $this->actingAs($user)->get(route('grup.index'));

        $response->assertForbidden();
    }

    public function test_user_with_permission_can_access_group_management(): void
    {
        $user = User::factory()->create();
        $group = Group::create([
            'nama' => 'Admin Grup',
            'deskripsi' => 'Kelola grup',
            'akses_penuh' => false,
        ]);

        $permission = Permission::create([
            'nama' => 'Kelola Grup',
            'deskripsi' => 'Can manage groups',
        ]);

        $group->permissions()->sync([$permission->id]);
        $user->group_id = $group->id;
        $user->save();

        $response = $this->actingAs($user)->get(route('grup.index'));

        $response->assertOk();
    }
}
