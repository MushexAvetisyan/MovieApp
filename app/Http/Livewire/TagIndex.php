<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class TagIndex extends Component
{
    public $showTagModal = false;

    /**
     * @return void
     */
    public function showCreateModal()
    {
        $this->showTagModal = true;
    }

    /**
     * @return void
     */
    public function closeTagModal()
    {
        $this->showTagModal = false;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.tag-index');
    }
}
