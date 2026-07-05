<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;

class PrintController extends Controller
{
    function printExample(){
        $nimpresora = "XP-80";
        $connector = new WindowsPrintConnector($nimpresora);
        $impresora = new Printer($connector);

        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setTextSize(1, 2);
        $impresora->text("Prueba satisfactoria :D\n");
            
        $impresora->feed(3);
        $impresora->cut();
        $impresora->pulse();
        $impresora->close();
    }
}
