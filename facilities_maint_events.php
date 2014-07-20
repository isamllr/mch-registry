<?php
//BindEvents Method @1-14CB93F1
function BindEvents()
{
    global $facilities;
    global $countries_districts_facil;
    global $CCSEvents;
    $facilities->DistrictID->CCSEvents["BeforeShow"] = "facilities_DistrictID_BeforeShow";
    $facilities->ProvinceID->CCSEvents["BeforeShow"] = "facilities_ProvinceID_BeforeShow";
    $countries_districts_facil->s_province_ProvinceID->CCSEvents["BeforeShow"] = "countries_districts_facil_s_province_ProvinceID_BeforeShow";
    $countries_districts_facil->s_districts_DistrictID->CCSEvents["BeforeShow"] = "countries_districts_facil_s_districts_DistrictID_BeforeShow";
}
//End BindEvents Method

//facilities_DistrictID_BeforeShow @122-33B1C7A2
function facilities_DistrictID_BeforeShow(& $sender)
{
    $facilities_DistrictID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $facilities; //Compatibility
//End facilities_DistrictID_BeforeShow

//Close facilities_DistrictID_BeforeShow @122-7877A243
    return $facilities_DistrictID_BeforeShow;
}
//End Close facilities_DistrictID_BeforeShow

//facilities_ProvinceID_BeforeShow @125-A8F302A2
function facilities_ProvinceID_BeforeShow(& $sender)
{
    $facilities_ProvinceID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $facilities; //Compatibility
//End facilities_ProvinceID_BeforeShow

//Close facilities_ProvinceID_BeforeShow @125-F660287D
    return $facilities_ProvinceID_BeforeShow;
}
//End Close facilities_ProvinceID_BeforeShow

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

//Page_BeforeInitialize @1-95E27421
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $facilities_maint; //Compatibility
//End Page_BeforeInitialize

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize


?>
