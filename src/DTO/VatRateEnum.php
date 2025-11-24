<?php

namespace DarkDarin\VkOrdSdk\DTO;

enum VatRateEnum: string
{
    case WithoutVat = 'without_vat';
    case Vat0 = '0';
    case Vat5 = '5';
    case Vat7 = '7';
    case Vat10 = '10';
    case Vat20 = '20';
}
