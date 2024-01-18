<?php

namespace App\Services;

use Davaxi\Sparkline;

class SparklineService
{
    public function generateSparkline(array $data): string
    {
        $sparkline = new Sparkline;
        $sparkline->deactivateBackgroundColor();
        $sparkline->setLineThickness(2.5);
        $sparkline->setFillColorHex('#7dd3fc');
        $sparkline->setLineColorHex('#0ea5e9');
        $sparkline->setData($data);
        
        return $sparkline->toBase64();
    }
}