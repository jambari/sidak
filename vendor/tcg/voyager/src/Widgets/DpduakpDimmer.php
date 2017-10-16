<?php

namespace TCG\Voyager\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

use Illuminate\Support\Facades\DB;

class DpduakpDimmer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = DB::table('dpduakps')->count();
        $string = trans_choice('DP2KP', $count);
        $desc = "Anda Memiliki ".$count." DP2KP di database. Klik Tombol di bawah ini untuk melihat semuanya.";
        $link_text = "Lihat semua DP2KP";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-file-text',
            'title'  => "{$count} {$string}",
            'text'   => __($desc, ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __($link_text),
                'link' => route('voyager.dpduakps.index'),
            ],
            'image' => asset('images/12-1.jpg'),
        ]));
    }
}
