<?php

namespace TCG\Voyager\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

use Illuminate\Support\Facades\DB;

class SptDimmer extends AbstractWidget
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
        $count = DB::table('spts')->count();
        $string = trans_choice('SPT', $count);
        $desc = "Anda Memiliki ".$count." SPT di database. Klik Tombol di bawah ini untuk melihat semuanya.";
        $link_text = "Lihat semua SPT";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-external',
            'title'  => "{$count} {$string}",
            'text'   => __($desc, ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __($link_text),
                'link' => route('voyager.spts.index'),
            ],
            'image' => asset('images/07-1.jpg'),
        ]));
    }
}
