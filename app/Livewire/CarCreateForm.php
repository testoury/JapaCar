<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CarCreateForm extends Component
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

    #[Validate(['required', 'integer', 'digits_between:1,4', 'min:50', 'max:2978'])]
    public $hp;

    #[Validate(['nullable', 'string', 'max:300'])]
    public $description;

    #[Validate('image|max:2048')]
    public $image;

    public array $selectedTags = [];

    // 1. This array will ONLY hold the checkbox IDs you select (e.g., [2, 3, 5])

    public function store()
    {
        $this->validate();
        // dd($this->all());
        // 2. Create the car record first (WITHOUT 'tags' inside the array!)
        $car = Car::create([
            'brand' => $this->brand,
            'model' => $this->model,
            'engine' => $this->engine,
            'year' => $this->year,
            'hp' => $this->hp,
            'description' => $this->description,
            'image' => $this->image ? $this->image->store('cars', 'public') : null,
            'user_id' => Auth::user()->id
        ]);

        // 3. The Pivot Matrix Handshake!
        // This links the selected checkbox IDs directly into the car_tag table automatically!
        $car->tags()->attach($this->selectedTags);
        $this->inputReset();
        session()->flash('success', 'New LEGENDARY has been added successfully!');
        return redirect()->route('car.index');
    }

    public function inputReset()
    {
        $this->brand = '';
        $this->model = '';
        $this->engine = '';
        $this->year = '';
        $this->hp = '';
        $this->description = '';
        $this->image = '';

    }

    public function render()
    {
        $tags = Tag::all();
     return view('livewire.car-create-form', compact('tags'));
}
}
