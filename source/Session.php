<?php

/** Namespace */
namespace iaematt;

/**
 * Session.php
 *
 * Session
 *
 * @package iaematt
 * @author Matheus Bastos <matheusbastos@outlook.com>
 * @copyright 2022 Matheus Bastos
 * @version 1.0
 * @link https://github.com/iaematt/session
 */
class Session
{
    /** Constructor */
    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }
    }

    /**
     * @param string $name
     * @return null|mixed
     */
    public function __get($name)
    {
        if (!empty($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return null;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        $this->has($name);
    }

    /**
     * @return null|object
     */
    public function all(): object
    {
        return (object) $_SESSION;
    }

    /**
     * Session set
     * @param string $name
     * @param mixed $value
     * @return Session
     */
    public function set(string $name, $value): Session
    {
        $_SESSION[$name] = is_array($value) ? (object) $value : $value;
        return $this;
    }

    /**
     * @param string $name
     * @return Session
     */
    public function unset(string $name): Session
    {
        unset($_SESSION[$name]);
        return $this;
    }

    /**
     * @return Session
     */
    public function regenerate(): Session
    {
        session_regenerate_id(true);
        return $this;
    }

    /**
     * @return Session
     */
    public function destroy(): Session
    {
        session_destroy();
        return $this;
    }
}
