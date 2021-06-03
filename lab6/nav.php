<?php
?>

<div class="container">
    <div class='row'>
        <div class="col-6">
            <ul class="nav nav-tabs" id="colorEdit">
                <li class="nav-item">
                    <a <?php echo ($pageName=="page1")?"class='nav-link active'":"class='nav-link'"?> href="page1.php">Page 1</a>
                </li>
                <li class="nav-item">
                    <a <?php echo ($pageName=="page2")?"class='nav-link active'":"class='nav-link'"?> href="page2.php">Page 2</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div id="bodyBackground" class="col-6">
