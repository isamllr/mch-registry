<?php
//BindEvents Method @1-9351AFA1
function BindEvents()
{
    global $test_testcode;
    $test_testcode->test_testcode_TotalRecords->CCSEvents["BeforeShow"] = "test_testcode_test_testcode_TotalRecords_BeforeShow";
    $test_testcode->CCSEvents["BeforeShowRow"] = "test_testcode_BeforeShowRow";
}
//End BindEvents Method

//test_testcode_test_testcode_TotalRecords_BeforeShow @20-EF1267DF
function test_testcode_test_testcode_TotalRecords_BeforeShow(& $sender)
{
    $test_testcode_test_testcode_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $test_testcode; //Compatibility
//End test_testcode_test_testcode_TotalRecords_BeforeShow

//Retrieve number of records @21-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close test_testcode_test_testcode_TotalRecords_BeforeShow @20-88A82EA3
    return $test_testcode_test_testcode_TotalRecords_BeforeShow;
}
//End Close test_testcode_test_testcode_TotalRecords_BeforeShow

//test_testcode_BeforeShowRow @16-5553A4FF
function test_testcode_BeforeShowRow(& $sender)
{
    $test_testcode_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $test_testcode; //Compatibility
//End test_testcode_BeforeShowRow

//Set Row Style @25-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close test_testcode_BeforeShowRow @16-CD2BBB84
    return $test_testcode_BeforeShowRow;
}
//End Close test_testcode_BeforeShowRow


?>
