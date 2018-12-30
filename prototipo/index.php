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

class Partida
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
 $admin->id = 1;
 $admin->nome = 'admin';
 $admin->email = 'admin@email.com';
 $admin->senha = '123456';

//Apostador
 $apostador = new Usuario;
 $apostador->id = 2;
 $apostador->nome = 'apostador';
 $apostador->email = 'apostador@email.com';
 $apostador->senha = '123456';

 //Cadastro do Bolao
 $bolao = new Bolao;
 $bolao->id = 1;
 $bolao->usuario_id = $admin->id;
 $bolao->titulo = 'Bolão 1';
 $bolao->rodadaAtual = 0;
 $bolao->pontosResultado = 10;
 $bolao->pontosExtras = 5;
 $bolao->pontosTaxa = 5;

 $rodada = new Rodada;
 $rodada->id = 1;
 $rodada->bolao_id = $bolao->id;
 $rodada->titulo = "Primeira rodada";
 $rodada->dataInicio = "2018-07-8";
 $rodada->dataFim = "2018-07-10";

 $partida1 = new Partida;
 $partida1->id = 1 ;
 $partida1->rodada_id = $rodada->id;
 $partida1->titulo = "Gremio X Inter";
 $partida1->estadio = "Beira Rio";
 $partida1->timeA = "Gremio";
 $partida1->timeB = "Inter";
// $partida1->$resultado = ;
// $partida1->$placarTimeA = ;
// $partida1->$placarTimeB = ;
 $partida1->data = "2018-07-11";

 // Apostador no Bolão
 $bolaoUsuario = new BolaoUsuario;
 $bolaoUsuario->bolao_id = $bolao->id;
 $bolaoUsuario->usuario_id = $apostador->id;
 $bolaoUsuario->pontos = 0;

 //Aposta do Usuário
$partida1Apostador = new PartidaUsuario;
$partida1Apostador->partida_id = $partida1->id;
$partida1Apostador->usuario_id = $apostador->id;
$partida1Apostador->resultado = "A";
$partida1Apostador->placarTimeA = 2;
$partida1Apostador->placarTimeB = 1;

//Finalização da rodada
$bolao->rodadaAtual++;
$partida1->resultado = "A";
$partida1->placarTimeA = 2;
$partida1->placarTimeB = 1;


//Lógica do calculo de pontos
if ($partida1Apostador->resultado == $partida1->resultado)
{
  $bolaoUsuario->pontos += $bolao->pontosResultado;
}

if($partida1Apostador->placarTimeA == $partida1->placarTimeA
    && $partida1Apostador->placarTimeB == $partida1->placarTimeB)
{
  $bolaoUsuario->pontos += $bolao->pontosExtras;
}

//Logica incrementar valores bolão
$bolao->pontosResulatados += $bolao->pontosTaxa;
$bolao->pontosExtras += $bolao->pontosTaxa;


echo "Pontos do apostador " . $bolaoUsuario->pontos;
