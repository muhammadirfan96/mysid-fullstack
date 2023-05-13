<?php

namespace App\Libraries;

use App\Models\DesasModel;

class GetDesa
{
    public function currDesa($id)
    {
        $desa = new DesasModel();
        return $desa->find($id);
    }
}
