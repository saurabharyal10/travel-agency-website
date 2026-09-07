<?php

namespace App\Http\Controllers;

use App\Models\InfoPage;
use Illuminate\View\View;

class InfoPageController extends Controller
{
    public function show(string $slug): View
    {
        $page = InfoPage::published()->where('slug', $slug)->first();

        abort_unless($page, 404);

        return view('info-page', ['page' => $page]);
    }
}
