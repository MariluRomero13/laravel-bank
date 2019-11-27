<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUsers;
use App\Http\Requests\UpdateUsers;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = DB::table('users as u')
                ->join('roles as r', 'r.id', '=', 'u.role_id')
                ->orderBy('r.name', 'asc')
                ->select('u.id as user_id', 'u.name as username', 'u.email', 'r.name as rol', 'u.status');

            return datatables()
                ->query($users)
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/usuarios-editar/' . $row->user_id . '" data-id="' . $row->user_id . '" class="btn btn-warning">' .
                        "<i class='fa fa-edit'></i>"
                        . '</a>';
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        $btn = '<a data-id="' . $row->user_id . '" class="btn btn-success delete" data-target="' . $row->status . '">' .
                            "<i class='fa fa-check'></i>"
                            . '</a>';
                    } else {
                        $btn = '<a data-id="' . $row->user_id . '" class="btn btn-danger delete">' .
                            "<i class='fa fa-close'></i>"
                            . '</a>';
                    }

                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->toJson();
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsers $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->role_id = 1;
        $user->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsers $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->get('name');
        if ($request->get('password') != null) {
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
        return response()->json([
            'success' => 'User deleted',
            'status' => $user->status
        ]);
    }
}
