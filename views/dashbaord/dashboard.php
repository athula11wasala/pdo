

<h4 style="text-align: left">Dash Baord </h4>
<br><br>

<html>
    <body>

        <?php if (!empty($this->objusers)) { ?>

            <table align="left">
                <tr>
                    <td>ID</td>
                    <td>UserName</td>
                    <td>Email</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                <?php foreach ($this->objusers as $rows) { ?>
                    <tr>
                        <?php if ($_SESSION['usertype'] == '1') { ?>   
                            <td>   <?php echo $rows->id; ?></td>
                            <td>   <?php echo $rows->uname; ?></td>
                            <td>   <?php echo $rows->email; ?></td>
                            <?php if ($rows->usertype != '1') { ?>      <td><a href="/mvc/index/user/editView/<?php echo $rows->id; ?>"/>Edit</td> <?php } ?>
                            <?php if ($rows->usertype != '1') { ?>             <td><a href="/mvc/index/user/deleteView/<?php echo $rows->id; ?>"/>Delete</td><?php } ?>
                        <?php } else { ?>
                            <?php if ($rows->id == $_SESSION['id']) { ?>
                                <td>   <?php echo $rows->id; ?></td>
                                <td>   <?php echo $rows->uname; ?></td>
                                <td>   <?php echo $rows->email; ?></td>
                                <td><a href="/mvc/index/user/editView/<?php echo $rows->id; ?>"/>Edit</td>
                                <td><a href="/mvc/index/user/deleteView/<?php echo $rows->id; ?>"/>Delete</td>

                            <?php }
                        } ?>

                    </tr>
    <?php } ?>

            </table>


<?php } ?>

    </body>


</html>