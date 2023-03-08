<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserSearchHistory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class FrontendController extends Controller
{
    public function index()
    {

        $keywordsArr = UserSearchHistory::orderBy('search_keyword', 'asc')->select('search_keyword')->groupBy('search_keyword')->get();
        $userArr = User::orderBy('name', 'asc')->select('name', 'id')->get();
        // echo '<pre>';
        // print($keywordCount);
        // exit;

        return view('frontend.index')->with(compact('keywordsArr', 'userArr'));
    }

    public function searchHistory(Request $request)
    {
        $keywords = $request->keywords ?? [];
        $users = $request->users ?? [];
        $time_range = $request->time_range ?? [];
        $time_range = $request->time_range ?? [];

        $dateFrom = !empty($request->date_from) ? (new \App\Helpers\Helper())->dateFormatConvert($request->date_from) : '';
        $dateTo = !empty($request->date_to) ? (new \App\Helpers\Helper())->dateFormatConvert($request->date_to) : '';

        $userArr = [];
        if (!empty($keywords) || !empty($users) || !empty($time_range) || !empty($dateFrom) || !empty($dateTo)) {

            $userArr = UserSearchHistory::leftJoin('users', 'user_search_history.search_result', 'users.id')
                ->select('users.name as name', 'users.email as email');

            if (!empty($keywords)) {
                $userArr = $userArr->orWhereIn('user_search_history.search_keyword', $keywords);
            }
            if (!empty($users)) {
                $userArr = $userArr->orWhereIn('user_search_history.search_result', $users);
            }
            if (!empty($time_range)) {
                if (in_array('yesterday', $time_range)) {
                    $userArr = $userArr
                        ->orWhere('user_search_history.created_at', '>=', Carbon::yesterday());
                }
                if (in_array('last_week', $time_range)) {
                    $date = Carbon::now()->subDays(7);
                    $userArr = $userArr->orWhere('user_search_history.created_at', '>=', $date);
                }
                if (in_array('last_month', $time_range)) {
                    $userArr = $userArr
                        ->orWhereBetween(
                            'user_search_history.created_at',
                            [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
                        );
                }
            }

            if (!empty($dateFrom) || !empty($dateTo)) {

                $userArr = $userArr->orWhereBetween('user_search_history.created_at', [$dateFrom, $dateTo]);
            }

            $userArr = $userArr->get();
        }

        $html = view('frontend.searchedUserDetails', compact('userArr'))->render();
        return Response::json(['html' => $html]);

        // echo '<pre>';
        // print_r($userArr);
        // exit;
    }
}
