<?php

namespace App\Filament\Widgets;

use App\Models\Cat;
use Filament\Widgets\ChartWidget;

class CatinfoChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Cats Status';
    protected static ?int $sort = 1;


    protected function getData(): array
    { // Mengambil jumlah kucing berdasarkan status menggunakan Eloquent
        $adoptedCount = Cat::where('status', 'adopted')->count();
        $availableCount = Cat::where('status', 'available')->count();
        $pendingCount = Cat::where('status', 'pending')->count();

        // Data yang dikembalikan dalam format sesuai dengan chart
        return [
            'datasets' => [
                [
                    'label' => 'Kucing Status',
                    'data' => [$availableCount, $pendingCount, $adoptedCount],  // Menyesuaikan dengan data
                    'backgroundColor' => [
                        '#36A2EB', // Available (Hijau Muda)
                        '#FFCE56', // Pending (Kuning)
                        '#FF6384', // Adopted (Merah Muda)
                    ],
                    'borderColor' => [
                        '#36A2EB', // Available border (Hijau Muda)
                        '#FFCE56', // Pending border (Kuning)
                        '#FF6384', // Adopted border (Merah Muda)
                    ],
                ],
            ],
            'labels' => ['Available', 'Pending', 'Adopted'],  // Label sesuai status
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
