<style><?php include 'css/style.css'; ?></style>
<?php
    require_once "controllers/layout.controller.php";
    require_once "controllers/form.controller.php";
    $controller = new LayoutController();
    $controller->getLayout();
?>