<?php

/**
 * Modelagem
 */
class Usuario
{

  public $id;
  public $nome;
  public $email;
  public $senha;

}

class Bolao
{

  public $id;
  public $usuario_id;
  public $titulo;
  public $rodadaAtual = 0; // Vai incrementar a cada rodada
  public $pontosResulatados = 10;
  public $pontosExtras = 5;
  public $pontosTaxa = 5;

}

class Rodada
{
    public $id;
    public $bolao_id;
    public $titulo;
    public $dataInicio;
    public $dataFim;
}

class Partidada
{
  public $id;
  public $rodada_id;
  public $titulo;
  public $estadio;
  public $timeA;
  public $timeB;
  public $resultado; // (A,B, E) E = empate
  public $placarTimeA;
  public $placarTimeB;
  public $data;
}

// relacao do usuarioque pode apostar no bolão
class BolaoUsuario
{
  public $bolao_id;
  public $usuario_id;
  public $pontos; //ponto do usuário no bolão
}

class PartidaUsuario
{
  public $partida_id;
  public $usuario_id;
  public $resultado;  // (A,B, E) E = empate
  public $placarTimeA;
  public $placarTimeB;
}


//Testes
//Gerenciador
 $admin = new Usuario;
 $amin->id = 1;
 $admin->nome = 'admin';
 $admin->email = 'admin@email.com';
 $admin->senha = '123456';

//Apostador
 $apostador = new Usuario;
 $apostador->id = 2;
 $apostador->nome = 'apostador';
 $apostador->email = 'apostador@email.com';
 $apostador->senha = '123456';

 //Cdastro do Bolao
 $bolao = new Bolao;
 $bolao->id = 1;
 $bolao->usuario_id = $admin->id;
 $bolao->titulo = 'Bolão 1';
 $bolao->rodadaAtual = 0;
 $bolao->pontosResulatados = 10;
 $bolao->pontosExtras = 5;
 $bolao->pontosTaxa = 5;
