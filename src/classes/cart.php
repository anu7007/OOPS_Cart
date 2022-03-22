<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
class Cart
{
    public $cart;
    public $total;
    public $products;
    public function __construct()
    {
        $this->cart = array();
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function addToCart(Products $product)
    {
        $this->cart = $_SESSION['cart'];

        if (!$this->ifProductExists($product)) {
            $product->quantity = 1;
            array_push($this->cart, $product);
        }
        $_SESSION['cart'] = $this->cart;
    }
    public function deleteItem($id)
    {
        $this->cart = $_SESSION['cart'];
        $products = $_SESSION['products'];
        foreach ($this->cart as $key => $value) {
            if ($value->id == $id) {
                array_splice($this->cart, $key, 1);
            }
        }
        $_SESSION['cart'] = $this->cart;
    }
    public function deleteCart()
    {
        $this->cart = $_SESSION['cart'];
        // unset($_SESSION['cart']);
        session_destroy();
    }
    public function ifProductExists($product)
    {
        foreach ($this->cart as $k => $p) {
            if ($p->id == $product->id) {
                $this->cart[$k]->quantity += 1;
                return true;
            }
        }
        return false;
    }

    public function displayCart()
    {
        if(isset($_SESSION['cart'])){
        $this->cart = $_SESSION['cart'];
        $_SESSION['total'] = 0;
        $total = $_SESSION['total'];
        if (isset($this->cart)) {
            if (count($this->cart) >= 1) {
                echo "<h1 style='padding-left: 45%; color:red;'>My Cart</h1><br>";
                echo "<table><tr class='tableHeading'>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Remove</th>
                    </tr>";
                foreach ($this->cart as $key => $product) {
                    $total =  $total + $product->price * $product->quantity;
                    $_SESSION['price'] = $product->price * $product->quantity;
                    echo "<tr>
                        <td>" . $product->id . "</td>
                        <td>" . $product->name . "</td>
                        <td>" . $product->quantity . "</td>
                        <td>" . '₹'.$product->price * $product->quantity . "</td>
                        <td><a class='dlt' href=empty.php?id=" . $product->id . "><i class='fa fa-trash-o' style='font-size:35px;color:red'></a></td>
                    
                        </tr>";
                }
                // echo "</table>";
                echo "<tr><td colspan='2'></td><th>TOTAL PRICE:</th><th>" . '₹'.$total . "</th>
                <td><marquee behavior='alternate' width=75% scrollamount=5 onmouseover='this.stop();'
                onmouseout='this.start();'><a href='emptyCart.php' style='color: black'>EMPTY CART</a></marquee></td>
                </tr>
                </table>";
            }
        }
        $_SESSION['cart'] = $this->cart;
        $_SESSION['total'] = $total;
    }}
}

