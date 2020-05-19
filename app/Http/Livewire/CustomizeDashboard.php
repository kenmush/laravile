<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class CustomizeDashboard extends Component
{
    public $selected;

    public $clientSelected;

    public $coverageReports;
    public $pressPieces;
    public $alerts;
    public $socialShares;


    public  function mount()
    {
        $this->selected = "";
        $this->clientSelected = [];
    }


    public function updatedSelected()
    {
        $this->clientSelected = Client::find($this->selected)->toArray();

        $this->coverageReports = $this->clientSelected['coverage_reports'];
        $this->pressPieces = $this->clientSelected['press_pieces'];
        $this->alerts = $this->clientSelected['alerts'];
        $this->socialShares = $this->clientSelected['social_shares'];
    }

    public function render()
    {
        $clients = Client::where('user_id', auth()->id())->get();
        return view('livewire.customize-dashboard', compact('clients'));
    }

    public function submit()
    {
        $client = Client::find($this->selected);

        session()->flash('success', 'Updated.');
        $client->update([
            'coverage_reports' => $this->coverageReports,
            'press_pieces' => $this->pressPieces,
            'alerts' => $this->alerts,
            'social_shares' => $this->socialShares,
        ]);
    }
}
