<?php

namespace App\Livewire\Admin;

use App\Models\Pharmacy;
use App\Models\Turn;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class TurnComponent extends Component
{
    use WithPagination;
    public $open = false;
    public $pharmacies = [];

    public $pharmacy_id;
    public $date;

    public function toggleModal()
    {
        $this->open = !$this->open;
    }

    public function closeModal()
    {
        $this->open = false;
    }

    public function getPharmacies()
    {
        $this->pharmacies = Pharmacy::all();
    }

    public function mount()
    {
        $this->getPharmacies();
    }

    public function save()
    {
        // Validar manualmente la entrada
        $validator = Validator::make(
            [
                'date' => $this->date,
                'pharmacy_id' => $this->pharmacy_id,
            ],
            [
                'date' => 'required|date|after_or_equal:today',
                'pharmacy_id' => 'required',
            ],
            [
                'date.after_or_equal' => 'La fecha debe ser igual o posterior a la fecha actual.',
            ]
        );

        // Verificar si la validación ha fallado
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Turn::create([
            'date' => $this->date,
            'pharmacy_id' => $this->pharmacy_id,
            'user_id' => '1',
        ]);
        $this->closeModal();
    }

    public function render()
    {

        //quiero que muestre los turnos separados por fecha
        $allDatesTurns = Turn::with('pharmacy')
            ->get()
            ->groupBy('date')
            ->map(function ($turns, $date) {
                return [
                    'date' => Carbon::parse($date)->translatedFormat('j \d\e F'),
                    'pharmacies' => $turns->pluck('pharmacy')->toArray(),
                ];
            })
            ->values()
            ->all();
        array_shift($allDatesTurns);


        $now = Carbon::now();
        $startOfDay = $now->copy()->startOfDay()->addHours(8);
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $Variable = null;
        if ($now <= $startOfDay) $Variable = $yesterday;
        else $Variable = $today;
        $result = Turn::with('pharmacy')
            ->whereDate('date', '=', $Variable->toDateString())->get()
            ->groupBy('date')->map(function ($turns, $date) {
                return [
                    'date' => Carbon::parse($date)->translatedFormat('j \d\e F'),
                    'pharmacies' => $turns->pluck('pharmacy')->toArray(),
                ];
            })->values()->all();
        $turns = $result;
        return view('livewire.admin.turn-component', compact('turns', 'allDatesTurns'))->layout('layouts.admin');
    }
}
