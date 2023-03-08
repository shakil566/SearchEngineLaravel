<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class RoleController extends Controller
{
    public function index(Request $request)
    {

        $qpArr = $request->all();
        $targetArr = Role::orderBy('id', 'desc');
        $titleArr = Role::select('title')->orderBy('id', 'desc')->get();

        //begin filtering
        $searchText = $request->search;
        if (!empty($searchText)) {
            $targetArr->where(function ($query) use ($searchText) {
                $query->where('title', 'LIKE', '%' . $searchText . '%');
            });
        }
        //end filtering

        $targetArr = $targetArr->paginate();

        return view('admin.role.index')->with(compact('targetArr', 'qpArr', 'titleArr'));
    }

    public function create(Request $request)
    {
        $qpArr = $request->all();

        return view('admin.role.create')->with(compact('qpArr'));
    }

    public function store(Request $request)
    {
        $qpArr = $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:role,title',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/role/create')
                ->withInput()
                ->withErrors($validator);
        }

        $target = new Role;
        $target->title = $request->title;

        // return $target;

        if ($target->save()) {
            Session::flash('success', 'Created Successfully');
            return redirect('/admin/role');
        } else {
            Session::flash('error', 'Could Not be Created');
            return redirect('/admin/role');
        }
    }

    public function edit(Request $request, $id)
    {
        $target = Role::find($id);

        // return $emailArr;
        if (empty($target)) {
            Session::flash('error', 'Invalid data Id');
            return redirect('role');
        }


        $qpArr = $request->all();

        return view('admin.role.edit')->with(compact('target', 'qpArr'));
    }

    public function update(Request $request, $id)
    {
        $target = Role::find($id);

        // echo '<pre>';print_r($target);exit;

        $qpArr = $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:role,title,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect('/admin/role/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $target->title = $request->title;
        // return $target;
        if ($target->save()) {
            Session::flash('success', 'Updated Successfully');
            return redirect('/admin/role');
        } else {
            Session::flash('error', 'Could not be Updated');
            return redirect('/admin/role' . $id . '/edit');
        }
    }

    public function destroy(Request $request, $id)
    {
        $target = Role::find($id);

        $qpArr = $request->all();


        if (empty($target)) {
            session()->flash('error', 'Invalid data id');
        }


        if ($target->delete()) {

            Session::flash('error', 'Deleted Successfully');
        } else {
            Session::flash('error', 'Could not be deleted');
        }
        return redirect('/admin/role');
    }

    public function filter(Request $request)
    {
        $url = 'search=' . urlencode($request->search);
        return Redirect::to('/admin/role?' . $url);
    }


}
