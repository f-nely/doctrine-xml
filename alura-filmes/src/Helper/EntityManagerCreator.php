<?php


namespace Alura\Doctrine\Helper;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function criaEntityManager(): EntityManagerInterface
    {
        $config = Setup::createAnnotationMetadataConfiguration(
            [__DIR__ . '/../Entity']
        );
        $con = [
            'driver' => 'pdo_pgsql',
            'host' => 'localhost',
            'dbname' => 'alura_filmes',
            'user' => 'postgres',
            'password' => '704802'
        ];

        return EntityManager::create($con, $config);
    }
}