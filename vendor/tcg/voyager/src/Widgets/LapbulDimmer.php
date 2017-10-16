<?php

namespace TCG\Voyager\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

use Illuminate\Support\Facades\DB;

class LapbulDimmer extends AbstractWidget
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
        $count = DB::table('lapbuls')->count();
        $string = trans_choice('Laporan Bulanan', $count);
        $desc = "Anda Memiliki ".$count." Laporan Bulanan di database. Klik Tombol di bawah ini untuk melihat semuanya.";
        $link_text = "Lihat semua Laporan Bulanan";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-documentation',
            'title'  => "{$count} {$string}",
            'text'   => __($desc, ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __($link_text),
                'link' => route('voyager.lapbuls.index'),
            ],
            'image' => asset('images/02.jpg'),
        ]));
    }
}
