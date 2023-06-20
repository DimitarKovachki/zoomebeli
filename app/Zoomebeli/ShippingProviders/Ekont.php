<?php

namespace App\Zoomebeli\ShippingProviders;

class Ekont
{
    const EKONT_ADDITION_ADDRESS_PER_KG_FOR_WEIGHT_RANGE_20_50 = 0.67;
    const EKONT_ADDITION_OFFICE_PER_KG_FOR_WEIGHT_RANGE_20_50 = 0.54;
    public static function getPriceForWeight($weight, $shipping_type, $products_price)
    {
        $return = false;
        $weightinkg = $weight;
        $pricingTable = self::getPricingTableUntil20kg($shipping_type);
        // dd($shipping_type);
        if ($weightinkg < 20) {
            $weightinkg = $weightinkg == 0 ? 0.01 : $weightinkg;
            foreach ($pricingTable as $kg_range => $price) {
                [$from, $to] = explode('-', $kg_range, 2);
                $from += 0.001;
                if (
                    $weightinkg >= floatval($from) &&
                    $weightinkg <= floatval($to)
                ) {
                    $return = $price;
                    break;
                }
            }
        } else {
            $base = $pricingTable['15-20'];
            $addition_per_kg = $shipping_type == 'address'
                ? self::EKONT_ADDITION_ADDRESS_PER_KG_FOR_WEIGHT_RANGE_20_50
                : self::EKONT_ADDITION_OFFICE_PER_KG_FOR_WEIGHT_RANGE_20_50;
            $addition = ceil($weightinkg - 20) * $addition_per_kg;
            $return =  $base + $addition;
        }
        $priceAddition = self::getPriceAdditionForCOD($shipping_type, $products_price);
        return ($return + $priceAddition);

    }

    public static function getPriceAdditionForCOD($shipping_type,$products_price) {
        if($shipping_type == 'address') {
           return $products_price * 0.0242;
        } elseif($shipping_type == 'office') {
            return $products_price * 0.0121;
        }
    }

    public static function getPricingTableUntil20kg($shipping_type)
    {
        /* Да се сложи 2.42 процента надценка на продуктите без сумата за доставка */
        if ($shipping_type == 'address') {
            return [
                '0-1' => 6.36,
                '1.1-2' => 7.88,
                '2.1-5' => 10.00,
                '5.1-10' => 14.85,
                '10.1-15' => 20.00,
                '15.1-20' => 23.33,
            ];
            
        /* Да се сложи 1.21 процента надценка на продуктите без сумата за доставка */
        } elseif ($shipping_type == 'office') {
            return [
                '0-1' => 5.05,
                '1.1-2' => 5.56,
                '2.1-5' => 6.06,
                '5.1-10' => 9.70,
                '10.1-15' => 10.91,
                '15.1-20' => 13.33,
            ];
        }
    }
}
