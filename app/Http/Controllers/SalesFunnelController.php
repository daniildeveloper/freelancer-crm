<?php

namespace App\Http\Controllers;

use App\SalesFunnel as SF;
use App\SalesFunnelItems as SFI;

// use Illuminate\Http\Request;

class SalesFunnelController extends Controller
{
    /**
     * crete new Sales Funnel
     * @param  string $name        name
     * @param  string $description short description
     * @param  array  $items       salles funell items
     * @param  string $color       color. To see automatically how important or what for is it.
     * @return none              none
     */
    public function newSF($name, $description, $items = [], $color = '#ffffff')
    {
        $sf                    = new SF();
        $sf->name              = $name;
        $sf->short_description = $description;
        $sf->color             = $color;
        $sf->save();

        //in frontend sales funnel must be generated with items.
        if ($items !== []) {
            foreach ($items as $item) {
                //crete each item
                $sfi                    = new SFI();
                $sfi->sf_id             = SF::where('name', $name)->first();
                $sfi->type              = $item->type;
                $sfi->header            = $item->header;
                $sfi->short_description = $item->short_description;
                $sfi->color             = $item->color;
                $sfi->serial            = $item->serial;
                $sfi->save();
            }
        }
    }

    /**
     * to update
     * @param  [type] $sf_id             [description]
     * @param  [type] $type              [description]
     * @param  [type] $header            [description]
     * @param  [type] $short_description [description]
     * @param  [type] $color             [description]
     * @param  [type] $serial            [description]
     * @return [type]                    [description]
     */
    public function newSFI($sf_id, $type, $header, $short_description, $color, $serial)
    {
        $sfi                   = new SFI();
        $sfi->sd_id            = $sf_id;
        $sf->type              = $type;
        $sf->header            = $header;
        $sf->short_description = $short_description;
        $sf->color             = $color;
        $sf->serial            = $serial;
        $sf->save();
    }

    /**
     * update items. Like trello cards
     * @param  integer $id       items id
     * @param  array $toUpdate assocciative array to update items like carts
     *     
     **/
    public function updateSFI($id, $toUpdate)
    {
        DB::table('sales_funnel_items')->where('id', $id)->update($toUpdate);
    }
}
