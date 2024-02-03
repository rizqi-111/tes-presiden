<?php

namespace App\Console\Commands;

use App\Services\HomeServices;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class Capresku extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'capresku';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $header = ['Nomor', 'Calon Presiden', 'Calon Wakil Presiden'];
        $rows = [];
        $data = (new HomeServices())->getData();

        $capres = $data['capres'];
        $cawapres = $data['cawapres'];

        for ($i = 0; $i <= 2; $i++) {
            $karirCapres = "";

            foreach ($capres[$i]->karir as $item) {
                $karirCapres .= $item->jabatan .
                    "(" . $item->tahunMulai .
                    ($item->tahunSelesai ? "-" . $item->tahunSelesai : "")  . ") \n";
            }

            $karirCawapres = "";

            foreach ($cawapres[$i]->karir as $item) {
                $karirCawapres .= $item->jabatan .
                    "(" . $item->tahunMulai .
                    ($item->tahunSelesai ? "-" . $item->tahunSelesai : "")  . ") \n";
            }

            $row = [
                $capres[$i]->nomorUrut,
                $capres[$i]->namaLengkap . "\n" .
                $capres[$i]->tempatLahir . ', ' . $capres[$i]->tanggalLahir->format('j F Y') . "\n" .
                "Karir: \n" . $karirCapres,
                $cawapres[$i]->namaLengkap . "\n" .
                $cawapres[$i]->tempatLahir . ', ' . $cawapres[$i]->tanggalLahir->format('j F Y') . "\n" .
                "Karir: \n" . $karirCawapres
            ];

            $rows[] = $row;
        }

        $this->table($header, $rows);

        return CommandAlias::SUCCESS;
    }
}
