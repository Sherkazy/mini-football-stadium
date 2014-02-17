<?php
/**
 * Created by PhpStorm.
 * User: nursultan
 * Date: 2/17/14
 * Time: 7:14 PM
 */

namespace Application\Sonata\UserBundle\DataFixtures\ORM;


use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEnabled(true);
        $user->setUsername('admin');
        $user->setEmail('admin@pole.kg');
        $user->setSuperAdmin(true);
        $user->setPlainPassword('admin');
        $manager->persist($user);
        $manager->flush();
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