<?php

namespace App\Http\Livewire\Memberships;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

use Carbon\Carbon;

class ShowSales extends Component
{
    public $years, $dates, $incomes;
    public $types, $plans, $sales;
    public $selectedYear = '';
    public $monthlyIncome, $mostSoldMemberships;

    public function mount()
    {
        $this->years = DB::table('membership_user')
            ->select(DB::raw('distinct year(created_at) as year'))
            ->pluck('year');

        // $this->updatedSelectedYear();
    }

    public function updatedSelectedYear()
    {
        // Consulta para obtener los ingresos de cada mes
        $this->monthlyIncome = DB::table('membership_user')
            ->select(DB::raw('MONTHNAME(membership_user.created_at) as month'), DB::raw('SUM(memberships.price) as incomes'))
            ->join('memberships', 'membership_user.membership_id', '=', 'memberships.id')
            ->whereYear('membership_user.created_at', $this->selectedYear)
            ->groupBy('month')
            ->orderByRaw("FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
            ->get();
        // dd($this->monthlyIncome);

        // Consulta para obtener la membresía más vendida en todo el año
        $this->mostSoldMemberships = DB::table('membership_user')
            ->select(
                'memberships.type as types',
                'memberships.plan as plans',
                DB::raw('COUNT(*) as sales')
            )
            ->join('memberships', 'membership_user.membership_id', '=', 'memberships.id')
            ->whereYear('membership_user.created_at', $this->selectedYear)
            ->groupBy('type', 'plan')
            ->orderByDesc('sales') // Ordenar por ventas de forma descendente
            ->get();

        // dd($this->mostSoldMemberships);

        $this->incomes = $this->monthlyIncome->pluck('incomes')->all();
        $this->dates = $this->monthlyIncome->pluck('month')->all();

        $this->types = $this->mostSoldMemberships->pluck('types')->all();
        $this->plans = $this->mostSoldMemberships->pluck('plans')->all();
        $this->sales = $this->mostSoldMemberships->pluck('sales')->all();

        $this->emit('updateIncomesChart');
        $this->emit('updateMembershipsChart');

    }

    public function render()
    {
        return view('livewire.memberships.show-sales');
    }
}
