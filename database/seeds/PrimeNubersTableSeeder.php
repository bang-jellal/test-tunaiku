<?php

use Illuminate\Database\Seeder;

class PrimeNubersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\PrimeNumber::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i=1;$i<=1000000;$i++) {
            $a = 0;
            for ($j=1;$j<=$i;$j++) {
                if ($i % $j == 0) {
                    $a++;
                }
            }
            if ($a == 2) {
                $item = new \App\PrimeNumber();
                $item->number = $i;
                $item->name_number = ucwords($this->getText($i));
                $item->save();
            }
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
