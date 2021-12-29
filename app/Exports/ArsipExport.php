<?php

namespace App\Exports;

use App\Model\Arsip;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ArsipExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Arsip::with(['bentuk','keterangan','tingkatperkembangan'])->get();
    }

      public function map($arsip): array
    {
        return [
            $arsip->id,
            $arsip->indeks,
            $arsip->deskripsi,
            $arsip->tahun,
            $arsip->tingkatperkembangan->nama_tingkat_perkembangan,
            $arsip->jumlah,
            $arsip->bentuk->nama_bentuk,
            $arsip->rak,
            $arsip->roll_o_pack,
            $arsip->boks,
            $arsip->bungkus,
            $arsip->buku,
            $arsip->sampul,
            $arsip->keterangan->nama_keterangan,
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Indeks',
            'Deskripsi Arsip',
            'Waktu',
            'Tingkat Perkembangan',
            'Jumlah',
            'Bentuk',
            'Rak',
            'Roll O Pack',
            'Boks',
            'Bungkus',
            'Buku',
            'Sampul',
            'Keterangan',
        ];
    }
}

