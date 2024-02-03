<?php

namespace App\Dto;

use App\Enums\PosisiTipe;
use Carbon\Carbon;

class Profil
{
    public int $nomorUrut;
    public string $namaLengkap;
    public PosisiTipe $posisi;
    public string $tempatLahir;
    public Carbon $tanggalLahir;
    public int $usia;

    /**
     * @var array<Karir>
     */
    public array $karir;

    public function __construct(
        int $nomorUrut,
        string $namaLengkap,
        PosisiTipe $posisi,
        string $tempatLahir,
        Carbon $tanggalLahir,
        int $usia,
        array $karir
    ) {
        $this->nomorUrut = $nomorUrut;
        $this->namaLengkap = $namaLengkap;
        $this->posisi = $posisi;
        $this->tempatLahir = $tempatLahir;
        $this->tanggalLahir = $tanggalLahir;
        $this->usia = $usia;
        $this->karir = $karir;
    }
}
