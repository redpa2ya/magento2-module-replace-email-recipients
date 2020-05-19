<?php

namespace Redpa2ya\Rer\Plugin\Mail\Template;

/**
 * Class TransportBuilder Plugin
 * @package Redpa2ya\Rer\Plugin\Mail\Template
 * @author Hoai Ngo <hoainp08@gmail.com>
 */
class TransportBuilder
{

    const FAKE_EMAIL = "fakemail@example.com";

    /**
     * @var \Redpa2ya\Rer\Helper\Data $helper
     */
    protected $helper;

    /**
     * @var string $toEmail
     */
    protected $toEmail = null;

    /**
     * @var array $bccEmails
     */
    protected $bccEmails = null;

    /**
     * @var array $destinationEmails
     */
    private $destinationEmails = null;

    /**
     * TransportBuilder constructor.
     * @param \Redpa2ya\Rer\Helper\Data $helper
     */
    public function __construct(
        \Redpa2ya\Rer\Helper\Data $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * @param \Magento\Framework\Mail\Template\TransportBuilder $subject
     * @param $address
     * @return string
     */
    public function beforeAddTo(\Magento\Framework\Mail\Template\TransportBuilder $subject, $address)
    {
        if ($this->helper->isModuleEnabled()) {
            return $this->getToEmail();
        }
    }

    /**
     * This should return a fake email
     * @param \Magento\Framework\Mail\Template\TransportBuilder $subject
     * @param $address
     * @return string
     */
    public function beforeAddCc(\Magento\Framework\Mail\Template\TransportBuilder $subject, $address)
    {
        if ($this->helper->isModuleEnabled()) {
            return self::FAKE_EMAIL;
        }
    }

    /**
     * Handle Bcc email
     * @param \Magento\Framework\Mail\Template\TransportBuilder $subject
     * @param $address
     * @return string
     */
    public function beforeAddBcc(\Magento\Framework\Mail\Template\TransportBuilder $subject, $address)
    {
        if ($this->helper->isModuleEnabled()) {
            return $this->getBccEmail();
        }
    }

    /**
     * retrieve a to email
     * @return string
     */
    protected function getToEmail()
    {
        if (null === $this->toEmail) {
            $this->toEmail = array_slice($this->getDestinationEmails(), 0, 1)[0];
        }
        return $this->toEmail;
    }

    /**
     * retrieve a bcc email
     * @return string
     */
    protected function getBccEmail()
    {
        if (null === $this->bccEmails) {
            $this->bccEmails = array_slice($this->getDestinationEmails(), 1);
        }
        if (count($this->bccEmails)) {
            return array_pop($this->bccEmails);
        }
        return self::FAKE_EMAIL;
    }

    /**
     * Reset all internal values
     */
    public function reset()
    {
        $this->destinationEmails = null;
        $this->bccEmails = null;
        $this->toEmail = null;
    }

    /**
     * parse config into array email list.
     * @return array
     */
    private function getDestinationEmails()
    {
        if (null === $this->destinationEmails) {
            $this->destinationEmails = explode(",", $this->helper->getConfigGeneral('email_to'));
        }
        return $this->destinationEmails;
    }
}