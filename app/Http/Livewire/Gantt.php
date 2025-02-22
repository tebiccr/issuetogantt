<?php

namespace App\Http\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;
use App\Models\Issue;

class Gantt extends Component
{
    public $resources = '';
    public $events = '';

    public function getEvents()
    {
        debug('getevents');
        $issues = Issue::getAll();
        $this->resources = json_encode($issues['resources']);
        $this->events = json_encode($issues['events']);
        debug($this->events);
    }

    public function eventDrop($event, $oldEvent)
    {
        debug("eventDrop");
        Issue::updateEvent($event);  
    }

    public function eventResize($event, $oldEvent)
    {
        debug("eventResize");
        Issue::updateEvent($event);
    }

    public function mount()
    {
        $this->getEvents();
    }

    public function render()
    {
        return view('livewire.gantt');
    }
}
