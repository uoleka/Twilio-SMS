<?php

namespace App\Http\Livewire;
use App\Models\Sms;
use Livewire\Component;
use Livewire\WithPagination;

class Smsshow extends Component
{
    use WithPagination;

    public $sortBy = '';
    public $sortDirection = 'desc';

    public function render()
    {
        // query db with model
        return view('livewire.sms_show', ['smss' => Sms::latest()->paginate(10)]);
    }
}
