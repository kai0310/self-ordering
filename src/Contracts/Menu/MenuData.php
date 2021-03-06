<?php

namespace Revolution\Ordering\Contracts\Menu;

use Illuminate\Support\Collection;

interface MenuData
{
    /**
     * @return array|Collection|mixed
     */
    public function __invoke();
}
