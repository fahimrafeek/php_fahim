<?php

$sections = [
    1 => 'Users',
    2 => 'Sales Representatives'
];

$section_permissions = [
    'App\Http\Controllers\UserController' => ['section' => 1],
    'App\Http\Controllers\SalesRepresentativeController' => ['section' => 2]
];

return [
    'sections' => $sections,
    'section_permissions' => $section_permissions
];