<?php
//BindEvents Method @1-00F75964
function BindEvents()
{
    global $countries_districts_facil;
    global $CCSEvents;
    $countries_districts_facil->s_province_ProvinceID->CCSEvents["BeforeShow"] = "countries_districts_facil_s_province_ProvinceID_BeforeShow";
    $countries_districts_facil->s_districts_DistrictID->CCSEvents["BeforeShow"] = "countries_districts_facil_s_districts_DistrictID_BeforeShow";
}
//End BindEvents Method

//countries_districts_facil_s_province_ProvinceID_BeforeShow @91-5859A987
function countries_districts_facil_s_province_ProvinceID_BeforeShow(& $sender)
{
    $countries_districts_facil_s_province_ProvinceID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $countries_districts_facil; //Compatibility
//End countries_districts_facil_s_province_ProvinceID_BeforeShow

//Close countries_districts_facil_s_province_ProvinceID_BeforeShow @91-379A4FF0
    return $countries_districts_facil_s_province_ProvinceID_BeforeShow;
}
//End Close countries_districts_facil_s_province_ProvinceID_BeforeShow

//countries_districts_facil_s_districts_DistrictID_BeforeShow @92-FC76F2E7
function countries_districts_facil_s_districts_DistrictID_BeforeShow(& $sender)
{
    $countries_districts_facil_s_districts_DistrictID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $countries_districts_facil; //Compatibility
//End countries_districts_facil_s_districts_DistrictID_BeforeShow

//Close countries_districts_facil_s_districts_DistrictID_BeforeShow @92-4EF758D2
    return $countries_districts_facil_s_districts_DistrictID_BeforeShow;
}
//End Close countries_districts_facil_s_districts_DistrictID_BeforeShow

//Page_BeforeInitialize @1-C3D173DB
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $notifications_settings_maint; //Compatibility
//End Page_BeforeInitialize

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize

?>
