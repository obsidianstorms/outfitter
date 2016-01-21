<?php

namespace Outfitter\User;

/**
 * Interface UserInterface
 *
 * @package Outfitter\User
 */
interface LoginInterface
{

    /**
     * @param $user
     *
     * @return mixed
     */
    public function login($user);

    /**
     * @param $user
     *
     * @return mixed
     */
    public function logout($user);
}
