<?php declare(strict_types=1);

namespace Shopware\Currency\Collection;

use Shopware\Currency\Struct\CurrencyTranslationDetailStruct;
use Shopware\Shop\Collection\ShopBasicCollection;

class CurrencyTranslationDetailCollection extends CurrencyTranslationBasicCollection
{
    /**
     * @var CurrencyTranslationDetailStruct[]
     */
    protected $elements = [];

    public function getCurrencies(): CurrencyBasicCollection
    {
        return new CurrencyBasicCollection(
            $this->fmap(function (CurrencyTranslationDetailStruct $currencyTranslation) {
                return $currencyTranslation->getCurrency();
            })
        );
    }

    public function getLanguages(): ShopBasicCollection
    {
        return new ShopBasicCollection(
            $this->fmap(function (CurrencyTranslationDetailStruct $currencyTranslation) {
                return $currencyTranslation->getLanguage();
            })
        );
    }

    protected function getExpectedClass(): string
    {
        return CurrencyTranslationDetailStruct::class;
    }
}