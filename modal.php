<script type="text/javascript">
    $(document).ready(function() {
        $("input[id*=Button1]").click(function() {
            $("#dialog-confirm").dialog({
                modal: true,
                buttons: {
                    Save: function() {
                        __doPostBack("Button1", "OnClick");
                    },
                    Cancel: function() {
                        //do processing
                        $(this).dialog("close");
                    }
                }
            });
            return false;
        });
    });
</script>
<div class="modal fade" role="dialog" tabindex="-1" id="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmation de l'enregistrement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-5">
                    <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col">
                                <input readonly class="form-control form-control-user" type="text" id="nom" placeholder="Nom complet" name="nom" value="<?php if(!empty($nom_f)) {echo $nom_f ;}?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <input readonly class="form-control form-control-user" type="text" id="adresse" placeholder="Adresse" name="adresse" value="<?php if(!empty($adresse)) {echo $adresse ;}?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <input readonly class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="Adresse email" name="email" value="<?php if(!empty($email)) {echo $email ;}?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <input readonly class="form-control form-control-user" type="text" id="telephone" placeholder="Téléphone" name="tel" value="<?php if(!empty($tel)) {echo $tel ;}?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <input readonly class="form-control form-control-user" type="text" id="domaine" placeholder="domaine" name="domaine" value="<?php if(!empty($domaine)) {echo $domaine ;}?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <input class="btn btn-primary btn-block text-white btn-user" type="submit" name="submit" value="Valider l'ajout">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>