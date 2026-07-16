<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarIndex extends Component
{
    // Questa proprietà si aggiorna in tempo reale mentre l'utente digita
    public $search = '';

    public function render()
    {
        // Filtra le auto in base alla ricerca (se presente)
        $cars = Car::where(function ($query) {
            $query->where('model', 'like', '%' . $this->search . '%')
                ->orWhere('brand', 'like', '%' . $this->search . '%')
                ->orWhere('engine', 'like', '%' . $this->search . '%')
                ->orWhere('year', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('hp', 'like', '%' . $this->search . '%');
        })
            ->latest()
            ->get();

        return view('livewire.car-index', compact('cars'));
    }
    public function delete($id)
    {
        $car = Car::find($id);
        $car->delete();
        session()->flash('success', 'The car has been deleted successfully!');

    }
}
