<?php
//BindEvents Method @1-FAEF21D8
function BindEvents()
{
    global $notificationsmsservice;
}
//End BindEvents Method

//notificationsmsservice_NotificationProtocol_BeforeShow @24-7C376A1B
function notificationsmsservice_NotificationProtocol_BeforeShow(& $sender)
{
    $notificationsmsservice_NotificationProtocol_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $notificationsmsservice; //Compatibility
//End notificationsmsservice_NotificationProtocol_BeforeShow

//Custom Code @33-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close notificationsmsservice_NotificationProtocol_BeforeShow @24-BABEE315
    return $notificationsmsservice_NotificationProtocol_BeforeShow;
}
//End Close notificationsmsservice_NotificationProtocol_BeforeShow
?>
