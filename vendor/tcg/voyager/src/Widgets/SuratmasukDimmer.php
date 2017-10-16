<?php

namespace TCG\Voyager\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

use Illuminate\Support\Facades\DB;

class SuratmasukDimmer extends AbstractWidget
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
        $count = DB::table('suratmasuks')->count();
        $string = trans_choice('Surat masuk', $count);
        $desc = "Anda Memiliki ".$count." surat masuk di database. Klik Tombol di bawah ini untuk melihat semuanya.";
        $link_text = "Lihat semua surat masuk";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-mail',
            'title'  => "{$count} {$string}",
            'text'   => __($desc, ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __($link_text),
                'link' => route('voyager.suratmasuks.index'),
            ],
            'image' => asset('images/06-1.jpg'),
        ]));
    }
}
