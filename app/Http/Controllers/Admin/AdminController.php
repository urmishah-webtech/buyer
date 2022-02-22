<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\BdtdcSupplierQuery;
use App\Model\Module;
use App\Model\BdtdcProduct;
use App\Model\BdtdcProductDescription;
use App\Model\BdtdcOrder;
use App\Model\BdtdcOrderDetails;

class AdminController extends Controller
{
    public function __construct()
    {
        ini_set('memory_limit', '9999999M');
    }

    public function getHome()
    {
        $mostsellingproduct = DB::table('bdtdc_product_description')->JOIN('bdtdc_order_details', 'bdtdc_product_description.product_id', '=', 'bdtdc_order_details.product_id')
            ->JOIN('bdtdc_product_images', 'bdtdc_product_images.product_id', '=', 'bdtdc_product_description.product_id')
            ->JOIN('bdtdc_product_prices', 'bdtdc_product_prices.product_id', '=', 'bdtdc_product_description.product_id')
            ->selectRaw('bdtdc_product_description.*,bdtdc_product_images.image,bdtdc_product_prices.product_MOQ,bdtdc_product_prices.product_FOB')
            ->groupBy('bdtdc_product_description.product_id')
            ->orderBy('bdtdc_product_description.product_id','desc')
            ->take(10)
            ->get();

        $mostsellingcategory = DB::table('bdtdc_product_description')->JOIN('bdtdc_order_details', 'bdtdc_product_description.product_id', '=', 'bdtdc_order_details.product_id')
            ->JOIN('bdtdc_product_to_category', 'bdtdc_product_to_category.product_id', '=', 'bdtdc_product_description.product_id')
            ->JOIN('bdtdc_category_description', 'bdtdc_category_description.category_id', '=', 'bdtdc_product_to_category.category_id')
            ->selectRaw('bdtdc_product_description.*')
            ->selectRaw('count(bdtdc_order_details.product_id) as total')
            ->groupBy('bdtdc_product_description.name')
            ->orderBy('total','desc')
            ->take(13)
            ->get();

        $mostsellingstock = DB::table('bdtdc_product_description')->JOIN('bdtdc_order_details', 'bdtdc_product_description.product_id', '=', 'bdtdc_order_details.product_id')
            ->JOIN('bdtdc_product_to_category', 'bdtdc_product_to_category.product_id', '=', 'bdtdc_product_description.product_id')
            ->JOIN('bdtdc_category_description', 'bdtdc_category_description.category_id', '=', 'bdtdc_product_to_category.category_id')
            ->selectRaw('bdtdc_product_description.*')
            ->selectRaw('sum(bdtdc_order_details.quantity) as total')
            ->groupBy('bdtdc_product_description.name')
            ->orderBy('total','desc')
            ->take(13)
            ->get();
         $count =  DB::select("SELECT FOUND_ROWS() as `row_count`")[0]->row_count;

        $content = 'User Management';
        $contentdetail = Module::where('name', 'User Management')->get();
        return view('protected.admin.admin_dashboard', compact('content', 'contentdetail', 'mostsellingproduct', 'mostsellingcategory','mostsellingstock'));
    }
    public function getcontent($content)
    {
        $contentdetail = Module::where('name', $content)->get();
        session()
            ->put('content', $content);
        return view('protected.admin.admin_dashboard', compact('content', 'contentdetail'));
    }
    public function ManageBuyingRequest()
    {
        $data['bdtdc_supllier_inqueries_all'] = BdtdcSupplierQuery::with(['BdtdcSupplierQueryProduct', 'BdtdcSupplierQueryProductImage', 'BdtdcSupplierQueryProductUnit', 'BdtdcInqueryMessage'])->where('is_RFQ', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('protected.admin.myB2B.buying-request', $data);
    }
}

