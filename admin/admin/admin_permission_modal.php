<?php include '../includes/session.php'; ?>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        h2 {
            color: #1c94c4;
            text-align: center;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>

    <h2>PERMISSION</h2>
    <form class="form-horizontal" method="POST" action="admin_permission_edit.php">
        <?php
        $id = $_GET['id'];
        $conn = $pdo->open();
        $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_id=:id");
        $stmt->execute(['id' => $id]);
        foreach ($stmt as $row) {
        ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <table>
                <tr>
                    <th> </th>
                    <th style="color: #3a8104;"> Name </th>
                    <th style="color: #3a8104;"> View </th>
                    <th style="color: #3a8104;"> Create </th>
                    <th style="color: #3a8104;"> Edit </th>
                    <th style="color: #3a8104;"> Delete </th>
                    <th style="color: #3a8104;"> Special </th>
                    <th> </th>
                </tr>
                <tr>
                    <td> </td>
                    <td> ADMIN </td>
                    <td style="text-align: center;"> <input type="checkbox" name="admin_view" <?php if ($row['admin_view']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="admin_create" <?php if ($row['admin_create']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="admin_edit" <?php if ($row['admin_edit']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="admin_del" <?php if ($row['admin_del']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="admin_special" <?php if ($row['admin_special']) echo "checked"; ?>> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> INVITATION </td>
                    <td style="text-align: center;"> <input type="checkbox" name="invitation_view" <?php if ($row['invitation_view']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="invitation_create" <?php if ($row['invitation_create']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="invitation_edit" <?php if ($row['invitation_edit']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="invitation_del" <?php if ($row['invitation_del']) echo "checked"; ?>> </td>
                    <td> </td>
                     <td> </td>
                </tr>
           

                <tr>
                    <td> </td>
                    <td> photographer </td>
                    <td style="text-align: center;"> <input type="checkbox" name="photographer_view" <?php if ($row['photographer_view']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="photographer_create" <?php if ($row['photographer_create']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="photographer_edit" <?php if ($row['photographer_edit']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="photographer_del" <?php if ($row['photographer_del']) echo "checked"; ?>> </td>
                    <td> </td>
                    <td> </td>
                </tr>

            
                <tr>
                    <td> </td>
                    <td> Call Logs </td>
                    <td style="text-align: center;"> <input type="checkbox" name="call_logs_view" <?php if ($row['call_logs_view']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="call_logs_create" <?php if ($row['call_logs_create']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="call_logs_edit" <?php if ($row['call_logs_edit']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="call_logs_del" <?php if ($row['call_logs_del']) echo "checked"; ?>> </td>
                    <td style="text-align: center;"> <input type="checkbox" name="call_logs_special" <?php if ($row['call_logs_special']) echo "checked"; ?>> </td>
                    <td> </td>
                </tr>
                
            </table>
        <?php } ?>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-flat" name="update"><i class="fa fa-check"></i> UPDATE</button>
        </div>
    </form>
</body>

</html>