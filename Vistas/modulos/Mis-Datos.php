<div class="content-wrapper">

    <section class="content-header">
        <h1>Perfil</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="row">


                        <?php
                        $perfil = new UsuariosC();
                        $perfil->VerPerfilC();


                        ?>


                    </div>

               


            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success btn-lg pull-right">Guardar</button>

                <?php
$editarPerfil = new UsuariosC();
$editarPerfil -> EditarPerfilC();
                ?>
             </form>
            </div>
        </div>
    </section>
</div>