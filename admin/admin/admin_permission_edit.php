<?php
include '../includes/session.php';
include '../includes/req_start.php';
if ($req_per == 1) {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        if (isset($_POST['invitation_view']))
            $invitation_view = 1;
        else
            $invitation_view = 0;
        if (isset($_POST['invitation_create']))
            $invitation_create = 1;
        else
            $invitation_create = 0;
        if (isset($_POST['invitation_edit']))
            $invitation_edit = 1;
        else
            $invitation_edit = 0;
        if (isset($_POST['invitation_del']))
            $invitation_del = 1;
        else
            $invitation_del = 0;
        if (isset($_POST['admin_view']))
            $admin_view = 1;
        else
            $admin_view = 0;
        if (isset($_POST['admin_create']))
            $admin_create = 1;
        else
            $admin_create = 0;
        if (isset($_POST['admin_edit']))
            $admin_edit = 1;
        else
            $admin_edit = 0;
        if (isset($_POST['admin_del']))
            $admin_del = 1;
        else
            $admin_del = 0;

        if (isset($_POST['photographer_view']))
            $photographer_view = 1;
        else
            $photographer_view = 0;
        if (isset($_POST['photographer_create']))
            $photographer_create = 1;
        else
            $photographer_create = 0;
        if (isset($_POST['photographer_edit']))
            $photographer_edit = 1;
        else
            $photographer_edit = 0;
        if (isset($_POST['photographer_del']))
            $photographer_del = 1;
        else
            $photographer_del = 0;

        if (isset($_POST['call_logs_view']))
            $call_logs_view = 1;
        else
            $call_logs_view = 0;
        if (isset($_POST['call_logs_create']))
            $call_logs_create = 1;
        else
            $call_logs_create = 0;
        if (isset($_POST['call_logs_edit']))
            $call_logs_edit = 1;
        else
            $call_logs_edit = 0;
        if (isset($_POST['call_logs_del']))
            $call_logs_del = 1;
        else
            $call_logs_del = 0;

        if (isset($_POST['admin_special']))
            $admin_special = 1;
        else
            $admin_special = 0;
        if (isset($_POST['call_logs_special']))
            $call_logs_special = 1;
        else
            $call_logs_special = 0;

        $conn = $pdo->open();
        try {
            $stmt = $conn->prepare("UPDATE admin SET admin_special=:admin_special,invitation_view=:invitation_view,invitation_create=:invitation_create,invitation_edit=:invitation_edit,invitation_del=:invitation_del,admin_view=:admin_view,admin_create=:admin_create,admin_edit=:admin_edit,admin_del=:admin_del,photographer_view=:photographer_view,photographer_create=:photographer_create,photographer_edit=:photographer_edit,photographer_del=:photographer_del,call_logs_view=:call_logs_view,call_logs_create=:call_logs_create,call_logs_edit=:call_logs_edit,call_logs_del=:call_logs_del,call_logs_special=:call_logs_special WHERE admin_id=:id");
            $stmt->execute(['admin_special' => $admin_special, 'invitation_view' => $invitation_view, 'invitation_create' => $invitation_create, 'invitation_edit' => $invitation_edit, 'invitation_del' => $invitation_del, 'admin_view' => $admin_view, 'admin_create' => $admin_create, 'admin_edit' => $admin_edit, 'admin_del' => $admin_del, 'photographer_view' => $photographer_view, 'photographer_create' => $photographer_create, 'photographer_edit' => $photographer_edit, 'photographer_del' => $photographer_del, 'call_logs_view' => $call_logs_view, 'call_logs_create' => $call_logs_create, 'call_logs_edit' => $call_logs_edit, 'call_logs_del' => $call_logs_del, 'call_logs_special' => $call_logs_special, 'id' => $id]);
            $_SESSION['success'] = 'Admin Permission Updated Successfully';
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
        $pdo->close();
    }
}

header('location: admin.php');
