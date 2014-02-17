<?php
/**
 * Created by PhpStorm.
 * User: nursultan
 * Date: 2/17/14
 * Time: 7:07 PM
 */

namespace Fairplay\MainBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fairplay\MainBundle\Entity\District;

class LoadDistrictData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $district_names = array(
            'Микро районы','Джал', 'ЮГ-2'
        );
        foreach($district_names as $name){
            $district = new District();
            $district->setName($name);
            $manager->persist($district);
            $manager->flush();
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
}