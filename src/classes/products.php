<?php
class Products
{

    public $id;
    public $name;
    public $img;
    public $price;
    public function __construct($id, $name, $img, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->img = $img;
        $this->price = $price;
        $this->quantity = 0;
    }
    public function getProducts($product)
    {
        foreach ($product as $key => $p) {
            echo '<div id="product-' . $p->id . '" class="product">
            <img src=images/' . $p->img .'.png>
            <h3 class="title"><a href="#">' . $p->name . ' </a></h3>
            <span>Price:  $' . $p->price . ' </span>
            <a class="add-to-cart" href="add.php?id=' . $p->id .'\">Add To Cart</a>
            </div>';
        }
    }
}
