<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GroupPrivilegeTest extends TestCase
{
    use RefreshDatabase;

    public function test_group_index_displays_assigned_privileges(): void
    {
        $user = User::factory()->create();
        $group = Group::create([
            'nama' => 'Admin Operasional',
            'deskripsi' => 'Kelola data operasional',
            'akses_penuh' => false,
        ]);

        $permission = Permission::create([
            'nama' => 'Kelola Grup',
            'deskripsi' => 'Akses mengelola grup',
        ]);

        $group->permissions()->sync([$permission->id]);
        $user->group_id = $group->id;
        $user->save();

        $response = $this->actingAs($user)->get(route('grup.index'));

        $response->assertOk();
        $response->assertSee($group->nama);
        $response->assertSee($permission->nama);
    }
}
