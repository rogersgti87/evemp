<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Menu;

class PageController extends Controller
{

    public function __construct()
    {

    }

    public function index(){

        $url = request()->segment(1);
        $menu = Menu::where('slug',$url)->first();

        if($url != null && $menu == null){
            return '404';
        } else {
            $menu_id = $url == Null ? 1 : $menu->id;
            $page = Page::where('menu_id', $menu_id)->first();
            $page_section = PageSection::where('page_id',$page->id)->get();

            foreach($page_section as $key => $result){
                if(isJSON($result->background_image) == true){
                    $page_section[$key]['background_image_thumb']    = property_exists(json_decode($result->background_image), 'thumb')    ? json_decode($result->background_image)->thumb : '';
                    $page_section[$key]['background_image_original'] = property_exists(json_decode($result->background_image), 'original') ? json_decode($result->background_image)->original : '';
                }else{
                    $page_section[$key]['background_image_thumb']    = '';
                    $page_section[$key]['background_image_original'] = '';
                }
            }




        }

        return view('front.page-'.$page->layout,compact('page','page_section'));
    }
}
