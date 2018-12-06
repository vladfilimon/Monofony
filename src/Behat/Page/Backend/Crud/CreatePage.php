<?php

/*
 * This file is part of AppName.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Behat\Page\Backend\Crud;

use App\Behat\Page\SymfonyPage;
use Behat\Mink\Exception\ElementNotFoundException;
use Behat\Mink\Session;
use Symfony\Component\Routing\RouterInterface;

class CreatePage extends SymfonyPage
{
    /**
     * @var string
     */
    private $routeName;

    /**
     * @param Session         $session
     * @param array           $parameters
     * @param RouterInterface $router
     * @param string          $routeName
     */
    public function __construct(Session $session, array $parameters, RouterInterface $router, $routeName)
    {
        parent::__construct($session, $parameters, $router);

        $this->routeName = $routeName;
    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $this->getDocument()->pressButton('Create');
    }

    /**
     * {@inheritdoc}
     */
    public function getValidationMessage($element)
    {
        $foundElement = $this->getFieldElement($element);
        if (null === $foundElement) {
            throw new ElementNotFoundException($this->getSession(), 'Field element');
        }

        $validationMessage = $foundElement->find('css', '.sylius-validation-error');
        if (null === $validationMessage) {
            throw new ElementNotFoundException($this->getSession(), 'Validation message', 'css', '.sylius-validation-error');
        }

        return $validationMessage->getText();
    }

    /**
     * {@inheritdoc}
     */
    public function getRouteName()
    {
        return $this->routeName;
    }

    /**
     * @param string $element
     *
     * @return \Behat\Mink\Element\NodeElement|null
     *
     * @throws ElementNotFoundException
     */
    private function getFieldElement($element)
    {
        $element = $this->getElement($element);
        while (null !== $element && !$element->hasClass('field')) {
            $element = $element->getParent();
        }

        return $element;
    }
}
