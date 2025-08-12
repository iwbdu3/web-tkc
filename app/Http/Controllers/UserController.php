<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Fitur pencarian by nama/email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        // Urut berdasarkan jenis custom_id (adm, pnt, pnj, psa)
        $query->orderByRaw("
        CASE 
            WHEN LEFT(custom_id, 3) = 'adm' THEN 1
            WHEN LEFT(custom_id, 3) = 'pnt' THEN 2
            WHEN LEFT(custom_id, 3) = 'pnj' THEN 3
            WHEN LEFT(custom_id, 3) = 'psa' THEN 4
            ELSE 5
        END, id ASC
    ");

        $data = $query->paginate(10);

        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        // 🔥 Konversi role ke huruf kecil agar match sukses
        $role = strtolower($request->input('roles')[0]);

        $prefix = match ($role) {
            'admin' => 'adm',
            'panitia' => 'pnt',
            'penguji' => 'pnj',
            'peserta' => 'psa',
            default => 'usr',
        };

        $user->custom_id = $prefix . str_pad($user->id, 4, '0', STR_PAD_LEFT);
        $user->save();

        $user->assignRole($request->input('roles')[0]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->except('roles');

        if (!empty($request->password)) {
            $input['password'] = Hash::make($request->password);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user = User::find($id);

        // Update data user (name, email, password)
        $user->update($input);

        // Ambil role baru dan pastikan huruf kecil
        $newRole = strtolower($request->input('roles')[0]);

        // Hapus role lama dan assign role baru
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($newRole);

        // Buat ulang custom_id berdasarkan role baru
        $prefix = match ($newRole) {
            'admin' => 'adm',
            'panitia' => 'pnt',
            'penguji' => 'pnj',
            'peserta' => 'psa',
            default => 'usr',
        };

        $user->custom_id = $prefix . str_pad($user->id, 4, '0', STR_PAD_LEFT);
        $user->save(); // simpan custom_id

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
