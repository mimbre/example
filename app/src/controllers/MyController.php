<?php
namespace controllers;
use \Exception;
use mimbre\db\mysql\MySqlConnection;
use mimbre\http\HttpController;

/**
 * A "controller" MUST extends HttpController.
 *
 * This controller "intercepts" and processes HTTP requests.
 */
class MyController extends HttpController
{
    /**
     * Welcome message.
     *
     * @var string
     */
    public $welcomeMessage;

    /**
     * Database connection.
     *
     * @var MySqlConnection
     */
    private $_db;

    /**
     * Constructor.
     */
    public function __construct()
    {
        // attaches handlers to various HTTP request methods.
        $this->onOpen([$this, "open"]);
        $this->onGet([$this, "get"]);
        $this->on("PUT", [$this, "put"]);
        $this->onPost([$this, "post"]);
        $this->onClose([$this, "close"]);
    }

    /**
     * OPEN request handler.
     *
     * This handler is executed BEFORE any other handler. This is a good place
     * to initiate resources, such as databases, etc...
     *
     * @return void
     */
    public function open()
    {
        $this->_db = new MySqlConnection(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    }

    /**
     * GET request handler.
     *
     * @return void
     */
    public function get()
    {
        // gets parameters from the current HTTP request
        $username = $this->getParam("username", ["required" => true]);
        $password = $this->getParam("password", ["required" => true]);
        $remember = $this->getParam("remember", ["default" => "yes"]);
        $age = $this->getParam("age");

        if (!is_numeric($age)) {
            throw new Exception("Please provide a valid age");
        }

        $this->welcomeMessage = "Welcome $username!";
    }

    /**
     * PUT request handler.
     *
     * In this particular case we are declaring a PUT request handler, but you
     * can use any of the existing HTTP methods:
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods
     *
     * @return void
     */
    public function put()
    {
        // code here...
    }

    /**
     * POST request handler.
     *
     * @return void
     */
    public function post()
    {
        // code here...
    }

    /**
     * CLOSE request handler.
     *
     * This handler is executed AFTER any other handler. This is a good place
     * to close resources.
     *
     * @return void
     */
    public function close()
    {
        // It's not necessary to close a database, since it's closed
        // automatically. The purpose of this line is only illustrative and
        // YOU CAN REMOVE IT THIS LINE.
        $this->_db->close();
    }
}
