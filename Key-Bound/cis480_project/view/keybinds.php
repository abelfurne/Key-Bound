<?php
require_once('../model/keybind_db.php');
session_start();
$username = $_SESSION['id'];
$keybindArray = array("zero" => array(), "one" => array(),
    "two" => array(), "three" => array());
?>
<html>
    <head>
        <title>Key Bound | Keybinds</title>
        <link rel="shortcut icon" type="image/png" href="/images/kblogo.png">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <a href="about.php"><img id="homelogo" src="images/kblogo.png" alt="Key Bound logo"></a>
        <nav>
            <table>
                <tr>
                    <td class="rpad"><a href="about.php">Home</a></td>
                    <td class="rpad"><a href="practice.php">Practice</a></td>
                    <td class="rpad"><a href="keybinds.php">Keybinds</a></td>
                    <td class="rpad"><a href="login.php">Login</a></td>
                    <td><a href="profile.php">Profile</a></td>
                </tr>
            </table>
        </nav>
        <div class="boxed changed">
            <h1 align="center">Keybinds</h1>

            <?php
                if (isset($_POST['search'])){
                    $valueToSearch = $_POST['valueToSearch'];
                    // search in all table columns
                    // using concat mysql function
                    $query = "SELECT * FROM `keybinds` WHERE Username = '$username' && CONCAT(`AbilityName`, COALESCE(`Modifier`, ''), `Value`) LIKE '%".$valueToSearch."%'";
                    $search_result = filterTable($query);
                } else {
                    $query = "SELECT * FROM `keybinds` WHERE Username = '$username'";
                    $search_result = filterTable($query);
                }
                // function to connect and execute the query
                function filterTable($query) {
                    $connect = mysqli_connect("localhost", "root", "", "cis480_project");
                    $filter_Result = mysqli_query($connect, $query);
                    return $filter_Result;
                }
            ?>
      
            <div align="center">
                <form method="POST" action="add.php">
                    <label>Ability Name: </label><input type="text" name="ability"
                        placeholder="Name of spell or ability">
                    <label>Modifier: </label><input type="text" name="modifier"
                        placeholder="Shift, Ctrl, Alt, or leave blank...">
                    <label>Value: </label><input type="text" name="value"
                        placeholder="Number or lowercase letter">
                    <input type="submit" name="add" value="Add">
                </form>
            </div>

            <form action="keybinds.php" method="post">
            <section class="hangright">
                <input type="text" name="valueToSearch" placeholder="Enter a value or phrase...">
                <input type="submit" name="search" value="Filter Table">
            </section>
            

            <table id="keybindtable">
                <tr>
                    <th>Ability Name</th>
                    <th>Modifier</th>
                    <th>Value</th>
                </tr>
                <?php while($row = mysqli_fetch_array($search_result)) :?>
                <tr class="left">
                    <td class="left"><?php echo $row['AbilityName'];?></td>
                    <td><?php echo $row['Modifier'];?></td>
                    <td><?php echo $row['Value'];?></td>
                    <td>
                        <a href="edit.php?no=<?php echo $row['KeybindNo']; ?>&abilityName=<?php echo $row['AbilityName']; ?>&modifier=<?php echo $row['Modifier']; ?>&value=<?php echo $row['Value']; ?>">
                            Edit
                        </a>
                        | <!-- spacer -->
                        <a href="delete.php?no=<?php echo $row['KeybindNo']; ?>">Delete</a>
                    </td>
                </tr>
                <?php endwhile;?>
            </table>
        </div>
    </body>
</html>