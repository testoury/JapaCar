<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarShow extends Component
{

    // Proprietà pubblica che conterrà i dati dell'auto accessibili nella vista
    public Car $car;


    // Il metodo mount riceve l'auto passata dalla rotta tramite il binding automatico

    public function render()
    {
        return view('livewire.car-show' );
    }
    public function delete($id)
    {
        $car = Car::find($id);
        $car->delete();
        session()->flash('success', 'The car has been deleted successfully!');
        return redirect()->route('car.index');

    }
}
