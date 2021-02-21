<?php

use Alura\Doctrine\Entity\Ator;
use Alura\Doctrine\Entity\Filme;
use Alura\Doctrine\Entity\Idioma;

require_once 'vendor/autoload.php';

$em = (new \Alura\Doctrine\Helper\EntityManagerCreator())->criaEntityManager();

$ator = new Ator(null, 'Vinicius', 'Dias');

$portugues = new Idioma(null, 'Português');
$alemao = new Idioma(null, 'Alemão');
$ingles = new Idioma(null, 'Inglês');

$filme = new Filme(null, 'As longas tranças do careca', '2019', $portugues, $alemao);
$filme2 = new Filme(null, 'A volta dos que não foram', '2019', $portugues, $ingles);

$ator->addFilme($filme);
$ator->addFilme($filme2);

$em->persist($ator);

$em->flush();