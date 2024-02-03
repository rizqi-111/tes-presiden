<?php

namespace App\Dto;

class Karir
{
    public string $jabatan;
    public int $tahunMulai;
    public int|null $tahunSelesai;

    public function __construct(string $jabatan, int $tahunMulai, int $tahunSelesai = null) {
        $this->jabatan = $jabatan;
        $this->tahunMulai = $tahunMulai;
        $this->tahunSelesai = $tahunSelesai;
    }
}
