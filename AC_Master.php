<?php include 'partials/header.php'; ?>

<h1>Assembly Constituency Entry form</h1>
<form action="AC_Action.php" method="get">
    <table>
        <tr>
            <td> Select District Name </td>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "election") or die("Connection Error: " . mysqli_error($conn));
            $result = mysqli_query($conn, "SELECT * FROM dist_master order by Dist_Name");
            ?>
            <td>
                <select name="dist">
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?= $row["Dist_Code"]; ?>"><?= $row["Dist_Name"]; ?></option>
                    <?php
                        $i++;
                    }
                    ?>
                </select>
            </td>

            <?php
            mysqli_close($conn);
            ?>

            <form action="">
                <table>
                    <tr>
                        <td>Enter AC Name</td>
                        <td> <input type="text" name="ac"><br>
                    <tr>
                        <td>Enter Remarks</td>
                        <td> <input type="text" name="remarks"><br>

                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit"> submit </button></td>
                    </tr>
                </table>



            </form>
            </div>
            <?php include 'partials/footer.php'; ?>