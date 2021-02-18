
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 align-self-center">
                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Elements de <?php echo $start +1; ?> à <?php echo $end; ?> sur <?php echo $row_number; $compteur = $row_number/10;?> </p>
            </div>
            <div class="col-md-6">
                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">
                    <?php for($i = 0; $i <= $compteur; $i++){?>
                        <li class="page-item"><form action="<?php echo htmlspecialchars(dirname($_SERVER['SERVER_PROTOCOL']) . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" method="post"><input type="text" name="pagination" id="" value="<?php echo $i+1; ?>" hidden><input type="submit" name="page" class="btn btn-primary" value="<?php echo $i +1 ?>"></form></li>
                    <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div></div>
<?php include('template2.php') ?> 