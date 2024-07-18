<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\EventResource;
use App\Models\Event;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Data\EventData;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    public function fetchEvents(array $fetchInfo): array
    {
        return Event::query()
            ->where('start_at', '>=', $fetchInfo['start'])
            ->where('end_at', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn (Event $event) => [
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => $event->start_at,
                    'color' => $event->color,
                    'end' => $event->end_at,
                    'url' => EventResource::getUrl(name: 'edit', parameters: ['record' => $event]),
                    'shouldOpenUrlInNewTab' => false
                ]
            )
            ->all();
    }

    public function config(): array
    {
        return [
            'firstDay' => 1,
            'headerToolbar' => [
                'left' => 'dayGridWeek,dayGridDay',
                'center' => 'title',
                'right' => 'prev,next today',
            ],
        ];
    }
}
