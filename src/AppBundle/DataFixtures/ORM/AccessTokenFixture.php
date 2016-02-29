<?php

/**
 * This file is part of the authbucket/oauth2-symfony-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\AccessToken;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AccessTokenFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $model = new AccessToken();
        $model->setAccessToken('18cdaa6481c0d5f323351ea1029fc065')
            ->setTokenType('bearer')
            ->setClientId('6b44c21ef7bc8ca7380bb5b8276b3f97')
            ->setUsername('')
            ->setExpires(new \DateTime('+10 years'))
            ->setScope([]);
        $manager->persist($model);

        $model = new AccessToken();
        $model->setAccessToken('eeb5aa92bbb4b56373b9e0d00bc02d93')
            ->setTokenType('bearer')
            ->setClientId('http://democlient1.com/')
            ->setUsername('demousername1')
            ->setExpires(new \DateTime('+10 years'))
            ->setScope([
                'demoscope1',
            ]);
        $manager->persist($model);

        $model = new AccessToken();
        $model->setAccessToken('d2b58c4c6bc0cc9fefca2d558f1221a5')
            ->setTokenType('bearer')
            ->setClientId('http://democlient1.com/')
            ->setUsername('demousername1')
            ->setExpires(new \DateTime('-1 hours'))
            ->setScope([
                'demoscope1',
            ]);
        $manager->persist($model);

        $model = new AccessToken();
        $model->setAccessToken('ba2e8d1f54ed3e3d96935796576f1a06')
            ->setTokenType('bearer')
            ->setClientId('http://democlient1.com/')
            ->setUsername('demousername1')
            ->setExpires(new \DateTime('+1 hours'))
            ->setScope([
                'demoscope1',
                'demoscope2',
            ]);
        $manager->persist($model);

        $model = new AccessToken();
        $model->setAccessToken('bcc105b66698a64ed23c87b967885289')
            ->setTokenType('bearer')
            ->setClientId('http://democlient1.com/')
            ->setUsername('demousername1')
            ->setExpires(new \DateTime('+1 hours'))
            ->setScope([
                'demoscope3',
            ]);
        $manager->persist($model);

        $manager->flush();
    }
}
