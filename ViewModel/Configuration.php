<?php declare(strict_types=1);

namespace Vendic\RUMVision\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * @copyright   Copyright (c) Vendic B.V https://vendic.nl/
 */
class Configuration implements ArgumentInterface
{
    private const RUMVISION_ENABLED_CONFIG_PATH = 'rumvision/general/enabled';
    private const RUMVISION_TRACKING_ID_CONFIG_PATH = 'rumvision/general/tracking_id';
    private const RUMVISION_DOMAIN_CONFIG_PATH = 'rumvision/general/rumvision_domain';

    private ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(
            Configuration::RUMVISION_ENABLED_CONFIG_PATH,
            ScopeInterface::SCOPE_STORE
        );
    }

    public function getRumVisionTrackingId(): ?string
    {
        return $this->scopeConfig->getValue(
            Configuration::RUMVISION_TRACKING_ID_CONFIG_PATH,
            ScopeInterface::SCOPE_STORE
        );
    }

    public function getRumVisionDomain(): ?string
    {
        return $this->scopeConfig->getValue(
            Configuration::RUMVISION_DOMAIN_CONFIG_PATH,
            ScopeInterface::SCOPE_STORE
        );
    }
}
