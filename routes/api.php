<?php

use App\Http\Resources\ExpenseResource;
use App\Http\Resources\GoalScorerResource;
use App\Http\Resources\LeagueTableResource;
use App\Http\Resources\RevenueResource;
use App\Http\Resources\TeamResource;
use App\Models\Expense;
use App\Models\GoalScorer;
use App\Models\LeagueTable;
use App\Models\Revenue;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/teams', function () {
    $teams = Team::orderBy('name')->get();

    return TeamResource::collection($teams);
});

Route::get('/goal-scorers', function () {
    $goalScorers = GoalScorer::orderBy('goals', 'desc')->get();

    return GoalScorerResource::collection($goalScorers);
});

Route::get('/league-table', function () {
    $leagueTable = LeagueTable::orderBy('points', 'desc')->get();

    return LeagueTableResource::collection($leagueTable);
});

Route::get('/expenses', function () {
    $expenses = Expense::orderBy('created_at', 'desc')->get();

    return ExpenseResource::collection($expenses);
});

Route::get('/revenues', function () {
    $revenues = Revenue::orderBy('created_at', 'desc')->get();

    return RevenueResource::collection($revenues);
});
