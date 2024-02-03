<?php

namespace App\Dto;

use App\Enums\PosisiTipe;
use Carbon\Carbon;

class Profil
{
    public int $nomorUrut;
    public PosisiTipe $posisi;
    public string $tempatLahir;
    public Carbon $tanggalLahir;
    public int $usia;
    public Karir $karir;

    public function __construct(
        int $nomorUrut,
        PosisiTipe $posisi,
        string $tempatLahir,
        Carbon $tanggalLahir,
        int $usia,
        Karir $karir
    ) {
        $this->nomorUrut = $nomorUrut;
        $this->posisi = $posisi;
        $this->tempatLahir = $tempatLahir;
        $this->tanggalLahir = $tanggalLahir;
        $this->usia = $usia;
        $this->karir = $karir;
    }
}
