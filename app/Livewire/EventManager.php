<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;

class EventManager extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id';
    public $sortAsc = true;
    


    public function render()
    {
        $events = Event::search($this->search)->paginate(10); 
            // dd($events);

        return view('livewire.event-manager', [
            'events' => $events
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
            $this->sortField = $field;
        }
    }

    public function deleteEvent(Event $event)
    {
        $event->delete();
        session()->flash('message', 'Event deleted successfully');
    }

}