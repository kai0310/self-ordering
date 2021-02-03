<?php

namespace Revolution\Ordering\Menu;

use Illuminate\Support\Collection;
use Revolution\Ordering\Contracts\Menu\MenuDriver;

class GoogleSheetsDriver implements MenuDriver
{
    /**
     * @return mixed
     */
    public function get()
    {
        $sheets = app('ordering.google.sheets');

        $values = collect($sheets->spreadsheets_values->get(
            config('ordering.menu.google-sheets.spreadsheets'),
            config('ordering.menu.google-sheets.menus_sheet')
        )->values);

        $header = $values->pull(0);

        return $values->map(function ($item) use ($header) {
            $row = Collection::wrap($item)->pad(count($header), null);

            return collect($header)->combine($row)->toArray();
        })->values();
    }
}