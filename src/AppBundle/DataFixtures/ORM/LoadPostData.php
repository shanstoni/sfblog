<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Post;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


/**
 * Description of LoadPostData
 *
 * @author shan
 */
class LoadPostData implements FixtureInterface{
    
    
    
    //put your code here
    public function load(ObjectManager $manager) {
        
        $faker = Factory::create();
        
        for($i=0; $i<=100; $i++){
            
            $post = new Post();
            $post->setTitle($faker->sentence(3));
            $post->setLead($faker->text(300));
            $post->setContent($faker->text(700));
            $post->setCreatedAt($faker->dateTimeThisYear);
            
            $manager->persist($post);
        }
        
        $manager->flush();
    }

}
