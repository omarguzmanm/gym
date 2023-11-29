<?php

namespace App\Http\Livewire\Clients;

use App\Models\PrRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowMyPrs extends Component
{
    public $search = '';
    public $prs;

    public function render()
    {
        $this->prs = PrRecord::select('*')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('pr_records')
                    ->where('user_id', Auth::id())
                    ->where('exercise', 'like', '%' . $this->search . '%')
                    ->groupBy('exercise');
            })
            ->get();

        // dd($this->prs);
        return view('livewire.clients.show-my-prs');
    }
}
