<?php

/*
 * Autor: Marcio
 * Revisao: 0
 * Data: 13/04/2022
 *
 * Descricao: 
 * Controle de Acesso na tab_contrato
 */

class ColContrato {

    private $con_id; 
    private $con_vencimento; 
    private $con_valor; 
    private $con_meses; 
    private $con_obs; 
    private $con_ativado; 
    private $con_email_notificacao; 
    private $con_data_cadastro; 
    private $alunos_id; 
    private $modalidades_id;
    private $erro;
    private $dica;
    public $ultimoId;

    public function set($prop, $value) {
        $this->$prop = $value;
    }

    public function get($prop) {
        return $this->$prop;
    }

    public function incluir($mysqli) {

        $sql = "INSERT INTO tab_contratos (
            con_vencimento,
            con_valor,
            con_meses,
            con_obs,
            con_ativado,
            con_email_notificacao,
            con_data_cadastro,
            alunos_id,
            modalidades_id
            )VALUES(";
        $sql .= "'" . $this->con_vencimento . "',";
        $sql .= "" . Formatador::convertMoedaToFloat($this->con_valor) . ",";
        $sql .= "" . $this->con_meses . ",";
        $sql .= "'" . strtoupper(addslashes($this->con_obs)). "',";
        $sql .= "'" . $this->con_ativado . "',";
        $sql .= "'" . $this->con_email_notificacao . "',";
        $sql .= "CURRENT_TIMESTAMP , ";
        $sql .= "" . $this->alunos_id . ",";
        $sql .= "" . $this->modalidades_id . "";
        $sql .= ")";

        $result = $mysqli->query($sql) or die($mysqli->error);
        
        if($result){
            $this->ultimoId = $mysqli->insert_id;
            return true;
        }else{
            $this->erro = $result;
            return false;
        }

    }

    public function alterar($mysqli) {

        $sql = "UPDATE tab_contratos SET ";
        $sql .= "con_vencimento='" . $this->con_vencimento . "',";
        $sql .= "con_valor=" . Formatador::convertMoedaToFloat($this->con_valor) . ",";
        $sql .= "con_meses=" . $this->con_meses . ",";
        $sql .= "con_obs='" . strtoupper(addslashes($this->con_obs)) . "',";
        $sql .= "con_ativado='" . $this->con_ativado . "',";
        $sql .= "con_email_notificacao='" . $this->con_email_notificacao . "',";
        $sql .= "alunos_id=" . $this->alunos_id . ",";
        $sql .= "modalidades_id=" . $this->modalidades_id . " ";
        $sql .= " WHERE con_id=" . $this->con_id;

        $result = $mysqli->query($sql)or die($mysqli->error);
        
        if($result){
            return true;
        }else{
            $this->erro = $result;
            return false;
        }
    }

    public function remover($mysqli) {

        $sql = "DELETE FROM tab_contratos WHERE con_id = " . $this->modalidade_id;

        $result = $mysqli->query($sql)or die($mysqli->error);
        
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function getRegistros($mysqli) {

        $sql = "SELECT con_id,con_vencimento,con_valor,con_meses,con_obs, "
                . " con_ativado,con_email_notificacao,con_data_cadastro, "
                . " alunos_id, (SELECT alu_nome FROM tab_alunos WHERE alu_id = alunos_id) alunos_nome, "
                . " modalidades_id, (SELECT modalidade_nome FROM  tab_modalidades WHERE modalidade_id = modalidades_id) modalidades_nome "
                . " FROM tab_contratos " . $this->sqlCampos;

        $result = $mysqli->query($sql)or die($mysqli->error);

        while ($obj = mysqli_fetch_object($result)) {
            $cls = new stdClass();
            
            $cls->id = $obj->con_id;
            $cls->vencimento = $obj->con_vencimento;
            $cls->vencimentoPT = Formatador::dateEmPortugues($obj->con_vencimento);
            $cls->valor = Formatador::convertFloatToMoeda($obj->con_valor);
            $cls->meses = $obj->con_meses;
            $cls->obs = $obj->con_obs;
            $cls->ativado = $obj->con_ativado;
            $cls->email_notificacao = $obj->con_email_notificacao;
            $cls->data_cadastro = Formatador::dateTimeEmPortugues($obj->con_data_cadastro,'');
            $cls->alunos_id = $obj->alunos_id;
            $cls->modalidades_id = $obj->modalidades_id;
            $cls->alunos_nome = $obj->alunos_nome;
            $cls->modalidades_nome = $obj->modalidades_nome;
            
            $conArry[] = $cls;
        }
        
       
        return $conArry;
        
    }

}
