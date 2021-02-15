<?php include('template.php'); ?>
<div class="container-fluid">
    <div class="card shadow-lg o-hidden border-0 my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col">
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="text-dark mb-4">Ajouter un <?php echo $nom; ?></h4>
                        </div>
                        <form class="user" id="formulaire" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">