<?php
//BindEvents Method @1-ABC00F16
function BindEvents()
{
    global $notificationgrid;
    $notificationgrid->CCSEvents["BeforeShowRow"] = "notificationgrid_BeforeShowRow";
}
//End BindEvents Method

//notificationgrid_BeforeShowRow @78-69E593A6
function notificationgrid_BeforeShowRow(& $sender)
{
    $notificationgrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $notificationgrid; //Compatibility
//End notificationgrid_BeforeShowRow

//Set Row Style @84-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close notificationgrid_BeforeShowRow @78-6829C06A
    return $notificationgrid_BeforeShowRow;
}
//End Close notificationgrid_BeforeShowRow
?>
