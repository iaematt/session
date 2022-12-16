<?php

/** Dependencies */
use PHPUnit\Framework\TestCase;
use iaematt\Session;

/**
 * SessionTest.php
 *
 * SessionTest
 *
 * @author Matheus Bastos <matheusbastos@outlook.com>
 * @copyright 2022 Matheus Bastos
 * @version 1.0
 * @link https://github.com/iaematt/session
 */
class SessionTest extends TestCase
{
    /**
     * @return void
     */
    public function testSession()
    {
        /** start and set initial session */
        $session = new Session();
        $session->set('testing', 'testing create session');

        /** test if the session exists */
        $this->assertTrue($session->has('testing'));

        /** test if the session has the created value */
        $expect = 'testing create session';
        $this->assertEquals($expect, $session->testing);

        /** remove session: testing */
        $session->unset('testing');

        /** test if the session does not exist */
        $this->assertFalse($session->has('testing'));

        /** test if the session is empty */
        $this->assertEquals(null, $session->testing);

        /** tests whether the function returns the object */
        $this->assertIsObject($session->all());

        /** session destroy */
        $session->destroy();
    }
}
