<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\LeagueTable;
use App\Models\Player;
use App\Models\Revenue;
use Illuminate\Http\Request;
use App\Models\Team;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generateTeamsPDF()
    {
        $teams = Team::get();
        $data = [
            'title' => 'Equipos participantes',
            'date' => date('m/d/Y'),
            // Total de equipos
            'totalTeams' => count($teams),
            // Equipos
            'teams' => $teams,
            // Total de equipos habilitados
            'totalTeamsEnabled' => count($teams->where('status', 1)),
            // Total de equipos deshabilitados
            'totalTeamsDisabled' => count($teams->where('status', 0)),
        ];
        $pdf = Pdf::loadView('teamsPdf', $data);
        return $pdf->stream('invoice.pdf');
    }

    // Generar PDF de jugadores
    public function generatePlayersPDF()
    {
        $players = Player::get();
        $data = [
            'title' => 'Jugadores registrados',
            'date' => date('m/d/Y'),
            // Total de jugadores
            'totalPlayers' => count($players),
            // Jugadores
            'players' => $players,
        ];
        $pdf = Pdf::loadView('playersPdf', $data);
        return $pdf->stream('invoice.pdf');
    }

    // Generar PDF de tabla de posiciones
    public function generatePositionsPDF()
    {
        // Ordenar tabla de posiciones por puntos
        $league_tables = LeagueTable::orderBy('points', 'desc')->get();
        $data = [
            'title' => 'Tabla de posiciones',
            'date' => date('m/d/Y'),
            // Equipos ordenados por puntos
            'league_tables' => $league_tables,
        ];
        $pdf = Pdf::loadView('positionsPdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('invoice.pdf');
    }

    // Generar PDF de ingresos
    public function generateIncomePDF()
    {
        $revenues = Revenue::get();
        $expenses = Expense::get();
        $data = [
            'titleRevenue' => 'Ingresos',
            'titleExpense' => 'Gastos',
            'date' => date('m/d/Y'),
            // Total de ingresos
            'totalRevenues' => Revenue::sum('value'),
            // Total de gastos
            'totalExpenses' => Expense::sum('value'),
            // Balance de ingresos y gastos
            'balance' => Revenue::sum('value') - Expense::sum('value'),
            // Ingresos
            'revenues' => $revenues,
            'expenses' => $expenses,
        ];
        $pdf = Pdf::loadView('incomePdf', $data);
        return $pdf->stream('invoice.pdf');
    }

    // Generar PDF de gastos
    public function generateExpensesPDF()
    {
        $expenses = Expense::get();
        $data = [
            'title' => 'Gastos',
            'date' => date('m/d/Y'),
            // Total de gastos
            'totalExpenses' => Expense::sum('value'),
            // Balance de ingresos y gastos
            'balance' => Revenue::sum('value') - Expense::sum('value'),
            // Gastos
            'expenses' => $expenses,
        ];
        $pdf = Pdf::loadView('expensesPdf', $data);
        return $pdf->stream('invoice.pdf');
    }
}
