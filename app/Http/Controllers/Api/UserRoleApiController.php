<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserRoleApiController extends Controller
{
    public function index(Request $request)
    {
        $targetArr = UserRole::with(['user', 'role'])->get();
        return response()->json([
            'status' => 302,
            'message' => 'User info',
            'data' => $targetArr,
        ], 302);
    }

    public function create(Request $request)
    {
    }

    public function store(Request $request)
    {
        $qpArr = $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:role,title',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages()
            ], 400);
        } else {

            $target = new UserRole;
            $target->role_id = $request->role_id;
            $target->user_id = Auth::id();

            // return $target;

            $target->save();
            return response()->json([
                'status' => 200,
                'message' => 'Role  Created Successfully'
            ], 200);
        }
    }

    public function info($id)
    {
        $roleArr = Role::orderBy('title', 'asc')->pluck('title', 'id')->toArray();
        $targetArr = UserRole::with(['user', 'role'])->where('user_role.user_id', $id)->get();
        if (!empty($targetArr)) {
            $viewArr = [];
            foreach ($targetArr as $data) {
                $viewArr['info']['name'] = $data->user->name ?? '';
                $viewArr['info']['email'] = $data->user->email ?? '';
                $viewArr['role'] = (new \App\Helpers\Helper())->stringToArrayToName($data->role_id, $roleArr) ?? '';
            }
            return response($viewArr);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User id ' . $id . ' not found'
            ], 404);
        }
    }

    public function edit(Request $request, $id)
    {
    }


    public function update(Request $request, $id)
    {
    }

    public function destroy(Request $request, $id)
    {
        $target = UserRole::find($id);

        if ($target) {
            $target->delete();
            return response()->json([
                'message' => 'User Role deleted'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User ' . $id . ' not found'
            ], 404);
        }
    }
}
