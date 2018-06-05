<?php
namespace views;
use mimbre\http\HttpView;
use controllers\MyController;

/**
 * A 'view' MUST extends HttpView.
 */
class MyView extends HttpView
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(new MyController(), "application/json");
    }

    /**
     * {@inheritdoc}
     *
     * This is an abstract method and MUST be implemented in every view.
     * It returns the JSON document.
     *
     * @return string
     */
    public function getDocument()
    {
        return json_encode($this->controller->welcomeMessage);
    }
}
