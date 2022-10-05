<?php

namespace App\Tasks;

use App\Models\Cliente\Transferencia;
use Carbon\Carbon;
use App\Http\Traits\BotTrait;
use App\Http\Traits\BanxicoTrait;
use App\Http\Traits\Cliente\EstadoCuenta\EstadoCuentaPDF;
use App\Jobs\Cuenta\GenerarEstadoCuenta;
use App\Mail\TestMail;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Mail;

class EmailTask
{
    public function __invoke()
    {

        try {

            $contenido = (new TestMail());
            Mail::to('anjosusetest@gmail.com')->send($contenido);
        } catch (\Exception $e) {
            dd("error", $e->getMessage());
        }
    }
}
