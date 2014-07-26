<?php
//BindEvents Method @1-8072C0BB
function BindEvents()
{
    global $notificationgrid;
    global $notificationtextedit;
    $notificationgrid->CCSEvents["BeforeShowRow"] = "notificationgrid_BeforeShowRow";
    $notificationtextedit->CCSEvents["BeforeInsert"] = "notificationtextedit_BeforeInsert";
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

//notificationtextedit_BeforeInsert @93-4308E6A2
function notificationtextedit_BeforeInsert(& $sender)
{
    $notificationtextedit_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $notificationtextedit; //Compatibility
//End notificationtextedit_BeforeInsert

//Custom Code @154-2A29BDB7
// -------------------------
     $Component->Attributes->SetValue("style", "display:");
// -------------------------
//End Custom Code

//Close notificationtextedit_BeforeInsert @93-4351FEB1
    return $notificationtextedit_BeforeInsert;
}
//End Close notificationtextedit_BeforeInsert
?>
