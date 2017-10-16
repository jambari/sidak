<?php

namespace TCG\Voyager\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

use Illuminate\Support\Facades\DB;

class PegawaiDimmer extends AbstractWidget
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
        $count = DB::table('pegawais')->count();
        $string = trans_choice('Pegawai', $count);
        $desc = "Anda Memiliki ".$count." pegawai di database. Klik Tombol di bawah ini untuk melihat semuanya.";
        $link_text = "Lihat semua pegawai";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-people',
            'title'  => "{$count} {$string}",
            'text'   => __($desc, ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __($link_text),
                'link' => route('voyager.pegawais.index'),
            ],
            'image' => asset('images/11-1.jpg'),
        ]));
    }
}
