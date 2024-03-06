<?php

namespace App\Livewire\Admin;

use App\Models\Pharmacy;
use Livewire\Component;
use Livewire\WithPagination;

class PharmacyComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $pharmacies = Pharmacy::paginate(7);

        return view('livewire.admin.pharmacy-component', compact('pharmacies'))->layout('layouts.admin');
    }
}
