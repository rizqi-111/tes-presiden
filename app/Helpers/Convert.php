<?php

namespace App\Helpers;

use App\Dto\Karir;
use App\Dto\Profil;
use App\Enums\PosisiTipe;
use Carbon\Carbon;

class Convert
{
    public function parseMonth(string $month): string
    {
        $months = [
            'Januari' => 'January',
            'Februari' => 'February',
            'Maret' => 'March',
            'April' => 'April',
            'Mei' => 'May',
            'Juni' => 'June',
            'Juli' => 'July',
            'Agustus' => 'August',
            'September' => 'September',
            'Oktober' => 'October',
            'November' => 'November',
            'Desember' => 'December'
        ];

        return $months[$month];
    }

    public function parseTanggalLahir(string $tanggal): bool|Carbon
    {
        $splitTanggal = explode(' ', $tanggal);
        $bulan = $this->parseMonth($splitTanggal[1]);
        $splitTanggal[1] = $bulan;

        return Carbon::createFromFormat('j F Y', implode(" ", $splitTanggal));
    }

    public function hitungUmur(Carbon $tangalLahir): int
    {
        $now = Carbon::now();
        return $tangalLahir->diffInYears($now);
    }

    public function parseKarir(array $karir): array
    {
        $arr = [];
        foreach ($karir as $item) {
            $splitKarir = explode('(', $item);
            $splitTahun = explode('-', $splitKarir[1]);
            $tahunMulai = (int)$splitTahun[0];

            $tahunSelesai = null;
            if (isset($splitTahun[1])) {
                if ($splitTahun[1] !== 'Sekarang)') {
                    $tahunSelesai = (int)str_replace(')', '', $splitTahun[1]);
                } else {
                    $tahunSelesai = 2024;
                }
            }

            $arr[] = new Karir(
                $splitKarir[0],
                $tahunMulai,
                $tahunSelesai
            );
        }

        return $arr;
    }

    public function parseDataToDto(array $orang, bool $isPresiden = true): Profil
    {
        $splitTtl = explode(',', $orang['tempat_tanggal_lahir']);

        $tanggal = $this->parseTanggalLahir(trim($splitTtl[1], ' '));

        $usia = $this->hitungUmur($tanggal);

        return new Profil(
            $orang['nomor_urut'],
            $orang['nama_lengkap'],
            $isPresiden ? new PosisiTipe(PosisiTipe::CAPRES) : new PosisiTipe(PosisiTipe::CAWAPRES),
            $splitTtl[0],
            $tanggal,
            $usia,
            $this->parseKarir($orang['karir'])
        );
    }
}
