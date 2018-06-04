<?php
namespace views;
use mimbre\http\json\JsonView;
use controllers\MyController;

/**
 * A 'view' MUST extends JsonView.
 */
class MyView extends JsonView
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(new MyController());
    }

    /**
     * {@inheritdoc}
     *
     * This is an abstract method and MUST be implemented in every view.
     * It returns the JSON document.
     *
     * @return mixed
     */
    public function getDocument()
    {
        return $this->controller->welcomeMessage;
    }
}
