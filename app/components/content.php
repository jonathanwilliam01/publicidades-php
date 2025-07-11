<?php
include_once 'header.php';
include_once 'functions/consulta.php';
?>

<div class="content">
<!-- PUBLICIDADES ATIVAS -->
    <?php foreach($dados as $d): ?>
            <div class="card-ativos">
                <div class="top-cards">
                    <div class="card-img">
                        <img class="img-card" src="./uploads/<?php echo $d['imagem'] ?>">
                    </div>
                    <div class="card-text" style="width: 95%;">
                        <div class="titulo-edit-card" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3px;">
                            <p><b> <?php echo $d['titulo'] ?> </b></p>
                            <div class="right-titulo-card">
                                <?php if($d['validade'] == 'valida' && $d['padrao'] == '0') {echo "<buttom class='publi-atual'>Publicidade Atual</buttom>";};
                                      if($d['padrao'] == '1' && ($d['validade'] == 'vencida' || $d['validade'] == 'valida')) {echo "<buttom class='publi-atual'>Publicidade Padrão</buttom>";};
                                ?>
                                <span class="material-symbols-outlined more-btn" style="margin-right: 15px;">more_vert</span>

                                <ul class="options-menu">
                                    <a href="/actions/editarPublicidade.php?id=<?php echo $d['id']; ?>" style="all:unset;cursor:pointer;">
                                        <li class="op-editar"> <span class="material-symbols-outlined" style="margin-right: 8px; font-size:20px">edit</span>Editar</li>
                                    </a>
                                    <form method="POST"> 
                                            <input type="hidden" name="id_encerrar" value="<?php echo $d['id']; ?>">
                                            <button type="submit" name="encerrar" style="all:unset; cursor:pointer;">
                                            <li class="op-excluir" style="color:red"><span class="material-symbols-outlined" style="margin-right: 8px; font-size:20px">cancel</span>Encerrar</li>
                                        </button>
                                    </form> 
                                </ul>
                            </div>
                        </div>
                        <p><?php echo $d['descricao'] ?></p>
                    </div>    
                </div>

                <div class="bottom-card">
                    <div class="tags-estado" style="display: flex; align-items: center;">
                        <?php if($d['sp_estado'] == 1) { echo "<h5 class='tag-est'> São Paulo </h5>"; };?>
                        <?php if($d['mg_estado'] == 1) { echo "<h5 class='tag-est'> Minas Gerais </h5>"; };?>
                        <?php if($d['rj_estado'] == 1) { echo "<h5 class='tag-est'> Rio de Janeiro </h5>"; };?>
                    </div>
                    <div class="validade">
                        <P class="card-validade" style="display: flex; align-items: center; margin-right:15px"> <span class="material-symbols-outlined" style="margin-right: 4px; font-size: 22px;">calendar_today</span> 
                            <?php if( $d['validade'] == 'valida' && $d['padrao'] == '0'){echo "Ativo até " . $d['dt_fim'];};
                                  if( $d['validade'] == 'vencida' && $d['padrao'] == '0'){echo "Vencida em " . $d['dt_fim'];};
                                  if( $d['padrao'] == '1'){echo "Sem validade";};
                            ?>
                        </P>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>

    
    <div class="outras-publi">
        <h2 style="margin-left:30px; font-size: 15px; margin-top: 20px;">OUTRAS PUBLICIDADES</h2>
    </div>

