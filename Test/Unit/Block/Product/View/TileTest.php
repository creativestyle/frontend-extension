<?php

namespace Creativestyle\FrontendExtension\Test\Unit\Block\Product\View;

use Magento\Catalog\Api\Data\ProductInterface;

class TileTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;


    public function setUp()
    {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();
    }

    public function testItReturnsCorrectCacheKey()
    {
        $block = $this->getTileBlock();

        $block->setCacheKeyElements('first_additional_cache_value', 'second_additional_cache_value');

        $this->assertEquals('product_tile_200_dea5988345a40fb3a29078c7d583b5e2', $block->getCacheKey());
    }

    public function testItReturnsCorrectIdentities()
    {
        $block = $this->getTileBlock();

        $this->assertEquals(['catalog_product_200'], $block->getIdentities());
    }

    public function testItReturnsCorrectTemplate()
    {
        $block = $this->getTileBlock();

        $this->assertEquals('product/tile.phtml', $block->getTemplate());
    }

    /**
     * @return mixed
     */
    protected function getTileBlock()
    {
        $block = $this->objectManager->create(
            \Creativestyle\FrontendExtension\Block\Product\View\Tile::class,
            [
                'data' => [
                    'product' => $this->getProductFixture()
                ]
            ]
        );

        return $block;
    }

    protected function getProductFixture()
    {
        $product = $this->objectManager->create(ProductInterface::class);

        $product->setId(200);
        $product->setSpecialPrice(19);

        return $product;
    }
}