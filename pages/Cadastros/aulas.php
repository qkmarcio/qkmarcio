<?php
/*
 * Autor: Marcio Souza
 * Revisao: 0
 * Data: 12/04/2022
 * Arquivo principal do sistema, faz chamadas para todas as interfaces
 */
//header('Content-type: text/html; charset=ISO-8859-1');
?>
<style type="text/css">
input {
    text-transform: uppercase;

}

textarea {
    text-transform: uppercase;
}

.table-fixed thead tr th {
    /*background-color: #f39c12;
        border-color: #e67e22;*/
    padding: 4px 2px 4px 2px;
}

.table-fixed tbody {
    display: block;
    height: 300px;
    overflow: auto;
}

.table-fixed tbody tr td {
    padding: 4px 2px 4px 2px;
}

.table-fixed thead,
tbody tr {
    display: table;
    width: 100%;
    table-layout: auto;
}

.table-fixed thead {
    /*width: calc( 100% - 1em )*/
}

.profile--panel .img {
    height: 150px;
}

#thumbnail {
    height: 100%
}
</style>
<!-- Page Header Start -->
<section class="page--header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <!-- Page Title Start -->
                <h2 class="page--title h5">Cadastro de Nivel</h2>
                <!-- Page Title End -->

                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><span>Cadastro</span></li>
                    <li class="breadcrumb-item active"><span>Nivel</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Page Header End -->

<!-- Main Content Start -->
<section class="main--content">
    <div class="panel">
        <div class="panel-heading">
            <div class="dropdown">
                <button type="button" class="btn-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-sync"></i>Atualizar Data</a></li>
                    <li><a href="#formCadastro" id="btnNovoCadastro" data-toggle="modal"><i
                                class="fa fa-cogs"></i>Novo</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-4" style="margin-bottom: 20px;">
                    <h3 class="panel-title">Lista de Niveis</h3>
                </div>
                <div class="col-lg-8 app_searchBar" style="max-width: 500px;">
                    <input id="inpBuscar" type="search" name="tasks" placeholder="Buscar Nivel..." class="form-control">
                    <button id="btnBuscar" type="submit" class="btn btn-rounded">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="col-lg-12 table-fixed table style--3 table-hover" style="min-width: 900px;">
                    <thead>
                        <tr>
                            <th class="col-1 text-center">ID</th>
                            <th class="col-2 text-left">Nivel</th>
                            <th class="col-3 text-left">Professor</th>
                            <th class="col-2 text-center">Semanda</th>
                            <th class="col-2 text-left">Horario</th>
                            <th class="col-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="ListView"></tbody>
                </table>
            </div>
            <div id="pager">
                <ul id="pagination" class="pagination-sm "></ul>
            </div>
        </div>
    </div>

</section>
<!-- Main Footer Start -->
<footer class="main--footer main--footer-dark">
    <p>Copyright &copy; <a href="#">MOS Plataforma</a>. Marcio Olivira de Souza.</p>
</footer>
<!-- Main Footer End -->
<!-- Large Modal Start -->
<form id="formCadastro" class="modal fade ui-front">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro de Niveis</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group px-2 col-lg-4" style="display: none">
                        <label>Codigo</label>
                        <input class="limpar form-control px-2" id="aul_id" disabled="">
                        <input id="insert" value="insert" style="display: none">
                    </div>
                    <div class="form-group px-2 col-lg-5">
                        <label name="aul_nome">Nome Nivel</label>
                        <input class="limpar form-control px-2" id="aul_nome" name="aul_nome">
                    </div>
                    <div class="form-group px-2 col-lg-7">
                        <label name="aul_prof_id">Professor(a)</label>
                        <input class="limpar" id="aul_prof_id" name="aul_prof_id" disabled="" style="display: none">
                        <input type="text" class="limpar form-control px-2" id="aul_prof_nome">
                        </select>
                    </div>
                    <div class="form-group px-2 col-lg-5">
                        <label name="aul_horario">Horario</label>
                        <input type="time" class="limpar form-control px-2" id="aul_horario" name="aul_horario">
                    </div>

                    <div class="form-group px-2 col-lg-7 " id="aul_dia">
                        <label name="aul_dia">Dias da Semana</label>
                        <div class="col-md-12 form-inline">
                            <label class="form-check">
                                <input type="checkbox" name="SEGUNDA" value="2" class="form-check-input">
                                <span class="form-check-label">SEGUNDA</span>
                            </label>

                            <label class="form-check px-4">
                                <input type="checkbox" name="TERÇA" value="3" class="form-check-input">
                                <span class="form-check-label">TERÇA</span>
                            </label>
                            <label class="form-check ">
                                <input type="checkbox" name="QUARTA" value="4" class="form-check-input">
                                <span class="form-check-label">QUARTA</span>
                            </label>

                            <label class="form-check px-4">
                                <input type="checkbox" name="QUINTA" value="5" class="form-check-input">
                                <span class="form-check-label">QUINTA</span>
                            </label>
                            <label class="form-check ">
                                <input type="checkbox" name="SEXTA" value="6" class="form-check-input" ">
                                <span class=" form-check-label">SEXTA</span>
                            </label>

                            <label class="form-check px-4">
                                <input type="checkbox" name="SABADO" value="4" class="form-check-input">
                                <span class="form-check-label">SABADO</span>
                            </label>
                        </div>

                    </div>
                    <div class="form-group px-2 col-lg-12">
                        <label>Obs</label>
                        <textarea class="limpar form-control px-2" id="aul_obs" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-sm btn-rounded btn-danger"
                        data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn  btn-sm btn-rounded btn-primary Gravar">Gravar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Large Modal End -->

    <script type="text/javascript">
    function loadjscssfile(filename, filetype) {
        var fileref = null;
        if (filetype == "js") { //if filename is a external JavaScript file
            fileref = document.createElement('script');
            fileref.setAttribute("type", "text/javascript");
            fileref.setAttribute("src", filename);
        } else if (filetype == "css") { //if filename is an external CSS file
            fileref = document.createElement("link");
            fileref.setAttribute("rel", "stylesheet");
            fileref.setAttribute("type", "text/css");
            fileref.setAttribute("href", filename);
        }
        if (typeof fileref != "undefined") {
            document.getElementsByTagName("head")[0].appendChild(fileref);
        }
    }
    loadjscssfile('../js/jAula.js?nocache=' + Math.random(), 'js');
    </script>