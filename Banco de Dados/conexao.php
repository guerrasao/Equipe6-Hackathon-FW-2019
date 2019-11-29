<?php

function abrirConexao()
{
  $con = mysqli_connect('localhost', 'root', '', 'nomdebd');

  if (mysqli_connect_errno()) {
    printf("Connect failed:", mysqli_connect_error());
  }

  return $con;
}

function fecharConexao($con)
{
  mysqli_close($con);
}
