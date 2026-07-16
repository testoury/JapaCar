<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CarEditForm extends Component
{
    use WithFileUploads;
    #[Validate(['required', 'string', 'min:2', 'max:10'])]
    public $brand;

    #[Validate(['required', 'string', 'min:2', 'max:20'])]
    public $model;

    #[Validate(['required', 'string', 'min:2', 'max:15'])]
    public $engine;


    #[Validate(['required', 'integer', 'digits:4', 'min:1940', 'max:2026'])]
    public $year;
    #[Validate(['required', 'integer', 'digits_between:1,4', 'min:1' , 'max:2978'])]
    public $hp;


    #[Validate(['string', 'max:300'])]
    public $description;

    #[Validate(['required', 'image'])]
    public $image;

    public Car $car;
    public function mount($car)
    {
        $this->car = $car;
        $this->brand = $car->brand;
        $this->model = $car->model;
        $this->engine = $car->engine;
        $this->year = $car->year;
        $this->hp = $car->hp;
        $this->description = $car->description;
        $this->image = $car->image;

    }
    public function update(){

        $imagePath = $this->car->image;
        if ($this->image && !is_string($this->image)) {
            $imagePath = $this->image->store('cars', 'public');
        }
        $this->car->update([
            'brand' => $this->brand,
            'model' => $this->model,
            'engine' => $this->engine,
            'year' => $this->year,
            'hp' => $this->hp,
            'description' => $this->description,
            'image' => $imagePath,
        ]);
        session()->flash('success', ' LEGENDARY has been Updated successfully!');
        return redirect()->route('car.index');
    }
    public function render()
    {
        return view('livewire.car-edit-form');
    }
}
