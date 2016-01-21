<?php

namespace Outfitter\User;

/**
 * Interface LoginTrait
 *
 * @package Outfitter\User
 */
interface LoginTrait
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
