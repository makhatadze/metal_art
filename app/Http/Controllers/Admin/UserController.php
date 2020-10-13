<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $action = '<a class="btn btn-info" id="show-user" data-toggle="modal" data-id=' . $row->id . '>Show</a>
<a class="btn btn-success" id="edit-user" href=' . route('userEdit',$row->id).' data-id=' . $row->id . '>Edit </a>
<meta name="csrf-token" content="{{ csrf_token() }}">
<a id="delete-user" data-id=' . $row->id . ' class="btn btn-danger delete-user">Delete</a>';

                    return $action;

                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.modules.user.index');
    }
    public function create(Request $request) {
        if ($request->isMethod('GET')) {
            return view('admin.modules.user.create');
        }
    }

    public function store(Request $request)
    {

        $r = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',

        ]);

        $uId = $request->user_id;
        User::updateOrCreate(['id' => $uId], ['name' => $request->name, 'email' => $request->email,'password' => '12345']);
        if (empty($request->user_id))
            $msg = 'User created successfully.';
        else
            $msg = 'User data is updated successfully';
        return redirect()->route('users.index')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     */

    public function show($id)
    {
        $where = array('id' => $id);
        $user = User::where($where)->first();
        return response()
            ->json(['user' => $user]);
//return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $where = array('id' => $id);
        $user = User::where($where)->first();
        return response()
            ->json(['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function destroy(Request $request)
    {
        $rules = [
            'id' => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()
                ->json([
                    'success' => 'false',
                    'errors' => $validator->getMessageBag()->toArray()
                ],'200');
        }
        if (!$user = User::where('id', $request->id)->delete()) {
            return response()
                ->json([
                    'success' => 'false',
                    'message' => $validator->getMessageBag()->toArray()
                ],'400');
        }
        return response()
            ->json([
                'success' => 'true',
                'message' => ''
            ]);
    }
}
