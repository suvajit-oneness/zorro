<?php

function helperFunction($d, $forWhom)
{
    $actualPrice = 0;
    if($forWhom == 'cost') {
        $pricingBracket = \App\Model\PricingBracket::orderBy('upper','ASC')->get();
    } elseif($forWhom == 'riderFee') {
        $pricingBracket = \App\Model\RiderFee::orderBy('upper','ASC')->get();
    }
    // foreach($pricingBracket as $pc){
    //     $totalDistance = $pc->upper - $pc->lower;
    //     if($d >= $totalDistance){
    //         $actualPrice += $totalDistance * $pc->cost;
    //         $d -= $totalDistance;
    //     }elseif($d<=$totalDistance){
    //         $actualPrice += $d * $pc->cost;
    //         $d = 0;
    //     }elseif($d<=0){
    //         break;
    //     }
    // }
    foreach($pricingBracket as $key => $pc){
        $d = abs($d);
        if($d >= $pc->lower) {
            $actualPrice = $pc->cost;
        }
    }
    return round($actualPrice);
}

function randomGenerator()
{
    return uniqid().''.date('ymdhis').''.uniqid();
}

?>