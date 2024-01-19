<?php
declare(strict_types=1);

namespace YireoTraining\ExampleLayoutChallenges\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Product implements ArgumentInterface
{
    private ProductInterface $product;

    public function __construct(
        private RequestInterface $request,
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function getProduct(): ?ProductInterface
    {
        if ($this->product instanceof ProductInterface) {
            return $this->product;
        }

        $productId = (int)$this->request->getParam('id');
        return $this->productRepository->getById($productId);
    }

    public function setByProductSku(string $productSku): Product
    {
        $this->product = $this->productRepository->get($productSku);
        return $this;
    }

    public function setByProductId(int $productId): Product
    {
        $this->product = $this->productRepository->getById($productId);
        return $this;
    }

    public function setProduct(ProductInterface $product): Product
    {
        $this->product = $product;
        return $this;
    }
}
