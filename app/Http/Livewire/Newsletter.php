<?php

namespace App\Http\Livewire;

use App\Models\Newsletter as ModelsNewsletter;
use Livewire\Component;

class Newsletter extends Component
{
    public $email;

    public $rules = [
        'email' => 'required|email|unique:newsletters'
    ];

    public function render()
    {
        return view('livewire.newsletter');
    }

    public function subscribe()
    {
        try {
            $this->validate([
                'email' => 'required|email|unique:newsletters'
            ],
        [
            'email.required'    => 'El campo email es obligatorio.',
            'email.email'       => 'El campo email debe ser un email válido.',
            'email.unique'      => 'Este email ya está suscrito.'
        ]);

            ModelsNewsletter::create([
                'email' => $this->email
            ]);
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return;
        }


        session()->flash('success', '¡Gracias por suscribirte!');

        $this->email = '';
    }
}
