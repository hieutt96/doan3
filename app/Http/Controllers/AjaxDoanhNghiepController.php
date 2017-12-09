<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Company;
class AjaxDoanhNghiepController extends Controller
{
   public function getDoanhNghiepTheoHocKy($hocky){
        $doanhnghiep = Company::where('hocky',$hocky)->get(); 
        foreach($doanhnghiep as $dn)
        {
            echo " <div class='sow-image-grid-image'>
            <a href= 'hop-tac-doanh-nghiep/".$dn->id."/".$dn->name."' target='_blank'><img width='150' height='150' src='upload/imgCompany/".$dn->picture."' class='attachment-thumbnail size-thumbnail'
              srcset='upload/imgCompany/".$dn->picture."' 150w, upload/imgCompany/".$dn->picture." 250w'
             sizes='(max-width: 150px) 100vw, 150px' style='display: block;'></a> </div> ";
        }
   }

}
