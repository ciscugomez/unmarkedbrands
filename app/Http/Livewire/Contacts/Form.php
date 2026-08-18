<?php

namespace App\Http\Livewire\Contacts;

use Livewire\Component;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Form extends Component
{
    public $name            = "";
    public $phone           = "";
    public $email           = "";
    public $message         = "";
    public $accept_privacy  = false;

    protected $rules = [
        'name'              => 'required|min:2',
        'phone'             => 'nullable',
        'email'             => 'required|email',
        'message'           => 'nullable|min:10|max:500',
        'accept_privacy'    => 'required|accepted'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveContact()
    {
        try {
            $this->validate();

            $data = [
                'name'              => $this->name,
                'phone'             => $this->phone,
                'accept_privacy'    => $this->accept_privacy,
                'email'             => $this->email,
                'message'           => $this->message
            ];

            Mail::to([
                'dplanas@strategying.com',
                'fgomez@strategying.com',
            ])->send(new ContactMail('Unmarked', $data));

            $this->reset();

            session()->flash('success', 'Mensaje enviado correctamente.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            session()->flash('error', 'Ha ocurrido un error al enviar el mensaje.');
        }
    }

    public function render()
    {
        return view('livewire.contacts.form');
    }
}
