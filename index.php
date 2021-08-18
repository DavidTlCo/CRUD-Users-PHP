<!-- Import CSS -->
<style><?php include 'css/style.css'; ?></style>
<?php
    require_once "controllers/layout.controller.php";
    require_once "controllers/form.controller.php";
    require_once "models/form.model.php";

    // Layout working
    $controller = new LayoutController();
    $controller->getLayout();
?>