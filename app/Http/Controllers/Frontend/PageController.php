<?php


namespace App\Http\Controllers\Frontend;

use Backpack\PageManager\app\Models\Page;
use App\Http\Controllers\Controller;

/**
 * Class PageController
 * @package App\Http\Controllers\Frontend
 */
class PageController extends Controller
{
    public function index($slug, $subs = null)
    {
        $page = Page::findBySlug($slug);

        if (!$page)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }

        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();

        return view('pages.'.$page->template, $this->data);
    }
}
