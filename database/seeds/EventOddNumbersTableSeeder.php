<?php

use Illuminate\Database\Seeder;

class EventOddNumbersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\EventOddNumber::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $odds   = [];
        $events = [];

        for ($i = 1; $i <= 1000000; $i++) {
            if ($i % 2 == 0)
                $odds[] = $i;
            else
                $events[] = $i;
        }

        foreach ($odds as $key => $odd) {
            $item = new \App\EventOddNumber();
            $item->number_odd     = $odd;
            $item->number_event   = $event = $events[$key];
            $item->total = $total = $odd + $event;
            $item->name_total     = ucwords($this->getText($total));
            $item->save();
        }
    }


    public function getText($x)
    {
        $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12)
            return " " . $abil[$x];
        elseif ($x < 20)
            return  $this->getText($x - 10) . " belas";
        elseif ($x < 100)
            return $this->getText($x / 10) . " puluh" .  $this->getText($x % 10);
        elseif ($x < 200)
            return " seratus" .  $this->getText($x - 100);
        elseif ($x < 1000)
            return  $this->getText($x / 100) . " ratus" .  $this->getText($x % 100);
        elseif ($x < 2000)
            return " seribu" .  $this->getText($x - 1000);
        elseif ($x < 1000000)
            return  $this->getText($x / 1000) . " ribu" .  $this->getText($x % 1000);
        elseif ($x < 1000000000)
            return  $this->getText($x / 1000000) . " juta" .  $this->getText($x % 1000000);
    }
}
