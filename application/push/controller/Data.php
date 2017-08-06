<?php
namespace app\push\controller;
use \think\Controller;
use \think\Db;

class Data extends Controller
{
    public function index()
    {
        return json_encode(Db::table('Cars')->alias('c')->field('c.PlateNumber,b.BrandName,b.BrandCode,e.NowAddress,u.CarUsageStatus,u.Id,g.Charging,g.Startup')->join('CarBrand b','c.CarBrandId = b.Id')->join('CarScheduling e','c.Id = e.CarID')->join('CarUsage u','c.Id = u.CarId')->join('CarTravelTrack g','g.CarUsageId = u.Id')->select(),JSON_UNESCAPED_UNICODE);
        //return json_encode(Db::table('Cars')->alias('c')->field('c.PlateNumber,e.NowAddress')->join('CarScheduling e','c.PlateNumber = e.CarID')->select(),JSON_UNESCAPED_UNICODE);
        //return json_encode(Db::table('Cars')->field('PlateNumber,Latitude,Longitude')->select(),JSON_UNESCAPED_UNICODE);
        //return json_encode(Db::table('Cars')->field('Id,PlateNumber,Latitude,Longitude')->select(),JSON_UNESCAPED_UNICODE);
        //return json_encode(Db::table('CarScheduling')->select(),JSON_UNESCAPED_UNICODE);
    }
}