<!-- PUBLICIDADES INATIVAS -->
    <?php foreach($dadosin as $di): ?>
            <div class="cards-inativos">
                <div class="top-cards">
                    <div class="card-img">
                        <img class="img-card" src="./uploads/<?php echo $di['imagem'] ?>">
                    </div>
                    <div class="card-text" style="width: 95%;">
                        <div class="titulo-edit-card" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3px;">
                            <p><b> <?php echo $di['titulo'] ?> </b></p>
                            <div class="right-titulo-card">
                                <?php if($di['validade'] == 'valida') {echo "<buttom class='publi-atual'>Publicidade Atual</buttom>";}; ?>
                                <span class="material-symbols-outlined more-btn" style="margin-right: 15px;">more_vert</span>

                                <ul class="options-menu">
                                    <a href="/actions/editarPublicidade.php?id=<?php echo $di['id']; ?>" style="all:unset;cursor:pointer;">
                                        <li class="op-editar"> <span class="material-symbols-outlined" style="margin-right: 8px; font-size:20px">edit</span>Editar</li>
                                    </a>
                                    <form method="POST" class="menu"> 
                                            <input type="hidden" name="id_reativar" value="<?php echo $di['id']; ?>">
                                            <button type="submit" name="reativar" style="all:unset; cursor:pointer;">
                                            <li class="op-reativar" style="color:green"><span class="material-symbols-outlined" style="margin-right: 8px; font-size:20px">check</span>Reativar</li>
                                        </button>
                                    </form> 
                                </ul>
                            </div>
                        </div>
                        <p><?php echo $di['descricao'] ?></p>
                    </div>    
                </div>

                <div class="bottom-card">
                    <div class="tags-estado" style="display: flex; align-items: center;">
                        <?php if($di['sp_estado'] == 1) { echo "<h5 class='tag-est'> São Paulo </h5>"; };?>
                        <?php if($di['mg_estado'] == 1) { echo "<h5 class='tag-est'> Minas Gerais </h5>"; };?>
                        <?php if($di['rj_estado'] == 1) { echo "<h5 class='tag-est'> Rio de Janeiro </h5>"; };?>
                    </div>
                    <div class="validade">
                        <P class="card-validade" style="display: flex; align-items: center; margin-right:15px"> <span class="material-symbols-outlined" style="margin-right: 4px; font-size: 22px;">calendar_today</span> 
                        <?php if( $di['validade'] == 'valida'){echo "Ativo até " . $di['dt_fim'];} else {echo "Vencida em " . $di['dt_fim'];};?></P>
                    </div>
                </div>
            </div>
    <?php endforeach;?>
            <div class="footer" style="height: 30px;"></div>
        </div>


<script>
    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.more-btn');

        document.querySelectorAll('.options-menu').forEach(menu => {
            menu.style.display = 'none';
        });

        if (btn) {
            const menu = btn.parentElement.querySelector('.options-menu');
            if (menu) {
                menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
            }
            e.stopPropagation();
        };

        overlay.addEventListener('click', e => {
            if (e.target === overlay) overlay.style.display = 'none';
             });
        });
</script>

<style>
.content{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 10px;
}

.card-ativos, .cards-inativos{
    width: 96.5%;
    border-radius: 10px;
    margin-top: 10px;
    box-shadow: 1px 2px 10px #a5a5a5;
    height: 123px;
    margin-top: 10px;
}

.top-cards{
    display: flex;
    justify-content: left;
    align-items: center;
}

.right-titulo-card{
    display: flex; 
    align-items: center;
    position: relative
}

.options-menu{
    list-style:none;
    padding:6px 0;
    margin:0;
    width:130px;
    background:#fff;
    border:1px solid #d6d6d6;
    border-radius:6px;
    box-shadow:0 2px 8px rgba(0,0,0,.18);
    position:absolute;
    top:calc(100% + 6px); 
    right:0;              
    display:none;         
    z-index:1000;
}

.options-menu li{
    padding:9px 14px;
    cursor:pointer;
    font-size:14px;
}

li{
    display: flex;
    align-items: center;
}

.options-menu li:hover{
    background:#f2f2f2;
}

.publi-atual{
    background-color: rgb(141, 219, 141);
    color: rgb(2, 95, 2);
    padding: 4px;
    border-radius: 5px;
}

.img-card{
    height:80px; 
    width:100px;
    padding: 10px 8px 5px 10px;
    border-radius:12px;
}

.bottom-card{
    display: flex;
    justify-content: space-between;
    margin-top: 5px;
}

.tag-est{
    margin-left: 10px;
    border: 1px solid black;
    border-radius: 5px;
    padding: 3px;
    margin-bottom: 5px;
}

.outras-publi{
    display: flex;
    align-items: center;
    justify-content: left;
    width: 100%;
}
</style>