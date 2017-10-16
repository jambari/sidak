<?php

namespace TCG\Voyager\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

use Illuminate\Support\Facades\DB;

class SuratkepDimmer extends AbstractWidget
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
        $count = DB::table('suratkeps')->count();
        $string = trans_choice('SK', $count);
        $desc = "Anda Memiliki ".$count." SK di database. Klik Tombol di bawah ini untuk melihat semuanya.";
        $link_text = "Lihat semua SK";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-paperclip',
            'title'  => "{$count} {$string}",
            'text'   => __($desc, ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __($link_text),
                'link' => route('voyager.suratkeps.index'),
            ],
            'image' => asset('images/08-1.jpg'),
        ]));
    }
}
