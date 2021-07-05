<?php


namespace App\DataFixtures;


use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i<10; $i++) {
            $article = new Article();
            $article->setTitle('titre' .$i);
            $article->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut augue consequat, rhoncus nisi ac, congue enim. Proin gravida lorem condimentum justo maximus dictum. Vivamus laoreet semper ante sit amet congue. Sed elementum sit amet quam et volutpat. In iaculis sed arcu ut hendrerit. Vestibulum nec tincidunt ante. Curabitur sollicitudin bibendum odio, non fermentum lacus porta vitae. Sed nec ultrices est, in suscipit lacus. Aliquam malesuada mi sed placerat eleifend. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.');
            $manager->persist($article);
        }
        $manager->flush();
    }
}
